<?php
class ArticlesHasPhotos extends AppModel {
	public $belongsTo = array(
				'Article', 'Photo'
			);
}
