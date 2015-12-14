<?php /* Template Name: Newsletter Filters Page */ ?>

<ul class="filters newsletter-filters">
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

<div class="newsletter-wrapper">
<?php get_template_part('templates/newsletter/newsletters', 'archive'); ?>
</div>