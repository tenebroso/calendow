<?php while (have_posts()) : the_post(); ?>
	
	<?php get_template_part('templates/home/hero'); ?>

<?php endwhile; ?>


<div id="container">
			
	<?php //get_template_part('templates/home/filters'); ?>

	<?php //get_template_part('templates/content','isotope'); ?>

	<div class="filters">

		<?php echo do_shortcode( '[facetwp facet="campaigns"]' ); ?>
		<?php echo do_shortcode( '[facetwp facet="places"]' ); ?>
		<?php echo do_shortcode( '[facetwp facet="places"]' ); ?>

	</div>

</div>


<div class="grid-container">
<?php echo do_shortcode( '[facetwp template="default"]' ); ?>
</div>

<div class="text-center">
	<button class="pager btn" data-page="1" onclick="loadMore()">Load more</button>
</div>

<?php get_template_part('templates/content','places-grid'); ?>