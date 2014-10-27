<?php $workSlug = wp_get_post_terms($post->ID,'work', array("fields" => "slugs")); ?>
<li class="reset-margins entry-single-<?php echo get_post_type(); ?> <?php if($workSlug): echo strtolower($workSlug[0]); else: echo 'default'; endif; ?>">
	<a href="<?php the_permalink(); ?>">
		<p class="entry-title"><?php the_title(); ?></p>
		<p class="date"><?php the_time('F j, Y'); ?></p>
	</a>
</li>