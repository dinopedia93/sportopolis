<?php
class Trainer extends AppModel {
	public $hasMany = array(
				'TrainersHasReviews','TrainersHasPhotos','TrainersHasViews'
			);
	public $hasOne = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'id'
        )
    );
}
