<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Streaks Controller
 *
 * @property \App\Model\Table\StreaksTable $Streaks
 */
class StreaksController extends AppController
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
        $this->set('streaks', $this->paginate($this->Streaks));
        $this->set('_serialize', ['streaks']);
    }

    /**
     * View method
     *
     * @param string|null $id Streak id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->adminOnly();
        $streak = $this->Streaks->get($id, [
            'contain' => ['DbUsers', 'Tasks']
        ]);
        $this->set('streak', $streak);
        $this->set('_serialize', ['streak']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->adminOnly();
        $streak = $this->Streaks->newEntity();
        if ($this->request->is('post')) {
            $streak = $this->Streaks->patchEntity($streak, $this->request->data);
            if ($this->Streaks->save($streak)) {
                $this->Flash->success(__('The streak has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The streak could not be saved. Please, try again.'));
            }
        }
        $dbUsers = $this->Streaks->DbUsers->find('list', ['limit' => 200]);
        $tasks = $this->Streaks->Tasks->find('list', ['limit' => 200]);
        $this->set(compact('streak', 'dbUsers', 'tasks'));
        $this->set('_serialize', ['streak']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Streak id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->adminOnly();
        $streak = $this->Streaks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $streak = $this->Streaks->patchEntity($streak, $this->request->data);
            if ($this->Streaks->save($streak)) {
                $this->Flash->success(__('The streak has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The streak could not be saved. Please, try again.'));
            }
        }
        $dbUsers = $this->Streaks->DbUsers->find('list', ['limit' => 200]);
        $tasks = $this->Streaks->Tasks->find('list', ['limit' => 200]);
        $this->set(compact('streak', 'dbUsers', 'tasks'));
        $this->set('_serialize', ['streak']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Streak id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->adminOnly();
        $this->request->allowMethod(['post', 'delete']);
        $streak = $this->Streaks->get($id);
        if ($this->Streaks->delete($streak)) {
            $this->Flash->success(__('The streak has been deleted.'));
        } else {
            $this->Flash->error(__('The streak could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
