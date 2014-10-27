<?php

/* =============================================================================
   Custom excerpt
   ========================================================================== */

function roots_excerpt_more($more) {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Read on', 'roots') . '</a>';
}

add_filter('excerpt_more', 'roots_excerpt_more');

/* =============================================================================
   Custom WP_Title() output
   ========================================================================== */

function roots_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}

add_filter('wp_title', 'roots_wp_title', 10);

/* =============================================================================
   Hide ACF Menu from Non-Devs
   ========================================================================== */

function remove_acf_menu()
{

  $admins = array( 
    'jonbukiewicz'
  );

  $current_user = wp_get_current_user();

  if( !in_array( $current_user->user_login, $admins ) )
  {
    remove_menu_page('edit.php?post_type=acf');
  }

}

add_action( 'admin_menu', 'remove_acf_menu', 999 );

/* =============================================================================
   Enable SVG Upload
   ========================================================================== */

function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

add_filter( 'upload_mimes', 'cc_mime_types' );

/* =============================================================================
   Define Environment if blank
   ========================================================================== */

if (!defined('WP_ENV')) {
  define('WP_ENV', 'development'); // scripts.php checks for values 'production' or 'development'
}

/* =============================================================================
   Register Additional Nav (Sub-navs)
   ========================================================================== */

register_nav_menus( array(
    'footer' => 'Footer Navigation',
    //'primary_navigation' => 'Primary Navigation'
  ) 
);

/* =============================================================================
   Move Yoast to the Bottom
   ========================================================================== */

function yoasttobottom() {
    return 'low';
}

add_filter( 'wpseo_metabox_prio', 'yoasttobottom');