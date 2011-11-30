<div class="admin-top_links"><?php echo Html::anchor('admin', 'Dashboard').' | '.Html::anchor('admin/blog/add', 'Add New Blog'); ?></div>

<?php foreach ($blogs AS $i => $blog) { ?>
<div class="content-row highlight-row">
  <div class="content-name"><?php echo Html::anchor('admin/blog/edit/'.$blog['b_blog_id'], $blog['b_title']); ?></div>
  <div class="content-actions">
    <?php echo Html::anchor($blog['b_path'], Asset::img('icon_view.png'), array('target'=>'_blank')); ?>
    <?php echo Asset::img('icon_delete.png', array('onClick'=>'deleteObject(\'blog\', \'/admin/blog/delete\', \'b_blog_id='.$blog['b_blog_id'].'\');')); ?>
  </div>
</div>
<?php } ?> 
