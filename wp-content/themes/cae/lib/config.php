<?php

/* =============================================================================
   Enable Theme Features
   ========================================================================== */

add_theme_support('bootstrap-gallery');
add_theme_support('jquery-cdn');

/* =============================================================================
   Setup theme URL
   ========================================================================== */

function img_dir(){
      return "/wp-content/themes/cae/assets/img";
}

/* =============================================================================
   Google Analytics Universal ID
   ========================================================================== */

define('GOOGLE_ANALYTICS_ID', '');

/* =============================================================================
   Typekit ID
   ========================================================================== */

define('TYPEKIT_ID', 'ibb1lji');

/* =============================================================================
   Remove Transients
   ========================================================================== */

function delete_transients() {
     delete_transient( 'newsletters' );
     delete_transient( 'newsletter-archive' );
}

add_action( 'edit_post', 'delete_transients' );

/* =============================================================================
   Define pages that do not have a sidebar
   ========================================================================== */

function root_display_sidebar() {
  $sidebar_config = new Roots_Sidebar(
    array(
      'is_404',
      'is_page',
      'is_single'
    ),
    array(
      //'template-fullwidth.php'
    )
  );

  return apply_filters('roots/display_sidebar', $sidebar_config->display);
}