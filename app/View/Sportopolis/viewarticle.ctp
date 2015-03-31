<div class="article-main-left">

<div class="article-main-title"><?php echo $article['Article']['title']; ?></div>

<div class="article-main-photo"><img src=""></div>

<div class="author-info">
<div class="author-pic"><img class="author-prof-pic" src ="boss.png"></div>
<div class="author-name"><?php echo $articlewriter['User']['first_name']." ".$articlewriter['User']['last_name']; ?></div>
<div class="article-date"><?php echo $article['Article']['article_date']; ?></div>
</div>


<div class="article-adv">
<div class="article-adv-top">Views</div>
<div class="article-adv-bellow">200</div>
</div>

<div class="article-adv">
<div class="article-adv-top">Likes</div>
<div class="article-adv-bellow">4.5</div>
</div>

<div class="article-adv">
<div class="article-adv-top">Shares</div>
<div class="article-adv-bellow">200</div>
</div>

<div class="article-adv">
<div class="article-adv-top">Rates</div>
<div class="article-adv-bellow">4.5</div>
</div>



<div class="article-main-body">

<?php echo $article['Article']['article_content']; ?>
</div>

</div>

<div class="article-info-right">

<div class="article-info-title">Featured Articles</div>


<div class="article-mini-info">
This is another articleThis is another article
</div>

<div class="article-mini-info">

</div>

<div class="article-mini-info">

</div>




</div>

<div class="Article-share-social">
<div class="Article-share-fb">Share</div>
<div class="Article-share-twitter">Tweet</div>
<div class="Article-share-Email">Email</div>
</div>	



<div class="article-reviews">


<div class="writeAReview">
<div class="writeUser"><img class="writerPicSpecs" src ="boss.png"></div>
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
<div class="commenterPic"><img class="commenterPicSpecs" src ="boss.png"></div>

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
<div class="no-entry">:( <br><br>Sorry, no Trainers available now. We are still collecting data</div>
<?php }?>
<li>
show more
</li>

</ul>
</div>

