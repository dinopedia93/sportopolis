<div class = "trainers form">
<?php echo $this->Form->create('Trainer'); ?>
	<fieldset>
		<legend>Register</legend>
		<?php
			echo $this->Form->input('country');
			echo $this->Form->input('city');
			echo $this->Form->input('district');
			echo $this->Form->input('location');
			echo $this->Form->input('mobile');
		?>
	</fieldset>
	
<?php echo $this->Form->end('Submit');?>
</div>