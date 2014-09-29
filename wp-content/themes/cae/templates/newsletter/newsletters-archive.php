<?php if ( false === ( $newsletterArchive = get_transient( 'newsletter-archive' ) ) ) {
		$args = array(
			'post_type' => 'newsletter',
			'posts_per_page' => 9,
		);
		$newsletterArchive = new WP_Query($args);
		set_transient( 'our_work', $newsletterArchive, 12 * HOUR_IN_SECONDS );
	} ?>

	<ul class="newsletter-archives">

		<?php if ( $newsletterArchive->have_posts() ) : while ( $newsletterArchive->have_posts() ) : $newsletterArchive->the_post(); ?><li>
			<a href="<?php the_permalink(); ?>" class="center-block">
				<div class="breadcrumbs">
					<span class="white-text">Schools</span> > Sample Filter
				</div>
				<div class="v-centered">
					<p class="white-text">The Date</p>
					<h3><strong><?php the_title(); ?></strong></h3>
				</div>
				
			</a>
		</li><?php endwhile; endif; wp_reset_postdata(); ?>

	</ul>

	<div class="text-center">
		<a class="btn btn-load-more" href="#">Load More</a>
	</div>