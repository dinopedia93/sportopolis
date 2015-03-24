<?php
class Location extends AppModel {
	public $hasMany = array(
				'LocationsHasReviews','LocationsHasPhotos','LocationsHasSports'
			);
}