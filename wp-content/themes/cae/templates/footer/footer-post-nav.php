<?php 	$x = 1; 
		$template = get_page_template_slug( $post->ID ); 
		$workSlug = wp_get_post_terms($post->ID,'work', array("fields" => "slugs"));
		$campaignSlug = wp_get_post_terms($post->ID,'campaign', array("fields" => "name"));
		$postTypes = array('post', 'video', 'infographic', 'action', 'event', 'grant', 'newsletter', 'report', 'news');
?>

<div class="footer-post-nav">
	<div class="container">
		<div class="row">
			<div class="footer-post-nav col-sm-9 col-sm-offset-2">
				<h2 class="text-center black-text"><strong>Read This.</strong></h2>

					<?php if($template == 'page-campaign-detail.php'): 

						$args = array(
							'posts_per_page' => 6,
							'work' => $workSlug[0],
							'post_type' => $postTypes
						); ?>

						<ul class="list-inline grid-3-up">

						<?php $the_query = new WP_Query( $args ); 
								if ( $the_query->have_posts() ) : 
									while ( $the_query->have_posts() ) : 
										$the_query->the_post(); $img = get_field('read_this_thumbnail_image'); if($x != 4): ?><li>

								<?php if($img): ?>
								<a class="center-block center-block-bg-img" href="<?php the_permalink(); ?>" style="background-image:url(<?php echo $img; ?>);"></a>
								<?php else: ?>
								<a class="center-block" href="<?php the_permalink(); ?>">
									<p class="section-name"><?php echo get_post_type( get_the_ID() ); ?></p>
									<h3><strong><?php the_title(); ?></strong></h3>
									<p class="small date"><?php the_time('F j, Y'); ?></p>
								</a>
								<?php endif; ?>
							</li><?php else: ?>test<li><a class="bg-color center-block"><h3 class="white-text"><strong>Lorem Ipsum.</strong></h3></a>
							</li><?php endif; $x++; endwhile; endif; wp_reset_postdata(); ?>

						</ul>


					<?php else:

						$args = array(
							'posts_per_page' => -1,
							'work' => $workSlug[0],
							'post_type' => $postTypes
						); ?>

						<ul class="list-inline grid-3-up bx-slider">

						<?php 	$the_query = new WP_Query( $args ); 
								if ( $the_query->have_posts() ) : 
									while ( $the_query->have_posts() ) : 
										$the_query->the_post(); ?><li>
								<a class="center-block" href="<?php the_permalink(); ?>">
									<p class="section-name"><?php echo get_post_type( get_the_ID() ); ?></p>
									<h3><strong><?php the_title(); ?></strong></h3>
									<p class="small date"><?php the_time('F j, Y'); ?></p>
								</a>
							</li><?php endwhile; endif; wp_reset_postdata(); ?>

						</ul>

					<?php endif; ?>
				
			</div>
		</div>
	</div>
</div>