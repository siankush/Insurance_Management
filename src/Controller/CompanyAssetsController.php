<?php
declare(strict_types=1);

namespace App\Controller;

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
        $this->paginate = [
            'contain' => ['Users', 'InsuranceCompanies', 'InsurancePolicies'],
        ];
        $companyAssets = $this->paginate($this->CompanyAssets);

        $this->set(compact('companyAssets'));
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

                return $this->redirect(['action' => 'index']);
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
