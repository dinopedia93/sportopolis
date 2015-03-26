<?php
class ArticlesHasReviews extends AppModel {
	public $belongsTo = array(
				'Article', 'Review'
			);
}
