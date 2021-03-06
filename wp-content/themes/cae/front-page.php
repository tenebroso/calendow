<?php get_template_part('templates/home/hero'); ?>

<ul class="filters">
	<li class="filter-main">
		<a class="filter-key">Filter by <span>Our Work</span></a>
		<?php $terms = get_terms("work");
		 if ( !empty( $terms ) && !is_wp_error( $terms ) ){
		     echo "<ul class='sub-filter' data-tax='work'>";
		     foreach ( $terms as $term ) {
		     	$customURL = get_field('homepage_filter_tile_url',$term);
		       echo '<li><a href="' . get_term_link( $term ) . '" title="' .$term->slug.'" data-url="'.$customURL.'"><span>' . $term->name . '</span></a></li>';
		        
		     }
		     echo "</ul>";
		 } ?>
	</li>
	<li class="filter-main">
		<a class="filter-key">Filter by <span>Our Campaigns</span></a>
		<?php $terms = get_terms("campaign");
		 if ( !empty( $terms ) && !is_wp_error( $terms ) ){
		     echo "<ul class='sub-filter' data-tax='campaign'>";
		     foreach ( $terms as $term ) {
		     	$customURL = get_field('homepage_filter_tile_url',$term);
		       echo '<li><a href="' . get_term_link( $term ) . '" title="' .$term->slug.'" data-url="'.$customURL.'"><span>' . $term->name . '</span></a></li>';
		        
		     }
		     echo "</ul>";
		 } ?>
	</li>
	<li class="filter-main">
		<a class="filter-key">Filter by <span>Our Places</span></a>
		<?php $terms = get_terms("place");
		 if ( !empty( $terms ) && !is_wp_error( $terms ) ){
		     echo "<ul class='sub-filter' data-tax='place'>";
		     foreach ( $terms as $term ) {
		     	$customURL = get_field('homepage_filter_tile_url',$term);
		       echo '<li><a href="' . get_term_link( $term ) . '" title="' .$term->slug.'" data-url="'.$customURL.'"><span>' . $term->name . '</span></a></li>';
		        
		     }
		     echo "</ul>";
		 } ?>
	</li>
</ul>

<div class="clearfix"></div>

	<?php echo do_shortcode('[ajax_load_more preloaded="true" preloaded_amount="9" post_type="post, report, newsletter, news, action, event, grant, video, infographic" scroll="false" pause="true" button_label="Load More" offset="0" posts_per_page="9" orderby="date"]'); ?>



<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="text-center">
			<?php $count = 0;
			$pages = get_pages('child_of=109&depth=1');
			  foreach($pages as $page) {
			    $count++;
			  } ?>
			<h3 class="places"><span class="color"><?php echo $count; ?> Places</span></h3>
			<p class="intro-text grey-text">A place-based revolution in the way residents think about and support health in their communities. <a href="/places/">Learn More</a></p>
		</div>
	</div>
</div>

<?php get_template_part('templates/home/content','places-grid'); ?>