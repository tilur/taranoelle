<div class="admin-top_links"><?php echo Html::anchor('admin', 'Dashboard').' | '.Html::anchor('admin/galleries/add', 'Add New Gallery'); ?></div>
				<div id="tupper-admin-galleries-manage">
<?php foreach ($galleries AS $category => $mt) {
	if ($category == 'gallery_count') { continue; }
	?>

					<div class="gallery-catgegory"><?php echo $category; ?></div>
<?php foreach ($galleries[$category] AS $i => $gallery) { ?>
					<div class="gallery-row">
						<div class="gallery-name"><?php echo Html::anchor('admin/galleries/edit/'.$gallery['g_gallery_id'], $gallery['g_name']); ?></div>
						<div class="gallery-links">
							<?php echo Html::anchor($gallery['g_path'], Asset::img('icon_view.png'), array('target'=>'_blank')); ?>
							
							<?php //echo Asset::img('icon_delete.png', array('onClick'=>'galleries_delete('.$gallery['g_gallery_id'].');')); ?>
							<?php echo Asset::img('icon_delete.png', array('onClick'=>'deleteObject(\'gallery\', \'/admin/galleries/delete\', \'g_gallery_id='.$gallery['g_gallery_id'].'&type=gallery\', \''.htmlentities('<br><br><span class="bold red">Note:</span> All images in this gallery will be deleted as well.').'\');')); ?>

						</div>
					</div>
<?php } ?>
<?php } ?>
				</div>
