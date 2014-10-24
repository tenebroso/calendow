<?php 	$template = get_page_template_slug( $post->ID ); 
		$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );?>

<?php if(($template == 'page-campaign-detail.php') && $large_image_url): ?>
<div class="stripe bg-image">
	<div data-stellar-background-ratio="0.5" class="parallax-image" style="background-image:url(<?php echo $large_image_url[0]; ?>);"></div>
</div>
<?php else: ?>
<div class="stripe bg-image">
	<div data-stellar-background-ratio="0.5" class="parallax-image" style="background-image:url(<?php the_sub_field('full_width_image'); ?>);"></div>
</div>
<?php endif; ?>