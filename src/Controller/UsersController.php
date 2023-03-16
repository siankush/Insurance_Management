<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Routing\Router;


class UsersController extends AppController
{
    public $base_url;

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(["login"]);
    }

    public function initialize(): void
    {
        parent::initialize();
        $this->base_url = Router::url("/", true);
        $this->set("baseurl", $this->base_url);
        $this->viewBuilder()->setLayout("dashboardlayout");
    }

    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact("users"));
    }

   
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            "contain" => [],
        ]);

        $this->set(compact("user"));
    }

   
    public function register()
    {
        $this->loadModel("InsuranceCompanies");

        $user = $this->Users->newEmptyEntity();
        if ($this->request->is("post")) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__("The user has been saved."));

                return $this->redirect(["action" => "login"]);
            }
            $this->Flash->set("user not saved");
        }
        $insuranceCompanies = $this->InsuranceCompanies->find("list", [
            "keyField" => "id",
            "valueField" => "name",
        ]);

        $this->set(compact("user", "insuranceCompanies"));
    }

    public function login()
    {
        $this->request->allowMethod(["get", "post"]);
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $user = $this->Authentication->getIdentity();
            if ($user["status"] == 0) {
                $this->Flash->error(
                    "Sorry Youre account has been deactivated by admin"
                );
                return $this->redirect([
                    "controller" => "Users",
                    "action" => "logout",
                ]);
            }
            if ($user["deleted"] == 0) {
                $this->Flash->error(
                    "Sorry Youre account has been deleted by admin"
                );
                return $this->redirect([
                    "controller" => "Users",
                    "action" => "logout",
                ]);
            }
            if ($user->auth == 0) {
                $this->Flash->error(__("you are not authorised"));

                return $this->redirect("/users/logout");
            } elseif ($user->auth == 1) {
                return $this->redirect("/users/dashboard");
            }
            $this->Flash->error(__("you are not authorised"));
        }
        if ($this->request->is("post") && !$result->isValid()) {
            $this->Flash->error(__("Invalid username or password"));
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect([
                "controller" => "Users",
                "action" => "login",
            ]);
        }
    }

    
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            "contain" => [],
        ]);
        if ($this->request->is(["patch", "post", "put"])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__("The user has been saved."));

                return $this->redirect(["action" => "index"]);
            }
            $this->Flash->error(
                __("The user could not be saved. Please, try again.")
            );
        }
        $this->set(compact("user"));
    }

   
    public function delete($id = null)
    {
        $this->request->allowMethod(["post", "delete"]);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__("The user has been deleted."));
        } else {
            $this->Flash->error(
                __("The user could not be deleted. Please, try again.")
            );
        }

        return $this->redirect(["action" => "index"]);
    }

    public function dashboard($id = null)
    {
        $this->loadModel("ContactListings");
        $this->loadModel("CompanyAssets");
        $this->viewBuilder()->setLayout("dashboardlayout");
        $user = $this->Authentication->getIdentity();
        $id = $user["id"];
        $contact = $this->paginate(
            $this->ContactListings
                ->find("all")
                ->contain(["CompanyAssets"])
                ->where(["ContactListings.user_id" => $id])
        );
        $companyAssetss = $this->CompanyAssets
            ->find("all")
            ->contain(["InsurancePolicies"])
            ->where(["insurance_policy_id" => $user->id])
            ->all();
        $this->set(compact("user", "companyAssetss", "contact"));
    }
}
