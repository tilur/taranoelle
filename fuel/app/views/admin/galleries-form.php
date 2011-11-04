<div class="admin-top_links"><?php echo Html::anchor('admin', 'Dashboard').' | '.Html::anchor('admin/galleries/manage', 'Manage Galleries'); ?></div>

				<?php echo Form::open(array('enctype'=>'multipart/form-data')); ?>
				<div id="tupper-admin-galleries-manage">
					<div class="tab-row">
						<div id="tab-info" class="tab active">Gallery Info</div>
						<div id="tab-add_images" class="tab">Add Images</div>
						<div id="tab-images" class="tab">Images</div>
					</div>
					<div id="tab-content-info" class="tab-content">
<?php echo Form::hidden('g_gallery_id', $gallery['g_gallery_id']); ?>
						<div class="form-row">
							<div class="form-label">Category</div>
							<div class="form-input"><?php echo Form::input('g_category', $gallery['g_category']); ?></div>
						</div>

						<div class="form-row">
							<div class="form-label">Title</div>
							<div class="form-input"><?php echo Form::input('g_name', $gallery['g_name']); ?></div>
						</div>

						<div class="form-row">
							<div class="form-label">Description</div>
							<div class="form-input"><?php echo Form::textarea('g_description', $gallery['g_description']); ?></div>
						</div>

						<div class="form-row">
							<div class="form-label">User Access</div>
							<div class="form-input"><?php echo Form::select('g_allowed_users[]', explode(',', $gallery['g_allowed_users']), $users, array('multiple'=>'true')); ?></div>
						</div>
					</div>
					<div id="tab-content-add_images" class="tab-content">
						<div class="form-row">
							<div class="form-label">Photo Upload #1</div>
							<div class="form-input"><?php echo Form::file('image1'); ?></div>
						</div>

						<div class="form-row">
							<div class="form-label">Photo Upload #2</div>
							<div class="form-input"><?php echo Form::file('image2'); ?></div>
						</div>

						<div class="form-row">
							<div class="form-label">Due to the size of the original images, uploading more than two at a time would be detrimental to your patience... As well as the server load. Sorry.</div>
						</div>
					</div>

					<div id="tab-content-images" class="tab-content">
					<?php foreach ($gallery['images'] AS $i => $image) {?>
						<div class="gallery-preview-row">
							<?php echo Asset::img('galleries/'.$image['gi_gallery_id'].'/'.$image['gi_filename'].'-thumbnail.jpg'); ?>
							<div class="details">
								Filename:<br><?php echo $image['gi_filename']; ?><br><br>
								Date Added:<br><?php echo date("F d, Y", strtotime($image['gi_date_added'])); ?><br><br>
								<?php echo Asset::img('icon_delete.png'); ?>
							</div>
						</div>
					<?php } ?>
					</div>
				</div>

				<div class="form-row">
					<div class="form-input"><?php echo Form::button(array('value'=>'Save')); ?></div>
				</div>
				<?php echo Form::close(); ?>


				<script>
					$('#tab-info').bind('click', function() { 
						$('#tab-content-add_images').hide();
						$('#tab-content-images').hide();
						$('#tab-content-info').show();
						$('#tab-add_images').removeClass('active');
						$('#tab-images').removeClass('active');
						$('#tab-info').addClass('active');
					});
					$('#tab-add_images').bind('click', function() { 
						$('#tab-content-info').hide();
						$('#tab-content-images').hide();
						$('#tab-content-add_images').show();
						$('#tab-info').removeClass('active');
						$('#tab-images').removeClass('active');
						$('#tab-add_images').addClass('active');
					});
					$('#tab-images').bind('click', function() {
						$('#tab-content-info').hide();
						$('#tab-content-add_images').hide();
						$('#tab-content-images').show();
						$('#tab-info').removeClass('active');
						$('#tab-add_images').removeClass('active');
						$('#tab-images').addClass('active');
					});
					$('#tab-content-images').hide();
					$('#tab-content-add_images').hide();
				</script>
