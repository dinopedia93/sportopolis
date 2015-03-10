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

	public function signin() 
	{
		$this->layout = 'sportopolis';
		$this->set('title_for_layout', 'SPORTOYA');
	}

	public function menu() 
	{
		
		$this->loadModel('Trainer');
		$this->loadModel('Location');
		$this->loadModel('Article');
		$this->loadModel('Event');
		$this->loadModel('Store');

		$trainers = $this->Trainer->find('all');
		$locations = $this->Location->find('all');
		$articles = $this->Article->find('all');
		$events = $this->Event->find('all');
		$stores = $this->Store->find('all');

		$this->set('trainers', $trainers);
		$this->set('locations',$locations);
		$this->set('articles',$articles);
		$this->set('events',$events);
		$this->set('stores',$stores);
		$this->set('title_for_layout', 'SPORTOYA');

		$this->layout = 'sportopolis';
	}

	public function profile($id) 
	{
		
		$this->loadModel('Trainer');	
		$this->loadModel('Member');	
		$this->loadModel('Sport');
		$this->loadModel('Review');
		$this->loadModel('TrainersHasReviews');
		$this->loadModel('TrainersHasViews');
		$this->loadModel('TrainersHasPhotos');

		$trainer = $this->Trainer->findById($id);
		$this->set('trainer', $trainer);
		$this->set('title_for_layout', $trainer['Trainer']['first_name']." ".$trainer['Trainer']['last_name']."'s Profile");
		$sport = $this->Sport->findById($trainer['Trainer']['sports_id']);
		$this->set('sport', $sport);
		$reviewscount = $this->TrainersHasReviews->find('count',array('conditions' => array('TrainersHasReviews.trainer_id' => $id)));
		$this->set('reviewscount', $reviewscount);
		
		
		$allreviews = $this->Review->query("SELECT * FROM reviews AS Review WHERE id IN (SELECT review_id FROM trainers_has_reviews WHERE trainer_id = " .$id.")");
		$allreviewwriters = $this->Member->query("SELECT * FROM members AS Member WHERE id IN (SELECT member_id FROM reviews AS Review WHERE id IN (SELECT review_id FROM trainers_has_reviews WHERE trainer_id = " .$id."))");
		
		$this->set('allreviewwriters', $allreviewwriters);
		
		$this->set('allreviews', $allreviews);
		
		
		$trainershasphotos = $this->TrainersHasPhotos->find('count',array('conditions' => array('TrainersHasPhotos.trainer_id' => $id)));
		$this->set('trainershasphotos', $trainershasphotos);
		$trainershasviews = $this->TrainersHasViews->find('count',array('conditions' => array('TrainersHasViews.trainer_id' => $id)));
		$this->set('trainershasviews', $trainershasviews);

		$this->layout = 'sportopolis';	
	}

	public function profilelocation($id) 
	{
		
		$this->loadModel('Location');	
		$this->loadModel('Member');	
		$this->loadModel('Sport');
		$this->loadModel('Review');
		$this->loadModel('LocationsHasReviews');
		$this->loadModel('LocationsHasViews');
		$this->loadModel('LocationsHasPhotos');

		$location = $this->Location->findById($id);
		$this->set('location', $location);
		$this->set('title_for_layout', $location['Location']['name']."'s Profile");
		$reviewscount = $this->LocationsHasReviews->find('count',array('conditions' => array('LocationsHasReviews.location_id' => $id)));
		$this->set('reviewscount', $reviewscount);
		
		
		$allreviews = $this->Review->query("SELECT * FROM reviews AS Review WHERE id IN (SELECT review_id FROM locations_has_reviews WHERE location_id = " .$id.")");
		$allreviewwriters = $this->Member->query("SELECT * FROM members AS Member WHERE id IN (SELECT member_id FROM reviews AS Review WHERE id IN (SELECT review_id FROM locations_has_reviews WHERE location_id = " .$id."))");
		
		$this->set('allreviewwriters', $allreviewwriters);
		
		$this->set('allreviews', $allreviews);
		
		
		$locationshasphotos = $this->LocationsHasPhotos->find('count',array('conditions' => array('LocationsHasPhotos.location_id' => $id)));
		$this->set('locationshasphotos', $locationshasphotos);
		$locationshasviews = $this->LocationsHasViews->find('count',array('conditions' => array('LocationsHasViews.location_id' => $id)));
		$this->set('locationshasviews', $locationshasviews);

		$this->layout = 'sportopolis';	
	}
	
	
	
	public function signuptrainer($error = null)
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

	public function createarticle($id)
	{
		$this->layout = 'sportopolis';
	}

	public function viewarticle($id)
	{
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