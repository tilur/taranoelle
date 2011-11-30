<div class="admin-top_links"><?php echo Html::anchor('admin', 'Dashboard').' | '.Html::anchor('admin/links/manage', 'Manage Links'); ?></div>

				<?php echo Form::open(array('enctype'=>'multipart/form-data')); ?>
				<div id="tupper-admin-content-manage">
<?php echo Form::hidden('l_link_id', $link['l_link_id']); ?>
					<div class="form-row">
						<div class="form-label">Category</div>
						<div class="form-input"><?php echo Form::input('l_category', html_entity_decode($link['l_category'])); ?></div>
					</div>

					<div class="form-row">
						<div class="form-label">URL</div>
						<div class="form-input">http://<?php echo Form::input('l_url', $link['l_url']); ?></div>
					</div>

				</div>

				<div class="form-row">
					<div class="form-input"><?php echo Form::button(array('value'=>'Save')); ?></div>
				</div>
				<?php echo Form::close(); ?>
