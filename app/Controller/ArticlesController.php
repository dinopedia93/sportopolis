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
class ArticlesController extends SportopolisController {
 
	public $name = 'articles';
	var $uses = array('Article');
	
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('action' , 'add');
	}
	
	
	public function view($id = null)
	{
		$this->Article->id = $id;
		if(!$this->Article->exists()){
			throw new NotFoundException('Invalid Article');
		}
		
		if(!$id){
			$this->Session->setFlash('Invalid Article');
			$this->redirect(array('action' => 'index'));
		}
		$this->set('article' , $this->Article->read());
		
	}
	
	
	public function add($id) 
	{
		$this->layout = 'sportopolis';
	    if ($this->request->is('post')) {
				$this->Article->create();
				$this->Article->saveField('article_date_time', date("Y-m-d H:i:s"));
				$this->request->data['Article']['user_id'] = $id;
				if ($this->Article->save($this->request->data)) {
					$this->Session->setFlash(__('The Article has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
	            $this->Session->setFlash(__('The article could not be saved. Please, try again.'));
				}
	        // hash the password coming in from the form using Authcomponent::password       
	        
	    }


	}
	
}

?>