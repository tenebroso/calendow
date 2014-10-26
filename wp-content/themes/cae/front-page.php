<?php get_template_part('templates/home/hero'); ?>

<?php //get_template_part('templates/home/filters'); ?>

<ul class="filters">
	<li>
		<a class="filter-key">Filter by <span>Our Work</span></a>
		<?php $terms = get_terms("work");
		 if ( !empty( $terms ) && !is_wp_error( $terms ) ){
		     echo "<ul class='sub-filter' data-tax='work'>";
		     foreach ( $terms as $term ) {
		       echo '<li><a href=' . get_term_link( $term ) . ' title=' .$term->slug.'>' . $term->name . '</a></li>';
		        
		     }
		     echo "</ul>";
		 } ?>
	</li>
	<li>
		<a class="filter-key">Filter by <span>Our Campaigns</span></a>
		<?php $terms = get_terms("campaign");
		 if ( !empty( $terms ) && !is_wp_error( $terms ) ){
		     echo "<ul class='sub-filter' data-tax='campaign'>";
		     foreach ( $terms as $term ) {
		       echo '<li><a href=' . get_term_link( $term ) . ' title=' .$term->slug.'>' . $term->name . '</a></li>';
		        
		     }
		     echo "</ul>";
		 } ?>
	</li>
	<li>
		<a class="filter-key">Filter by <span>Our Places</span></a>
		<?php $terms = get_terms("place");
		 if ( !empty( $terms ) && !is_wp_error( $terms ) ){
		     echo "<ul class='sub-filter' data-tax='place'>";
		     foreach ( $terms as $term ) {
		       echo '<li><a href=' . get_term_link( $term ) . ' title=' .$term->slug.'>' . $term->name . '</a></li>';
		        
		     }
		     echo "</ul>";
		 } ?>
	</li>
</ul>

<div class="clearfix"></div>
<div class="grid-container">

<?php $args = array(
    'post_type' => 'any',
    'posts_per_page' => 10,
  );
	$query = new WP_Query( $args );
 
  if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
 
    <?php get_template_part('templates/home/grid'); ?>
 
  <?php endwhile; ?>
  <?php else: ?>
    <h2>No posts found</h2>
  <?php endif; ?>

	<?php //echo do_shortcode( '[facetwp template="default"]' ); ?>
</div>

<div class="clearfix"></div>
<div class="text-center">
	<?php //echo do_shortcode('[facetwp pager="true"]'); ?>
	<!-- <button class="pager btn" data-page="1">Load more</button> -->
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