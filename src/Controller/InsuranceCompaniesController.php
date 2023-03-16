<?php
declare(strict_types=1);

namespace App\Controller;

class InsuranceCompaniesController extends AppController
{
    
    public function index()
    {
        $this->viewBuilder()->setLayout("admin");
        $key = $this->request->getQuery("key");
        if ($key) {
            $query = $this->InsuranceCompanies
                ->find("all")
                ->where(["Or" => ["name like" => "%" . $key . "%"]]);
        } else {
            $query = $this->InsuranceCompanies;
        }
        $insuranceCompanies = $this->paginate($query, [
            "limit" => 4,
            "order" => [
                "id" => "desc",
            ],
        ]);
        $this->loadModel("Users");
        $user = $this->Authentication->getIdentity();
        $this->set(compact("insuranceCompanies", "user"));
    }

    public function userstatus($id = null, $status)
    {
        $this->request->allowMethod(["post"]);
        $insuranceCompany = $this->InsuranceCompanies->get($id);

        if ($status == 1) {
            $insuranceCompany->status = 0;
        } else {
            $insuranceCompany->status = 1;
        }
        if ($this->InsuranceCompanies->save($insuranceCompany)) {
            $this->Flash->success(__("The status has been changed."));
        }
        return $this->redirect([
            "controller" => "insurance-companies",
            "action" => "index",
        ]);
    }
   
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout("admin");

        $insuranceCompany = $this->InsuranceCompanies->get($id, [
            "contain" => [],
        ]);

        $this->set(compact("insuranceCompany"));
    }

   
    public function add()
    {
        $this->viewBuilder()->setLayout("admin");

        $insuranceCompany = $this->InsuranceCompanies->newEmptyEntity();
        if ($this->request->is("post")) {
            $insuranceCompany = $this->InsuranceCompanies->patchEntity(
                $insuranceCompany,
                $this->request->getData()
            );
            if ($this->InsuranceCompanies->save($insuranceCompany)) {
                $this->Flash->success(
                    __("The insurance company has been saved.")
                );

                return $this->redirect(["action" => "index"]);
            }
            $this->Flash->error(
                __(
                    "The insurance company could not be saved. Please, try again."
                )
            );
        }
        $this->set(compact("insuranceCompany"));
    }

  
    public function getcompany($id = null)
    {
        $id = $_GET["id"];
        $insuranceCompany = $this->InsuranceCompanies->get($id);

        echo json_encode($insuranceCompany);
        exit();
    }
    

    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout("admin");

        $data = $this->request->getData();

        $id = $this->request->getData("id");

        $insuranceCompany = $this->InsuranceCompanies->get($id, [
            "contain" => [],
        ]);
        if ($this->request->is(["patch", "post", "put"])) {
            $insuranceCompany = $this->InsuranceCompanies->patchEntity(
                $insuranceCompany,
                $this->request->getData()
            );
            if ($this->InsuranceCompanies->save($insuranceCompany)) {
                echo json_encode([
                    "status" => 1,
                    "message" => "The insurance company  has been saved.",
                ]);
                exit();

                return $this->redirect(["action" => "index"]);
            }
            echo json_encode([
                "status" => 0,
                "message" =>
                    "The insurance company could not be saved. Please, try again.",
            ]);
            exit();
        }
        $this->set(compact("insuranceCompany"));
    }

  
    public function delete($id = null)
    {
        if ($this->request->is("ajax")) {
            $this->autoRender = false;

            $id = $this->request->getData("id");

            $deletedstatus = $this->request->getData("deleted");

            $insuranceCompany = $this->InsuranceCompanies->get($id);

            if ($deletedstatus == 1) {
                $insuranceCompany->deleted = 0;
            } else {
                $insuranceCompany->deleted = 1;
            }

            if ($this->InsuranceCompanies->save($insuranceCompany)) {
                echo json_encode([
                    "status" => 1,
                    "message" => "The insurance company has been deleted.",
                ]);
            }
        }
    }
}
