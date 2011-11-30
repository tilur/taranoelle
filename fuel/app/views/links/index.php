<?php
	$class = ' first';
	foreach ($links AS $category => $mt) {
?>
				<div class="gallery-category<?php echo $class; ?>"><?php echo $category; ?></div>
<?php foreach ($links[$category] AS $i => $link) { ?>
				<div class="gallery-row">
					<div class="gallery-name"><?php echo Html::anchor('http://'.$link['l_url'], $link['l_url'], array('target'=>'_blank')); ?></div>
				</div>
<?php }
			$class = '';
				?>
<?php } ?> 