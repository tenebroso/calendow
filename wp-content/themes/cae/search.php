<article class="hentry content-page">

<p class="grid-title heading-font">Search results for <span class="search-term">&lsquo;<?php the_search_query(); ?>&rsquo;</span></p>

<ul class="search-results">
	<?php if(have_posts()): while (have_posts()) : the_post(); ?>
	  <?php get_template_part('templates/content', 'search'); ?>
	<?php endwhile; else: ?>
		<li>Sorry, there were no results for <?php the_search_query(); ?></li>
	<?php endif; ?>
</ul>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager list-reset">
      <li class="prev"><?php next_posts_link(__('Previous', 'roots')); ?></li><li class="index">&nbsp;</li><li class="next"><?php previous_posts_link(__('Next', 'roots')); ?></li>
    </ul>
  </nav>
<?php endif; ?>

</article>