<div class="admin-top_links"><?php echo Html::anchor('admin', 'Dashboard').' | '.Html::anchor('admin/links/add', 'Add New Link'); ?></div>
				<div id="tupper-admin-users-manage">

<?php foreach ($users AS $i => $user) { ?>
<div class="content-row highlight-row">
  <div class="content-name"><?php echo Html::anchor('admin/users/edit/'.$user['u_user_id'], $user['u_username'], array('title'=>'Edit this user')); ?> - <?php echo $user['u_fullname']; ?></div>
  <div class="content-actions">
  	<?php if ($user['u_user_id'] != 1) { ?>
    <?php echo Asset::img('icon_delete.png', array('onClick'=>'deleteObject(\'user\', \'/admin/users/delete\', \'u_user_id='.$user['u_user_id'].'\');', 'title'=>'Delete this user')); ?>
   	<?php } ?>
  </div>
</div>
<?php } ?> 
</div>