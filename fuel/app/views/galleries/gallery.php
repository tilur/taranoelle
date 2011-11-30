<div id="gallery-shade"></div>
				<div id="gallery-name"><?php echo $gallery['g_name']; ?></div>
				<div id="gallery-loader"><div class="animation"></div>Loading Image... Please Wait</div>
				<div id="gallery-control">Toggle Fullscreen</div>
				<div id="gallery-thumbnails">
<?php
foreach ($gallery['images'] AS $i => $image) {
	$click = $gallery['g_gallery_id'].'/'.$image['gi_filename'];
	if ($i === 0) { $first = $click; }
	if (isset($load_image) && $load_image-1 == $i) { $first = $click; }
	echo '					'.Asset::img('galleries/'.$gallery['g_gallery_id'].'/'.$image['gi_filename'].'-scroller.jpg', array('onClick'=>'load_bg_image(\''.$click.'\');')).'<br>'."\n";
}
?>
				</div>
				<script>
					$('#gallery-thumbnails').css('height', function() {
						return $('#gallery-thumbnails').height() - 37;
					});
					$('#gallery-control').bind('click', toggle_interface);

					<?php if (!empty($first)) { ?>
					load_bg_image('<?php echo $first; ?>');
					<?php } ?>
				</script>