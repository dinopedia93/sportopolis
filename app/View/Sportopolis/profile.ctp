<script type="text/javascript">
$(document).ready(function() {
    $(".profilePhotosLargeBOTTOMContainer").hide();
    $(".profileRankLargeBOTTOMContainer").hide();
    $(".centerbtn").click(function() {
        $(".profilePhotosLargeBOTTOMContainer").show();
        $(".profileRankLargeBOTTOMContainer").hide();
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            $(".info-detail").hide();
        } else {
            $(".readReviews").hide();
        }

    });
    $(".leftbtn").click(function() {
        $(".profilePhotosLargeBOTTOMContainer").hide();
        $(".profileRankLargeBOTTOMContainer").hide();
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            $(".info-detail").show();
        } else {
            $(".readReviews").show();
        }
    });
    $(".rightbtn").click(function() {
        $(".profilePhotosLargeBOTTOMContainer").hide();
        $(".profileRankLargeBOTTOMContainer").show();
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            $(".info-detail").hide();
        } else {
            $(".readReviews").hide();
        }
    });
});
</script>

<div class="newlist">

<div class="newleftList">

<div class="profileLeftLargeContainer">

<div class="profilePictureLeftLargeContainer"><?php echo $this->Html->image('boss.png', array('class' => 'pictureLeftLargerContainer')); ?></div>
<div class="profileNameLeftLargeContainer"><?php echo $trainer['Trainer']['name']; ?></div>
<div class="profileProfessionLeftLargeContainer"><?php echo $sport['Sport']['name']; ?></div>
<div class="profileRankLeftLargeContainer"><?php echo $this->Html->image('zerorank.png'); ?></div>

<div class="profileViewsReviews">
<div class="profilePictoViewsReviews"><?php echo $this->Html->image('views.png'); ?></div>
<div class="profileNumViewsReviews">200</div>
<div class="profilePictoViewsReviews2"><?php echo $this->Html->image('comment.png'); ?></div>
<div class="profileNumViewsReviews">200</div>
</div>


<div class="mob-nav-menu">
<div class="mobNav">Info</div>
<div class="mobNavCenter">Reviews</div>
<div class="mobNav">Photos</div>
</div>
</div>

<div class="info-detail">
<div class="bio"><?php echo $trainer['Trainer']['biography']; ?></div>

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
<a href="tel:+201095034848" class="infoDivDetail"><?php echo 0 . $trainer['Trainer']['mobile']; ?></a>
</div>

<div class="infoDiv">
<div class="infoDivPicto"><?php echo $this->Html->image('location.png'); ?></div>
<div class="infoDivDetail"><?php echo $trainer['Trainer']['city'] . ' , '  .$trainer['Trainer']['country'] ; ?></div>
</div>

<div class="infoDiv">
<div class="infoDivPicto"><?php echo $this->Html->image('mail.png'); ?></div>
<div class="infoDivDetail"><?php echo $trainer['Trainer']['email']; ?> </div>
</div>

</div>

</div>

</div>

<div class="newRightList">

<div class="profileRightLargeTOPContainer">

<div class="rightLargeNav leftbtn">
<div class="rightLargeNavTitle">REVIEWS</div>
<div class="rightLargeNavCount"><?php  echo $trainershasreviews?></div>
</div>

<div class="rightLargeNav centerbtn">
<div class="rightLargeNavTitle" >PHOTOS</div>
<div class="rightLargeNavCount"><?php  echo $trainershasphotos?></div>
</div>

<div class="rightLargeNav rightbtn">
<div class="rightLargeNavTitle">RANK</div>
<div class="rightLargeNavCount"><?php echo $trainer['Trainer']['rank']; ?> </div>
</div>

</div>

<div class="profileReviewLargeBOTTOMContainer">

<div class="userRatings">
<div class="userRatingsTitle">Users Ratings</div>

<div class="userRatingsBody">

<div class="rateN">
<div class="rate-pic"><?php echo $this->Html->image('emptyrank5.png'); ?></div>
<div class="rate-meter">j</div>
<div class="rate-num">20</div>
</div>

<div class="rateN">
<div class="rate-pic"><?php echo $this->Html->image('emptyrank4.png'); ?></div>
<div class="rate-meter">j</div>
<div class="rate-num">20</div>
</div>

<div class="rateN">
<div class="rate-pic"><?php echo $this->Html->image('emptyrank3.png'); ?></div>
<div class="rate-meter">j</div>
<div class="rate-num">20</div>
</div>

<div class="rateN">
<div class="rate-pic"><?php echo $this->Html->image('emptyrank2.png'); ?></div>
<div class="rate-meter">j</div>
<div class="rate-num">20</div>
</div>

<div class="rateN">
<div class="rate-pic"><?php echo $this->Html->image('emptyrank1.png'); ?></div>
<div class="rate-meter">j</div>
<div class="rate-num">20</div>
</div>

<div class="rateN">
<div class="rate-pic"><?php echo $this->Html->image('emptyrank.png'); ?></div>
<div class="rate-meter">j</div>
<div class="rate-num">20</div>
</div>

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

<li>
<div class="commenterPic"><?php echo $this->Html->image('boss.png', array('class' => 'commenterPicSpecs')); ?></div>

<div class="commentInfo">
<div class="commentInfoName">Hisham Ahmed Al-Sayed</div>
<div class="commentInfoDate">13/13/2013</div>
<div class="deleteComment">x</div>
</div>

<div class="commentText">
He is a good trainer, he helped me alot
He is a good trainer, he helped me alot
He is a good trainer, he helped me alot
He is a good trainer, he helped me alot
He is a good trainer, he helped me alot
He is a good trainer, he helped me alot
He is a good trainer, he helped me alotHe is a good trainer, he helped me alot
He is a good trainer, he helped me alot
He is a good trainer, he helped me alot
He is a good trainer, he helped me alot
He is a good trainer, he helped me alot
He is a good trainer, he helped me alot
He is a good trainer, he helped me alotHe is a good trainer, he helped me alot
He is a good trainer, he helped me alot
He is a good trainer, he helped me alot
He is a good trainer, he helped me alot
He is a good trainer, he helped me alot
He is a good trainer, he helped me alot
He is a good trainer, he helped me alotHe is a good trainer, he helped me alot
He is a good trainer, he helped me alot
He is a good trainer, he helped me alot
He is a good trainer, he helped me alot
He is a good trainer, he helped me alot
He is a good trainer, he helped me alot
He is a good trainer, he helped me alot
</div>

</li>

<li>
<div class="commenterPic"><?php echo $this->Html->image('boss.png', array('class' => 'commenterPicSpecs')); ?></div>

<div class="commentInfo">
<div class="commentInfoName">Hisham Ahmed Al-Sayed</div>
<div class="commentInfoDate">13/13/2013</div>
<div class="deleteComment">x</div>
</div>

<div class="commentText">
He is a good trainer, he helped me alot
</div>

</li>


<li>
<div class="commenterPic"><?php echo $this->Html->image('boss.png', array('class' => 'commenterPicSpecs')); ?></div>

<div class="commentInfo">
<div class="commentInfoName">Hisham Ahmed Al-Sayed</div>
<div class="commentInfoDate">13/13/2013</div>
<div class="deleteComment">x</div>
</div>

<div class="commentText">
He is a good trainer, he helped me alot
He is a good trainer, he helped me alot
He is a good trainer, he helped me alot
He is a good trainer, he helped me alot
He is a good trainer, he helped me alot
He is a good trainer, he helped me alot
He is a good trainer, he helped me alot
</div>
</li>

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


