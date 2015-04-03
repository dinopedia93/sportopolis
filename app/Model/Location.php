<?php
class Location extends AppModel {
	public $hasMany = array(
				'LocationsHasReviews','LocationsHasPhotos','LocationsHasSports'
			);

	public function IncrementViews($id)
	{
		$this->query("UPDATE `locations` SET `views` = `views` + 1  WHERE `id` = $id");
	}
}