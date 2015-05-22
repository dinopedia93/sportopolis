<?php
class UsersHasImages extends AppModel {
	public $belongsTo = array(
				'User', 'Image'
			);
}
