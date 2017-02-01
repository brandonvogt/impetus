<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * DbUsers Controller
 *
 * @property \App\Model\Table\DbUsersTable $DbUsers
 */
class DbUsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('add', 'edit', 'index');
    }
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->adminOnly();
        $this->set('dbUsers', $this->paginate($this->DbUsers));
        $this->set('_serialize', ['dbUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Db User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->adminOnly();
        $dbUser = $this->DbUsers->get($id, [
            'contain' => ['Completions', 'Rewards', 'Streaks', 'Tasks']
        ]);
        $this->set('dbUser', $dbUser);
        $this->set('_serialize', ['dbUser']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->adminOnly();
        $dbUser = $this->DbUsers->newEntity();
        if ($this->request->is('post')) {
            $dbUser = $this->DbUsers->patchEntity($dbUser, $this->request->data);
            if ($this->DbUsers->save($dbUser)) {
                $this->Flash->success(__('The db user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The db user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('dbUser'));
        $this->set('_serialize', ['dbUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Db User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->adminOnly();
        $dbUser = $this->DbUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dbUser = $this->DbUsers->patchEntity($dbUser, $this->request->data);
            if ($this->DbUsers->save($dbUser)) {
                $this->Flash->success(__('The db user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The db user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('dbUser'));
        $this->set('_serialize', ['dbUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Db User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->adminOnly();
        $this->request->allowMethod(['post', 'delete']);
        $dbUser = $this->DbUsers->get($id);
        if ($this->DbUsers->delete($dbUser)) {
            $this->Flash->success(__('The db user has been deleted.'));
        } else {
            $this->Flash->error(__('The db user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    public function login() {

        if ($this->request->is('post')) {

            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->Flash->success('Logged In!');
                return $this->redirect(['controller' => 'Pages', 'action' => 'portal']);
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }
    
    public function logout() {
        $this->Auth->logout();
        return $this->redirect('/');
    }
    
    public function updateGold() {
        $this->viewBuilder()->layout('ajax');
        $user = $this->DbUsers->get($this->user_id);
        $this->set('gold', $user->gold);
    }
}