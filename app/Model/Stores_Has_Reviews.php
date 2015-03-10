<?php
class StoresHasReviews extends AppModel {
	public $belongsTo = array(
				'Store', 'Review'
			);
}
