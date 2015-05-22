<?php
class Location extends AppModel {
	public $hasMany = array(
				'LocationsHasReviews','LocationsHasSports'
			);

	public function IncrementViews($id)
	{
		$this->query("UPDATE `locations` SET `views` = `views` + 1  WHERE `id` = $id");
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