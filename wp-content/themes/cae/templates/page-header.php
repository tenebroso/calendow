<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );  ?>

<div class="page-header" style="background-image:url(<?php echo $large_image_url[0]; ?>);">
	<h1 class="page-title"><?php the_title();?></h1>
</div>

<ul class="newsletters nav">
	<li class="pull-left"><a href="#">Previous</a></li>
	<?php if ( false === ( $newsletters = get_transient( 'newsletters' ) ) ) {
		$args = array(
			'post_type' => 'newsletter',
			'posts_per_page' => 4,
		);
		$newsletters = new WP_Query($args);
		set_transient( 'our_work', $newsletters, 12 * HOUR_IN_SECONDS );
	} ?>

	<?php if ( $newsletters->have_posts() ) : while ( $newsletters->have_posts() ) : $newsletters->the_post(); ?><li>
			<a class="active" href="<?php the_permalink(); ?>">
				<img src="<?php the_field('thumbnail_image'); ?>">
			</a>
		</li><?php endwhile; endif; wp_reset_postdata(); ?>
	<li class="pull-right"><a href="#">Next</a></li>
</ul>