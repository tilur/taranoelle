<div class="admin-top_links"><?php echo Html::anchor('admin', 'Dashboard').' | '.Html::anchor('admin/galleries/add', 'Add New Gallery'); ?></div>

<?php foreach ($galleries AS $category => $mt) { ?>
<div class="gallery-catgegory"><?php echo $category; ?></div>
<?php foreach ($galleries[$category] AS $i => $gallery) { ?>
<div class="gallery-row">
  <div class="gallery-name"><?php echo Html::anchor('admin/galleries/edit/'.$gallery['g_gallery_id'], $gallery['g_name']); ?></div>
</div>
<?php } ?>
<?php } ?> 
