<div id="tupper-login">
	<div class="page-title">login</div>

	<?php if (isset($errLogin)) { ?>
	<div class="err"><?php echo Session::get_flash('errLogin'); ?></div>
	<?php } ?>

	<?php echo Form::open(); ?>
	<div class="form-row">
		<div class="form-label">Username</div>
		<div class="form-input"><?php echo Form::input(array('name'=>'username')); ?></div>
	</div>

	<div class="form-row">
		<div class="form-label">Password</div>
		<div class="form-input"><?php echo Form::password(array('name'=>'password')); ?></div>
	</div>

	<div class="form-row">
		<div class="form-input"><?php echo Form::button(array('value'=>'Login')); ?></div>
	</div>
	<?php echo Form::close(); ?>
</div>
