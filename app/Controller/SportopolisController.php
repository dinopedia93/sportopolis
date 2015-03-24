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

	public $helpers = array('GoogleMap'); 
	

	public $components = array(
		'Session',
		'Auth' => array(
			'authenticate' => array(
				'Form' => array(
					'fields' => array(
						'username' => 'email',
						'password' => 'password'))),
			'loginRedirect' => array('controller' => 'sportopolis' , 'action' => 'index'),
			'logoutRedirect' => array('controller' => 'sportopolis' , 'action' => 'index'),
			'authError' => "You can't access that page",
			'authorize' => array('Controller')
		)
	);
	
	public function isAuthorized($user){
		return true;
	}
	
	public function beforeFilter(){
		$this->Auth->allow('menu' , 'view');
		//$this->Auth->allow('index' , 'view');
		$this->Auth->allow('signuptrainer' , 'view');
		$this->Auth->allow('trainerprofile' , 'view');
		$this->Auth->allow('profilelocation' , 'view');
		$this->Auth->allow('profilestore' , 'view');
		$this->Auth->allow('profilearticle' , 'view');
	}

	public function index() 
	{
		$this->layout = 'index';
		$this->set('title_for_layout', 'SPORTOYA');
	}

	public function signin() 
	{
		$this->layout = 'sportopolis';
		$this->set('title_for_layout', 'SPORTOYA');
	}
	
	/*function getGeoData()
    {
        $address = $this->data["ModelName"]["address"];
        $coords = NULL;
        if($address)
        {
			$coords = $this->Googlegeocode->getCoords($address);
        }
        $this->set("coords", $coords);
    }*/

	public function menu($id) 
	{
		
		$this->loadModel('Trainer');
		$this->loadModel('Location');
		$this->loadModel('Article');
		$this->loadModel('Event');
		$this->loadModel('Store');
		$this->loadModel('User');

		$trainers = $this->Trainer->query("SELECT * FROM trainers INNER JOIN users ON trainers.user_id = users.id WHERE sports_id = ".$id);
		$locations = $this->Location->find('all' , array('conditions' => array('Location.sports_id' => $id)));
		$articles = $this->Article->find('all' /*, array('conditions' => array('Article.sport_id' => $id))*/);
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

	public function trainerprofile($id) 
	{
		
		$this->loadModel('Trainer');	
		$this->loadModel('User');	
		$this->loadModel('Sport');
		$this->loadModel('Review');
		$this->loadModel('TrainersHasReviews');
		$this->loadModel('TrainersHasPhotos');

		$trainers = $this->Trainer->query("SELECT * FROM trainers INNER JOIN users ON trainers.user_id = users.id WHERE trainers.id = $id");
		// little trick because the result is returned in 3D array
		$trainer = $trainers[0];
		$this->set('trainer', $trainer);
		$this->set('title_for_layout', $trainer['users']['first_name']." ".$trainer['users']['last_name']."'s Profile");
		$sport = $this->Sport->findById($trainer['trainers']['sports_id']);
		$this->set('sport', $sport);
		$reviewscount = $this->TrainersHasReviews->find('count',array('conditions' => array('TrainersHasReviews.trainer_id' => $id)));
		$this->set('reviewscount', $reviewscount);
		
		
		$allreviews = $this->Review->query("SELECT * FROM reviews AS Review WHERE id IN (SELECT review_id FROM trainers_has_reviews WHERE trainer_id = " .$id.")");
		$allreviewwriters = $this->User->query("SELECT * FROM users AS User WHERE id IN (SELECT member_id FROM reviews AS Review WHERE id IN (SELECT review_id FROM trainers_has_reviews WHERE trainer_id = " .$id."))");
		
		$this->set('allreviewwriters', $allreviewwriters);
		
		$this->set('allreviews', $allreviews);
		
		// Loading Rating
		if($this->Session->read('Auth.User') != null)
		{
			$this->loadModel('UsersRatingTrainer');

			$rating = $this->UsersRatingTrainer->find('first', array('fields' => array('UsersRatingTrainer.rating'),'conditions' => array('UsersRatingTrainer.trainer_id' => $id, 'UsersRatingTrainer.user_id' => $this->Session->read('Auth.User.id'))));
			$this->set('rating', $rating);
		}
		
		$trainershasphotos = $this->TrainersHasPhotos->find('count',array('conditions' => array('TrainersHasPhotos.trainer_id' => $id)));
		$this->set('trainershasphotos', $trainershasphotos);

		$this->layout = 'sportopolis';	
	}

	public function locationprofile($id) 
	{
		
		$this->loadModel('Location');	
		$this->loadModel('User');	
		$this->loadModel('Sport');
		$this->loadModel('Review');
		$this->loadModel('LocationsHasReviews');
		$this->loadModel('LocationsHasPhotos');

		$location = $this->Location->findById($id);
		$this->set('location', $location);
		$this->set('title_for_layout', $location['Location']['name']."'s Profile");
		$reviewscount = $this->LocationsHasReviews->find('count',array('conditions' => array('LocationsHasReviews.location_id' => $id)));
		$this->set('reviewscount', $reviewscount);
		
		
		$allreviews = $this->Review->query("SELECT * FROM reviews AS Review WHERE id IN (SELECT review_id FROM locations_has_reviews WHERE location_id = " .$id.")");
		$allreviewwriters = $this->User->query("SELECT * FROM users AS User WHERE id IN (SELECT member_id FROM reviews AS Review WHERE id IN (SELECT review_id FROM locations_has_reviews WHERE location_id = " .$id."))");
		
		$this->set('allreviewwriters', $allreviewwriters);
		
		$this->set('allreviews', $allreviews);
		
		
		$locationshasphotos = $this->LocationsHasPhotos->find('count',array('conditions' => array('LocationsHasPhotos.location_id' => $id)));
		$this->set('locationshasphotos', $locationshasphotos);
	

		$this->layout = 'sportopolis';	
	}
	
	
	
	public function storeprofile($id) 
	{
		
		$this->loadModel('Store');	
		$this->loadModel('User');	
		$this->loadModel('Sport');
		$this->loadModel('Review');
		$this->loadModel('StoresHasReviews');
		$this->loadModel('StoresHasViews');
		$this->loadModel('StoresHasPhotos');

		$store = $this->Store->findById($id);
		$this->set('store', $store);
		$this->set('title_for_layout', $store['Store']['name']."'s Profile");
		$reviewscount = $this->StoresHasReviews->find('count',array('conditions' => array('StoresHasReviews.store_id' => $id)));
		$this->set('reviewscount', $reviewscount);
		
		
		$allreviews = $this->Review->query("SELECT * FROM reviews AS Review WHERE id IN (SELECT review_id FROM stores_has_reviews WHERE store_id = " .$id.")");
		$allreviewwriters = $this->User->query("SELECT * FROM users AS User WHERE id IN (SELECT member_id FROM reviews AS Review WHERE id IN (SELECT review_id FROM stores_has_reviews WHERE store_id = " .$id."))");
		
		$this->set('allreviewwriters', $allreviewwriters);
		
		$this->set('allreviews', $allreviews);
		
		
		$storeshasphotos = $this->StoresHasPhotos->find('count',array('conditions' => array('StoresHasPhotos.store_id' => $id)));
		$this->set('storeshasphotos', $storeshasphotos);
		$storeshasviews = $this->StoresHasViews->find('count',array('conditions' => array('StoresHasViews.store_id' => $id)));
		$this->set('storeshasviews', $storeshasviews);

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
		$this->loadModel('User');

		$sports = $this->Sport->find('all');		
		$user_primary_data = $this->User->findById($id);
		$trainer = $this->Trainer->find( 'first' , array('conditions' => array('Trainer.user_id' => $id)) );

		$this->set('sports',$sports);
		$this->set('trainer',$trainer);
		$this->set('user_primary_data',$user_primary_data);

		$this->layout = 'sportopolis';
	}

	public function createarticle()
	{
		$this->layout = 'sportopolis';
	}

	public function viewarticle($id)
	{
		$this->layout = 'sportopolis';
	}

	public function RegisterTrainer()
	{
		$this->loadModel('User');
		$this->loadModel('Trainer');

		$this->User->set($this->request->data);	
		if ($this->User->validates()) 
		{
            $this->User->create();
            if ($this->User->save($this->request->data)) 
            {
            	$data['Trainer']['user_id'] = $this->User->id;
            	$this->Trainer->create();
            	$this->Trainer->save($data);
            	$link = 'index';            	
                return $this->redirect(array('action' => $link));
            }
        }
        else
        {
        	return $this->redirect(array('action' => 'signuptrainer/'.json_encode($this->User->validationErrors)));
        }
	}

	public function UpdateTrainerProfile($id = 0)
	{
		
		$this->loadModel('Trainer');
		$this->loadModel('User');



		$this->Trainer->set($this->request->data);
		$temp = $this->request->data;
		if ($this->Trainer->validates()) 
		{
            $this->Trainer->id = $id;
            if ($this->Trainer->save($this->request->data))
            {

            	$trainer = $this->Trainer->findById($id);
            	$this->User->set(array(
				    'first_name' => $this->request->data['first_name'],
				    'last_name' => $this->request->data['last_name'],
				    'gender' => $this->request->data['gender'],
				    'birthdate' => $this->request->data['birthdate']
				));
            	$this->User->id = $this->request->data['user_id'];
            	$this->User->save();
            	
                return $this->redirect(array('action' => 'trainerprofile/'.$id));
            }
			else
			{
				return $this->redirect(array('action' => 'edittrainer/'.$trainer['Trainer']['user_id']));
			}
        }
        else
        {
        	return $this->redirect(array('action' => 'edittrainer/'.$trainer['Trainer']['user_id']));
        }
    }

    public function IncreaseTrainerViews()
    {
    	$this->autoRender = false;
    	$this->loadModel('Trainer');
    	$this->Trainer->IncrementViews($this->request->data['id']);
    	
    	return $this->request->data['id'];
    	
    }

    public function RateTrainer()
    {
    	$this->autoRender = false;
    	$this->loadModel('UsersRatingTrainer');
    	return $this->UsersRatingTrainer->RateTrainer($this->request->data['trainer_id'],$this->request->data['user_id'],$this->request->data['new_rating']);    	    	
    }
	
}

?>