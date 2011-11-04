<div class="admin-top_links"><?php echo Html::anchor('admin', 'Dashboard').' | '.Html::anchor('admin/background/manage', 'Manage Backgrounds'); ?></div>

				<div id="tupper-admin-background-manage">
					<?php echo Form::open(array('enctype'=>'multipart/form-data')); ?>
					<div class="form-row">
						<div class="form-label">Title</div>
						<div class="form-input"><?php echo Form::input(array('name'=>'b_title', 'value'=>$background['b_title'])); ?></div>
					</div>

					<div class="form-row">
						<div class="form-label">URL</div>
						<div class="form-input"><?php echo Form::input(array('name'=>'b_path', 'value'=>'/'.$background['b_path'])); ?></div>
					</div>

					<div class="form-row">
						<div class="form-label">Image</div>
						<div class="form-input"><?php echo Form::file(array('name'=>'b_filename')); ?></div>
						<?php if (isset($background)) { echo 'Current Image: '.$background['b_filename']; } ?>
					</div>

					<div class="form-row">
						<div class="form-input"><?php echo Form::button(array('value'=>'Upload')); ?></div>
					</div>

					<?php echo Form::close(); ?>

				</div>
