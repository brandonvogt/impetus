<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Rewards Controller
 *
 * @property \App\Model\Table\RewardsTable $Rewards
 */
class RewardsController extends AppController
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
            'contain' => ['DbUsers']
        ];
        $this->set('rewards', $this->paginate($this->Rewards));
        $this->set('_serialize', ['rewards']);
    }

    /**
     * View method
     *
     * @param string|null $id Reward id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->adminOnly();
        $reward = $this->Rewards->get($id, [
            'contain' => ['DbUsers']
        ]);
        $this->set('reward', $reward);
        $this->set('_serialize', ['reward']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->adminOnly();
        $reward = $this->Rewards->newEntity();
        if ($this->request->is('post')) {
            $reward = $this->Rewards->patchEntity($reward, $this->request->data);
            if ($this->Rewards->save($reward)) {
                $this->Flash->success(__('The reward has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The reward could not be saved. Please, try again.'));
            }
        }
        $dbUsers = $this->Rewards->DbUsers->find('list', ['limit' => 200]);
        $this->set(compact('reward', 'dbUsers'));
        $this->set('_serialize', ['reward']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Reward id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->adminOnly();
        $reward = $this->Rewards->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reward = $this->Rewards->patchEntity($reward, $this->request->data);
            if ($this->Rewards->save($reward)) {
                $this->Flash->success(__('The reward has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The reward could not be saved. Please, try again.'));
            }
        }
        $dbUsers = $this->Rewards->DbUsers->find('list', ['limit' => 200]);
        $this->set(compact('reward', 'dbUsers'));
        $this->set('_serialize', ['reward']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Reward id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->adminOnly();
        $this->request->allowMethod(['post', 'delete']);
        $reward = $this->Rewards->get($id);
        if ($this->Rewards->delete($reward)) {
            $this->Flash->success(__('The reward has been deleted.'));
        } else {
            $this->Flash->error(__('The reward could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    public function del($id = null)
    {
        $reward = $this->Rewards->get($id);
        if ($this->Rewards->delete($reward)) {
            
            return $this->redirect(['controller' => 'Rewards', 'action' => 'rewardView']);
        } else {
            $this->Flash->error(__('The reward could not be deleted. Please, try again.'));
            return $this->redirect(['controller' => 'pages', 'action' => 'portal']);
        }

    }
    
    public function newReward() {
        $reward = $this->Rewards->newEntity();
        if ($this->request->is('post')) {
            $reward = $this->Rewards->patchEntity($reward, $this->request->data);
            if ($this->Rewards->save($reward)) {
                return $this->redirect(['controller' => 'Rewards', 'action' => 'reward_view']);
            } else {
                $this->Flash->error(__('The reward could not be saved. Please, try again.'));
            }
        }
        
        $dbUsers = $this->Rewards->DbUsers->find('list', ['limit' => 200]);
        $this->set(compact('reward', 'dbUsers'));
        $this->set('_serialize', ['reward']);
    }
    
    public function redeem($tid) {
        
        $reward = $this->Rewards->get($tid, ['contain' => 'DbUsers']);
        if ($reward->db_user->id == $this->user_id) {
            if ($reward->consumable == false) {$reward->completed = 1;}
            if ($reward->worth > $reward->db_user->gold) {
                $this->Flash->error(__('Not enough gold. CONSTRUCT ADDITIONAL PYLONS'));
                return $this->redirect(['controller' => 'Rewards', 'action' => 'rewardView']);
            }
            if ($this->Rewards->save($reward)) {
                $gold = $this->Rewards->DbUsers->RemGold($this->user_id, $reward->worth);
                $this->redirect(['controller' => 'Rewards', 'action' => 'rewardView']);
            } else {
                $this->Flash->error(__('The transaction could not be saved. Please, try again.'));
                return $this->redirect(['controller' => 'Pages', 'action' => 'portal']);
            }
        }
        else {$this->Flash->error(__('The task doesn\'t match the user. Weird.'));
        return $this->redirect(['controller' => 'Pages', 'action' => 'portal']);
        }
    }
    public function rewardView() {
        $this->viewBuilder()->layout('ajax');
        $this->set('rewards', $this->Rewards->findRewardsByUser($this->user_id)->toArray());
    }
}