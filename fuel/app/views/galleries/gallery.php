<?php echo '<pre>'; print_r($gallery); echo '</pre>'; ?>

<div id="gallery-thumbnails">
  <?php foreach ($gallery['images'] AS $i => $image) { ?>
  <?php echo Asset::img('galleries/'.$gallery['g_gallery_id'].'/'.$image['gi_filename'].'-scroller.jpg'); ?>
  <?php } ?>
</div>
