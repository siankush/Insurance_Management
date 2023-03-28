<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * AssignTasks Controller
 *
 * @property \App\Model\Table\AssignTasksTable $AssignTasks
 * @method \App\Model\Entity\AssignTask[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AssignTasksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $assignTasks = $this->paginate($this->AssignTasks);
        $users = $this->AssignTasks->Users->find('list', ['keyField' => 'id', 'valueField' => 'first_name'])->where(['auth' => '1']);

        $this->set(compact('assignTasks', 'users'));
    }

    // src/Controller/YourController.php

    public function ajaxEdit($id)
    {
        // Fetch the data for the selected item
        $data = $this->AssignTasks->findById($id);

        // Render the edit form for the selected item
        $this->set(compact('data'));
        $this->autoRender = false;  
    }

    /**
     * View method
     *
     * @param string|null $id Assign Task id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $assignTask = $this->AssignTasks->get($id, [
            'contain' => ['Users'],
        ]);


        $this->set(compact('assignTask'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Users');
        $assignTask = $this->AssignTasks->newEmptyEntity();
        if ($this->request->is('post')) {
            $assignTask = $this->AssignTasks->patchEntity($assignTask, $this->request->getData());
            if ($this->AssignTasks->save($assignTask)) {
                $this->Flash->success(__('The assign task has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The assign task could not be saved. Please, try again.'));
        }
        $users = $this->AssignTasks->Users->find('list', ['keyField' => 'id', 'valueField' => 'first_name'])->where(['auth' => '1']);
        // $count = $this->CompanyAssets->find('all')->where(['checkstatus' => 0])->all();

        $this->set(compact('assignTask', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Assign Task id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $assignTask = $this->AssignTasks->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $assignTask = $this->AssignTasks->patchEntity($assignTask, $this->request->getData());
            if ($this->AssignTasks->save($assignTask)) {
                $this->Flash->success(__('The assign task has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The assign task could not be saved. Please, try again.'));
        }
        $users = $this->AssignTasks->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('assignTask', 'users'));
    }

    public function getuser($id = null)
    {
        $id = $_GET["id"];
        $assignTask = $this->AssignTasks->get($id);

        echo json_encode($assignTask);
        exit();
    }

    public function edituser()
    {
        $this->autoRender = false;
        $this->loadModel('Users');
        if ($this->request->is(["patch", "post", "put"])) {
            $data = $this->request->getData();

            $id = $this->request->getData("id");
            // $data = $this->request->getData();
            
            $assignTask = $this->AssignTasks->get($id, [
                "contain" => [],
            ]);
            $assignTask = $this->AssignTasks->patchEntity(
                $assignTask,
                $this->request->getData()
            );
            if ($this->AssignTasks->save($assignTask)) {
                echo json_encode([
                    "status" => 1,
                    "message" => "The contactlisting  has been saved.",
                ]);

                return $this->redirect(["action" => "index"]);
            }
            echo json_encode([
                "status" => 0,
                "message" => "The car could not be saved. Please, try again.",
            ]);
            exit();
        }
        $users = $this->AssignTasks->Users
            ->find("all", ["limit" => 200])
            ->all();
        $this->set(compact("assignTask", "users"));
    }

    /**
     * Delete method
     *
     * @param string|null $id Assign Task id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $assignTask = $this->AssignTasks->get($id);
        if ($this->AssignTasks->delete($assignTask)) {
            $this->Flash->success(__('The assign task has been deleted.'));
        } else {
            $this->Flash->error(__('The assign task could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
}