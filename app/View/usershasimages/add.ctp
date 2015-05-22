<script type="text/javascript">
$(document).ready(function(){
	tinymce.init({
    selector: "textarea"
 });
})
</script>
<div class = "images form">
<?php echo $this->Form->create('UsersHasImage', array('type'=>'file')); ?>
	<fieldset>
		<legend>Register</legend>
		<?php
			echo $this->Form->input('Image.filename',array('type' => 'file'));
		?>
	</fieldset>
	
<?php echo $this->Form->submit('Upload photo')?>
</div>