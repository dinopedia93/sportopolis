<script type="text/javascript">
	$(document).ready(function(){
		$(".signup3").hide();
		$(".signup3").hide();
	});
</script>
<div class="signup-big">

<div class="signup-header">
<div class="signup-header-ai">Sign Up Trainer</div>
</div>


<div class="signup1">
<div class="signup-title">Sign up with social media</div>

<div class="signup-social">
<div class="signup-fb">Connect with Facebook</div>
<div class="signup-twitter">Connect with Twitter</div>
</div>	
</div>



<div class="signup2">
<div class="signup-title2">Sign up with Email</div>
<div class="signup-Desc">Please fill in your email address and password. ( A confirmation mail will be sent to you. )</div>

<form class="signup-email" method="post" action="/sportopolis/sportopolis/RegisterTrainer">

<input class="textboxStandard" type="text" name="email" placeholder="Email">
<input class="textboxStandard" type="password" name="password" placeholder="Password">
<input class="textboxStandard" type="password" name="confirmPassword" placeholder="Confirm Password">

<input class="signupSubmitBTN" type="submit" value="Sign up">

</form>

</div>

<div class="signup3">
<div class="signup-title2">Enter your basic account information</div>
<div class="signup-Desc">Please fill in your basic information so that website visitors know who are you and easily reach you</div>

<form class="signup-basic">

<input class="textboxStandardLeft" type="text" name="fname" placeholder="First name">
<input class="textboxStandardRight" type="text" name="lname" placeholder="Last name">



<select class="select-country" id="country" name ="country"></select>
<select class="select-city" name ="state" id ="state"></select>

<!-- district need to be done -->
<select class="select-district" name ="district" id ="district"></select>

<script language="javascript">
populateCountries("country", "state");
 </script>
 
 

<input class="textboxStandardLeft" type="text" name="telephoneNum" placeholder="Mobile num.">

<!--
<ol id="selectable">
  <li class="ui-widget-content">Male</li>
  <li class="ui-widget-content">Female</li>
</ol>
 -->

<div class="leftSignUpMini">
 
 
<select class="select-sport" name ="sport">
<option selected="selected" disabled="disabled">Select Sport</option>
<option>Cycling</option>
<option>Fitness</option>
<option>Fishing</option>
<option>Football</option>
<option>Tennis</option>
</select>

<input class="fbtextboxLeftSignUpMini" type="text" name="facebookURL" placeholder="Facebook url">
<input class="TtextboxLeftSignUpMini" type="text" name="twitterURL" placeholder="Twitter url (Optional)">
<input class="ItextboxLeftSignUpMini" type="text" name="InstagramURL" placeholder="Instagram url (Optional)">
<input class="LtextboxLeftSignUpMini" type="text" name="LinkedinURL" placeholder="Linkedin url (Optional)">


</div>

<div class="rightSignUpMini">

<textarea class="textareaSignUp" placeholder="Please, write your biography here ...">
</textarea>
 
 
</form>

</div>

</div>


<div class="personal-info"></div>










</div>