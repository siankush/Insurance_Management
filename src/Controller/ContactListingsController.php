<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;

class ContactListingsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->base_url = Router::url("/", true);
        $this->set("baseurl", $this->base_url);
        $this->viewBuilder()->setLayout("dashboardlayout");
    }

 
    public function index()
    {
        $this->paginate = [
            "contain" => ["Users"],
        ];
        $contactListings = $this->paginate($this->ContactListings);

        $this->set(compact("contactListings"));
    }

    public function userlisting()
    {
        $this->loadModel("CompanyAssets");
        $result = $this->Authentication->getIdentity();
        $id = $result['id'];

        $contactListings = $this->paginate(
            $this->ContactListings
                ->find("all")
                ->contain("CompanyAssets")
                ->where(["ContactListings.user_id" => $id,"deletestatus"=>1]),
            [
                "limit" => 10,
                "order" => [
                    "id" => "desc",
                ],
            ]
        );

        $this->set(compact("contactListings"));
    }

    public function userstatus($id = null, $status)
    {
        $this->request->allowMethod(["post"]);
        $contactlist = $this->ContactListings->get($id);

        if ($status == 1) {
            $contactlist->status = 0;
            $this->Flash->success(__("The status has been changed."));
        } else {
            $contactlist->status = 1;
            $this->Flash->success(__("The status has been changed."));
        }
        if ($this->ContactListings->save($contactlist)) {
            $this->Flash->success(__("The status has been changed."));
        }
        return $this->redirect([
            "controller" => "contact-listings",
            "action" => "userlisting",
        ]);
    }

   
    public function view($id = null)
    {
       
        $this->loadModel("Users");
        $this->loadModel("InsurancePolicies");
        $this->loadModel("CompanyAssets");

        $result = $this->Authentication->getIdentity();

        $contactListings = $this->ContactListings->get($id, [
            "contain" => ["Users"],
        ]);

        $companyAsset = $this->CompanyAssets->newEmptyEntity();

        if ($this->request->is(["patch", "post", "put"])) {
            $companyAsset = $this->CompanyAssets->patchEntity(
                $companyAsset,
                $this->request->getData()
            );
            if ($this->CompanyAssets->save($companyAsset)) {
    
                $this->Flash->success(__("The company asset has been saved."));

                return $this->redirect([
                    "controller" => "contact-listings",
                    "action" => "view",
                    $contactListings->id,
                ]);
            }
            $this->Flash->error(
                __("The company asset could not be saved. Please, try again.")
            );
        }

        $users = $this->CompanyAssets->Users
            ->find("list", ["limit" => 200])
            ->all();
        $insuranceCompanies = $this->InsuranceCompanies
            ->find("list", ["keyField" => "id", "valueField" => "name"])
            ->where(["status" => 1]);
        $insurancePolicies = $this->InsurancePolicies
            ->find("list", [
                "keyField" => "id",
                "valueField" => "name",
                "premium",
            ])
            ->where(["status" => 1]);
        $insurancePremium = $this->InsurancePolicies
            ->find("list", ["keyField" => "id", "valueField" => "premium"])
            ->all();
        $insuranceStatus = $this->InsurancePolicies
            ->find("all")
            ->where(["status" => 1])
            ->all();
        $policyStatus = $this->CompanyAssets
            ->find("all")
            ->where(["contact_listing_id" => $id])
            ->all();

            
            $companyAssetss = $this->paginate(
                $this->CompanyAssets
                ->find("all")
                ->contain(["InsurancePolicies", "InsuranceCompanies"])
                ->where(["contact_listing_id" => $id, "policy_status" => 1]),                
                [
                    "limit" => 5,
                    "order" => [
                        "id" => "desc",
                    ],
                    ]
                );
        
                $policycount =  $this->CompanyAssets->find("all")->contain(["InsurancePolicies"])
                ->where(["contact_listing_id" => $id, "checkstatus" => 1])->all();
                
                $count = count($policycount);
                

        $this->set(
            compact(
                "policyStatus",
                "contactListings",
                "companyAsset",
                "companyAssetss",
                "result",
                "insuranceCompanies",
                "insurancePolicies",
                "insurancePremium",
                "policycount",
                "count",
            )
        );
    }

    public function deletepolicy($id = null)
    {
        $this->loadModel("CompanyAssets");
        if ($this->request->is("post")) {
            $this->autoRender = false;
            $companyasset = $this->CompanyAssets
                ->find("all")
                ->where(["id" => $id])
                ->first();
            if ($companyasset->deleted == 1) {
                $companyasset["deleted"] = 0;
                $companyasset["policy_status"] = 0;
            } else {
                $companyasset["deleted"] = 1;
            }
            if ($this->CompanyAssets->save($companyasset)) {
                echo json_encode([
                    "status" => 1,
                    "message" => "The contactlisting saved. Please, try again.",
                ]);
                exit();
            }
        }
    }
   
    public function add()
    {
        $this->loadModel("Users");
        $result = $this->Authentication->getIdentity();

        $contactListings = $this->ContactListings->newEmptyEntity();
        if ($this->request->is("post")) {
            $contactListings = $this->ContactListings->patchEntity(
                $contactListings,
                $this->request->getData()
            );
            if ($this->ContactListings->save($contactListings)) {
                $this->Flash->success(
                    __("The contacts listing has been saved.")
                );

                return $this->redirect(["action" => "userlisting"]);
            }
            $this->Flash->error(
                __(
                    "The contacts listing could not be saved. Please, try again."
                )
            );
        }
        $users = $this->ContactListings->Users
            ->find("list", ["limit" => 200])
            ->all();
        $this->set(compact("contactListings", "users", "result"));
    }

    public function getuser($id = null)
    {
        $id = $_GET["id"];
        $contactListings = $this->ContactListings->get($id);

        echo json_encode($contactListings);
        exit();
    }

    
    public function edituser($id = null)
    {
        if ($this->request->is(["patch", "post", "put"])) {
            $data = $this->request->getData();

            $id = $this->request->getData("id");

            $contactListings = $this->ContactListings->get($id, [
                "contain" => [],
            ]);
            $contactListings = $this->ContactListings->patchEntity(
                $contactListings,
                $this->request->getData()
            );
            if ($this->ContactListings->save($contactListings)) {
                echo json_encode([
                    "status" => 1,
                    "message" => "The contactlisting  has been saved.",
                ]);
                exit();

                return $this->redirect(["action" => "index"]);
            }
            echo json_encode([
                "status" => 0,
                "message" => "The car could not be saved. Please, try again.",
            ]);
            exit();
        }
        $users = $this->ContactListings->Users
            ->find("list", ["limit" => 200])
            ->all();
        $this->set(compact("contactListings", "users"));
    }

    
    public function delete($id = null)
    {
        if ($this->request->is("ajax")) {
            $this->autoRender = false;

            $id = $this->request->getData("id");

            $deletestatus = $this->request->getData("deletestatus");

            $contactlist = $this->ContactListings->get($id);
            // dd($car);

            if ($deletestatus == 1) {
                $contactlist->deletestatus = 0;
            } else {
                $contactlist->deletestatus = 1;
            }

            if ($this->ContactListings->save($contactlist)) {
                echo json_encode([
                    "status" => 1,
                    "message" => "The contactlist has been deleted.",
                ]);
            }
        }
    }

    // public function addpolicy()
    // {
    // }
    public function getpremium()
    {
        $policies = [];

        $id = $this->request->getData("id");
        
        if ($id) {
            $policies = $this->InsurancePolicies
                ->find()
                ->select(["premium", "id"])
                ->where(["id" => $id])
                ->enableHydration(false)
                ->toArray();
            $data_to_save = [];
            foreach ($policies as $key => $val) {

                $data_to_save[$key]["id"] = $val["id"];

                $data_to_save[$key]["premium"] = $val["premium"];
        
            }
        }
        header("Content-Type: application/json");
        echo json_encode($data_to_save);
        exit();
    }
}
