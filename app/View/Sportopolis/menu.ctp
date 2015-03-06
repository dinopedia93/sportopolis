<script type="text/javascript">
	$(document).ready(function() {
    $('#locations').hide();
    $('#trainers').show();
    $('.locationPicto').click(function() {
        $('#locations').show();
        $('#trainers').hide();
    });
    $('.trainerPicto').click(function() {
        $('#locations').hide();
        $('#trainers').show();
    });
});
</script>
<?php $url = " http://localhost/sportopolis/sportopolis/profile/" ?>
<div class="desktop-menu">

<div class="leftListHeader">

<div class="leftListHeaderTitle">Sport Name</div>
</div>

<ul class="sportList">

<li class="eventPicto">Articles</li>
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

<li>
<select class="filter-select" name ="district" id ="district"></select>
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


<ul id='trainers' class="attributeList">
<?php foreach ($trainers as $trainer): ?>
<li>
<a href="<?php echo $url.$trainer['Trainer']['id']; ?>">


<div class="listPic"><?php echo $this->Html->image('boss.png', array('class' => 'circleListPic')); ?></div>
<div class="listInfo">
<div class="listName"><?php echo $trainer['Trainer']['name']; ?></div>
<div class="listRank"><?php echo $this->Html->image('zerorank1.png', array('class' => 'listRankPicto')); ?></div>
<div class="listviews"><?php echo $this->Html->image('views.png', array('class' => 'listViewsPicto')); ?>200</div>
<div class="listReviews"><?php echo $this->Html->image('like.png', array('class' => 'listViewsPicto')); ?>200</div>
</div>
<div class="listArrow"><?php echo $this->Html->image('go.png', array('class' => 'listArrowPicto')); ?></div>
</a>
</li>


<?php endforeach; ?>



</ul>

<ul id='locations' class="attributeList">
<?php foreach ($locations as $location): ?>
<li>
<a href="<?php echo $url.$trainer['Trainer']['id']; ?>">


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


<?php endforeach; ?>



</ul>


</div>