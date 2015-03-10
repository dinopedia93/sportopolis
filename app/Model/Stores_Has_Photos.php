<?php
class StoresHasPhotos extends AppModel {
	public $belongsTo = array(
				'Store', 'Photo'
			);
}
