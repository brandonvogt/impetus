<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Completions Controller
 *
 * @property \App\Model\Table\CompletionsTable $Completions
 */
class CompletionsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->adminOnly();
        $this->paginate = [
            'contain' => ['DbUsers', 'Tasks']
        ];
        $this->set('completions', $this->paginate($this->Completions));
        $this->set('_serialize', ['completions']);
    }

    /**
     * View method
     *
     * @param string|null $id Completion id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->adminOnly();
        $completion = $this->Completions->get($id, [
            'contain' => ['DbUsers', 'Tasks']
        ]);
        $this->set('completion', $completion);
        $this->set('_serialize', ['completion']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->adminOnly();
        $completion = $this->Completions->newEntity();
        if ($this->request->is('post')) {
            $completion = $this->Completions->patchEntity($completion, $this->request->data);
            if ($this->Completions->save($completion)) {
                $this->Flash->success(__('The completion has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The completion could not be saved. Please, try again.'));
            }
        }
        $dbUsers = $this->Completions->DbUsers->find('list', ['limit' => 200]);
        $tasks = $this->Completions->Tasks->find('list', ['limit' => 200]);
        $this->set(compact('completion', 'dbUsers', 'tasks'));
        $this->set('_serialize', ['completion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Completion id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->adminOnly();
        $completion = $this->Completions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $completion = $this->Completions->patchEntity($completion, $this->request->data);
            if ($this->Completions->save($completion)) {
                $this->Flash->success(__('The completion has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The completion could not be saved. Please, try again.'));
            }
        }
        $dbUsers = $this->Completions->DbUsers->find('list', ['limit' => 200]);
        $tasks = $this->Completions->Tasks->find('list', ['limit' => 200]);
        $this->set(compact('completion', 'dbUsers', 'tasks'));
        $this->set('_serialize', ['completion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Completion id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->adminOnly();
        $this->request->allowMethod(['post', 'delete']);
        $completion = $this->Completions->get($id);
        if ($this->Completions->delete($completion)) {
            $this->Flash->success(__('The completion has been deleted.'));
        } else {
            $this->Flash->error(__('The completion could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    public function newComp($task_id)
    {
        
        $completion = $this->Completions->newEntity();
        $task = $this->Completions->Tasks->get($task_id, ['contain' => 'DbUsers']);
            if ($task->db_user->id == $this->user_id) {
                $completion->db_user_id = $this->user_id;
                $completion->task_id = $task_id;
                $completion->task_type = $task->task_type;
                if ($completion->task_type == 'daily') {
                    $bonus = $this->Completions->Tasks->Streaks->resolveStreak($task_id, $this->user_id);
                }
                else {$bonus = 0;}
                if ($this->Completions->save($completion)) {
                    $bonuscheck = $this->Completions->DbUsers->addGold($this->user_id, $task->id, $bonus);
                    if ($bonuscheck == 2) {
                        $this->Flash->greatSuccess(__('Bonus! Reward has been doubled!'));
                    }
                    else {
                        $this->Flash->success(__('Good work. Keep it up.'));
                    }
                    if ($completion->task_type == 'habit') {
                        $this->redirect(['controller' => 'tasks', 'action' => 'habit_view']);
                    }
                    elseif($completion->task_type == 'daily') {
                        $this->Completions->Tasks->markComplete($task_id);
                        $this->redirect(['controller' => 'tasks', 'action' => 'daily_view']);
                    }
                    elseif($completion->task_type == 'task') {
                        $this->Completions->Tasks->markComplete($task_id);
                        $this->redirect(['controller' => 'tasks', 'action' => 'task_view']);
                    }
                } else {
                    $this->Flash->error(__('The completion could not be saved. Please, try again.'));
                }
            }
            else {$this->Flash->error(__('The task doesn\'t match the user. Weird.'));
            }
    }
}
