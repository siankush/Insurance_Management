<?php
declare(strict_types=1);

namespace App\Controller;
use Authentication\PasswordHasher\DefaultPasswordHasher; // Add this line

/**
 * Users Controller
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function home()
    {
        
    }
    public function login()
    {
        if($this->request->is('post')){
            $user = $this->Auth->identify();

            if($user){
                $this->Auth->setUser($user);
                $this->UserLogs->saveIP($this->Auth->user('id'));
                if($user['status'] == 0){
                    $this->Flash->error('Sorry Youre account has been deactivated by admin');
                    return $this->redirect(['controller'=>'Users','action'=>'logout']);

                }
                return $this->redirect(['controller'=>'Users','action'=>'index']);
            }else{
                $this->Flash->error('Incorrect username and password');
            }
        }
    }

    public  function logout(){
        return $this->redirect($this->Auth->logout());
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $key = $this->request->getQuery('key');
        if($key){
            // $query = $this->Users->findByUsername($key);
            $query = $this->Users->find('all')
            ->where(['Or'=>['username like'=>'%'.$key.'%','email like'=>'%'.$key.'%']]);
        }else{
            $query = $this->Users;
        }
        $users = $this->paginate($query);
       
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
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->UserLogs->saveIP($this->Auth->user('id'));

                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method        return $this->redirect(['action' => 'index']);

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
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $user = $this->Users->get($id);
    //     if ($this->Users->delete($user)) {
    //         $this->Flash->success(__('The user has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The user could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }
    public function delete($id){
        $user = $this->Users->get($id);

        if($this->request->is(['post','delete'])){
            $user->deleted = 0;
            if($this->Users->save($user)){
                $this->Flash->success(__('User has deleted'));
            }else{
                $this->Flash->error(__('User not be deleted'));
            }
        }
        return $this->redirect(['action' => 'index']);
    }

    public function userStatus($id=null,$status){

        $this->request->allowMethod(['post']);
        $user = $this->Users->get($id);

        if($status == 1)
            $user->status = 0;
        else
            $user->status = 1;
        if($this->Users->save($user)){
            $this->Flash->success(__('User status has changed'));
        }
        return $this->redirect(['action' => 'index']);

    }
}
