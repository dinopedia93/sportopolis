<div class = "trainers form">
<?php echo $this->Form->create('Trainer'); ?>
	<fieldset>
		<legend>Register</legend>
		
		<div class="info-detail2">


		<select class="select-country" id="country" name ="data[Trainer][country]" placeholder="Egypt"></select>
		<select class="select-city" name ="data[Trainer][city]" id ="city"></select>

		<script language="javascript">
		populateCountries("country", "city");
		 </script>

		</div>

		<?php
			echo $this->Form->input('working_area');
			echo $this->Form->input('facebook');
			echo $this->Form->input('mobile');
			echo $this->Form->input('website');
			echo $this->Form->input('biography');
			$options=array('1'=>'Football','2'=>'Cycling','3'=>'Tennis','4'=>'Fitness','5'=>'Fishing');
			$attributes=array('legend'=>false);
			echo $this->Form->radio('sports_id',$options,$attributes);
		?>
	</fieldset>
	
<?php echo $this->Form->end('Update my data');?>
</div>