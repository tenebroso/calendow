<?php while (have_posts()) : the_post(); ?>
  <article class="hentry content-page text-content">
      <?php the_content(); ?>
      <?php get_template_part('templates/content/author','byline'); ?>
  </article>
<?php endwhile; ?>
