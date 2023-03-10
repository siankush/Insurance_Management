<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * InsuranceCompanies Controller
 *
 * @property \App\Model\Table\InsuranceCompaniesTable $InsuranceCompanies
 * @method \App\Model\Entity\InsuranceCompany[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InsuranceCompaniesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('admin');

        $insuranceCompanies = $this->paginate($this->InsuranceCompanies,[
            'limit' => 4,
            'order' => [
                'id' => 'desc',
            ],
        ]);
        $this->loadModel('Users');
        $user = $this->Authentication->getIdentity();
        $this->set(compact('insuranceCompanies','user'));
    }

    public function userstatus($id = null, $status){
           
        $this->request->allowMethod(['post']);
        $insuranceCompany = $this->InsuranceCompanies->get($id);
    
        if($status == 1){
        $insuranceCompany->status = 0;
       
        }else{
        $insuranceCompany->status = 1;
        }
        if($this->InsuranceCompanies->save($insuranceCompany)){
            $this->Flash->success(__('The status has been changed.'));
    
        }
        return $this->redirect(['controller'=>'insurance-companies', 'action' => 'index']);
    }
    /**
     * View method
     *
     * @param string|null $id Insurance Company id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('admin');

        $insuranceCompany = $this->InsuranceCompanies->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('insuranceCompany'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('admin');

        $insuranceCompany = $this->InsuranceCompanies->newEmptyEntity();
        if ($this->request->is('post')) {
            $insuranceCompany = $this->InsuranceCompanies->patchEntity($insuranceCompany, $this->request->getData());
            if ($this->InsuranceCompanies->save($insuranceCompany)) {
                $this->Flash->success(__('The insurance company has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The insurance company could not be saved. Please, try again.'));
        }
        $this->set(compact('insuranceCompany'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Insurance Company id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function getcompany($id = null)
    {   
    
    
       $id = $_GET['id'];
       $insuranceCompany = $this->InsuranceCompanies->get($id);
   
 
    
        echo json_encode($insuranceCompany);
        exit;
     }
    /**
     * Edit method
     *
     * @param string|null $id Insurance Company id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('admin');

        $data = $this->request->getData();
 
        $id = $this->request->getData('id');

        $insuranceCompany = $this->InsuranceCompanies->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $insuranceCompany = $this->InsuranceCompanies->patchEntity($insuranceCompany, $this->request->getData());
            if ($this->InsuranceCompanies->save($insuranceCompany)) {
                echo json_encode(array(
                    "status" => 1,
                    "message" => "The insurance company  has been saved.",
                ));
                exit;

                return $this->redirect(['action' => 'index']);
            }
            echo json_encode(array(
                "status" => 0,
                "message" => "The insurance company could not be saved. Please, try again.",
            ));
            exit;
        }
        $this->set(compact('insuranceCompany'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Insurance Company id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // $this->request->allowMethod(['post', 'delete']);
        // $insuranceCompany = $this->InsuranceCompanies->get($id);
        // if ($this->InsuranceCompanies->delete($insuranceCompany)) {
        //     $this->Flash->success(__('The insurance company has been deleted.'));
        // } else {
        //     $this->Flash->error(__('The insurance company could not be deleted. Please, try again.'));
        // }

        // return $this->redirect(['action' => 'index']);
        if ($this->request->is('ajax')) {     
            
            $this->autoRender = false;
 
            $id = $this->request->getData('id');
            
            $deletedstatus = $this->request->getData('deleted');   
            
            $insuranceCompany = $this->InsuranceCompanies->get($id);
                     // dd($car);
                      
             if($deletedstatus == 1)
 
                $insuranceCompany->deleted = 0;
                  else
                 $insuranceCompany->deleted = 1;
             
                 if($this->InsuranceCompanies->save($insuranceCompany)){
                     echo json_encode(array(
                        "status" => 1,
                         "message" => "The insurance company has been deleted."
                         )); 
             
                 }           
         }
    }
}

