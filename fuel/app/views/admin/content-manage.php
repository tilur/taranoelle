<div class="admin-top_links"><?php echo Html::anchor('admin', 'Dashboard').' | '.Html::anchor('admin/content/add', 'Add New Content'); ?></div>

<?php foreach ($contents AS $i => $content) { ?>
<div class="content-row highlight-row">
  <div class="content-name"><?php echo Html::anchor('admin/content/edit/'.$content['c_content_id'], $content['c_title'], array('title'=>'Edit this content')); ?></div>
  <div class="content-actions">
    <?php echo Html::anchor($content['c_path'], Asset::img('icon_view.png'), array('target'=>'_blank', 'title'=>'View this content in a new window')); ?>
    <?php echo Asset::img('icon_delete.png', array('onClick'=>'deleteObject(\'content\', \'/admin/content/delete\', \'c_content_id='.$content['c_content_id'].'\');')); ?>
  </div>
</div>
<?php } ?> 
