<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Routing\Router;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{    

    public $base_url;

    public function beforeFilter(\Cake\Event\EventInterface $event){
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login']);
    }

    public function  initialize(): void {
        parent:: initialize();
        $this->base_url = Router::url("/", true);
        $this->set("baseurl", $this->base_url);
        $this->viewBuilder()->setLayout('dashboardlayout');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
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
    public function register()
    {       
        $this->loadModel('InsuranceCompanies');

        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            // dd($user);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'login']);
            }
            // $this->Flash->error(__('The user could not be saved. Please, try again.'));

            $this->Flash->set('user not saved');
        }
        $insuranceCompanies = $this->InsuranceCompanies->find('list', ['keyField' => 'id', 'valueField' => 'name']);

        $this->set(compact('user','insuranceCompanies'));

    }

    public function login(){
                    
        $this->request->allowMethod(['get','post']);
        $result = $this->Authentication->getResult();    
        if ($result && $result->isValid()) {
            $user = $this->Authentication->getIdentity();
            // dd($user);
            if($user['status'] == 0){
                $this->Flash->error('Sorry Youre account has been deactivated by admin');
                return $this->redirect(['controller'=>'Users','action'=>'logout']);

            }
            if ($user->auth == 0) {
                // $redirect = $this->request->getQuery('redirect', [
                //     'controller' => 'Insurance-Companies',
                //     'action' => 'index',
                // ]);
                $this->Flash->error(__('you are not authorised'));

                return $this->redirect('/users/logout');

                

                
            } elseif ($user->auth == 1) {
                // $redirect = $this->request->getQuery('redirect', [
                //     'controller' => 'users',
                //     'action' => 'login',
                // ]);
                return $this->redirect('/users/dashboard');

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
  
    public function logout()
    {
        $result = $this->Authentication->getResult();        
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
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
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
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
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function dashboard(){   
        $this->loadModel('CompanyAssets');
    $this->viewBuilder()->setLayout('dashboardlayout');   
    $user = $this->Authentication->getIdentity();
    // dd($id);
//     $companyAsset = $this->CompanyAssets->find('all')->where(['contact_listing_id'=> $id]);  
//    echo count($companyAsset);
//     die;
    // echo ($user->first_name);
    
    $this->set(compact('user'));
    // $this->set(compact('users','user'));    


    }

}
