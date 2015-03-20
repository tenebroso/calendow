<?php $work = wp_get_post_terms($post->ID,'work', array("fields" => "names"));
$campaign = wp_get_post_terms($post->ID,'campaign', array("fields" => "names"));
$workSlug = wp_get_post_terms($post->ID,'work', array("fields" => "slugs")); 
?><li class="grid-item <?php if($workSlug): echo strtolower($workSlug[0]); else: echo 'default'; endif; ?>">
	<a href="<?php the_permalink(); ?>">	
	<div class="breadcrumbs hover-white">
		<?php if($work): ?><span class="color hover-white"><?php echo $work[0]; ?></span> <span class="carrot hover-white">></span> <?php endif; ?><?php if($campaign): echo $campaign[0]; endif; ?><strong class="hover-white"><?php echo get_post_type( get_the_ID() ); ?></strong>
	</div>
	<h2 class="grid-title hover-white"><?php the_title(); ?></h2>
	<p class="date hover-white"><?php the_time('F j, Y'); ?></p>
			
	</a>
</li>