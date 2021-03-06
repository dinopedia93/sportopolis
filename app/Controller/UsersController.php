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
App::uses('UsershasimagesController', 'Controller');
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
class UsersController extends SportopolisController {
 
	public $name = 'users';
	var $uses = array('User','UsersHasImage');
	
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
				$this->redirect('http://localhost/sportopolis/sportopolis/index');
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
	
	public function index()
	{
		$this->User->recursive = 0;
		$this->set('users' , $this->User->find('all'));
	}
	
	public function view($id = null)
	{
		$this->User->id = $id;
		if(!$this->User->exists()){
			throw new NotFoundException('Invalid User');
		}
		
		if(!$id){
			$this->Session->setFlash('Invalid User');
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user' , $this->User->read());
		
	}
	
	
	public function add($id) 
	{
		$this->layout = 'sportopolis';
	    if ($this->request->is('post')) {
			if($id == 3)
			{
				$this->User->create();
				$this->request->data['User']['user_type'] = $id;
				if ($this->User->save($this->request->data)) {
					$this->UsersHasImage->create();
					$this->request->data['UsersHasImage']['user_id'] = $this->User->id;
					$this->request->data['UsersHasImage']['image_id'] = 100;
					$this->request->data['UsersHasImage']['set_date_time'] = date('Y-m-d H:i:s');
					if($this->UsersHasImage->save($this->request->data)){
						$this->Session->setFlash(__('The user has been saved.'));
						return $this->redirect(array('action' => 'index'));
					}
				} else {
	            $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				}
			}
			else if($id == 1)
			{
				$this->request->data['User']['user_type'] = $id;
				$this->Session->write('theuserdata', $this->request->data);
				return $this->redirect(array('controller' => 'trainers' , 'action' => 'add'));
			}
	        // hash the password coming in from the form using Authcomponent::password       
	        
	    }


	}
	
	
	public function edit($id = null) {
		
		$this->layout = 'sportopolis';
		if (!$id) {
			throw new NotFoundException(__('Invalid User'));
		}

		$user = $this->User->findById($id);
		if (!$user) {
			throw new NotFoundException(__('Invalid User'));
		}

		if ($this->request->is(array('user', 'put'))) {
			$this->User->id = $id;
			if ($this->User->save($this->request->data)) {
				if($user['User']['user_type'] == 3){
					$this->Session->setFlash(__('User data has been updated.'));
					return $this->redirect(array('controller' => 'sportopolis' , 'action' => 'index'));
				}
				else if($user['User']['user_type'] == 1){
					$this->Session->write('theuserid', $user['User']['id']);
					return $this->redirect(array('controller' => 'trainers' , 'action' => 'edit'));
				}
			}
			$this->Session->setFlash(__('Unable to update your data.'));
		}

		if (!$this->request->data) {
			$this->request->data = $user;
		}
	}
	
	
	
}

?>