<div class="admin-top_links"><?php echo Html::anchor('admin', 'Dashboard').' | '.Html::anchor('admin/links/add', 'Add New Link'); ?></div>
				<div id="tupper-admin-links-manage">

<?php foreach ($links AS $category => $mt) { ?>

	<div class="gallery-catgegory"><?php echo $category; ?></div>
<?php foreach ($links[$category] AS $i => $link) { ?>
<div class="content-row highlight-row">
  <div class="content-name"><?php echo Html::anchor('admin/links/edit/'.$link['l_link_id'], $link['l_url'], array('title'=>'Edit this link')); ?></div>
  <div class="content-actions">
    <?php echo Html::anchor('http://'.$link['l_url'], Asset::img('icon_view.png'), array('target'=>'_blank', 'title'=>'View this link in a new window')); ?>
    <?php echo Asset::img('icon_delete.png', array('onClick'=>'deleteObject(\'link\', \'/admin/links/delete\', \'l_link_id='.$link['l_link_id'].'\');')); ?>
  </div>
</div>
<?php } ?>
<?php } ?> 
</div>