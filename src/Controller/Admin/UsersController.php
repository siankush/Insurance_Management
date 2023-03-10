<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function admin(){
        $this->loadModel('Users');
        $this->loadModel('InsuranceCompanies');
        $this->loadModel('InsurancePolicies');
        $this->loadModel('CompanyAssets');
                $this->viewBuilder()->setLayout('admin');

                $insuranceCompanies = $this->InsuranceCompanies->find('all')->all();
                $insurancePolicies = $this->InsurancePolicies->find('all')->all();
                $user = $this->Users->find('all')->all();
                // $companyAssetss = $this->CompanyAssets->find('all')->contain(['InsurancePolicies'])->all();    
                // dd($companyAssetss);    

                $companyAssetss = $this->CompanyAssets->find('all')->contain(['InsurancePolicies'])->all();        

                $this->set(compact('user' ,'insuranceCompanies','insurancePolicies','companyAssetss'));



    }

     public function index()
    {
        $user = $this->Authentication->getIdentity();


        $users = $this->paginate($this->Users,[
            'limit' => 4,
            'order' => [
                'id' => 'desc',
            ],
        ]);
        $this->set(compact('users' ,'user'));
        $this->viewBuilder()->setLayout('admin');



    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('admin');

        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('InsuranceCompanies');

        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $insuranceCompanies = $this->InsuranceCompanies->find('list', ['keyField' => 'id', 'valueField' => 'name']);

        $this->set(compact('user'));
        $this->viewBuilder()->setLayout('admin','insuranceCompanies');

    }

    public function getuser($id = null)
    {   
    
    
       $id = $_GET['id'];
       $user = $this->Users->get($id);
   
 
    
        echo json_encode($user);
        exit;
     }
    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('admin');

        $data = $this->request->getData();
 
         $id = $this->request->getData('id');

        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                 echo json_encode(array(
                     "status" => 1,
                     "message" => "The contactlisting  has been saved.",
                 ));
                 exit;

                return $this->redirect(['action' => 'index']);
            }
            echo json_encode(array(
                "status" => 0,
                "message" => "The contactlisting could not be saved. Please, try again.",
            ));
            exit;
      
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deleteuser($id = null)
    {
        if ($this->request->is('ajax')) {     
            
            $this->autoRender = false;
 
            $id = $this->request->getData('id');
            
                     
             $deletestatus = $this->request->getData('deleted');
                   
             $user = $this->Users->get($id);
                     // dd($car);
                      
             if($deletestatus == 1)
 
                $user->deleted = 0;
                  else
                 $user->deleted = 1;
             
                 if($this->Users->save($user)){
                     echo json_encode(array(
                        "status" => 1,
                         "message" => "The user has been deleted."
                         )); 
             
                 }           
         }
    }
    public function logout()
    {
        $result = $this->Authentication->getResult();        
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    public function login()
    {
        $this->viewBuilder()->setLayout('admin');

        // $this->request->allowMethod(['get','post']);
        //     $result = $this->Authentication->getResult();    
        //     if ($result && $result->isValid()) {
        //         $user = $this->Authentication->getIdentity();
        //         // dd($user);
        //         if ($user->status == 0) {
        //             // $redirect = $this->request->getQuery('redirect', [
        //             //     'controller' => 'Insurance-Companies',
        //             //     'action' => 'index',
        //             // ]);
        //             return $this->redirect('insurance-companies/index');
                    

                    
        //         } elseif ($user->status == 1) {
        //             // $redirect = $this->request->getQuery('redirect', [
        //             //     'controller' => 'users',
        //             //     'action' => 'login',
        //             // ]);
        //             return $this->redirect(['controller' => 'users','action' => 'login']);

        //         }          
        //         // return $this->redirect($redirect);
        //         $this->Flash->error(__('you are not authorised'));
        //     }
        //     // display error if user submitted and authentication failed
        //     if ($this->request->is('post') && !$result->isValid()) {
        //         $this->Flash->error(__('Invalid username or password'));
        //         // $this->request->is('post');
        //     }       


        $this->request->allowMethod(['get','post']);
        $result = $this->Authentication->getResult(); 
        if ($result && $result->isValid()) {
            $user = $this->Authentication->getIdentity();
            // dd($user);
            if ($user->auth == 0) {
                // $redirect = $this->request->getQuery('redirect', [
                //     'controller' => 'Insurance-Companies',
                //     'action' => 'index',
                // ]);
                return $this->redirect('/admin/users/admin');

               
                

                
            } elseif ($user->auth == 1) {
                // $redirect = $this->request->getQuery('redirect', [
                //     'controller' => 'users',
                //     'action' => 'login',
                // ]);
                $this->Flash->error(__('you are not authorised'));

                return $this->redirect('admin/users/logout');


            }          
            // return $this->redirect($redirect);
            $this->Flash->error(__('you are not authorised'));
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
            // $this->request->is('post');
        }               
    }
    public function userstatus($id = null, $status){
           
        $this->request->allowMethod(['post']);
        $user = $this->Users->get($id);
    
        if($status == 1){
        $user->status = 0;
       
        }else{
        $user->status = 1;
        }
        if($this->Users->save($user)){
            $this->Flash->success(__('The status has been changed.'));
    
        }
        return $this->redirect('http://localhost:8765/admin/users/');
    }


    
}