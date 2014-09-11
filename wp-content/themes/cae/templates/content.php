<article class="entry-single-<?php echo get_post_type(); ?>">
	<div class="container">
	  <header>
	  	<?php get_template_part('templates/entry-meta'); ?>
	    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	  </header>
	  <div class="entry-summary">
	    <?php the_excerpt(); ?>
	  </div>
	</div>
</article>