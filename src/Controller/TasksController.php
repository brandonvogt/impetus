<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tasks Controller
 *
 * @property \App\Model\Table\TasksTable $Tasks
 */
class TasksController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->adminOnly();
        $this->paginate = ['contain' => ['DbUsers']];
        $this->set('tasks', $this->paginate($this->Tasks));
        $this->set('_serialize', ['tasks']);
    }

    /**
     * View method
     *
     * @param string|null $id Task id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->adminOnly();
        $task = $this->Tasks->get($id, [
            'contain' => ['DbUsers', 'Completions', 'Streaks']
        ]);
        $this->set('task', $task);
        $this->set('_serialize', ['task']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->adminOnly();
        $task = $this->Tasks->newEntity();
        if ($this->request->is('post')) {
            $task = $this->Tasks->patchEntity($task, $this->request->data);
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The task could not be saved. Please, try again.'));
            }
        }
        $dbUsers = $this->Tasks->DbUsers->find('list', ['limit' => 200]);
        $this->set(compact('task', 'dbUsers'));
        $this->set('_serialize', ['task']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Task id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->adminOnly();
        $task = $this->Tasks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Tasks->patchEntity($task, $this->request->data);
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The task could not be saved. Please, try again.'));
            }
        }
        $dbUsers = $this->Tasks->DbUsers->find('list', ['limit' => 200]);
        $this->set(compact('task', 'dbUsers'));
        $this->set('_serialize', ['task']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Task id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->adminOnly();
        $this->request->allowMethod(['post', 'delete']);
        $task = $this->Tasks->get($id);
        if ($this->Tasks->delete($task)) {
            $this->Flash->success(__('The task has been deleted.'));
        } else {
            $this->Flash->error(__('The task could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller' => 'pages', 'action' => 'portal']);
    }
    
    public function del($id) {
        $task = $this->Tasks->get($id);
        if ($task->db_user_id == $this->user_id) {
            if ($this->Tasks->delete($task)) {
                if ($task->task_type == 'habit') {
                    $this->redirect(['controller' => 'tasks', 'action' => 'habit_view']);
                }
                elseif($task->task_type == 'daily') {
                    $this->redirect(['controller' => 'tasks', 'action' => 'daily_view']);
                }
                elseif($task->task_type == 'task') {
                    $this->redirect(['controller' => 'tasks', 'action' => 'task_view']);
                }
            } else {
            $this->Flash->error(__('The task could not be deleted. Please, try again.'));
            }
        }
        return;
    }
    
    public function newTask() {
        $task = $this->Tasks->newEntity();
        if ($this->request->is('post')) {
            $task = $this->Tasks->patchEntity($task, $this->request->data);
            $task->recur_amount *= $this->request->data('mult');
            if ($this->Tasks->save($task)) {
                if ($task->task_type == 'habit') {
                    $this->redirect(['controller' => 'tasks', 'action' => 'habit_view']);
                }
                elseif($task->task_type == 'daily') {
                    $this->redirect(['controller' => 'tasks', 'action' => 'daily_view']);
                }
                elseif($task->task_type == 'task') {
                    $this->redirect(['controller' => 'tasks', 'action' => 'task_view']);
                }
            } else {
                $this->Flash->error(__('The task could not be saved. Please, try again.'));
            }
        }
    }
    
    public function listTasks() {
        $this->paginate = [
            'contain' => ['Completions'],
            'where' => ['db_user_id' => $this->user_id]
        ];
        $this->set('tasks', $this->paginate($this->Tasks));
    }
    
    public function editTask($id = null)
    {
        $task = $this->Tasks->get($id, [
            'contain' => []
        ]);
        if ($task->db_user_id !== $this->user_id) {
                $this->Flash->error(__('This task doesn\'t belong to you.'));
                return $this->redirect(['controller' => 'Pages',  'action' => 'portal']);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Tasks->patchEntity($task, $this->request->data);
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));
                return $this->redirect(['controller' => 'Pages',  'action' => 'portal']);
            } else {
                $this->Flash->error(__('The task could not be saved. Please, try again.'));
            }
        }
        $dbUsers = $this->Tasks->DbUsers->get($this->user_id);
        $this->set(compact('task', 'dbUsers'));
        $this->set('_serialize', ['task']);
    }
    
    public function habitView() {
        
        $this->viewBuilder()->layout('ajax');
        $this->set('habits', $this->Tasks->findTaskByType($this->user_id, 'habit')->toArray());
        
    }
    public function dailyView() {
        
        $this->viewBuilder()->layout('ajax');
        $this->set('dailies', $this->Tasks->findTaskByType($this->user_id, 'daily')
                ->contain(['Streaks' => function ($q) {
                    return $q->order(['last_completed' => 'DESC']);
                }])->toArray());
        
    }
    public function taskView() {
        
        $this->viewBuilder()->layout('ajax');
        $this->set('tasks', $this->Tasks->findTaskByType($this->user_id, 'task')->toArray());
        
    }
}
