<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('SportopolisController', 'Controller');
App::uses('UsersController', 'Controller');
App::uses('Model','Model');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class TrainersController extends SportopolisController {
 
	public $name = 'trainers';
	var $uses = array('Trainer','User');
	
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('action' , 'add');
	}
	
	public function login()
	{
		
		$this->layout = 'sportopolis';
		if($this->request->is('post')){
			if($this->Auth->login()){
				CakeSession::write('signed_in', True);
				$this->redirect($this->Auth->redirect());
			} else {
				$incorrect = "The username or password are incorrect. Please try again.";
				echo "<script type='text/javascript'>alert('$incorrect');</script>";
			}
		}
	}
	
	public function logout()
	{
		$this->redirect($this->Auth->logout());
	}
	
	
	public function add() 
	{
		$userdata = $this->Session->read('theuserdata');
		$this->layout = 'sportopolis';
	    if ($this->request->is('post')) {
			
			$this->User->create();
			if ($this->User->save($userdata)){
				$this->Trainer->create();
				$this->request->data['Trainer']['user_id'] = $this->User->id;
				$this->request->data['Trainer']['likes_count'] = 0;
				$this->request->data['Trainer']['rank'] = 0;
				$this->request->data['Trainer']['district'] = " ";
				$this->request->data['Trainer']['views'] = 0;
				debug($this->request->data);
				// hash the password coming in from the form using Authcomponent::password       
				if ($this->Trainer->save($this->request->data)) {
					$this->Session->setFlash(__('The trainer has been saved.'));
					return $this->redirect(array('controller' => 'sportopolis' , 'action' => 'index'));
				} else {
					$this->Session->setFlash(__('The trainer could not be saved. Please, try again.'));
				}
			}
		}


	}
	
}

?>