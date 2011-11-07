Here <?php echo $grammar1; ?> the galler<?php echo $grammar2; ?> setup for you to look at your photos:<br><br>

<?php foreach ($galleries AS $category => $mt) {
	if ($category == 'gallery_count') { continue; }

	foreach ($galleries[$category] AS $i => $gallery) { ?>
				<div class="gallery-row">
					<div class="gallery-name"><?php echo Html::anchor($gallery['g_path'], $gallery['g_name']); ?></div>
				</div>
	<?php }
} ?>