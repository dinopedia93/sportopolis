<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php //echo $cakeDescription ?>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		// CSS files
		echo $this->Html->css('skeleton');
		echo $this->Html->css('LargeSkeleton');
		echo $this->Html->css('mobileskeleton');
		echo $this->Html->css('DropDownMenu');
		echo $this->Html->css('sliding-menu');
		echo $this->Html->css('barrating');

		// JavaScripts
		echo $this->Html->script('jquery');
		echo $this->Html->script('jquery.popupoverlay');
		echo $this->Html->script('countries');
		echo $this->Html->script('DropDownMenu');
		echo $this->Html->script('sliding-menu');
		echo $this->Html->script('jquery.barrating');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	
	

	
</head>
<body>


<!-- Sign up Modal -->






<!-- Fade -->

<div id="fade" class="signupDiv">
<div class="signupDivTitle">SIGN UP</div>

<div class="signupMidDiv">
<ul>
<li><a href="/sportopolis/sportopolis/signuptrainer">
<?php echo $this->Html->image('TrainerSignUp.png'); ?>
<div class="signupPictoText">Trainer</div>
<div class="signupPictoDesc">Sign up as a trainer.</div></a>
</li>

<li><a href="#">
<?php echo $this->Html->image('locationSignUp.png'); ?>
<div class="signupPictoText">Sport Location</div>
<div class="signupPictoDesc">Sign up as a sport location.</div></a>
</li>

<li><a href="#">
<?php echo $this->Html->image('storeSignUp.png'); ?>
<div class="signupPictoText">Sport Store</div>
<div class="signupPictoDesc">Sign up as a sport store.</div></a>
</li>

<li><a href="#">
<?php echo $this->Html->image('ArticleSignUP.png'); ?>
<div class="signupPictoText">Normal User</div>
<div class="signupPictoDesc">Sign up as a writer.</div></a>
</li>

</ul>
</div>
</div>


<!--
<div id="fade2" class="signupDiv">
<div class="signupDivTitle">Login</div>


</ul>
</div>
</div>
-->



<script>
$(document).ready(function () {
	$.fn.popup.defaults.pagecontainer = '.popup'
    $('#fade').popup({
      transition: 'all 0.3s',
      scrolllock: true
    });

});


</script>

<!-- Sign up Modal -->
<div id="sliding-menu" class="mobile-nav-wrapper">
<ul>
<a href=""><li>Sports</li></a>
<a href=""><li>Cycling</li></a>
<a href=""><li>Tennis</li></a>
<a href=""><li>Fitness</li></a>
<a href=""><li>Fishing</li></a>
</ul>


</div>
	
		<div id="content" class="wrapper">


<div class="header-wrapper">
<div class="header-navigation">

<div id="toggle-button" class="mobile-menu-icon">
<?php echo $this->Html->image('menu.png')?>
</div>

<div class="logo">
<div class="logo-link">
<a href="#"><?php echo $this->Html->image('logo2.png', array('class' => 'logo-pic'))?></a>
</div>
</div>

<div class="desktop-nav">
<div class="dropDownHook">
<span>Sports</span>
<div class="dropDownContent">
<ul class="dropDownUl">
<li class="cyclingLink"><a href="#"></a></li>
<li class="tennisLink"><a href="#"></a></li>
<li class="fitnessLink"><a href="#"></a></li>
<li class="fishingLink"><a href="#"></a></li>

</ul>
    </div>
</div>
	
	<div class="account">
	<div class="accountPhoto"><?php echo $this->Html->image('boss.png', array('class' => 'circlePhoto')); ?></div>
	
	<ul class="accountMenu">
					
	<li><a class="accountName"  onmouseover="mopen('m3')" onmouseout="mclosetime()">Hisham Ahmed</a>
	<div id="m3" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
	<a href="#">Sign Out</a>						
	</div>
	</li>
    </ul>

	</div>
	

	
<div class="popup-signup">
<a class="initialism fade_open btn btn-success">SIGN UP</a>
</div>

	<div class="popup-Login">
<a class="initialism btn btn-success" href='/sportopolis/sportopolis/signin'>LOGIN</a>
</div>

	
	
</div>



<!-- mobile navigation menu

Note: when i click the menu icon in the mobile version, this ul should appear
-->






</div>

</div>


<div  class="container">

		<div class="content-wrapper">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		
		
		</div>
		</div>
		
			<div class="footer-wrapper">

			<div class="footer-container">

			<div class="sponsor-container"></div>

			<div class="copyrights">Copyright © 2015 SPORTOYA. All rights reserved</div>

			<div class="site-map">

			<ul>

			<li><a href="#">Home</a></li>
			<li><a href="#">About-us</a></li>
			<li><a href="#">Contact-us</a></li>


			</ul>

			</div>


			</div>
		</div>
		 
	</div> 
	<?php //echo $this->element('sql_dump'); ?>
	
	
</body>
</html>
