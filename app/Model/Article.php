<?php
class Article extends AppModel {
	
    public $name = 'Article';
	public $displayField = 'name';
	
	public $hasMany = array(
				'ArticlesHasReviews','ArticlesHasPhotos'
			);
			
			
	public $validate = array (
		'title' => array(
			'Please enter the article title. ' => array(
				'rule' => array('between' , 2 , 45),
				'message' => 'Title must be between 2 to 45 characters.'
			)
		),'article_content' => array(
			'Please enter the article content. ' => array(
				'rule' => 'notEmpty',
				'message' => 'Please enter the article content.'
			)
		),'sport_id' => array(
			'Please select the sport. ' => array(
				'rule' => 'notEmpty',
				'on' => 'create',
				'message' => 'Please select the sport of the article.'
			)
		));
}