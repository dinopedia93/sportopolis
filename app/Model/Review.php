<?php
class Review extends AppModel {
	public $hasMany = array(
				'TrainersHasReviews'
			);
}
