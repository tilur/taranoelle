<?php foreach ($galleries AS $category => $mt) { ?>
<div class="gallery-catgegory"><?php echo $category; ?></div>
<?php foreach ($galleries[$category] AS $i => $gallery) { ?>
<div class="gallery-row">
  <div class="gallery-name"><?php echo Html::anchor($gallery['g_path'], $gallery['g_name']); ?></div>
</div>
<?php } ?>
<?php } ?> 
