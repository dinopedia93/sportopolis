<?php
class UsersHasImage extends AppModel {
	public $belongsTo = array(
				'User', 'Image'
			);
}
