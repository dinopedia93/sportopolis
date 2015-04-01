<?php
class Trainer extends AppModel {
	public $hasMany = array(
				'TrainersHasReviews','TrainersHasPhotos'
			);

	public function IncrementViews($id)
	{
		$this->query("UPDATE `trainers` SET `views` = `views` + 1  WHERE `id` = $id");
	}

	public function GetTrainerData($id)
	{
		return $this->query("SELECT * FROM trainers INNER JOIN users ON trainers.user_id = users.id WHERE trainers.id = $id");
	}
}
