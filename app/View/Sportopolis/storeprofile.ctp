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
<div class="profileNameLeftLargeContainer"><?php echo $store['Store']['name']; ?></div>
<div class="profileProfessionLeftLargeContainer">ay store</div>

<div class="profileViewsReviews">
<div class="profilePictoViewsReviews"><?php echo $this->Html->image('views.png'); ?></div>
<div class="profileNumViewsReviews"><?php  echo $storeshasviews?></div>
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
<div class="bio"><?php echo $store['Store']['website']; ?></div>


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
<a href="tel:+201095034848" class="infoDivDetail"><?php echo 0 . $store['Store']['mobile']; ?></a>
</div>

<div class="infoDiv">
<div class="infoDivPicto"><?php echo $this->Html->image('location.png'); ?></div>
<div class="infoDivDetail"><?php echo $store['Store']['city'] . ' , '  .$store['Store']['country'] ; ?></div>
</div>

<div class="infoDiv">
<div class="infoDivPicto"><?php echo $this->Html->image('mail.png'); ?></div>
<div class="infoDivDetail"><?php echo $store['Store']['email']; ?> </div>
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
<div class="rightLargeNavCount"><?php  echo $storeshasphotos?></div>
</div>

<div class="rightLargeNav rightbtn">
<div class="rightLargeNavTitle">Locations</div>
<div class="rightLargeNavCount"><?php echo $store['Store']['rank']; ?> </div>
</div>

</div>

<div class="profileReviewLargeBOTTOMContainer">

<div class="userRatings">
<div class="userRatingsTitle">Locations</div>

<div class="userRatingsBody">


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
<div class="no-entry">:( <br><br>Sorry, no Stores available now. We are still collecting data</div>
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


