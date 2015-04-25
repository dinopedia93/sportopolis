<?php
App::uses('AuthComponent', 'Controller/Component');

class Trainer extends AppModel {
	 public $name = 'Trainer';
	 public $displayField = 'name';
	 
	public $validate = array (
	'data[Trainer][country]' => array(
		'Please select your country. ' => array(
			'rule' => 'notEmpty',
			'message' => 'Please select your country.'
		)
	),'data[Trainer][city]' => array(
		'Please select your city. ' => array(
			'rule' => 'notEmpty',
			'message' => 'Please select your city.'
		)
	),'working_area' => array(
		'Please select your location. ' => array(
			'rule' => 'notEmpty',
			'message' => 'Please select your location.'
		)
	),'mobile' => array(
		'Please enter your mobile number. ' => array(
			'rule' => 'isUnique',
			'message' => 'Please enter your mobile number.'
		)
	),'sports_id' => array(
			'Please select your sport. ' => array(
				'rule' => 'notEmpty',
				'message' => 'Please select your sport.'
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
