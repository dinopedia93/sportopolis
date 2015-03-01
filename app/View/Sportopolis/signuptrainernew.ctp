<div class="newlist">

<div class="newleftList">

<div class="profileSignUpToLeft">

<form>

<div class="profilePictureLeftLargeContainer"><img class="pictureLeftLargerContainer" src ="boss.png"></div>
<input class="textboxStandardLeft" type="text" name="fname" placeholder="First name">
<input class="textboxStandardLeft" type="text" name="lname" placeholder="Last name">

<select class="select-sport" name ="sport">
<option selected="selected" disabled="disabled">Select Sport</option>
<option>Cycling</option>
<option>Fitness</option>
<option>Fishing</option>
<option>Football</option>
<option>Tennis</option>
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
<input class="textboxStandardRight" type="text" name="telephoneNum" placeholder="Mobile num.">
<!-- bellow should be replaced by selectable div jquery -->
<input class="textboxStandardRight2" type="text" name="telephoneNum" placeholder="male or female">
<!-- bellow should be replaced by birth date div jquery -->
<input class="textboxStandardRight" type="text" name="telephoneNum" placeholder="Birth date">
<input class="textboxStandardRight2" type="text" name="telephoneNum" placeholder="Working Location">

</div>

<div class="SignUpTitle">Biography</div>
<textarea class="textareaSignUp" placeholder="Please, write your biography here ...">
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