<div id="tupper-header">
<?php if ($user['u_fullname']) { ?>
				<div id="inner-user-info">
					Welcome <?php echo $user['u_fullname']; ?> <span class="red">|</span> <?php echo Html::anchor((Session::get('userid') === '1' ? '/admin/' : '/dashboard'), 'Dashboard'); ?> <span class="red">|</span> <?php echo Html::anchor('/logout', 'Logout'); ?>

				</div>
<?php } ?>
				<?php echo Html::anchor('/', '<div id="inner-logo"></div>'); ?>

				<ul id="inner-main-menu">
					<li><?php echo Html::anchor('about', 'About The Photog'); ?></li>
					<li><?php echo Html::anchor('contact', 'Contact'); ?></li>
					<li><?php echo Html::anchor('galleries', 'Galleries'); ?></li>
					<li><?php echo Html::anchor('details', 'Details'); ?></li>
					<li class="last"><?php echo Html::anchor('links', 'People I Love'); ?></li>
				</ul>
			</div>
