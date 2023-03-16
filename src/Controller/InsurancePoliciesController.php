<?php
declare(strict_types=1);

namespace App\Controller;


class InsurancePoliciesController extends AppController
{
    
    public function index()
    {
        $this->loadModel("InsuranceCompanies");
        $this->viewBuilder()->setLayout("admin");

        $this->paginate = [
            "contain" => ["InsuranceCompanies"],
        ];
        $insurancePolicies = $this->paginate($this->InsurancePolicies, [
            "limit" => 4,
            "order" => [
                "id" => "desc",
            ],
        ]);

        $insuranceCompanies = $this->InsuranceCompanies->find("list", [
            "keyField" => "id",
            "valueField" => "name",
        ]);

        $this->set(compact("insurancePolicies", "insuranceCompanies"));
    }

    public function userstatus($id = null, $status)
    {
        $this->request->allowMethod(["post"]);
        $insurancePolicy = $this->InsurancePolicies->get($id);

        if ($status == 1) {
            $insurancePolicy->status = 0;
            $this->Flash->success(__("The status has been changed."));
        } else {
            $insurancePolicy->status = 1;
            $this->Flash->success(__("The status has been changed."));
        }
        if ($this->InsurancePolicies->save($insurancePolicy)) {
            $this->Flash->success(__("The status has been changed."));
        }
        return $this->redirect([
            "controller" => "insurance-policies",
            "action" => "index",
        ]);
    }
  
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout("admin");

        $insurancePolicy = $this->InsurancePolicies->get($id, [
            "contain" => ["InsuranceCompanies"],
        ]);

        $this->set(compact("insurancePolicy"));
    }

    
    public function add()
    {
        $this->viewBuilder()->setLayout("admin");

        $this->paginate = [
            "contain" => ["InsuranceCompanies"],
        ];
        $insurancePolicies = $this->paginate($this->InsurancePolicies);

        $this->loadModel("InsuranceCompanies");
        $insurancePolicy = $this->InsurancePolicies->newEmptyEntity();
        if ($this->request->is("post")) {
            $insurancePolicy = $this->InsurancePolicies->patchEntity(
                $insurancePolicy,
                $this->request->getData()
            );
            if (!$insurancePolicy->getErrors) {
                $image = $this->request->getData("image_file");
            }
            $name = $image->getClientFilename();
            $targetPath = WWW_ROOT . "img" . DS . $name;
            if ($name) {
                $image->moveTo($targetPath);
            }

            $insurancePolicy->image = $name;
            if ($this->InsurancePolicies->save($insurancePolicy)) {
                $this->Flash->success(
                    __("The insurance policy has been saved.")
                );

                return $this->redirect(["action" => "index"]);
            }
            $this->Flash->error(
                __(
                    "The insurance policy could not be saved. Please, try again."
                )
            );
        }
        $insuranceCompanies = $this->InsuranceCompanies->find("list", [
            "keyField" => "id",
            "valueField" => "name",
        ]);

        $this->set(compact("insurancePolicy", "insuranceCompanies"));
    }


    public function getpolicy($id = null)
    {
        $id = $_GET["id"];
        $insurancepolicy = $this->InsurancePolicies->get($id);

        echo json_encode($insurancepolicy);
        exit();
    }
  
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout("admin");

        if ($this->request->is(["ajax"])) {
            $data = $this->request->getData();
            $id = $this->request->getData("id");

            $insurancePolicy = $this->InsurancePolicies->get($id, [
                "contain" => [],
            ]);
            $fileName2 = $insurancePolicy["image"];
            $productImage = $this->request->getData("image");
            $fileName = $productImage->getClientFilename();
            if ($fileName == "") {
                $data["image"] = $fileName2;
            } else {
                $data["image"] = $fileName;
            }
            $fileSize = $productImage->getSize();

            $insurancePolicy = $this->InsurancePolicies->patchEntity(
                $insurancePolicy,
                $data
            );
            if ($this->InsurancePolicies->save($insurancePolicy)) {
                $hasFileError = $productImage->getError();

                if ($hasFileError > 0) {
                    $data["image"] = "";
                } else {
                    $fileType = $productImage->getClientMediaType();

                    if (
                        $fileType == "image/png" ||
                        $fileType == "image/jpeg" ||
                        $fileType == "image/jpg"
                    ) {
                        $imagePath = WWW_ROOT . "img/" . $fileName;
                        $productImage->moveTo($imagePath);
                        $data["image"] = $fileName;
                    }
                }

                echo json_encode([
                    "status" => 1,
                    "message" => "The insurance policy  has been saved.",
                ]);
                exit();
            }
            echo json_encode([
                "status" => 0,
                "message" =>
                    "The insurance policy could not be saved. Please, try again.",
            ]);
            exit();
        }

        $this->set(compact("insurancePolicy"));
    }

    
    public function delete($id = null)
    {
        $this->autoRender = false;

        $id = $this->request->getData("id");

        $deletedpolicy = $this->request->getData("deleted");

        $insurancePolicy = $this->InsurancePolicies->get($id);

        if ($deletedpolicy == 1) {
            $insurancePolicy->deleted = 0;
        } else {
            $insurancePolicy->deleted = 1;
        }

        if ($this->InsurancePolicies->save($insurancePolicy)) {
            echo json_encode([
                "status" => 1,
                "message" => "The insurance company has been deleted.",
            ]);
        }
    }
}
