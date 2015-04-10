<div class = "admins form">
<?php echo $this->Form->create('Admin'); ?>
	<fieldset>
		<legend>Register</legend>
		<?php
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
			echo $this->Form->input('facebook_acc');
			echo $this->Form->input('brief');
			echo $this->Form->input('password');
			echo $this->Form->input('password_confirmation',array('type' => 'password'));	
		?>
	</fieldset>
	
<?php echo $this->Form->end('Submit');?>
</div>