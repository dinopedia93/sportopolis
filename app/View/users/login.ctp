<h2>Login</h2>
<form action="/sportopolis/users/login" id="UserLoginForm" method="post" accept-charset="utf-8">
<div style="display:none;"><input type="hidden" name="_method" value="POST"/>
</div>
<div class="input email required"><label for="UserEmail">Email</label><input name="data[User][email]" maxlength="45" type="email" id="UserEmail" required="required"/>
</div>
<div class="input password required"><label for="UserPassword">Password</label><input name="data[User][password]" type="password" id="UserPassword" required="required"/>
</div>
<div class="submit"><input  type="submit" value="Login"/>
</div>
</form>


<div class="actions">
	<h3>Actions</h3>
		<ul>
			<li><?php echo $this->Html->link('Add User' , array('action' => 'add'))?></li>
		</ul>
</div>
