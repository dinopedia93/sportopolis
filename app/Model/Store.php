<?php
class Store extends AppModel {
	public $hasMany = array(
				'StoresHasReviews','StoresHasPhotos'
			);
}