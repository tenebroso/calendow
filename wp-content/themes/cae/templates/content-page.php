<?php while (have_posts()) : the_post(); ?>
  <article class="hentry content-page">
      <?php the_content(); ?>
  </article>
<?php endwhile; ?>
