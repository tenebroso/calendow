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

/* =============================================================================
   Change Post to Blog
   ========================================================================== */

function cae_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Blog';
    $menu[5][0] = 'Blog';
    $menu[10][0] = 'Images';
    $submenu['edit.php'][5][0] = 'Blog';
    $submenu['edit.php'][10][0] = 'Add Blog Post';
    echo '';
}
function cae_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Blog';
    $labels->singular_name = 'Blog';
    $labels->add_new = 'Add New';
    $labels->add_new_item = 'Add New';
    $labels->edit_item = 'Edit Blog Post';
    $labels->new_item = 'Blog';
    $labels->view_item = 'View Blog Post';
    $labels->search_items = 'Search Blog Posts';
    $labels->not_found = 'No Blog Posts found';
    $labels->not_found_in_trash = 'No Blog Posts found in Trash';
    $labels->all_items = 'All Blog Posts';
    $labels->menu_name = 'Blog';
    $labels->name_admin_bar = 'Blog';
}
 
add_action( 'admin_menu', 'cae_change_post_label' );
add_action( 'init', 'cae_change_post_object' );