<header id="fixed" class="banner" role="banner">
  <div class="container">
  
    <a class="brand" href="<?php echo home_url(); ?>/"><img src="<?php echo img_dir(); ?>/svg/logo.svg"></a>
    
    <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav hidden utility-nav'));
      endif;
    ?>

	<div class="pull-right">
    	<?php get_search_form();?>
    	<a class="js-nav-trigger nav-collapse">

    	</a>
    </div>

  </div>
</header>