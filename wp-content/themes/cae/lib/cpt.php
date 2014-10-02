<?php

/* =============================================================================
   Custom Post Type Loop
   ========================================================================== */

function ce_register_post_type( $title, $args = array() ){
     
    $sanitizedTitle = sanitize_title( $title );
     
    $defaults = array(
            'labels' => array(
                'name' => $title . 's',
                'singular_name' => $title,
                'add_new_item' => 'Add New ' . $title,
                'edit_item' => 'Edit ' . $title,
                'new_item' => 'New ' . $title,
                'search_items' => 'Search ' . $title . 's',
                'not_found' => 'No ' . $title . 's found',
                'not_found_in_trash' => 'No ' . $title . 's found in trash'
            ),
            '_builtin' => false,
            'public' => true,
            'hierarchical' => false,
            'taxonomies' => array( ),
            'query_var' => true,
            'menu_position' => 6,
            'supports' => array( 'title', 'editor', 'thumbnail',),
            'rewrite' => array( 'slug' => $sanitizedTitle ),
            'has_archive' => false
        );
     
    $args = wp_parse_args( $args, $defaults );
    $postType = isset( $args['postType'] ) ? $args['postType'] : $sanitizedTitle;
    register_post_type( $postType, $args );
     
}

/* =============================================================================
   Custom Post Type Array
   http://designsbynickthegeek.com/tutorials/custom-post-types-made-easy
   ========================================================================== */

$postTypes = array(
    'Report' => '',
    'Newsletter' => '',
    'News' => array( 'labels' => array('name' => 'News') ),
    'Action' => '',
    'Event' => '',
    'Grant' => '',
    'Video' => '',
    'Infographic' => ''
);
 
foreach( $postTypes as $title => $args )
    ce_register_post_type( $title, $args );

/* =============================================================================
   Bump Media tab above post types
   ========================================================================== */

function custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;
     
    return array(
        'index.php', // Dashboard
        'separator1', // First separator
        'upload.php', // Media
        'separator-last', // Last separator
    );
}
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');