<?php 
	// On certain pages, we show a grid navigation that is directly attached to the footer
	// The variable below is a check for that general grid
  if(!is_404()): $template = get_page_template_slug( $post->ID ); else: $template = '404'; endif; 
	$hasNav = ($template == 'page-campaign-overview.php' || $template == 'page-campaign-detail.php'); ?>

<footer class="footer<?php if($hasNav): echo ' footer-add-padding'; endif; ?>" role="contentinfo">

	<?php if($hasNav): 
	 get_template_part('templates/footer/footer-post-nav'); 
	endif; ?>

  <div class="container">
    <div class="col-md-4 footer-logo">
      <img src="<?php echo img_dir(); ?>/svg/logo-footer.svg">
      <p class="footer-copyright">&copy; Copyright <?php echo date('Y'); ?> <?php bloginfo('title'); ?></p>
    </div>
    <div class="col-md-8 footer-nav text-right">
		  <p class="ui-group"><a href="/contact/">Contact</a> <a href="/sitemap/">Site Map</a> /</p>
      <?php get_template_part('templates/footer/icons'); ?>
    </div>
  </div>

</footer>
<?php wp_footer(); ?>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<script src="//apis.google.com/js/platform.js"></script>