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

		echo $this->Html->css('skeleton');
		echo $this->Html->css('LargeSkeleton');
		echo $this->Html->css('mobileskeleton');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	
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
	<ul class="nav-ul"> 
	
	<li class="nav-li">
	<a class="nav-li-a" href="#">Sports</a>
	</li>
	
	<li class="nav-li">
	<a class="nav-li-a" href="#">Events</a>
	</li>	

	</ul>
	
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
</div>
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
