<?php
class LocationsHasViews extends AppModel {
	public $belongsTo = array(
				'Location', 'View'
			);
}
