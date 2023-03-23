<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
/**
 * CompanyAssets Controller
 *
 * @property \App\Model\Table\CompanyAssetsTable $CompanyAssets
 * @method \App\Model\Entity\CompanyAsset[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CompanyAssetsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // $this->loadModel('ContactListings');
        $this->viewBuilder()->setLayout('admin');

        $this->paginate = [
            'contain' => ['Users', 'InsuranceCompanies', 'InsurancePolicies','ContactListings'],
        ];
        // $companyAssets = $this->paginate->CompanyAssets->find('all')->all();
        $companyAssets = $this->paginate($this->CompanyAssets->find('all')
        ->contain(['Users', 'InsuranceCompanies', 'InsurancePolicies','ContactListings'])
        ->where(['checkstatus' => 0]),
        ['limit' => 10,
        'order' => [
            'id' => 'desc',
        ],    
        ]
        
    );
    $count = $this->CompanyAssets->find('all')->where(['checkstatus' => 0])->all();
   
    $count = count($count);
    
        $this->set(compact('companyAssets','count'));

    }

    public function policystatus($id = null, $checkstatus){
           
        $this->request->allowMethod(['post']);
        $companyasset = $this->CompanyAssets->get($id,[
            'contain' => ['ContactListings','Users','InsuranceCompanies','InsurancePolicies'],

        ]);
        $email = $companyasset->contact_listing['email'];
        $phone = $companyasset->user['contact_number'];
        $company = $companyasset->insurance_company['name'];
        $policy = $companyasset->insurance_policy['name'];
        $premium = $companyasset->insurance_policy['premium'];
    
        if($checkstatus == 0){
        $companyasset->checkstatus = 1;
        }else{
        $companyasset->checkstatus = 0;
        $this->Flash->success(__('The Policy status  has been approved.'));
        }
        if($this->CompanyAssets->save($companyasset)){
          
            $this->Flash->success(__('The Policy status  has been approved.'));
    
        }
        return $this->redirect(['controller'=>'CompanyAssets', 'action' => 'index']);
    }

    /**
     * View method
     *
     * @param string|null $id Company Asset id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $companyAsset = $this->CompanyAssets->get($id, [
            'contain' => ['Users', 'InsuranceCompanies', 'InsurancePolicies'],
        ]);

        $this->set(compact('companyAsset'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
        $companyAsset = $this->CompanyAssets->newEmptyEntity();
        if ($this->request->is('post')) {
            $companyAsset = $this->CompanyAssets->patchEntity($companyAsset, $this->request->getData());
            if ($this->CompanyAssets->save($companyAsset)) {
                $this->Flash->success(__('The company asset has been saved.'));

                return $this->redirect(['controller' => 'ContactListings','action' => 'index']);
            }
            $this->Flash->error(__('The company asset could not be saved. Please, try again.'));
        }
        $users = $this->CompanyAssets->Users->find('list', ['limit' => 200])->all();
        // $insuranceCompanies = $this->CompanyAssets->InsuranceCompanies->find('list', ['limit' => 200])->all();
        $insuranceCompanies = $this->InsuranceCompanies->find('list', ['keyField' => 'id', 'valueField' => 'name']);        
        $insurancePolicies = $this->CompanyAssets->InsurancePolicies->find('list', ['limit' => 200])->all();
        $contactListings = $this->CompanyAssets->ContactListings->find('list', ['limit' => 200])->all();
        $this->set(compact('companyAsset', 'users', 'insuranceCompanies', 'insurancePolicies','contactListings'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Company Asset id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $companyAsset = $this->CompanyAssets->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $companyAsset = $this->CompanyAssets->patchEntity($companyAsset, $this->request->getData());
            if ($this->CompanyAssets->save($companyAsset)) {
                $this->Flash->success(__('The company asset has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The company asset could not be saved. Please, try again.'));
        }
        $users = $this->CompanyAssets->Users->find('list', ['limit' => 200])->all();
        $insuranceCompanies = $this->CompanyAssets->InsuranceCompanies->find('list', ['limit' => 200])->all();
        $insurancePolicies = $this->CompanyAssets->InsurancePolicies->find('list', ['limit' => 200])->all();
        $this->set(compact('companyAsset', 'users', 'insuranceCompanies', 'insurancePolicies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Company Asset id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $companyAsset = $this->CompanyAssets->get($id);
        if ($this->CompanyAssets->delete($companyAsset)) {
            $this->Flash->success(__('The company asset has been deleted.'));
        } else {
            $this->Flash->error(__('The company asset could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
