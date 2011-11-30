<div class="admin-top_links"><?php echo Html::anchor('admin', 'Dashboard').' | '.Html::anchor('admin/users/manage', 'Manage Users'); ?></div>

				<?php echo Form::open(array('enctype'=>'multipart/form-data')); ?>
				<div id="tupper-admin-content-manage">
<?php echo Form::hidden('u_user_id', $user['u_user_id']); ?>
					<div class="form-row">
						<div class="form-label">Username</div>
						<div class="form-input"><?php echo Form::input('u_username', $user['u_username']); ?></div>
					</div>

					<div class="form-row">
						<div class="form-label">Full Name</div>
						<div class="form-input"><?php echo Form::input('u_fullname', $user['u_fullname']); ?></div>
					</div>

					<div class="form-row">
						<div class="form-label">Password</div>
						<div class="form-input"><?php echo Form::password('u_password', $user['u_password']); ?></div>
					</div>

				</div>

				<div class="form-row">
					<div class="form-input"><?php echo Form::button(array('value'=>'Save')); ?></div>
				</div>
				<?php echo Form::close(); ?>
