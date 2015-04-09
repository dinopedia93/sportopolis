<?php
App::uses('AuthComponent', 'Controller/Component');

class Trainer extends AppModel {
	 public $name = 'Trainer';
	 public $displayField = 'name';
	 
	public $validate = array (
	'country' => array(
		'Please select your country. ' => array(
			'rule' => 'notEmpty',
			'on' => 'create',
			'message' => 'Please select your country.'
		)
	),'city' => array(
		'Please select your city. ' => array(
			'rule' => 'notEmpty',
			'on' => 'create',
			'message' => 'Please select your city.'
		)
	),'district' => array(
		'Please select your district. ' => array(
			'rule' => 'notEmpty',
			'on' => 'create',
			'message' => 'Please select your district.'
		)
	),'location' => array(
		'Please select your location. ' => array(
			'rule' => 'notEmpty',
			'on' => 'create',
			'message' => 'Please select your location.'
		)
	),'mobile' => array(
		'Please enter your mobile number. ' => array(
			'rule' => 'isUnique',
			'on' => 'create',
			'message' => 'Please enter your mobile number.'
		)
	));
	
	public $hasMany = array(
				'TrainersHasReviews','TrainersHasPhotos'
			);

	public function IncrementViews($id)
	{
		$this->query("UPDATE `trainers` SET `views` = `views` + 1  WHERE `id` = $id");
	}

	public function GetTrainerData($id)
	{
		return $this->query("SELECT * FROM trainers INNER JOIN users ON trainers.user_id = users.id WHERE trainers.id = $id");
	}

	public function SetRate($id,$rating)
	{
		$this->set(array(
		    'rank' => $rating
		));
		$this->id = $id;
		$this->save();
	}
}
