<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
	<head>
		<?php echo $head; ?>
	</head>
	<body>
		<?php echo Asset::img('backgrounds/'.$bgImage, array('id'=>'bg-site')); ?>
                                
		<div id="tupperware">
			<?php echo $header; ?>
			<div id="tupper-content" class="<?php echo $pageClass.' '.$contentClass; ?>">
				<?php if (!empty($pageTitle)) { ?>
<div id="page-title" class="page-title"><?php echo $pageTitle; ?></div>
				<?php } ?>
<?php echo $content; ?>            
			</div>
			<?php echo $footer; ?>
		</div>
	</body>
</html>
