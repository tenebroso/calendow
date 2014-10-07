<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

<?php // Find variables that are used, per-page ?>
<?php $accordion = get_field('accordion_content'); ?>
<?php $builder = get_field('cae_content_builder'); ?>

  <?php do_action('get_header'); ?>

  <div id="page" class="wrapper" role="document">
      <?php get_template_part('templates/header'); ?>

      <?php 
        // Only show the default page header/featured image if it is not the homepage or report
      if(!(is_front_page() || is_singular('report'))): get_template_part('templates/page','header'); endif; ?>

      <?php 
        // The default wrapper/content display for most layouts. This should only show if no page builder
      if(!$builder): ?>
        <main class="main" role="main">
          <div class="container">
            <?php include roots_template_path(); ?>
          </div>
        </main>
      <?php 
        // If there is a page builder dictating the layout, we need the full-width. No wrapper
      else: ?>
        <main class="main" role="main">
          <?php include roots_template_path(); ?>
        </main>
      <?php endif; ?>

        <?php 
          // Show the Full Width Accordion Content outside of the wrapper
        if($accordion): get_template_part('templates/content','accordion'); endif; ?>

        <?php 
          // Show the Count Me In CTA stripe if we are on the homepage
        if(is_front_page()): get_template_part('templates/footer','cta'); endif; ?>

        <?php 
          // Show the Newsletter Prev/Next navigation if on a newsletter
        if(is_singular('newsletter')): get_template_part('templates/newsletter/footer-nav'); endif; ?>

        <?php 
          // Always show the footer
        get_template_part('templates/footer'); ?>
  </div>

</body>
</html>