<?php echo $this->Html->script('jquery.barrating.min'); ?>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').barrating();
    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };
    $(".profilePhotosLargeBOTTOMContainer").hide();
    $(".userRatings").hide();
    if(isMobile.any())
    {
        $(".profileReviewLargeBOTTOMContainer").hide();
    }
    $(".centerbtn").click(function() {
        if (isMobile.any()) {
            $(".info-detail").hide();
            $(".profileReviewLargeBOTTOMContainer").show();
            $(".profilePhotosLargeBOTTOMContainer").hide();
        } else {
            $(".readReviews").hide();
            $(".profilePhotosLargeBOTTOMContainer").show();
            $(".userRatings").hide();
        }

    });
    $(".leftbtn").click(function() {
        if (isMobile.any()) {
            $(".info-detail").show();
            $(".profileReviewLargeBOTTOMContainer").hide();
            $(".profilePhotosLargeBOTTOMContainer").hide();
        } else {
            $(".readReviews").show();
            $(".profilePhotosLargeBOTTOMContainer").hide();
            $(".userRatings").hide();
        }
    });
    $(".rightbtn").click(function() {
        if (isMobile.any()) {
            $(".info-detail").hide();
            $(".profileReviewLargeBOTTOMContainer").hide();
            $(".profilePhotosLargeBOTTOMContainer").show();
        } else {
            $(".readReviews").hide();
            $(".profilePhotosLargeBOTTOMContainer").hide();
            $(".userRatings").show();
        }
    });
});
</script>

<div class="newlist">

<div class="newleftList">

<div class="profileLeftLargeContainer">

<div class="profilePictureLeftLargeContainer"><?php echo $this->Html->image('boss.png', array('class' => 'pictureLeftLargerContainer')); ?></div>
<div class="profileNameLeftLargeContainer"><?php echo $location['Location']['name']; ?></div>
<div class="profileProfessionLeftLargeContainer">football court</div>


<div class="profileViewsReviews">
<div class="profilePictoViewsReviews"><?php echo $this->Html->image('views.png'); ?></div>
<div class="profileNumViewsReviews"><?php  echo $locationshasviews?></div>
<div class="profilePictoViewsReviews2"><?php echo $this->Html->image('like.png'); ?></div>
<div class="profileNumViewsReviews"><?php  echo $reviewscount?></div>
</div>


<div class="mob-nav-menu">
<div class="mobNav leftbtn">Info</div>
<div class="mobNavCenter centerbtn">Reviews</div>
<div class="mobNav rightbtn">Photos</div>
</div>
</div>

<div class="info-detail">
<div class="bio"><?php echo $location['Location']['website']; ?></div>


<div class="like-and-rate">

<div class="like-and-rate-right">
<div class="like-and-rate-title">Rate Me</div>
<!-- rating plugin -->
<div class="rating-f">
  <select id="example">
     <option value="1"></option>
     <option value="2"></option>
     <option value="3"></option>
     <option value="4"></option>
     <option value="5"></option>
  </select>
</div>


</div>
</div>


<div class="profileSocialLeftLargeContainer">
<a href="#" class="socialLogo"><?php echo $this->Html->image('facebook.png', array('style' => 'cursor:pointer')); ?></a>
<a href="#" class="socialLogo"><?php echo $this->Html->image('linkedin3.png', array('style' => 'cursor:pointer')); ?></a>
<a href="#" class="socialLogo"><?php echo $this->Html->image('twitter.png', array('style' => 'cursor:pointer')); ?></a>
<a href="#" class="socialLogo"><?php echo $this->Html->image('instagram2.png', array('style' => 'cursor:pointer')); ?></a>
</div>




<div class="additionalInfo">
<div class="additionalInfoTitle">Additional Info</div>

<div class="infoDiv">
<div class="infoDivPicto"><?php echo $this->Html->image('mob.png'); ?></div>
<a href="tel:+201095034848" class="infoDivDetail"><?php echo 0 . $location['Location']['mobile']; ?></a>
</div>

<div class="infoDiv">
<div class="infoDivPicto"><?php echo $this->Html->image('location.png'); ?></div>
<div class="infoDivDetail"><?php echo $location['Location']['city'] . ' , '  .$location['Location']['country'] ; ?></div>
</div>

<div class="infoDiv">
<div class="infoDivPicto"><?php echo $this->Html->image('mail.png'); ?></div>
<div class="infoDivDetail"><?php echo $location['Location']['email']; ?> </div>
</div>

</div>

</div>

</div>

<div class="newRightList">

<div class="profileRightLargeTOPContainer">

<div class="rightLargeNav leftbtn">
<div class="rightLargeNavTitle">REVIEWS</div>
<div class="rightLargeNavCount"><?php  echo $reviewscount?></div>
</div>

<div class="rightLargeNav centerbtn">
<div class="rightLargeNavTitle" >PHOTOS</div>
<div class="rightLargeNavCount"><?php  echo $locationshasphotos?></div>
</div>

<div class="rightLargeNav rightbtn">
<div class="rightLargeNavTitle">LOCATIONS</div>
<div class="rightLargeNavCount"><?php echo $location['Location']['rank']; ?> </div>
</div>

</div>

<div class="profileReviewLargeBOTTOMContainer">

<div class="userRatings">
<div class="userRatingsTitle">Location</div>

<div class="userLocationBody">
   <?= $this->Html->script("http://maps.google.com/maps/api/js?sensor=false", false); ?>
 
    <?php
      $map_options = array( 'id' => 'map_canvas', 
	  'width' => '500px', 
	  'height' => '200px', 
	  'style' => '', 
	  'zoom' => 7, 
	  'type' => 'HYBRID', 
	  'custom' => null, 
	  'localize' => false, 
	  'latitude' => 29.9602841, 
	  'longitude' => 31.1563495, 
	  'address' => '1 Infinite Loop, Cupertino', 
	  'marker' => true, 
	  'markerTitle' => 'This is my position', 
	  'markerIcon' => 'http://google-maps-icons.googlecode.com/files/home.png', 
	  'markerShadow' => 'http://google-maps-icons.googlecode.com/files/shadow.png', 
	  'infoWindow' => false, 
	  'windowText' => 'El-Dawly Stadium' );
    ?>
    <?= $this->GoogleMap->map($map_options); ?>

</div>

<div class="userOtherLocationsBody">
<div class="userRatingsTitle">Other Locations</div>
<ul>

<a href="#">
<li>
<div class="userOtherLocationsBody-name">EL DAWLI STADIUM</div>
<div class="userOtherLocationsBody-address">Egypt, Cairo, Maadi</div>
</li>
</a>



</ul>
</div>



<div class="rank-and-review">
<div class="rank-and-review-left">Rank Me</div>
<div class="rank-and-review-right">Write a Review</div>
</div>



</div>



<div class="readReviews">


<div class="writeAReview">
<div class="writeUser"><?php echo $this->Html->image('boss.png', array('class' => 'writerPicSpecs')); ?></div>
<div class="writeAReviewDiv">
<form>
<textarea placeholder="Write your review... " class="reviewTextarea"></textarea>

<div class="postBtn">POST</div>

</form>
</div>
</div>



<div class="userReviewsTitle">Users Reviews</div>

<ul>
<?php if(count($allreviews) > 0){ ?>
<?php foreach ($allreviews as $index => $allreview): ?>
<li>
<div class="commenterPic"><?php echo $this->Html->image('boss.png', array('class' => 'commenterPicSpecs')); ?></div>

<div class="commentInfo">
<div class="commentInfoName"><?php echo $allreviewwriters[$index]['Member']['first_name']." ".$allreviewwriters[$index]['Member']['last_name']; ?></div>
<div class="commentInfoDate"><?php echo $allreview['Review']['date']; ?></div>
<div class="deleteComment">x</div>
</div>

<div class="commentText">
<?php echo $allreview['Review']['review']; ?>
</div>

</li>


<?php endforeach; 
}else {?>
<div class="no-entry">:( <br><br>Sorry, no Locations available now. We are still collecting data</div>
<?php }?>
<li>
show more
</li>

</ul>
</div>

</div>

<div class="profilePhotosLargeBOTTOMContainer">

<ul class="galleryUl">
<li class= "galleryLi"><?php echo $this->Html->image('boss.png', array('class' => 'galleryLiImg')); ?><li>
<li class= "galleryLi"><?php echo $this->Html->image('boss.png', array('class' => 'galleryLiImg')); ?><li>
<li class= "galleryLi"><?php echo $this->Html->image('boss.png', array('class' => 'galleryLiImg')); ?><li>
<li class= "galleryLi"><?php echo $this->Html->image('boss.png', array('class' => 'galleryLiImg')); ?><li>
<li class= "galleryLi"><?php echo $this->Html->image('boss.png', array('class' => 'galleryLiImg')); ?><li>
<li class= "galleryLi"><?php echo $this->Html->image('boss.png', array('class' => 'galleryLiImg')); ?><li>
<li class= "galleryLi"><?php echo $this->Html->image('boss.png', array('class' => 'galleryLiImg')); ?><li>
<li class= "galleryLi"><?php echo $this->Html->image('boss.png', array('class' => 'galleryLiImg')); ?><li>
<li class= "galleryLi"><?php echo $this->Html->image('boss.png', array('class' => 'galleryLiImg')); ?><li>
</ul>

</div>


<div class="profileRankLargeBOTTOMContainer">

<div class="rankme">

</div>


</div>




</div>

</div>




</div>
</div>


