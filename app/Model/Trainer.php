<?php
class Trainer extends AppModel {
	public $hasMany = array(
				'TrainersHasReviews','TrainersHasPhotos','TrainersHasViews'
			);
	public $validate = array(
			'email' => array('rule' => array('email') ,'allowEmpty' => false , 'message' => 'please enter a valid email format'),
			'password' => array('rule' => array('alphaNumeric') , 'allowEmpty' => false)
		);
}
