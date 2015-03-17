<?php get_template_part('templates/sidebar','nav'); ?>

  <article class="hentry content-page text-content">
      
      	<ul>
	      	<?php $args = array(
	      		'posts_per_page' => -1,
	      		'post_type' => 'any',
	      		'orderby' => 'title',
	      		'order' => 'ASC'
	      	); $the_query = new WP_Query( $args ); if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<li><strong><?php the_title(); ?></strong> - <a href="<?php the_permalink(); ?>" style="font-size:14px;"><?php the_permalink(); ?></a></li>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</ul>
  </article>
