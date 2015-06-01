<?php
class ArticlesHasImage extends AppModel {
	
	public $name = 'ArticleHasImage';
	public $displayField = 'name';
	public $belongsTo = array(
				'Article', 'Image'
			);
	 
	public $validate = array (
	'data[ArticleHasImage][article_id]' => array(
		'Please select your country. ' => array(
			'rule' => 'notEmpty',
			'message' => 'Please select your country.'
		)
	),'data[ArticleHasImage][image_id]' => array(
		'Please select your city. ' => array(
			'rule' => 'notEmpty',
			'message' => 'Please select your city.'
		)
	));
}
