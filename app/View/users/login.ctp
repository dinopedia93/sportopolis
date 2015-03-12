<h2>Login</h2>
<?php

echo $this->Form->create();
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->end('Login');

?>

<div class="actions">
	<h3>Actions</h3>
		<ul>
			<li><?php echo $this->Html->link('Add User' , array('action' => 'add'))?></li>
		</ul>
</div>
