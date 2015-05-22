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
App::uses('ImagesController', 'Controller');
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
class UsershasimagesController extends SportopolisController {
 
	public $uses = array('UsersHasImage','Image');

	public function add($id,$trainerid) {

		$imagedata = $this->data;
		$this->layout = 'sportopolis';
	    if ($this->request->is('post')) {
			
			$this->Image->create();
			if ($this->Image->save($imagedata)){
				$this->UsersHasImage->create();
				$this->request->data['UsersHasImage']['image_id'] = $this->Image->id;
				$this->request->data['UsersHasImage']['user_id'] = $id;
				$this->request->data['UsersHasImage']['set_date_time'] = date('Y-m-d H:i:s');
				debug($this->request->data);
				// hash the password coming in from the form using Authcomponent::password       
				if ($this->UsersHasImage->save($this->request->data)) {
					$this->Session->setFlash(__('Your profile picture is successfully updated'));
					return $this->redirect("http://localhost/sportopolis/sportopolis/trainerprofile/".$trainerid);
				} else {
					$this->Session->setFlash(__('The trainer could not be saved. Please, try again.'));
				}
			}
		}
	}
	
}

?>