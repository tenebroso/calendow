<?php

/* =============================================================================
   Custom Post Type Loop
   ========================================================================== */

function ce_register_post_type( $cptitle, $args = array() ){
     
    $sanitizedTitle = sanitize_title( $cptitle );
     
    $defaults = array(
            'labels' => array(
                'name' => $cptitle . 's',
                'singular_name' => $cptitle,
                'add_new_item' => 'Add New ' . $cptitle,
                'edit_item' => 'Edit ' . $cptitle,
                'new_item' => 'New ' . $cptitle,
                'search_items' => 'Search ' . $cptitle . 's',
                'not_found' => 'No ' . $cptitle . 's found',
                'not_found_in_trash' => 'No ' . $cptitle . 's found in trash'
            ),
            //'_builtin' => false,
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
    'Report' => array('supports' => array( 'title') ),
    'Newsletter' => '',
    'Press Release' => '',
    'News' => array( 'labels' => array('name' => 'News') ),
    'Action' => '',
    'Event' => '',
    'Grant' => '',
    'Video' => '',
    'Infographic' => '',
    'Read This Tile' => array('public' => false, 'publicly_queryable' => true, 'show_ui' => true, 'supports' => array( 'title')),
    'Content Map' => array('public' => false, 'publicly_queryable' => true, 'show_ui' => true, 'supports' => array( 'title'))
);
 
foreach( $postTypes as $cptitle => $args )
    ce_register_post_type( $cptitle, $args );

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