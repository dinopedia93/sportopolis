<?php
class Article extends AppModel {
	public $hasMany = array(
				'ArticlesHasReviews','ArticlesHasPhotos'
			);
}