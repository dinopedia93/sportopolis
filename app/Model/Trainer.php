<?php
class Trainer extends AppModel {
	public $hasMany = array(
				'TrainersHasReviews','TrainersHasPhotos','TrainersHasViews'
			);
	public $validate = array(
			'email' => array('rule' => array('email') ,'allowEmpty' => false , 'message' => 'please enter a valid email format'),
			'password' => array('rule' => array('alphaNumeric') , 'allowEmpty' => false)
		);
	public function beforeSave($options = array())
	{
		App::uses('Security', 'Utility'); 

		$this->data['Trainer']['password'] = Security::hash($this->data['Trainer']['password']);
	}
}
