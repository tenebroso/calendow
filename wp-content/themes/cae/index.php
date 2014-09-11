<?php get_template_part('templates/page', 'header'); ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_type()); ?>
<?php endwhile; ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager list-reset">
      <li class="prev"><?php next_posts_link(__('Previous', 'roots')); ?></li><li class="index">&nbsp;</li><li class="next"><?php previous_posts_link(__('Next', 'roots')); ?></li>
    </ul>
  </nav>
<?php endif; ?>