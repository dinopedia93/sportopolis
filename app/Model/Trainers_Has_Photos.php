<?php
class TrainersHasPhotos extends AppModel {
	public $belongsTo = array(
				'Trainer', 'Photo'
			);
}
