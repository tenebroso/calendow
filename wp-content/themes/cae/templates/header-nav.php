<?php
    $current_post = $post;
    $workSlug = wp_get_post_terms($post->ID,'work', array("fields" => "slugs"));
    $current = $post->ID;
    $image = get_field('header_thumbnail_nav_image');
    if($image == ''):
    	$image = 'http://placehold.it/86x81';
    endif;


if ($workSlug[0] == 'places') { ?>

	<ul class="newsletters bg-color sub-nav nav"><?php previous_post_link('<li class="pull-left icon-lg-arrow text-hide">%link</li>', '', TRUE, '', 'work'); ?>

		    <li class="active"><a class="resize-thumb"><?php the_field('name_abbreviation'); ?></a></li><?php for($i = 1; $i <= 99; $i++):
			    $post = get_next_post(TRUE,'','work');
				if($post):
			    setup_postdata($post); 
			    $image = get_field('header_thumbnail_nav_image'); if(!$image): $image = 'http://placehold.it/86x81'; endif; ?><li>
						<a href="<?php the_permalink(); ?>" class="resize-thumb">
					<?php the_field('name_abbreviation'); ?>
				</a>
					</li><?php endif; endfor;
		    $post = $current_post; ?>

		    		<!--<?php
		for($i = 1; $i <= 3; $i++):
		    $post = get_next_post();
			if($post):
		    setup_postdata($post);
		    $url = get_permalink(); ?><li>
				<a href="<?php echo $url; ?>" class="resize-thumb">
					<?php the_field('name_abbreviation'); ?>
				</a>
		    </li><?php endif; endfor; ?> -->

<?php } else { 

	$permalink = get_permalink($post->post_parent);
	?>

	<p class="sidenav-title bg-color section-intro-title"><a href="<?php echo $permalink; ?>"><?php echo $workSlug[0]; ?>.</a></p>
	<ul class="newsletters bg-color sub-nav nav"><li class="pull-left icon-lg-arrow text-hide"><a href="#">Previous Campaign Detail</a></li><li class="active">
		<a class="resize-thumb"><img src="<?php echo $image; ?>"></a></li><?php 
		    $parent = wp_get_post_parent_id( $post_ID );
		    $current = $post->ID;
		    $args = array('post_parent' => $parent, 'post_type' => 'page', 'post__not_in' => array($current)); 
					$the_query = new WP_Query( $args ); 
						if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
					$image = get_field('header_thumbnail_nav_image'); if(!$image): $image = 'http://placehold.it/86x81'; endif; ?><li>
						<a href="<?php the_permalink(); ?>" class="resize-thumb">
							<img src="<?php echo $image; ?>">
						</a>
					</li><?php endwhile; endif; wp_reset_postdata(); ?>
	

	<?php }
	
	$post = $current_post; 

	?><li class="pull-right icon-lg-arrow text-hide"><a href="#">Next Campaign Detail</a></li>
</ul>

<h1 class="text-center heading-font page-secondary-title caps"><strong><?php the_title(); ?></strong></h1>