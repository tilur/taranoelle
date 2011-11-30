<div id="tupper-header-front">
	<div id="home-logo"></div>
	<div id="home-main-menu">
		<ul>
			<li><?php echo Html::anchor('about', 'About The Photog'); ?></li>
			<li><?php echo Html::anchor('contact', 'Contact'); ?></li>
			<li><?php echo Html::anchor('galleries', 'Galleries'); ?></li>
			<li><?php echo Html::anchor('details', 'Details'); ?></li>
			<li><?php echo Html::anchor('links', 'People I Love'); ?></li>
			<li class="last"><?php echo Html::anchor('login', 'Login'); ?></li>
		</ul>
	</div>
	<div id="home-social-media">
		<?php echo Html::anchor('http://www.facebook.com/#!/pages/Tara-Noelle-Photography/284438634906634', Asset::img('icon_facebook.png'), array('target'=>'_blank', 'title'=>'Like me on Facebook')); ?>
		<?php echo Html::anchor('http://www.flickr.com/photos/taranoelle/', Asset::img('icon_flickr.png'), array('target'=>'_blank', 'title'=>'Photostream')); ?>
		<?php echo Html::anchor('https://twitter.com/#!/taranoellephoto', Asset::img('icon_twitter.png'), array('target'=>'_blank', 'title'=>'Follow me on Twitter')); ?>
	</div>
</div>
