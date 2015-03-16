<script type="text/javascript">
	$(document).ready(function() {		
    $('#articles').show();
    $('#locations').hide();
    $('#trainers').hide();
    $('#events').hide();
    $('#stores').hide();
    $('.locationPicto').click(function() {
        $('#locations').show();
        $('#trainers').hide();
        $('#articles').hide();
        $('#events').hide();
        $('#stores').hide();
    });
    $('.trainerPicto').click(function() {    	
        $('#trainers').show();
        $('#locations').hide();
        $('#articles').hide();
        $('#events').hide();
        $('#stores').hide();
    });
    $('.articlePicto').click(function() {
        $('#articles').show();
        $('#locations').hide();
        $('#trainers').hide();
        $('#events').hide();
        $('#stores').hide();
    });
    $('.eventPicto').click(function() {
        $('#events').show();
        $('#locations').hide();
        $('#trainers').hide();
        $('#articles').hide();
        $('#stores').hide();
    });
     $('.storesPicto').click(function() {
        $('#stores').show();
        $('#locations').hide();
        $('#trainers').hide();
        $('#articles').hide();
        $('#events').hide();
    });
});
</script>
<?php $trainerurl = " http://localhost/sportopolis/sportopolis/trainerprofile/" ?>
<?php $locationurl = " http://localhost/sportopolis/sportopolis/profilelocation/" ?>
<?php $storeurl = " http://localhost/sportopolis/sportopolis/profilestore/" ?>
<div class="desktop-menu">

<div class="leftListHeader">

<div class="leftListHeaderTitle">Sport Name</div>
</div>

<ul class="sportList">

<li class="articlePicto">Articles</li>
<li class="trainerPicto">Trainers</li>
<li class="locationPicto">Locations</li>
<li class="storesPicto">Stores</li>
<li class="eventPicto">Events</li>

</ul>


<ul class="menu-filter-in">

<li class="menu-filter-in-li1">Filter in</li>

<!--Should be set by default to current location-->

<li>
<select class="filter-select" id="country" name ="country"></select>
</li>

<li>
<select class="filter-select" name ="state" id ="state"></select>
</li>

<script language="javascript">
populateCountries("country", "state");
 </script>

</ul>

</div>

<div class="mobile-menu">
<div class="search-list-head">
<input class="textarea-search-list" type='text' placeholder='Search...'/>
</div>


<div class="text-list-head">TENNIS</div>

<div class="dropMenu-list-head">
<select>
    <option>Locations</option>
    <option>Trainers</option>
    <option>Stores</option>
    <option>Articles</option>
</select>
</div>
</div>



<div class="mobile-list-sort">

<ul>

<li><a href="#">Views</a></li>
<li><a href="#">Ranks</a></li>
<li><a href="#">Nearest</a></li>

</ul>

</div>

<div class="list-accounts">
<div class="leftMenuHeader">

<!--search results should appear as i enter any letter-->
<input class="textarea-search-menu" type='text' placeholder='Search in trainers...'/>

<ul class="desktop-sort">
<li><a href="#">Views</a></li>
<li><a href="#">Ranks</a></li>
<li><a href="#">Nearest</a></li>
</ul>

</div>


<ul id='articles' class="attributeList">
<?php if(count($articles) > 0){ ?>
<?php foreach ($articles as $article): ?>
<li>
<a href="<?php echo $trainerurl.$trainer['Trainer']['id']; ?>">


<div class="listPic"><?php echo $this->Html->image('boss.png', array('class' => 'circleListPic')); ?></div>
<div class="listInfo">
<div class="listName"><?php echo $article['Article']['name']; ?></div>
<div class="listRank"><?php echo $this->Html->image('zerorank1.png', array('class' => 'listRankPicto')); ?></div>
<div class="listviews"><?php echo $this->Html->image('views.png', array('class' => 'listViewsPicto')); ?>200</div>
<div class="listReviews"><?php echo $this->Html->image('like.png', array('class' => 'listViewsPicto')); ?>200</div>
</div>
<div class="listArrow"><?php echo $this->Html->image('go.png', array('class' => 'listArrowPicto')); ?></div>
</a>
</li>


<?php endforeach; 
}else {?>
<div class="no-entry">:( <br><br>Sorry, no Articles available now. Help us and write an article</div>
<?php }?>

</ul>


<ul id='trainers' class="attributeList">
<?php if(count($trainers) > 0){ ?>
<?php foreach ($trainers as $trainer): ?>
<li>
<a href="<?php echo $trainerurl.$trainer['Trainer']['id']; ?>">


<div class="listPic"><?php echo $this->Html->image('boss.png', array('class' => 'circleListPic')); ?></div>
<div class="listInfo">
<div class="listName"><?php echo $trainer['Trainer']['first_name']." ".$trainer['Trainer']['last_name']; ?></div>
<div class="listRank"><?php echo $this->Html->image('zerorank1.png', array('class' => 'listRankPicto')); ?></div>
<div class="listviews"><?php echo $this->Html->image('views.png', array('class' => 'listViewsPicto')); ?>200</div>
<div class="listReviews"><?php echo $this->Html->image('like.png', array('class' => 'listViewsPicto')); ?>200</div>
</div>
<div class="listArrow"><?php echo $this->Html->image('go.png', array('class' => 'listArrowPicto')); ?></div>
</a>
</li>


<?php endforeach; 
}else {?>
<div class="no-entry">:( <br><br>Sorry, no Trainers available now. We still collecting data</div>
<?php }?>

</ul>


<ul id='locations' class="attributeList">
<?php if(count($locations) > 0 ){ ?>
<?php foreach ($locations as $location): ?>
<li>
<a href="<?php echo $locationurl.$location['Location']['id']; ?>">


<div class="listPic"><?php echo $this->Html->image('boss.png', array('class' => 'circleListPic')); ?></div>
<div class="listInfo">
<div class="listName"><?php echo $location['Location']['name']; ?></div>
<div class="listRank"><?php echo $this->Html->image('zerorank1.png', array('class' => 'listRankPicto')); ?></div>
<div class="listviews"><?php echo $this->Html->image('views.png', array('class' => 'listViewsPicto')); ?>200</div>
<div class="listReviews"><?php echo $this->Html->image('like.png', array('class' => 'listViewsPicto')); ?>200</div>
</div>
<div class="listArrow"><?php echo $this->Html->image('go.png', array('class' => 'listArrowPicto')); ?></div>
</a>
</li>


<?php endforeach; 
}else {?>
<div class="no-entry">:( <br><br>Sorry, no Locations available now. We still collecting data</div><?php }?>



</ul>



<ul id='events' class="attributeList">
<?php if(count($events) > 0 ){ ?>
<?php foreach ($events as $event): ?>
<li>
<a href="<?php echo $trainerurl.$trainer['Trainer']['id']; ?>">


<div class="listPic"><?php echo $this->Html->image('boss.png', array('class' => 'circleListPic')); ?></div>
<div class="listInfo">
<div class="listName"><?php echo $event['Event']['name']; ?></div>
<div class="listRank"><?php echo $this->Html->image('zerorank1.png', array('class' => 'listRankPicto')); ?></div>
<div class="listviews"><?php echo $this->Html->image('views.png', array('class' => 'listViewsPicto')); ?>200</div>
<div class="listReviews"><?php echo $this->Html->image('like.png', array('class' => 'listViewsPicto')); ?>200</div>
</div>
<div class="listArrow"><?php echo $this->Html->image('go.png', array('class' => 'listArrowPicto')); ?></div>
</a>
</li>


<?php endforeach; 
}else {?>

<div class="no-entry">:( <br><br>Sorry, no Events available now.</div>

<?php }?>

</ul>


<ul id='stores' class="attributeList">
<?php if(count($stores) > 0 ){ ?>
<?php foreach ($stores as $store): ?>
<li>
<a href="<?php echo $trainerurl.$trainer['Trainer']['id']; ?>">


<div class="listPic"><?php echo $this->Html->image('boss.png', array('class' => 'circleListPic')); ?></div>
<div class="listInfo">
<div class="listName"><?php echo $store['Store']['name']; ?></div>
<div class="listRank"><?php echo $this->Html->image('zerorank1.png', array('class' => 'listRankPicto')); ?></div>
<div class="listviews"><?php echo $this->Html->image('views.png', array('class' => 'listViewsPicto')); ?>200</div>
<div class="listReviews"><?php echo $this->Html->image('like.png', array('class' => 'listViewsPicto')); ?>200</div>
</div>
<div class="listArrow"><?php echo $this->Html->image('go.png', array('class' => 'listArrowPicto')); ?></div>
</a>
</li>


<?php endforeach; 
}else {?>
<div class="no-entry">:( <br><br>Sorry, no Stores available now. We still collecting data</div>
<?php }?>



</ul>

</div>