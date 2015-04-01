<?php
class Review extends AppModel {
	public $hasMany = array(
				'TrainersHasReviews'
			);

	public function GetTrainerReviews($id)
	{
		return $this->query("SELECT * FROM reviews AS Review WHERE id IN (SELECT review_id FROM trainers_has_reviews WHERE trainer_id = " .$id.")");
	}

	public function GetLocationReviews($id)
	{
		return $this->query("SELECT * FROM reviews AS Review WHERE id IN (SELECT review_id FROM locations_has_reviews WHERE location_id = " .$id.")");
	}

	public function GetStoreReviews($id)
	{
		return $this->query("SELECT * FROM reviews AS Review WHERE id IN (SELECT review_id FROM stores_has_reviews WHERE store_id = " .$id.")");
	}

	public function GetArticleReviews($id)
	{
		return $this->query("SELECT * FROM reviews AS Review WHERE id IN (SELECT review_id FROM articles_has_reviews WHERE article_id = " .$id.")");
	}
}
