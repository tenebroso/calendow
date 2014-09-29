<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );  ?>

<div class="page-header" style="background-image:url(<?php echo $large_image_url[0]; ?>);">
	<h1 class="page-title v-centered"><strong><?php the_title();?></strong></h1>
</div>

<?php if(is_singular('newsletter')): get_template_part('templates/newsletter/header-nav'); endif; ?>