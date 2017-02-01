<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public $user_id;
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'userModel' => 'DbUsers',
                    'fields' => ['username' => 'username', 'password' => 'password']
                ]
            ],
            'loginAction' => [
                'controller' => 'DbUsers',
                'action' => 'login'
            ]
        ]);
    }
    

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
    
    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        
        $userdata = $this->Auth->user();
        $this->user_id = $userdata['id'];
        // Temporary way to break data away from auth cache and update. Running every page = bad, though....
        $this->loadModel('DbUsers');
        if (!empty($userdata)) {
            $user = $this->DbUsers->get($userdata['id']);
            $this->set('loggedin', true);
            $this->set('user_id', $user->id);
            $this->set('username', $user->username);
            $this->set('timezone', $user->timezone);
        } else {
            $this->set('loggedin', false);
        }
    }
    
    public function adminOnly(array $redirect = null) {

        if (!isset($redirect)) {
            $redirect = $this->referer();
        }

        if ($this->Auth->user('role') !== "admin") {
            $this->Flash->error('Denied.');
            return $this->redirect($redirect);
        }
    }
}