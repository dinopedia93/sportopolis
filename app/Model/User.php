<?php

App::uses('AuthComponent', 'Controller/Component');
 App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
 
class User extends AppModel {
     public $name = 'User';
	 public $displayField = 'name';
	 
	 public $validate = array (
		'first_name' => array(
			'Please enter the first name. ' => array(
				'rule' => array('between' , 2 , 15),
				'message' => 'First name must be between 2 to 15 characters.'
			)
		),'last_name' => array(
			'Please enter the last name. ' => array(
				'rule' => array('between' , 2 , 15),
				'message' => 'Last name must be between 2 to 15 characters.'
			)
		),'gender' => array(
			'Please select your gender. ' => array(
				'rule' => 'notEmpty',
				'message' => 'Please select your gender.'
			)
		),'birthdate' => array(
			'Please enter your birth date. ' => array(
				'rule' => 'notEmpty',
				'message' => 'Last name must be between 2 to 15 characters.'
			)
		),'email' => array(
			'Valid Email' => array(
				'rule' => array('email'),
				'message' => 'Please enter a valid email address'
			),
			'Check Availability' => array(
				'rule' => 'checkAvailability',
				'on' => 'create',
				'message' => 'This email is already used. Please use a different email.'
			),
			'Not Empty' => array(
				'rule' => 'notEmpty'
			)
		),
		'password' => array(
				'Not Empty' => array(
					'rule' => 'notEmpty',
					'on' => 'create',
					'message'=>'Please enter your password'
				),
				'Match passwords' => array(
					'rule' => 'matchPasswords',
					'on' => 'create',
					'message' => 'Passwords do not match'
				)
		),
		'password_confirmation' => array(
				'Not Empty' => array(
					'rule' => 'notEmpty',
					'on' => 'create',
					'message'=>'Please confirm your password'
				)
		));
	 
	public function matchPasswords($data){
		if($data['password'] == $this->data['User']['password_confirmation']){
			return true;
		}
		$this->invalidate('password_confirmation' , 'Passwords do not match');
		return false;
	}
	
	public function checkAvailability($data){
        $result = $this->find('first', array('conditions' => array('User.email' => $data['email'])));
        if (isset($result['User'])){
			return false;
        }
		return true;
	}
	 
	 public function beforeSave($options = Array()){
		if(isset($this->data['User']['password'])){
			$this->data['User']['password'] = (new SimplePasswordHasher)->hash( $this->data['User']['password'] );
		}
		return true;
	}
}
