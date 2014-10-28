<?php $work = wp_get_post_terms($post->ID,'work', array("fields" => "names"));
$campaign = wp_get_post_terms($post->ID,'campaign', array("fields" => "names"));
$workSlug = wp_get_post_terms($post->ID,'work', array("fields" => "slugs")); ?><li class="<?php if($workSlug): echo strtolower($workSlug[0]); else: echo 'default'; endif; ?>">
	<a href="<?php the_permalink(); ?>" class="center-block bg-color">
		<?php $work = wp_get_post_terms($post->ID,'work', array("fields" => "names"));
				$campaign = wp_get_post_terms($post->ID,'campaign', array("fields" => "names"));
				$workSlug = wp_get_post_terms($post->ID,'work', array("fields" => "slugs")); ?>

		<div class="breadcrumbs">
			<?php if($work): ?><span class="white-text"><?php echo $work[0]; ?></span> > <?php endif; ?><?php if($campaign): echo $campaign[0]; endif; ?>
		</div>
		<div class="v-centered">
			<p class="date white-text"><?php the_time('F j, Y'); ?></p>
			<h3><?php the_title(); ?></h3>
		</div>
		
	</a>
</li>