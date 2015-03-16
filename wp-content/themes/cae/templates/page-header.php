<?php 

	$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); 
	$title = get_field('custom_header_text'); 
	$subtext = get_field('subtext'); 
	$right = get_field('right_align');
	if(is_404()): $title = '404'; endif; 
	if(!is_404()): $template = get_page_template_slug( $post->ID ); endif;
	if(!$title): $title = get_the_title(); endif; ?>

<?php if($large_image_url && ($template !== 'page-campaign-detail.php')): 
	// If a Featured Image was Uploaded ?>
	<div class="page-header has-image<?php if($right): echo ' text-right'; endif; ?>">
		<div class="stellar-container" style="background-image:url(<?php echo $large_image_url[0]; ?>);" data-stellar-background-ratio="0.5"></div>

<?php else: 
	// Otherwise a CSS background color should be applied, along with the pattern overlay ?>
	<div class="page-header<?php if($right): echo ' text-right'; endif; ?>">

<?php endif; 
	// The normal header text that appears ?>
	<div class="container v-centered">
		<?php if($right): echo '<div class="row"><div class="col-sm-9 col-sm-offset-2">'; endif; ?>
			<h1 class="page-title">
				<strong><?php echo $title;?></strong>
				<?php if($subtext): 
					// Show the subtext if it exists ?>
					<span class="page-subtext"><?php echo $subtext; ?></span>
				<?php endif; ?>
			</h1>
		<?php if($right): echo '</div></div>'; endif; ?>
	</div>

<?php get_template_part('templates/content/full-image','credit'); ?>
</div><?php // End the .page-header div ?>

<?php if(is_singular('newsletter')): get_template_part('templates/newsletter/header-nav'); endif; ?>