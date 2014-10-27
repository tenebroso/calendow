<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

<?php // Find variables that are used, per-page ?>
<?php $accordion = get_field('accordion_content'); ?>
<?php $builder = get_field('cae_content_builder'); ?>
<?php if(!is_404()): ?>
  <?php $workSlug = wp_get_post_terms($post->ID,'work', array("fields" => "slugs")); ?>
  <?php $template = get_page_template_slug( $post->ID ); ?>
<?php endif; ?>

  <?php do_action('get_header'); ?>

  <div id="page" class="wrapper <?php if($workSlug): echo $workSlug[0]; endif; ?>" role="document">
      <?php get_template_part('templates/header'); ?>

      <?php 
        // Only show the default page header/featured image if it is not the homepage or report
      if(!(is_front_page() || is_singular('report'))): get_template_part('templates/page','header'); endif; ?>

      <?php 
        // No Page Builder in Place, default view
      if(!$builder && ($template !== 'page-campaign-detail.php')): ?>
        <main class="main" role="main">
          <div class="container">
            <?php include roots_template_path(); ?>
          </div>
        </main>
      <?php 
        // If this is a campaign detail page
      elseif(!$builder && ($template == 'page-campaign-detail.php')): ?>
        <main class="main" role="main">
          <?php get_template_part('templates/header','nav'); ?>
          <?php get_template_part('templates/content/full-image'); ?>
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