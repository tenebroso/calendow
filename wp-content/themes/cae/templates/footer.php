<?php 
	// On certain pages, we show a grid navigation that is directly attached to the footer
	// The variable below is a check for that general grid
	$hasNav = get_field('footer-grid-nav'); ?>

<footer class="footer<?php if($hasNav): echo 'footer-add-padding'; endif; ?>" role="contentinfo">

	<?php if($hasNav): 
	 get_template_part('templates/footer/footer-post-nav'); 
	endif; ?>

  <div class="container">
    <div class="col-md-4 footer-logo">
      <img src="<?php echo img_dir(); ?>/svg/logo-footer.svg">
      <p class="footer-copyright">&copy; Copyright <?php echo date('Y'); ?> <?php bloginfo('title'); ?></p>
    </div>
    <div class="col-md-8 footer-nav text-right">
		  <p class="ui-group"><a href="/contact">Contact</a> <a href="/site-map">Site Map</a> /</p>
      <?php get_template_part('templates/footer/icons'); ?>
    </div>
  </div>

</footer>

<?php wp_footer(); ?>
