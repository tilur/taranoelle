<div class="admin-top_links"><?php echo Html::anchor('admin', 'Dashboard').' | '.Html::anchor('admin/background/add', 'Add New Background'); ?></div>

<?php foreach ($backgrounds AS $i => $background) { ?>
<div class="list-row">
	<div class="admin-background-title"><?php echo $background['b_title']; ?></div>
	<div class="admin-background-path">URL: <?php echo Html::anchor($background['b_path'], '/'.$background['b_path']); ?></div>
	<div class="admin-background-thumbnail"><?php echo Html::anchor('admin/background/edit/'.$background['b_background_id'], Asset::img('backgrounds/'.$background['b_no_extension'].'-thumbnail.jpg')); ?></div>
</div>
<?php } ?>