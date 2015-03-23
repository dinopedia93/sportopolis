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
	}
}