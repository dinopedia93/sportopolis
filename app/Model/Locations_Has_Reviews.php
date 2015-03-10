<?php
class LocationsHasReviews extends AppModel {
	public $belongsTo = array(
				'Location', 'Review'
			);
}
