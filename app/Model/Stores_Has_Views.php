<?php
class StoresHasViews extends AppModel {
	public $belongsTo = array(
				'Store', 'View'
			);
}
