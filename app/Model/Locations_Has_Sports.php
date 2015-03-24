<?php
class LocationsHasSports extends AppModel {
	public $belongsTo = array(
				'Location', 'Sport'
			);
}
