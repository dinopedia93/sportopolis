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

App::uses('Controller', 'Controller');
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
class SportopolisController extends Controller {

	public function index() 
	{
		$this->layout = 'sportopolis';
		$this->set('title_for_layout', 'SPORTOYA');
	}

	public function menu() 
	{
		
		$this->loadModel('Trainer');

		$trainers = $this->Trainer->find('all');

		$this->set('trainers', $trainers);
		$this->set('title_for_layout', 'SPORTOYA');

		$this->layout = 'sportopolis';
	}

	public function profile($id) 
	{
		
		$this->loadModel('Trainer');	
		$this->loadModel('Sport');
		$this->loadModel('TrainersHasReviews');
		$this->loadModel('TrainersHasViews');
		$this->loadModel('TrainersHasPhotos');

		$trainer = $this->Trainer->findById($id);
		$this->set('trainer', $trainer);
		$this->set('title_for_layout', $trainer['Trainer']['name']."'s Profile");
		$sport = $this->Sport->findById($trainer['Trainer']['sports_id']);
		$this->set('sport', $sport);
		$reviewscount = $this->TrainersHasReviews->find('count',array('conditions' => array('TrainersHasReviews.trainer_id' => $id)));
		$this->set('reviewscount', $reviewscount);
		$trainershasphotos = $this->TrainersHasPhotos->find('count',array('conditions' => array('TrainersHasPhotos.trainer_id' => $id)));
		$this->set('trainershasphotos', $trainershasphotos);
		$trainershasviews = $this->TrainersHasViews->find('count',array('conditions' => array('TrainersHasViews.trainer_id' => $id)));
		$this->set('trainershasviews', $trainershasviews);

		$this->layout = 'sportopolis';	
	}

	public function signuptrainer($error)
	{
		$this->layout = 'sportopolis';
		if($error != null)
			$this->set('error', json_decode($error));
	}

	public function edittrainer($id)
	{
		$this->loadModel('Sport');
		$this->loadModel('Trainer');

		$sports = $this->Sport->find('all');
		$trainer = $this->Trainer->findById($id);

		$this->set('sports',$sports);
		$this->set('trainer',$trainer);

		$this->layout = 'sportopolis';
	}

	public function RegisterTrainer()
	{
		$this->loadModel('Trainer');

		$this->Trainer->set($this->request->data);	
		if ($this->Trainer->validates()) 
		{
            $this->Trainer->create();
            if ($this->Trainer->save($this->request->data)) 
            {
            	$link = 'profile/'.$this->Trainer->id;
                return $this->redirect(array('action' => $link));
            }
        }
        else
        {
        	return $this->redirect(array('action' => 'signuptrainer/'.json_encode($this->Trainer->validationErrors)));
        }
	}

	public function UpdateTrainerProfile($id)
	{
		$this->loadModel('Trainer');

		$this->Trainer->set($this->request->data);	
		if ($this->Trainer->validates()) 
		{
            $this->Trainer->id = $id;
            if ($this->Trainer->save($this->request->data)) 
            {
            	$link = 'profile/'.$this->Trainer->id;
                return $this->redirect(array('action' => $link));
            }
        }
        else
        {
        	return $this->redirect(array('action' => 'signuptrainer/'.json_encode($this->Trainer->validationErrors)));
        }
	}
}

?>