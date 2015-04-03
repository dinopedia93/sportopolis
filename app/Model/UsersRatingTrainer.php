<?php
class UsersRatingTrainer extends AppModel {
	public function RateTrainer($trainer_id,$user_id,$new_rating)
	{
		$conditions = array(
		    'UsersRatingTrainer.user_id' => $user_id,
		    'UsersRatingTrainer.trainer_id' => $trainer_id
		);
		if ($this->hasAny($conditions)){
		    $this->query("UPDATE users_rating_trainers SET rating = $new_rating WHERE user_id = $user_id AND trainer_id = $trainer_id");
		}
		else
		{
			$this->create();
			$this->save(array(
			    'user_id' => $user_id,
			    'trainer_id' => $trainer_id,
			    'rating' => $new_rating
			));
		}
		$this->CalculateRating($trainer_id);
	}

	private function CalculateRating($trainer_id)
	{
		$rating_one_count = $this->find('count',array('conditions' => array('UsersRatingTrainer.trainer_id' => $trainer_id,'UsersRatingTrainer.rating' => 1)));
		$rating_two_count = $this->find('count',array('conditions' => array('UsersRatingTrainer.trainer_id' => $trainer_id,'UsersRatingTrainer.rating' => 2)));
		$rating_three_count = $this->find('count',array('conditions' => array('UsersRatingTrainer.trainer_id' => $trainer_id,'UsersRatingTrainer.rating' => 3)));
		$rating_four_count = $this->find('count',array('conditions' => array('UsersRatingTrainer.trainer_id' => $trainer_id,'UsersRatingTrainer.rating' => 4)));
		$rating_five_count = $this->find('count',array('conditions' => array('UsersRatingTrainer.trainer_id' => $trainer_id,'UsersRatingTrainer.rating' => 5)));

		$rating = ( ($rating_one_count) + (2 * $rating_two_count) + (3 * $rating_three_count) + (4 * $rating_four_count) + (5 * $rating_five_count))/($rating_one_count + $rating_two_count + $rating_three_count + $rating_four_count + $rating_five_count);
		
		// Load model in other model
		$TrainerModel = ClassRegistry::init('Trainer');

		$TrainerModel->set(array(
		    'rank' => $rating
		));
		$TrainerModel->id = $trainer_id;
		$TrainerModel->save();
	}
}