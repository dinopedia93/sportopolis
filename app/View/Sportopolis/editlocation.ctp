<div class="newlist">

<div class="newleftList2">

<div class="profileSignUpToLeft">

<form method="post" action="/sportopolis/sportopolis/UpdateLocationProfile/<?php if($location!=null) echo $location['Location']['id']; else echo -1?>">
<input type="text" name="user_id" value="<?php echo $location['Location']['id']; ?>" hidden>

<div class="profilePictureLeftLargeContainer">
<img class="pictureLeftLargerContainer" src ="boss.png">
<!-- here profile picture should be installed -->
</div>

<input class="textboxStandardLeft" type="text"  placeholder="<?php echo $location['Location']['name']; ?>" value="<?php echo $location['Location']['name']; ?>" name="name">


<select class="select-sport" name ="sports_id">
<option disabled="disabled">Select Sport</option>
<?php
	foreach ($sports as $sport) {

		if($location!=null && $sport['Sport']['id'] == $location['Location']['sports_id'])
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


<select class="select-country" id="country" name ="country" value = "<?php if($location!=null) echo $location['Location']['country']; ?>"></select>
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
<input class="textboxStandardRight" type="text" name="mobile" placeholder="<?php if($location!=null) echo $location['Location']['mobile']; ?>" value = "<?php if($location!=null) echo $location['Location']['mobile']; ?>">
<!-- bellow should be replaced by selectable div jquery -->
<input class="textboxStandardRight2" type="text" name="tel" placeholder="<?php if($location!=null) echo $location['Location']['tel']; ?>" value = "<?php if($location!=null) echo $location['Location']['tel']; ?>">
<!-- bellow should be replaced by birth date div jquery -->
<input class="textboxStandardRight" type="text" name="email" placeholder="<?php if($location!=null) echo $location['Location']['email']; ?>" value = "<?php if($location!=null) echo $location['Location']['email']; ?>">
<input class="textboxStandardRight2" type="text" name="website" placeholder="<?php if($location!=null) echo $location['Location']['website']; ?>" value = "<?php if($location!=null) echo $location['Location']['website']; ?>">

</div>


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