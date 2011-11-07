<?php
	$class = ' first';
	foreach ($galleries AS $category => $mt) {
		if ($category == 'gallery_count') { continue; } ?>

				<div class="gallery-category<?php echo $class; ?>"><?php echo $category; ?></div>
<?php foreach ($galleries[$category] AS $i => $gallery) { ?>
				<div class="gallery-row">
					<div class="gallery-name"><?php echo Html::anchor($gallery['g_path'], $gallery['g_name']); ?></div>
				</div>
<?php }
			$class = '';
				?>
<?php } ?> 