<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

<!-- Find variables that are used -->
<?php $accordion = get_field('accordion_content'); ?>

  <?php do_action('get_header'); ?>

    <div id="page" class="wrapper" role="document">
      <?php get_template_part('templates/header'); ?>

      <!-- Only show the default page header/featured image if it is not the homepage -->
      <?php if(!is_front_page()): get_template_part('templates/page','header'); endif; ?>

        <main class="main" role="main">
          <div class="container">
            <?php include roots_template_path(); ?>
          </div>
        </main>

        <!-- Show the Full Width Accordion Content outside of the wrapper -->
        <?php if($accordion): get_template_part('templates/content','accordion'); endif; ?>

        <!-- Show the Count Me In CTA stripe if we are on the homepage -->
        <?php if(is_front_page()): get_template_part('templates/footer','cta'); endif; ?>

        <!-- Show the Newsletter Prev/Next navigation if on a newsletter -->
        <?php if(is_singular('newsletter')): get_template_part('templates/newsletter/footer-nav'); endif; ?>

        <!-- Always show the footer -->
        <?php get_template_part('templates/footer'); ?>
    </div>

</body>
</html>