<div class="admin-top_links"><?php echo Html::anchor('admin', 'Dashboard').' | '.Html::anchor('admin/content/manage', 'Manage Content'); ?></div>

				<?php echo Form::open(array('enctype'=>'multipart/form-data')); ?>
				<div id="tupper-admin-content-manage">
<?php echo Form::hidden('c_content_id', $content['c_content_id']); ?>
					<div class="form-row">
						<div class="form-label">Title</div>
						<div class="form-input"><?php echo Form::input('c_title', $content['c_title']); ?></div>
					</div>

					<div class="form-row">
						<div class="form-label">Body</div>
						<div class="form-input"><?php echo Form::textarea('c_body', str_replace('<br>', "\n", html_entity_decode($content['c_body']))); ?></div>
					</div>

					<div class="form-row">
						<div class="form-label">Path</div>
						<div class="form-input"><?php echo Form::input('c_path', $content['c_path']); ?></div>
					</div>

				</div>

				<div class="form-row">
					<div class="form-input"><?php echo Form::button(array('value'=>'Save')); ?></div>
				</div>
				<?php echo Form::close(); ?>