<nav class="nav-main">
	<a class="brand" href="<?php echo home_url(); ?>/"><img src="<?php echo img_dir(); ?>logo.svg"></a>
	<?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav hidden utility-nav'));
      endif;
    ?>
</nav>

<header class="banner" role="banner">
<!--   <div class="container">
  
        <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav utility-nav'));
          endif;
        ?>
    
  </div> -->
   <?php get_template_part('templates/page', 'header'); ?>
</header>
