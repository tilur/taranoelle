<div id="tupper-contact">
	<?php if ($success) { ?>
	Your message has been successfully sent to Tara Noelle and you will hear back soon. Thank you for your interest!
	<?php } else { ?>
	There seems to have been a problem sending your email. Please <?php echo Html::anchor('/contact', 'try again'); ?>. If you continue to have problems, please try calling.
	<?php } ?>
</div>
