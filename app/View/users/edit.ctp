<h1>Edit User</h1>
<?php
	echo $this->Form->create('User');
	echo $this->Form->input('first_name');
	echo $this->Form->input('last_name');
	$options=array('Male'=>'Male','Female'=>'Female');
	$attributes=array('legend'=>false);
	echo $this->Form->radio('gender',$options,$attributes);
	echo $this->Form->input('birthdate', array(
		'label' => 'Date of birth',
		'dateFormat' => 'DMY',
		'type' => 'date',
		'minYear' => date('Y') - 70,
		'maxYear' => date('Y') - 10,
		'empty' => true
	));
	echo $this->Form->input('email');
	echo $this->Form->end('Update my data');
?>