<?php
class TrainersHasReviews extends AppModel {
	public $belongsTo = array(
				'Trainer', 'Review'
			);
}
