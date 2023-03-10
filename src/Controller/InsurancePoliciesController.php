<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * InsurancePolicies Controller
 *
 * @property \App\Model\Table\InsurancePoliciesTable $InsurancePolicies
 * @method \App\Model\Entity\InsurancePolicy[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InsurancePoliciesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->loadModel('InsuranceCompanies');
        $this->viewBuilder()->setLayout('admin');

        $this->paginate = [
            'contain' => ['InsuranceCompanies'],
        ];
        $insurancePolicies = $this->paginate($this->InsurancePolicies,[
            'limit' => 4,
            'order' => [
                'id' => 'desc',
            ],
        ]);
        // dd($insurancePolicies);
        // $insurancePolicies = $this->paginate($this->InsurancePolicies);
        $insuranceCompanies = $this->InsuranceCompanies->find('list', ['keyField' => 'id', 'valueField' => 'name']); 

        $this->set(compact('insurancePolicies','insuranceCompanies'));
    }

    public function userstatus($id = null, $status){
           
        $this->request->allowMethod(['post']);
        $insurancePolicy = $this->InsurancePolicies->get($id);
    
        if($status == 1){
        $insurancePolicy->status = 0;
        $this->Flash->success(__('The status has been changed.'));
        }else{
        $insurancePolicy->status = 1;
        $this->Flash->success(__('The status has been changed.'));
        }
        if($this->InsurancePolicies->save($insurancePolicy)){
            $this->Flash->success(__('The status has been changed.'));
    
        }
        return $this->redirect(['controller'=>'insurance-policies', 'action' => 'index']);
    }
    /**
     * View method
     *
     * @param string|null $id Insurance Policy id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('admin');

        $insurancePolicy = $this->InsurancePolicies->get($id, [
            'contain' => ['InsuranceCompanies'],
        ]);
        // $insuranceCompanies = $this->InsuranceCompanies->find('list', ['keyField' => 'id', 'valueField' => 'name']);

        $this->set(compact('insurancePolicy'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('admin');

        $this->paginate = [
            'contain' => ['InsuranceCompanies'],
        ];
        $insurancePolicies = $this->paginate($this->InsurancePolicies);
        // dd($insurancePolicies);

        $this->loadModel('InsuranceCompanies');
        // $insuranceCompanies = $this->paginate($this->InsuranceCompanies);
        $insurancePolicy = $this->InsurancePolicies->newEmptyEntity();        
        if ($this->request->is('post')) {
            $insurancePolicy = $this->InsurancePolicies->patchEntity($insurancePolicy, $this->request->getData());
            if (!$insurancePolicy->getErrors)
                $image = $this->request->getData('image_file');
                $name = $image->getClientFilename();
            $targetPath = WWW_ROOT . 'img' . DS . $name;
            if ($name)
                $image->moveTo($targetPath);

            $insurancePolicy->image = $name;
            if ($this->InsurancePolicies->save($insurancePolicy)) {
                $this->Flash->success(__('The insurance policy has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The insurance policy could not be saved. Please, try again.'));
        }
        $insuranceCompanies = $this->InsuranceCompanies->find('list', ['keyField' => 'id', 'valueField' => 'name']);        
   
        $this->set(compact('insurancePolicy', 'insuranceCompanies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Insurance Policy id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function getpolicy($id = null){

        $id = $_GET['id'];
        $insurancepolicy = $this->InsurancePolicies->get($id);

        echo json_encode($insurancepolicy);
        exit;

    }
    /**
     * Edit method
     *
     * @param string|null $id Insurance Policy id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
    
        $this->viewBuilder()->setLayout('admin');

        if ($this->request->is(['ajax'])) {

            $data = $this->request->getData();
            $id = $this->request->getData('id');
           
    
            $insurancePolicy = $this->InsurancePolicies->get($id, [
                'contain' => [],
            ]);
            $fileName2 = $insurancePolicy["image"];
            $productImage = $this->request->getData("image");
            $fileName = $productImage->getClientFilename();
            if ($fileName == '') {
                $data["image"] = $fileName2;
            }else{

                $data["image"] = $fileName;
            }
            $fileSize = $productImage->getSize();
            
            $insurancePolicy = $this->InsurancePolicies->patchEntity($insurancePolicy, $data);
                if ($this->InsurancePolicies->save($insurancePolicy)) {
                    $hasFileError = $productImage->getError();
        
                    if ($hasFileError > 0) {
                        $data["image"] = "";
                    } else {
                        $fileType = $productImage->getClientMediaType();
        
                        if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                            $imagePath = WWW_ROOT . "img/" . $fileName;
                            $productImage->moveTo($imagePath);
                            $data["image"] = $fileName;
                        }
                    }

                    echo json_encode(array(
                        "status" => 1,
                        "message" => "The insurance policy  has been saved.",
                    ));
                    exit;

                }
                echo json_encode(array(
                    "status" => 0,
                    "message" => "The insurance policy could not be saved. Please, try again.",
                ));
                exit;
            }        
    

        $this->set(compact('insurancePolicy'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Insurance Policy id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // $this->request->allowMethod(['post', 'delete']);
        // $insurancePolicy = $this->InsurancePolicies->get($id);
        // if ($this->InsurancePolicies->delete($insurancePolicy)) {    
        //     $this->Flash->success(__('The insurance policy has been deleted.'));
        // } else {
        //     $this->Flash->error(__('The insurance policy could not be deleted. Please, try again.'));
        // }

        // return $this->redirect(['action' => 'index']);
        $this->autoRender = false;
 
            $id = $this->request->getData('id');
            
            $deletedpolicy = $this->request->getData('deleted');   
            
            $insurancePolicy = $this->InsurancePolicies->get($id);
                     // dd($car);
                      
             if($deletedpolicy == 1)
 
                $insurancePolicy->deleted = 0;
                  else
                 $insurancePolicy->deleted = 1;
             
                 if($this->InsurancePolicies->save($insurancePolicy)){
                     echo json_encode(array(
                        "status" => 1,
                         "message" => "The insurance company has been deleted."
                         )); 
             
                 }     
    }
}
