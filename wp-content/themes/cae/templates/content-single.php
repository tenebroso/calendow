<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
	<?php get_template_part('templates/breadcrumbs'); ?>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
  </article>
<?php endwhile; ?>
