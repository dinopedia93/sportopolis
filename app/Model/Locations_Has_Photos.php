<?php
class LocationsHasPhotos extends AppModel {
	public $belongsTo = array(
				'Location', 'Photo'
			);
}
