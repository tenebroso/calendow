<li>
	<?php if($img): ?>
	<a class="center-block center-block-bg-img" href="<?php the_permalink(); ?>" style="background-image:url(<?php echo $img; ?>);"></a>
	<?php else: ?>
	<a class="center-block" href="<?php the_permalink(); ?>">
		<p class="section-name"><?php echo get_post_type( get_the_ID() ); ?></p>
		<h3><strong><?php the_title(); ?></strong></h3>
		<p class="small date"><?php the_time('F j, Y'); ?></p>
	</a>
	<?php endif; ?>
</li>