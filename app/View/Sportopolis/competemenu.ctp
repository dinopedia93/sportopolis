<script type="text/javascript">
	$(document).ready(function() {		
    $('#articles').show();
    $('#locations').hide();
    $('#trainers').hide();
    $('#events').hide();
    $('#stores').hide();
    $('.locationPicto').click(function() {
        activateDiv(".locationPicto");

        $('#locations').show();
        $('#trainers').hide();
        $('#articles').hide();
        $('#events').hide();
        $('#stores').hide();
    });
    $('.trainerPicto').click(function() {
        activateDiv(".trainerPicto");

        $('#trainers').show();
        $('#locations').hide();
        $('#articles').hide();
        $('#events').hide();
        $('#stores').hide();
    });
    $('.articlePicto').click(function() {
        activateDiv('.articlePicto');

        $('#articles').show();
        $('#locations').hide();
        $('#trainers').hide();
        $('#events').hide();
        $('#stores').hide();
    });
    $('.eventPicto').click(function() {
        activateDiv('.eventPicto');

        $('#events').show();
        $('#locations').hide();
        $('#trainers').hide();
        $('#articles').hide();
        $('#stores').hide();
    });
     $('.storesPicto').click(function() {
        activateDiv('.storesPicto');

        $('#stores').show();
        $('#locations').hide();
        $('#trainers').hide();
        $('#articles').hide();
        $('#events').hide();
    });

     $('.dropMenu-list-head').on('change', function() {
       if( $( ".dropMenu-list-head option:selected" ).text() == "Locations" )
       {
            $('#locations').show();
            $('#trainers').hide();
            $('#articles').hide();
            $('#events').hide();
            $('#stores').hide();
       }
       else if ( $( ".dropMenu-list-head option:selected" ).text() == "Trainers" )
       {
            $('#trainers').show();
            $('#locations').hide();
            $('#articles').hide();
            $('#events').hide();
            $('#stores').hide();
       }
       else if (  $( ".dropMenu-list-head option:selected" ).text() == "Articles" ) 
       {
            $('#articles').show();
            $('#locations').hide();
            $('#trainers').hide();
            $('#events').hide();
            $('#stores').hide();
       }
       else if( $( ".dropMenu-list-head option:selected" ).text() == "Stores" )
       {
            $('#stores').show();
            $('#locations').hide();
            $('#trainers').hide();
            $('#articles').hide();
            $('#events').hide();
       }
       else if(  $( ".dropMenu-list-head option:selected" ).text() == "Events"  )
       {
            $('#events').show();
            $('#locations').hide();
            $('#trainers').hide();
            $('#articles').hide();
            $('#stores').hide();
       }
    });


    function activateDiv(divname)
    {
        var divs = [".locationPicto", ".trainerPicto", ".articlePicto" , ".eventPicto" , ".storesPicto"];

        $(divname).css('color','#f26522');
        $(divname).css('background-color','#fff2ee');
        $(divname).css('border-right','3px solid #f26522');
        if(divname == ".articlePicto")
            $(divname).css('background-image','url("../img/pen.png")');
        else if(divname == ".storesPicto")
            $(divname).css('background-image','url("../img/cart2.png")');
        else if(divname == ".eventPicto")
            $(divname).css('background-image','url("../img/event2.png")');
        else if(divname == ".trainerPicto")
            $(divname).css('background-image','url("../img/coach2.png")');
        else if(divname == ".locationPicto")
            $(divname).css('background-image','url("../img/map2.png")');

        for (var i = 0; i < divs.length; i++) {

            if(divs[i] != divname)
            {
                $(divs[i]).css('color','#808080');
                $(divs[i]).css('background-color','white');
                $(divs[i]).css('border-right','3px solid white');
                if(divs[i] == ".articlePicto")
                    $(divs[i]).css('background-image','url("../img/pen2.png")');
                else if(divs[i] == ".storesPicto")
                    $(divs[i]).css('background-image','url("../img/cart.png")');
                else if(divs[i] == ".eventPicto")
                    $(divs[i]).css('background-image','url("../img/event.png")');
                else if(divs[i] == ".trainerPicto")
                    $(divs[i]).css('background-image','url("../img/coach.png")');
                else if(divs[i] == ".locationPicto")
                    $(divs[i]).css('background-image','url("../img/map.png")');
            }
        };

    }


});
</script>
<?php $trainerurl = "http://localhost/sportopolis/sportopolis/trainerprofile/" ?>
<?php $locationurl = "http://localhost/sportopolis/sportopolis/locationprofile/" ?>
<?php $storeurl = "http://localhost/sportopolis/sportopolis/storeprofile/" ?>
<?php $articleurl = "http://localhost/sportopolis/sportopolis/viewarticle/" ?>

<div class="desktop-menu">

<div class="leftListHeader">

<div class="leftListHeaderTitle">Competitions</div>
</div>

<ul class="sportList">
<li class="trainerPicto">Pending</li>
<li class="locationPicto">Results</li>
<li class="storesPicto">Invitations</li>
<li class="eventPicto">My Competitions</li>

</ul>


<ul class="menu-filter-in2">

<li class="menu-filter-in-li1">Filter by sports</li>

<!--Should be set by default to current location-->

<li>
<select class="filter-select">
    <option>All</option>
    <option>Football</option>
    <option>Tennis</option>
    <option>Cycling</option>
</select>
</li>

</ul>

<a class="createcompetition" href="/sportopolis/sportopolis/createcompetition">+ Create</a>

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
<!--<input class="textarea-search-menu" value="" name="searchwords" type='text' placeholder='Search in trainers...'/>-->
<form name="searching" method="POST" action="#">
      <input class="textarea-search-menu" name="" type="text" placeholder='Search in Competitions...' value="">
</form>





</div>


<ul id='articles' class="attributeList">
<?php if(count($articles) > 0){ ?>
<?php foreach ($articles as $article): ?>
<li>
<a href="<?php echo $articleurl.$article['Article']['id']; ?>">


<div class="listPic"><?php echo $this->Html->image('boss.png', array('class' => 'circleListPic')); ?></div>
<div class="listInfo">
<div class="listName"><?php echo $article['Article']['title']; ?></div>
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
<a href="<?php echo $trainerurl.$trainer['trainers']['id']; ?>">

<div class="listPic"><?php echo $this->Html->image('boss.png', array('class' => 'circleListPic')); ?></div>
<div class="listInfo">
<div class="listName"><?php echo $trainer['users']['first_name']." ".$trainer['users']['last_name']; ?></div>
<div class="listRank">Egypt, Cairo</div>
<div class="listviews"><?php echo $this->Html->image('views.png', array('class' => 'listViewsPicto')); ?><?php echo $trainer['trainers']['views']; ?></div>
<div class="listReviews"><?php echo $this->Html->image('rating.png', array('class' => 'listViewsPicto')); ?>4.8</div>
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
<div class="listRank">Egypt, Cairo</div>
<div class="listviews"><?php echo $this->Html->image('views.png', array('class' => 'listViewsPicto')); ?>200</div>
<div class="listReviews"><?php echo $this->Html->image('rating.png', array('class' => 'listViewsPicto')); ?>200</div>
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