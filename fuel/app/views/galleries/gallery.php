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
	echo '					'.Asset::img('galleries/'.$gallery['g_gallery_id'].'/'.$image['gi_filename'].'-scroller.jpg', array('onClick'=>'gallery_load_image(\''.$click.'\');')).'<br>'."\n";
}
?>
				</div>
				<script>
					$('#gallery-thumbnails').css('height', function() {
						return $('#gallery-thumbnails').height() - 37;
					});
					$('#gallery-control').bind('click', function() {
						var timeout = 240;

						if (parseInt($('#gallery-control').css('top'), 10) > 0) {
							$('#tupper-header').animate({ top: '-=36' }, timeout);
							$('#gallery-name').animate({ top: '-=36' }, timeout);
							$('#gallery-control').animate({ top: '-=36', left: '-=172' }, timeout, function() {
								$('#gallery-control').addClass('on');
							});
							$('#inner-user-info').animate({ top: '-=40' }, timeout);
							$('#gallery-thumbnails').animate({ left: '-=200' }, timeout);
						}
						else {
							$('#tupper-header').animate({ top: '+=36' }, timeout);
							$('#gallery-name').animate({ top: '+=36' }, timeout);
							$('#gallery-control').animate({ top: '+=36', left: '+=172' }, timeout);
							$('#inner-user-info').animate({ top: '+=40' }, timeout);
							$('#gallery-thumbnails').animate({ left: '+=200' }, timeout);
							$('#gallery-control').removeClass('on');
						}
					});

					function gallery_load_image(which) {
						$('#gallery-shade').fadeTo(0, 0.5);
						$('#gallery-loader').show();
						objImage = new Image();
						objImage.src = '/assets/img/galleries/' + which + '-1680.jpg';
						objImage.onload = function() {
							$('#bg-site').attr('src', objImage.src);
							$('#gallery-loader').hide();
							$('#gallery-shade').fadeTo(0, 0);
							delete objImage;
						}
					}
					gallery_load_image('<?php echo $first; ?>');
				</script>