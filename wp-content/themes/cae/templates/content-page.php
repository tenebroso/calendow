<?php while (have_posts()) : the_post(); ?>
  <article class="hentry content-page text-content">
      <?php the_content(); ?>
  </article>
<?php endwhile; ?>
