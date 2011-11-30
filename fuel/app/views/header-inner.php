<?php
//echo '<pre>'; print_r($headGalleries); echo '</pre>';
?>

<?php if ($user['u_fullname']) { ?>
				<div id="inner-user-info">
					Welcome <?php echo $user['u_fullname']; ?> <span class="red">|</span> <?php echo Html::anchor((Session::get('userid') === '1' ? '/admin/' : '/dashboard'), 'Dashboard'); ?> <span class="red">|</span> <?php echo Html::anchor('/logout', 'Logout'); ?>

				</div>
<?php } ?>
<div id="tupper-header">
				<?php echo Html::anchor('/', '<div id="inner-logo"></div>'); ?>

				<ul id="inner-main-menu">
					<li><?php echo Html::anchor('about', 'About The Photog'); ?></li>
					<li><?php echo Html::anchor('contact', 'Contact'); ?></li>
					<li>
						<?php echo Html::anchor('galleries', 'Galleries'); ?>
						<?php if (sizeof($headGalleries)) { ?>

						<ul>
							<?php
							foreach ($headGalleries AS $category => $galleries) {
								if ($category == 'gallery_count') { continue; }
?>
<li>
								<?php echo str_replace(' ', '&nbsp;', $category); ?>

								<ul>
									<?php foreach ($headGalleries[$category] AS $i => $gallery) { ?>
<li><?php echo Html::anchor($gallery['g_path'], str_replace(' ', '&nbsp;', $gallery['g_name'])); ?></li>
								<?php } ?>
</ul>
							</li>
							<?php } ?>
</ul>
					<?php } ?>
</li>
					<li><?php echo Html::anchor('details', 'Details'); ?></li>
					<li><?php echo Html::anchor('links', 'People I Love'); ?></li>
					<li class="last"><?php echo Html::anchor('login', 'Login'); ?></li>
				</ul>
			</div>
