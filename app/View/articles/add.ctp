<div class = "articles form">
<?php echo $this->Form->create('Article'); ?>
	<fieldset>
		<legend>Register</legend>
		<?php
			echo $this->Form->input('title');
			echo $this->Form->input('article_content');
			$options=array('1'=>'Football','2'=>'Cycling','3'=>'Tennis','4'=>'Fitness','5'=>'Fishing');
			$attributes=array('legend'=>false);
			echo $this->Form->radio('sport_id',$options,$attributes);
		?>
	</fieldset>
	
<?php echo $this->Form->submit('Save Article', array('name'=>'btn1'))?>
<?php echo $this->Form->submit('Publish Article', array('name'=>'btn2'))?>
</div>