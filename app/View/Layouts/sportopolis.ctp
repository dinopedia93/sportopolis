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

		// JavaScripts
		echo $this->Html->script('jquery');
		echo $this->Html->script('jquery.popupoverlay');
		echo $this->Html->script('countries');
		echo $this->Html->script('DropDownMenu');

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
<div class="signupPictoDesc">Sign up as a trainer. You can</div></a>
</li>

<li><a href="#">
<?php echo $this->Html->image('locationSignUp.png'); ?>
<div class="signupPictoText">Sport Location</div>
<div class="signupPictoDesc">Sign up as a sport location. You can</div></a>
</li>

<li><a href="#">
<?php echo $this->Html->image('storeSignUp.png'); ?>
<div class="signupPictoText">Sport Store</div>
<div class="signupPictoDesc">Sign up as a sport store. You can</div></a>
</li>

<li><a href="#">
<?php echo $this->Html->image('ArticleSignUP.png'); ?>
<div class="signupPictoText">Writer</div>
<div class="signupPictoDesc">Sign up as a writer. You can</div></a>
</li>

</ul>
</div>
<div class="signIn">Sign In</div>

</div>

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
	
		<div class="wrapper">


<div class="header-wrapper">
<div class="header-navigation">

<div class="mobile-menu-icon">
<?php echo $this->Html->image('menu.png')?>
</div>

<div class="logo">
<div class="logo-link">
<a href="#"><?php echo $this->Html->image('logo2.png', array('class' => 'logo-pic'))?></a>
</div>
</div>

<div class="desktop-nav">
<div class="dropDownHook">
    <span>Open Dropdown</span>
    <div class="dropDownContent">
        <ul>
<li>Sports</li>
<li><a href="#">Fitness</a></li>
<li><a href="#">Football</a></li>
<li><a href="#">Fishing</a></li>
<li><a href="#">Tennis</a></li>
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
	
<div class="popup">

<a class="initialism fade_open btn btn-success" href="#fade">SIGN UP</a>

</div>
	

	
	
</div>



<!-- mobile navigation menu

Note: when i click the menu icon in the mobile version, this ul should appear

<div class="mobile-nav-wrapper">
<ul>
<li>Sports</li>
<li><a href="#">Fitness</a></li>
<li><a href="#">Football</a></li>
<li><a href="#">Fishing</a></li>
<li><a href="#">Tennis</a></li>
</ul>
</div>


-->


</div>

</div>


<div class="container">

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
