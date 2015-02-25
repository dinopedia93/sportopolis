<?php
class Photo extends AppModel {
	public $hasMany = array(
				'TrainersHasPhotos'
			);
}
