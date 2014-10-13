<?php while (have_posts()) : the_post(); ?>
	
	<?php get_template_part('templates/home/hero'); ?>

<div id="container">
			
	<?php get_template_part('templates/home/filters'); ?>

	<?php //get_template_part('templates/content','isotope'); ?>

</div>

<?php endwhile; ?>


<?php echo do_shortcode( '[facetwp facet="campaigns"]' ); ?>
<?php echo do_shortcode( '[facetwp facet="places"]' ); ?>

<div class="isotope">
<?php echo do_shortcode( '[facetwp template="default"]' ); ?>
</div>

<button class="pager" data-page="1" onclick="loadMore()">Load more</button>

<?php //get_template_part('templates/content','places-grid'); ?>