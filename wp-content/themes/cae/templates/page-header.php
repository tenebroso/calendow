<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); $subtext = get_field('subtext'); ?>

<?php if($large_image_url): // If a Featured Image was Uploaded ?>
	<div class="page-header has-image">
		<div class="page-header-fixed" style="background-image:url(<?php echo $large_image_url[0]; ?>);"></div>
<?php else: // Otherwise a CSS background color should be applied, along with the pattern overlay ?>
	<div class="page-header">
<?php endif; ?>
		<h1 class="page-title v-centered"><strong><?php the_title();?></strong><?php if($subtext): ?><span class="page-subtext"><?php echo $subtext; ?></span><?php endif; ?></h1>
	</div>

<?php if(is_singular('newsletter')): get_template_part('templates/newsletter/header-nav'); endif; ?>