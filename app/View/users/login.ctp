
<div class="signup-big">

<div class="signup-header">
<div class="signup-header-ai">Login</div>
</div>


<div class="signup1">
<div class="signup-title">Login with social media</div>

<div class="signup-social">
<div class="signup-fb">Login with Facebook</div>
<div class="signup-twitter">Login with Twitter</div>
</div>	
</div>



<div class="signup2">
<div class="signup-title2">Login with Email</div>
<div class="signup-Desc">Please fill in your email address and password.</div>

<form class="signup-email" action="/sportopolis/users/login" id="UserLoginForm" method="post" accept-charset="utf-8">
<div style="display:none;"><input type="hidden" name="_method" value="POST"/>
</div>
<input class="textboxStandard" name="data[User][email]" maxlength="45" type="email" id="UserEmail" required="required"/>
<input class="textboxStandard" name="data[User][password]" type="password" id="UserPassword" required="required"/>

<div class="submit"><input class="signupSubmitBTN" type="submit" value="Login"/>
</div>
</form>

</div>
</div>
