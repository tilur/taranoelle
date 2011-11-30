<div class="admin-top_links"><?php echo Html::anchor('admin', 'Dashboard').' | '.Html::anchor('admin/background/add', 'Add New Background'); ?></div>

<?php foreach ($backgrounds AS $i => $background) { ?>
<div class="gallery-preview-row">
	<div class="admin-background-title"><?php echo $background['b_title']; ?></div>
	<div class="admin-background-thumbnail"><?php echo Html::anchor('admin/background/edit/'.$background['b_background_id'], Asset::img('backgrounds/'.$background['b_filename'].'-thumbnail.jpg')); ?></div>
	<div class="admin-background-path">URL: <?php echo Html::anchor($background['b_path'], '/'.$background['b_path'], array('target'=>'_blank', 'title'=>'Open this URL in a new window')); ?></div>

							<div class="admin-background-details">
								Filename:<br><?php echo $background['b_filename']; ?><br><br>
								Date Added:<br><?php echo date("F d, Y", strtotime($background['b_date_added'])); ?><br><br>
								<?php echo Asset::img('icon_delete.png', array('onClick'=>'deleteObject(\'background\', \'/admin/background/delete\', \'b_background_id='.$background['b_background_id'].'\');', 'title'=>'Delete this background')); ?>

							</div>

</div>
<?php } ?>