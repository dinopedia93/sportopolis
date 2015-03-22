<?php
class Trainer extends AppModel {
	public $hasMany = array(
				'TrainersHasReviews','TrainersHasPhotos'
			);

	public function IncrementViews($id)
	{
		$this->query("UPDATE `trainers` SET `views` = `views` + 1  WHERE `id` = $id");
	}

}
