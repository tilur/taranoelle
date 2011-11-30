<div class="admin-dashboard">
	<div class="admin-dashboard-left">
		<div class="admin-section-header first">Backgrounds</div>
		Add a background image to any page in the site<br>
		<?php echo Html::anchor('admin/background/manage', 'Manage'); ?> | <?php echo Html::anchor('admin/background/add', 'Add'); ?>

		<div class="admin-section-header">Content</div>
		Create individual pages for uncategorized areas<br>
		<?php echo Html::anchor('admin/content/manage', 'Manage'); ?> | <?php echo Html::anchor('admin/content/add', 'Add'); ?>

		<div class="admin-section-header">Galleries</div>
		Image Galleries for your photos<br>
		<?php echo Html::anchor('admin/galleries/manage', 'Manage'); ?> | <?php echo Html::anchor('admin/galleries/add', 'Add'); ?>
	</div>
	<div class="admin-dashboard-right">
		<div class="admin-section-header first">Blog</div>
		Ye Olde Weblog<br>
		<?php echo Html::anchor('admin/blog/manage', 'Manage'); ?> | <?php echo Html::anchor('admin/blog/add', 'Add'); ?>

		<div class="admin-section-header">Links</div>
		Links to your friends, associates, interests, etc...<br>
		<?php echo Html::anchor('admin/links/manage', 'Manage'); ?> | <?php echo Html::anchor('admin/links/add', 'Add'); ?>

		<div class="admin-section-header">Users</div>
		Special users who need access to private galleries<br>
		<?php echo Html::anchor('admin/users/manage', 'Manage'); ?> | <?php echo Html::anchor('admin/users/add', 'Add'); ?>
	</div>

	<div class="jc mt-20"><?php echo Html::anchor('/admin/help', 'Help'); ?></div>
</div>