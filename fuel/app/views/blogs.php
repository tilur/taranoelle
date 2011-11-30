<?php 
//echo '<pre>';
//print_r($blogs);
?>
<?php foreach ($blogs AS $i => $blog) { ?>
<div class="blog-row">
	<div class="title"><?php echo $blog['b_title']; ?></div>
	<div class="preview"><?php echo $blog['b_body']; ?></div>
</div>
<?php } ?>

<?php echo $pagination; ?>