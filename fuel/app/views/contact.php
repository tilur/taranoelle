<div id="tupper-contact">
	<?php if (isset($errors)) { ?>
	<?php foreach ($errors AS $key => $errMessage) { ?>
	<div class="err"><?php echo $errMessage; ?></div>
	<?php } ?>
	<br>
	<?php } ?>

	e: <?php echo Html::mail_to_safe('info@taranoellephotography.com', 'info@taranoellephotography.com', 'Information Inquiry'); ?><br>
	p: 647.987.9181<br><br>

	<?php echo Form::open(); ?>
	<div class="form-row">
		<div class="form-label">Your Name <span class="red bold">*</span></div>
		<div class="form-input"><?php echo Form::input('name', (isset($input['name']) ? $input['name'] : '')); ?></div>
	</div>

	<div class="form-row">
		<div class="form-label">Your Email <span class="red bold">*</span></div>
		<div class="form-input"><?php echo Form::input('email', (isset($input['email']) ? $input['email'] : '')); ?></div>
	</div>

	<div class="form-row">
		<div class="form-label">Your Phone Number <span class="red bold">*</span></div>
		<div class="form-input"><?php echo Form::input('phone', (isset($input['phone']) ? $input['phone'] : '')); ?></div>
	</div>

	<div class="form-row">
		<div class="form-label">How did you hear about Tara Noelle <span class="red bold">*</span></div>
		<div class="form-input"><?php echo Form::textarea('howHeard', (isset($input['howHeard']) ? $input['howHeard'] : '')); ?></div>
	</div>

	<div class="form-row">
		<div class="form-label">Details of Inquiry <span class="red bold">*</span></div>
		<div class="form-input"><?php echo Form::textarea('details', (isset($input['details']) ? $input['details'] : '')); ?></div>
	</div>

	<div class="form-row">
		<div class="form-input"><?php echo Form::button(array('value'=>'Submit')); ?></div>
	</div>

	<div class="form-row">
		<div class="form-label"><span class="red bold">*</span><span class="red">Required</span></div>
	</div>

	<?php echo Form::close(); ?>
</div>
