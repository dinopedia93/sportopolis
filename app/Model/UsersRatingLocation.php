<?php
class UsersRatingLocation extends AppModel {
	public function RateLocation($location_id,$user_id,$new_rating)
	{
		$conditions = array(
		    'UsersRatingLocation.user_id' => $user_id,
		    'UsersRatingLocation.location_id' => $location_id
		);
		if ($this->hasAny($conditions)){
		    $this->query("UPDATE users_rating_locations SET rating = $new_rating WHERE user_id = $user_id AND location_id = $location_id");
		}
		else
		{
			$this->create();
			$this->save(array(
			    'user_id' => $user_id,
			    'location_id' => $location_id,
			    'rating' => $new_rating
			));
		}
		$this->CalculateRating($location_id);
	}

	private function CalculateRating($location_id)
	{
		$rating_one_count = $this->find('count',array('conditions' => array('UsersRatingLocation.location_id' => $location_id,'UsersRatingLocation.rating' => 1)));
		$rating_two_count = $this->find('count',array('conditions' => array('UsersRatingLocation.location_id' => $location_id,'UsersRatingLocation.rating' => 2)));
		$rating_three_count = $this->find('count',array('conditions' => array('UsersRatingLocation.location_id' => $location_id,'UsersRatingLocation.rating' => 3)));
		$rating_four_count = $this->find('count',array('conditions' => array('UsersRatingLocation.location_id' => $location_id,'UsersRatingLocation.rating' => 4)));
		$rating_five_count = $this->find('count',array('conditions' => array('UsersRatingLocation.location_id' => $location_id,'UsersRatingLocation.rating' => 5)));

		$rating = ( ($rating_one_count) + (2 * $rating_two_count) + (3 * $rating_three_count) + (4 * $rating_four_count) + (5 * $rating_five_count))/($rating_one_count + $rating_two_count + $rating_three_count + $rating_four_count + $rating_five_count);
		
		// Load model in other model
		$LocationModel = ClassRegistry::init('Location');

		$LocationModel->set(array(
		    'rank' => $rating
		));
		$LocationModel->id = $location_id;
		$LocationModel->save();
	}
}