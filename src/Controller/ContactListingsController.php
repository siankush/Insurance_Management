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
        $id = $result["id"];

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
                $mailer = new Mailer('default');
                $mailer->setTransport('gmail'); //your email configuration name
                $mailer->setFrom(['abishekkumar1611@gmail.com' => 'HEALTH CARE'])
                ->setTo('kabishek@teqmavens.com')
                ->setEmailFormat('html')
                ->setSubject('Sky Dash Insurance ')
                ->deliver('
                <style>
                        .card {
                        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                        max-width: 300px;
                        margin: auto;
                        text-align: center;
                        font-family: arial;
                        }

                        .title {
                        color: grey;
                        font-size: 18px;
                        }

                        .button {
                        border: none;
                        outline: 0;
                        display: inline-block;
                        padding: 8px;
                        color: white;
                        background-color: #000;
                        text-align: center;
                        cursor: pointer;
                        width: 100%;
                        font-size: 18px;
                        }

                        a {
                        text-decoration: none;
                        font-size: 22px;
                        color: black;
                        }

                        .button:hover, a:hover {
                        opacity: 0.7;
                        }
                        </style>
                           
                            <div class="card">
                            <img src="data:image/png;base64,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" alt="John" style="width:100%">
                            <h1>Hello Admin</h1>
                            <p>Here is new customer for approval</p>
                            <div style="margin: 24px 0;">
                                <a href="#"><i class="fa fa-dribbble"></i></a> 
                                <a href="#"><i class="fa fa-twitter"></i></a>  
                                <a href="#"><i class="fa fa-linkedin"></i></a>  
                                <a href="#"><i class="fa fa-facebook"></i></a> 
                            </div>
                            <a href="http://localhost:8765/admin" class="button">Go to Dashboard</a>
                            </div>
                ');
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

        $this->set(
            compact(
                "policyStatus",
                "contactListings",
                "companyAsset",
                "companyAssetss",
                "result",
                "insuranceCompanies",
                "insurancePolicies",
                "insurancePremium"
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

    public function addpolicy()
    {
    }
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
