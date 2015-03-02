<div class="newlist">

<div class="newleftList">

<div class="profileSignUpToLeft">

<form method="post" action="/sportopolis/sportopolis/UpdateTrainerProfile/<?php echo $trainer['Trainer']['id']; ?>">
<div class="profilePictureLeftLargeContainer"><img class="pictureLeftLargerContainer" src ="boss.png"></div>
<input class="textboxStandardLeft" type="text" name="name" placeholder="name" value="<?php echo $trainer['Trainer']['name']; ?>">

<select class="select-sport" name ="sport">
<option disabled="disabled">Select Sport</option>
<?php
	foreach ($sports as $sport) {
		if($sport['Sport']['id'] == $trainer['Trainer']['sports_id'])
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

<div class="info-detail">


<select class="select-country" id="country" name ="country"></select>
<select class="select-city" name ="state" id ="state"></select>

<!-- district need to be done as autocomplete -->
<select class="select-district" name ="district" id ="district"></select>

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
<input class="textboxStandardRight" type="text" name="mobile" placeholder="Mobile num." value="<?php echo $trainer['Trainer']['mobile']; ?>">
<!-- bellow should be replaced by selectable div jquery -->
<input class="textboxStandardRight2" type="text" name="gender" placeholder="male or female" value="<?php echo $trainer['Trainer']['gender']; ?>">
<!-- bellow should be replaced by birth date div jquery -->
<input class="textboxStandardRight" type="text" name="birthdate" placeholder="Birth date" value="<?php echo $trainer['Trainer']['birthdate']; ?>">
<input class="textboxStandardRight2" type="text" name="location" placeholder="Working Location" value="<?php echo $trainer['Trainer']['location']; ?>">

</div>

<div class="SignUpTitle">Biography</div>
<textarea name="biography" class="textareaSignUp" placeholder="Please, write your biography here ...">
<?php echo $trainer['Trainer']['biography']; ?>
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

</div>

<input class="saveBTN" type="submit" value="Save">

</form>



</div>

</div>