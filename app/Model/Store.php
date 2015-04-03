<?php
class Store extends AppModel {
	public $hasMany = array(
				'StoresHasReviews','StoresHasPhotos'
			);

	public function IncrementViews($id)
	{
		$this->query("UPDATE `stores` SET `views` = `views` + 1  WHERE `id` = $id");
	}
}