<footer class="content-info footer" role="contentinfo">
  <div class="container">
    <div class="col-xs-3">

    </div>
    <div class="col-xs-9">
		<?php
          if (has_nav_menu('footer')) :
            wp_nav_menu(array('theme_location' => 'footer', 'menu_class' => 'nav footer-nav'));
          endif;
        ?>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
