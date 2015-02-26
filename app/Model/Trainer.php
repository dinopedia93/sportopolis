<?php
class Trainer extends AppModel {
	public $hasMany = array(
				'TrainersHasReviews','TrainersHasPhotos'
			);
}
