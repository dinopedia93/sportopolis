<div class="newlist">

<div class="newleftList2">

<div class="profileSignUpToLeft">

<form method="post" action="/sportopolis/sportopolis/UpdateTrainerProfile/<?php if($trainer!=null) echo $trainer['Trainer']['id']; else echo -1?>">
<input type="text" name="user_id" value="<?php echo $trainer['Trainer']['user_id']; ?>" hidden>

<div class="profilePictureLeftLargeContainer">
<img class="pictureLeftLargerContainer" src ="boss.png">
<!-- here profile picture should be installed -->
</div>

<input class="textboxStandardLeft" type="text"  placeholder="first name" value="<?php echo $user_primary_data['User']['first_name']; ?>" name="first_name">

<input class="textboxStandardLeft" type="text"  placeholder="last_name" value="<?php echo $user_primary_data['User']['last_name']; ?>" name="last_name">

<select class="select-sport" name ="sports_id">
<option disabled="disabled">Select Sport</option>
<?php
	foreach ($sports as $sport) {

		if($trainer!=null && $sport['Sport']['id'] == $trainer['Trainer']['sports_id'])
		{
			echo "<option selected='selected' value="."'".$sport['Sport']['id']."'>".$sport['Sport']['name']."</option>";
		}
		else
		{
			echo "<option value='".$sport['Sport']['id']."'>".$sport['Sport']['name']."</option>";
		}
		
	}
?>
</select>

</div>

<div class="info-detail2">


<select class="select-country" id="country" name ="country"></select>
<select class="select-city" name ="state" id ="state"></select>

<script language="javascript">
populateCountries("country", "state");
 </script>

</div>

</div>

<div class="newRightList">

<div class="profileRightLargeTOPContainer">
<div class="rightSignUpLargeNav">Edit Information</div>
<div class="rightSignUpLargeNav">Edit Images</div>

</div>

<div class="SignUpAdditionalInfo">
<div class="SignUpTitle">Personal Information</div>

<div class="personalInfo">
<input class="textboxStandardRight" type="text" name="mobile" placeholder="Mobile num." value="<?php if($trainer!=null) echo $trainer['Trainer']['mobile']; ?>">
<!-- bellow should be replaced by selectable div jquery -->
<input class="textboxStandardRight2" type="text" name="gender" placeholder="male or female" value="<?php if($trainer!=null) echo $user_primary_data['User']['gender']; ?>">
<!-- bellow should be replaced by birth date div jquery -->
<input class="textboxStandardRight" type="text" name="birthdate" placeholder="Birth date" value="<?php if($trainer!=null) echo $user_primary_data['User']['birthdate']; ?>">
<input class="textboxStandardRight2" type="text" name="location" placeholder="Working Location" value="<?php if($trainer!=null) echo $trainer['Trainer']['location']; ?>">

</div>

<div class="SignUpTitle">Biography</div>
<textarea name="biography" class="textareaSignUp2" placeholder="Please, write your biography here ...">
<?php if($trainer!=null) echo $trainer['Trainer']['biography']; ?>
</textarea>

<div class="SignUpTitle">Social Media</div>

<input class="fbtextboxLeftSignUpMini" type="text" name="facebookURL" placeholder="Facebook url">
<input class="TtextboxLeftSignUpMini" type="text" name="twitterURL" placeholder="Twitter url (Optional)">
<input class="ItextboxLeftSignUpMini" type="text" name="InstagramURL" placeholder="Instagram url (Optional)">
<input class="LtextboxLeftSignUpMini" type="text" name="LinkedinURL" placeholder="Linkedin url (Optional)">

</div>

<div class="profilePhotosLargeBOTTOMContainer">

<ul class="galleryUl">
<li class= "galleryLi"><img class="galleryLiImg" src ="boss.png"><li>
<li class= "galleryLi"><img class="galleryLiImg" src ="boss.png"><li>
</ul>


<!-- here upload picture should be installed -->


</div>

<input class="saveBTN" type="submit" value="Save">

</form>



</div>

</div>