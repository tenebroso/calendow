<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );  ?>

<div class="page-header" style="background-image:url(<?php echo $large_image_url[0]; ?>);">
	<h1 class="page-title"><?php the_title();?></h1>
</div>