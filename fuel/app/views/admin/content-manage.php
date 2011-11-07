<div class="admin-top_links"><?php echo Html::anchor('admin', 'Dashboard').' | '.Html::anchor('admin/content/add', 'Add New Content'); ?></div>

<?php foreach ($contents AS $i => $content) { ?>
<div class="content-row">
  <div class="content-name"><?php echo Html::anchor('admin/content/edit/'.$content['c_content_id'], $content['c_title']); ?></div>
</div>
<?php } ?> 
