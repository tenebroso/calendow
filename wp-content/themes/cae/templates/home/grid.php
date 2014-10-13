
<?php if( get_post_type() == 'video' ): ?>
	<div class="grid-item grid-video">
		<?php the_post_thumbnail('homepage-thumb'); ?>

<?php elseif( get_post_type() == 'news' ): ?>
	<div class="grid-item grid-news">
		<div class="v-centered">
			<h6><?php the_title(); ?></h6>
			</div>

<?php else: ?>

	<div class="grid-item">
		<div class="v-centered">
			<h6><?php the_title(); ?></h6>
			</div>

<?php endif; ?>


</div>