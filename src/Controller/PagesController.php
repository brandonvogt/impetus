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

use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\I18n\Time;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    
    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);

        $this->Auth->allow(['index']);
    }
    
    public function index() {
        if ($this->Auth->user('id')) {
            $this->redirect(['action' => 'portal']);
        }
        else {
            $this->redirect(['controller' => 'DbUsers', 'action' => 'login']);
        };
        
    }
    
    public function portal() {
        $this->loadModel('Tasks');
        $this->loadModel('Rewards');
        $recurred = $this->Tasks->checkRecurring($this->user_id);
        if ($recurred > 1) {$this->Flash->success(__($recurred . ' tasks are back from the dead.'));}
        elseif ($recurred == 1) {$this->Flash->success(__($recurred . ' task is back from the dead.'));}
        $this->set('task', $this->Tasks->newEntity());
    }
    
    public function test() {
        
    }
}
