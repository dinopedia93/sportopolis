<?php echo $this->Html->script('jquery.barrating.min'); ?>
<script type="text/javascript">
var activityIndicatorOn = function()
            {
                $( '<div id="imagelightbox-loading"><div></div></div>' ).appendTo( 'body' );
            },
            activityIndicatorOff = function()
            {
                $( '#imagelightbox-loading' ).remove();
            },
arrowsOn = function( instance, selector )
            {
                var $arrows = $( '<button type="button" class="imagelightbox-arrow imagelightbox-arrow-left"></button><button type="button" class="imagelightbox-arrow imagelightbox-arrow-right"></button>' );

                $arrows.appendTo( 'body' );

                $arrows.on( 'click touchend', function( e )
                {
                    e.preventDefault();

                    var $this   = $( this ),
                        $target = $( selector + '[href="' + $( '#imagelightbox' ).attr( 'src' ) + '"]' ),
                        index   = $target.index( selector );

                    if( $this.hasClass( 'imagelightbox-arrow-left' ) )
                    {
                        index = index - 1;
                        if( !$( selector ).eq( index ).length )
                            index = $( selector ).length;
                    }
                    else
                    {
                        index = index + 1;
                        if( !$( selector ).eq( index ).length )
                            index = 0;
                    }

                    instance.switchImageLightbox( index );
                    return false;
                });
            },
            arrowsOff = function()
            {
                $( '.imagelightbox-arrow' ).remove();
            };
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

        $(".centerbtn").css("border-bottom","4px solid #f26522");
        $(".leftbtn").css("border-bottom","4px solid white");
        $(".rightbtn").css("border-bottom","4px solid white");

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

        $(".leftbtn").css("border-bottom","4px solid #f26522");
        $(".centerbtn").css("border-bottom","4px solid white");
        $(".rightbtn").css("border-bottom","4px solid white");

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

        $(".rightbtn").css("border-bottom","4px solid #f26522");
        $(".leftbtn").css("border-bottom","4px solid white");
        $(".centerbtn").css("border-bottom","4px solid white");
        
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

var selectorG = 'a[data-imagelightbox="g"]';
        var instanceG = $( selectorG ).imageLightbox(
        {
            onStart:        function(){ arrowsOn( instanceG, selectorG ); },
            onEnd:          function(){ arrowsOff(); activityIndicatorOff(); },
            onLoadStart:    function(){ activityIndicatorOn(); },
            onLoadEnd:      function(){ $( '.imagelightbox-arrow' ).css( 'display', 'block' ); activityIndicatorOff(); }
        });

    $.ajax({
            dataType: "html",
            type: "post",
            url: "<?php echo Router::url(array('controller'=>'sportopolis','action'=>'IncreaseTrainerViews'));?>",
            data: {id : <?php echo $trainer['trainers']['id']; ?>},
            error: function(xhr, status, error) {
              alert(error);
           }
    });
    $("#rateBtn").click(function() {
        <?php if($this->Session->read('Auth.User') != null) { ?>
             $.ajax({
                    dataType: "html",
                    type: "post",
                    url: "<?php echo Router::url(array('controller'=>'sportopolis','action'=>'RateTrainer'));?>",
                    data: { trainer_id : <?php echo $trainer['trainers']['id']; ?> , new_rating : $( "#example option:selected" ).val() },
                    error: function(xhr, status, error) {
                      alert(error);
                   },
                   success: function( data,  textStatus,  jqXHR )
                   {
                        alert(data);
                   }
            });
        <?php } else { ?>
            alert('You must login in order to rate a trainer');
        <?php } ?>
    });

    $("#SendReviewBtn").click(function(){
        $.ajax({
                    dataType: "html",
                    type: "post",
                    url: "<?php echo Router::url(array('controller'=>'sportopolis','action'=>'ReviewTrainer'));?>",
                    data: {review : $("#ReviewContent").val() , trainer_id: <?php echo $trainer['trainers']['id']; ?> },
                    error: function(xhr, status, error) {
                      alert(error);
                   },
                   success: function( data,  textStatus,  jqXHR )
                   {
                        alert(data);
                   }
            });
    });

});
</script>
<div class="newlist">

<div class="newleftList">

<div class="profileLeftLargeContainer">
<a href="<?php 
					if($this->Session->read('Auth.User.id') == $trainer['users']['id']){
						echo "/sportopolis/images/add/1/".$this->Session->read('Auth.User.id')."/".$trainer['trainers']['id'];
					}?>" class="profilePictureLeftLargeContainer"><?php echo $this->Html->image($trainerpp, array('class' => 'pictureLeftLargerContainer')); ?></a>
<div class="profileNameLeftLargeContainer"><?php echo $trainer['users']['first_name']." ".$trainer['users']['last_name']; ?></div>
<div class="profileProfessionLeftLargeContainer"><?php echo $sport['Sport']['name']; ?> Trainer</div>

<div class="profileViewsReviews">
<div class="profilePictoViewsReviews"><?php echo $this->Html->image('views.png'); ?></div>
<div class="profileNumViewsReviews"><?php  echo $trainer['trainers']['views']; ?></div>
<div class="profilePictoViewsReviews2"><?php echo $this->Html->image('rating.png'); ?></div>
<div class="profileNumViewsReviews"><?php  echo $reviewscount?></div>
</div>


<div class="mob-nav-menu">
<div class="mobNav leftbtn">Info</div>
<div class="mobNavCenter centerbtn">Reviews</div>
<div class="mobNav rightbtn">Photos</div>
</div>
</div>

<div class="info-detail">
<div class="bio"><?php echo $trainer['trainers']['biography']; ?></div>


<div class="like-and-rate">

<?php if( ($this->Session->read('Auth.User.id') != $trainer['trainers']['user_id']) ) {?>
<div class="like-and-rate-title">Rate Me</div>
<!-- rating plugin -->
<div class="like-and-rate-right">
<div class="rating-f">
  <select id="example">
     <option <?php if( (isset($rating)) && array_key_exists('UsersRatingTrainer',$rating) && ($this->Session->read('Auth.User') != null) && ($rating['UsersRatingTrainer']['rating'] == 1) )  { ?> selected <?php } ?> value="1"></option>
     <option <?php if( (isset($rating)) && array_key_exists('UsersRatingTrainer',$rating)  && ($this->Session->read('Auth.User') != null) && ($rating['UsersRatingTrainer']['rating'] == 2) )  { ?> selected <?php } ?> value="2"></option>
     <option <?php if( (isset($rating)) && array_key_exists('UsersRatingTrainer',$rating)  && ($this->Session->read('Auth.User') != null) && ($rating['UsersRatingTrainer']['rating'] == 3) )  { ?> selected <?php } ?> value="3"></option>
     <option <?php if( (isset($rating)) && array_key_exists('UsersRatingTrainer',$rating)  && ($this->Session->read('Auth.User') != null) && ($rating['UsersRatingTrainer']['rating'] == 4) )  { ?> selected <?php } ?> value="4"></option>
     <option <?php if( (isset($rating)) && array_key_exists('UsersRatingTrainer',$rating)  && ($this->Session->read('Auth.User') != null) && ($rating['UsersRatingTrainer']['rating'] == 5) )  { ?> selected <?php } ?> value="5"></option>
  </select>
</div>
<button id='rateBtn'>Rate</button>
</div>

<?php } ?>
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
<a href="tel:+201095034848" class="infoDivDetail"><?php echo 0 . $trainer['trainers']['mobile']; ?></a>
</div>

<div class="infoDiv">
<div class="infoDivPicto"><?php echo $this->Html->image('location.png'); ?></div>
<div class="infoDivDetail"><?php echo $trainer['trainers']['city'] . ' , '  .$trainer['trainers']['country'] ; ?></div>
</div>

<div class="infoDiv">
<div class="infoDivPicto"><?php echo $this->Html->image('mail.png'); ?></div>
<div class="infoDivDetail"><?php echo $trainer['users']['email']; ?> </div>
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
<div class="rightLargeNavCount"><?php  //echo $trainershasphotos?></div>
</div>

<div class="rightLargeNav rightbtn">
<div class="rightLargeNavTitle">ARTICLES</div>
<div class="rightLargeNavCount"><?php echo $trainer['trainers']['rank']; ?> </div>
</div>

</div>

<div class="profileReviewLargeBOTTOMContainer">

<div class="userRatings">
<div class="userRatingsTitle">Articles</div>

<div class="userArticlesBody">

<ul>
<li>
<div class="userArticlesBody-mini-box">
<div class="userArticlesBody-mini-box-left"><a href="#"><?php echo $this->Html->image('tenniscourt.jpg', array('class' => 'index-mini-box-img')); ?></a></div>
<a href="#">
<div class="userArticlesBody-mini-box-right">
<div class="userArticlesBody-mini-box-name">How to build 6 aps in 1 day </div>
<div class="userArticlesBody-mini-box-profession">Tennis Article</div>
<div class="userArticlesBody-mini-box-info">
<div class="userArticlesBody-index-Views"><?php echo $this->Html->image('views.png', array('class' => 'article-index-Picto')); ?>200</div>
<div class="userArticlesBody-index-reviews"><?php echo $this->Html->image('like.png', array('class' => 'article-index-Picto')); ?>200</div>
</div>
</div>
</a>
</li>



</ul>

</div>

<div class="rank-and-review">
<div class="rank-and-review-left">Rank Me</div>
<div class="rank-and-review-right">Write a Review</div>
</div>



</div>



<div class="readReviews">


<div class="writeAReview">
<?php if( ($this->Session->read('Auth.User') != null) && ($this->Session->read('Auth.User.id') != $trainer['trainers']['user_id']) ) {?>
<div class="writeUser"><?php echo $this->Html->image('boss.png', array('class' => 'writerPicSpecs')); ?></div>
<div class="writeAReviewDiv">
<form>
<textarea placeholder="Write your review... " class="reviewTextarea" id="ReviewContent"></textarea>

<div id="SendReviewBtn" class="postBtn">POST</div>

</form>
</div>
<?php } else if($this->Session->read('Auth.User.id') == $trainer['trainers']['user_id']) echo "You cannot write a review on yourself";
        else echo "Please login to write a review" ?>
</div>



<div class="userReviewsTitle">Users Reviews</div>

<ul>
<?php if(count($allreviews) > 0){ ?>
<?php foreach ($allreviews as $index => $allreview): ?>
<li>
<div class="commenterPic"><?php echo $this->Html->image('boss.png', array('class' => 'commenterPicSpecs')); ?></div>

<div class="commentInfo">
<div class="commentInfoName"><?php echo $allreviewwriters[$index]['User']['first_name']." ".$allreviewwriters[$index]['User']['last_name']; ?></div>
<div class="commentInfoDate"><?php echo $allreview['Review']['date']; ?></div>
<?php if( $allreviewwriters[$index]['User']['id'] == $this->Session->read('Auth.User.id') ) {?>
<div class="deleteComment">x</div>
<?php } ?>
</div>

<div class="commentText">
<?php echo $allreview['Review']['review']; ?>
</div>

</li>


<?php endforeach; 
}else {?>
<div class="no-entry">:( <br><br>Sorry, no Trainers available now. We are still collecting data</div>
<?php }?>
<li>
show more
</li>

</ul>
</div>

</div>

<div class="profilePhotosLargeBOTTOMContainer">


    <ul id = 'imagelightbox'>
        <li><a href="/sportopolis/img/boss.png" data-imagelightbox="g"><?php echo $this->Html->image('boss.png', array('class' => 'galleryLiImg')); ?></a></li>
        <li><a href="/sportopolis/img/boss.png" data-imagelightbox="g"><?php echo $this->Html->image('boss.png', array('class' => 'galleryLiImg')); ?></a></li>
        <li><a href="/sportopolis/img/boss.png" data-imagelightbox="g"><?php echo $this->Html->image('boss.png', array('class' => 'galleryLiImg')); ?></a></li>
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


