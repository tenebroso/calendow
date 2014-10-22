<?php get_template_part('templates/home/hero'); ?>

<?php get_template_part('templates/home/filters'); ?>

<div class="clearfix"></div>
<div class="grid-container">
	<?php echo do_shortcode( '[facetwp template="default"]' ); ?>
</div>

<div class="clearfix"></div>
<div class="text-center">
	<button class="pager btn" data-page="1" onclick="loadMore()">Load more</button>
</div>


<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="text-center">
			<h3 class="places"><span class="color">14 Places</span></h3>
			<p class="intro-text grey-text">A place-based revolution in the way residents think about and support health in their communities. <a href="/places/">Learn More</a></p>
		</div>
	</div>
</div>

<?php get_template_part('templates/home/content','places-grid'); ?>