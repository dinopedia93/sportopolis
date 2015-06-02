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
App::uses('ArticleshasimagesController', 'Controller');
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
class ImagesController extends SportopolisController {
 
	public $name = 'images';
	var $uses = array('Image','UsersHasImage','ArticlesHasImage');
	/**
	 * Main index action
	*/
	public function add($purposeid,$userid,$trainerid = null) {
		// form posted
		Configure::write('userid', $userid);
		Configure::write('purposeid', $purposeid);
		$this->layout = 'sportopolis';
		if (isset($this->request->data['btn1'])) {
			if($purposeid == 1)
			{
				if ($this->request->is('post')) {
					// create
					$this->Image->create();

					// attempt to save
					if ($this->Image->save($this->request->data)) {
						$this->UsersHasImage->create();
						$this->request->data['UsersHasImage']['user_id'] = $userid;
						$this->request->data['UsersHasImage']['image_id'] = $this->Image->id;
						$this->request->data['UsersHasImage']['set_date_time'] = date('Y-m-d H:i:s');
						if($this->UsersHasImage->save($this->request->data)){
							return $this->redirect('http://localhost/sportopolis/sportopolis/trainerprofile/'. $trainerid);
						}
					}
				}
			} else if ($purposeid == 2)
			{
				if ($this->request->is('post')) {
					// create
					$this->Image->create();

					// attempt to save
					if ($this->Image->save($this->request->data)) {
						$this->ArticlesHasImage->create();
						$this->request->data['ArticlesHasImage']['article_id'] = $userid;
						$this->request->data['ArticlesHasImage']['image_id'] = $this->Image->id;
						$this->request->data['ArticlesHasImage']['set_date_time'] = date('Y-m-d H:i:s');
						if($this->ArticlesHasImage->save($this->request->data)){
							return $this->redirect('http://localhost/sportopolis/sportopolis/index');
						}
					}
				}
			}
		} else if (isset($this->request->data['btn2']) && $purposeid == 1) {
			return $this->redirect('http://localhost/sportopolis/sportopolis/trainerprofile/'. $trainerid);
		} else if (isset($this->request->data['btn2']) && $purposeid == 2) {
			return $this->redirect('http://localhost/sportopolis/sportopolis/index');
		}
	}
	
}

?>