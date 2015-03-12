<div class = "users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend>Register</legend>
		<?php
			echo $this->Form->input('first_name');
			echo $this->Form->input('last_name');
			echo $this->Form->input('gender' , array('male' => 'Male' , 'female' => 'Female'));
			echo $this->Form->input('email');
			echo $this->Form->input('password');
			echo $this->Form->input('password_confirmation',array('type' => 'password'));	
		?>
	</fieldset>
	
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<h3>Actions</h3>
		<ul>
			<li><?php echo $this->Html->link('View Users' , array('action' => 'index'))?></li>
		</ul>
</div>