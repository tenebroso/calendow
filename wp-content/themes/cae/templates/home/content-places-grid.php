<?php $x = 1; ?>

<ul class="place-grid list-inline grid-7-up reset-margins">


	<?php if ( false === ( $places = get_transient( 'places' ) ) ) {
		$args = array(
			'post_type' => 'page',
			'posts_per_page' => -1,
			'orderby' => 'title',
			'order' => 'ASC',
			'post_parent' => 109
		);
		$places = new WP_Query($args);
		set_transient( 'team_members', $places, 12 * HOUR_IN_SECONDS );
	} ?>

	<?php if ( $places->have_posts() ) : while ( $places->have_posts() ) : $places->the_post(); $abbr = get_field('name_abbreviation', $term); ?><li>
		<a class="center-block" href="<?php the_permalink(); ?>">
			<div class="place-grid-spacer">
				<h2><strong><?php echo $abbr; ?></strong></h2>
				<p><?php the_title(); ?></p>
				<p class="temperature light-thin-text" id="<?php echo strtolower($abbr); ?>"></p>
			</div>
		</a>
	</li><?php endwhile; endif; wp_reset_postdata(); ?>

</ul>