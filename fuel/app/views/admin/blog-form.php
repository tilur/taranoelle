<script type="text/javascript" src="/assets/plugins/ckeditor/ckeditor.js"></script>

				<div class="admin-top_links"><?php echo Html::anchor('admin', 'Dashboard').' | '.Html::anchor('admin/blog/manage', 'Manage Blogs'); ?></div>

				<?php echo Form::open(array('enctype'=>'multipart/form-data')); ?>
				<div id="tupper-admin-content-manage">
					<?php echo Form::hidden('b_blog_id', $blog['b_blog_id']); ?>

					<div class="form-row">
						<div class="form-label">Title</div>
						<div class="form-input"><?php echo Form::input('b_title', html_entity_decode($blog['b_title'])); ?></div>
					</div>

					<div class="form-row">
						<div class="form-label">Body</div>
						<div class="form-input"><?php echo Form::textarea('b_body', html_entity_decode(str_replace('&nbsp;', ' ', $blog['b_body']))); ?></div>
					</div>

					<div class="form-row">
						<div class="form-label">Path</div>
						<div class="form-input">blog/<?php echo Form::input('b_path', preg_replace('/^blog\//', '', $blog['b_path'])); ?></div>
					</div>

				</div>

				<div class="form-row">
					<div class="form-input"><?php echo Form::button(array('value'=>'Save')); ?></div>
				</div>
				<?php echo Form::close(); ?>

				<script>CKEDITOR.replace('form_b_body');</script>