<div class = "articles form">
<?php echo $this->Form->create('Article'); ?>
	<fieldset>
		<legend>Register</legend>
		<?php
			echo $this->Form->input('title');
			echo $this->Form->input('article_content');
			$options=array('1'=>'Football','2'=>'Cycling','3'=>'Tennis','4'=>'Fitness','5'=>'Fishing');
			$attributes=array('legend'=>false);
			echo $this->Form->radio('sports_id',$options,$attributes);
		?>
	</fieldset>
	
<?php echo $this->Form->end('Submit');?>
</div>