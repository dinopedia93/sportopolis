<?php
class UsersHasImage extends AppModel {
	
	public $name = 'UserHasImage';
	public $displayField = 'name';
	public $belongsTo = array(
				'User', 'Image'
			);
	 
	public $validate = array (
	'data[UserHasImage][user_id]' => array(
		'Please select your country. ' => array(
			'rule' => 'notEmpty',
			'message' => 'Please select your country.'
		)
	),'data[UserHasImage][image_id]' => array(
		'Please select your city. ' => array(
			'rule' => 'notEmpty',
			'message' => 'Please select your city.'
		)
	));
}
