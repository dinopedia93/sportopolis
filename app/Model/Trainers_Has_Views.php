<?php
class TrainersHasViews extends AppModel {
	public $belongsTo = array(
				'Trainer', 'View'
			);
}
