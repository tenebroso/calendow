<?php

/* =============================================================================
   Remove the default Category & Tag. We are replacing these with Our Work, Campaigns and Places
   ========================================================================== */


function unregister_taxonomy(){
    register_taxonomy('post_tag', array());
    register_taxonomy('category', array());
}
add_action('init', 'unregister_taxonomy');

/* =============================================================================
   Register Our Work, Campaigns and Places
   ========================================================================== */

function our_work() {

	$labels = array(
		'name'                       => _x( 'Our Work', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Our Work', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Our Work', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                       => 'our-work',
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => false,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'rewrite'                    => false,
	);
	register_taxonomy( 'work', array( 'page', 'report', 'newsletter', 'news', 'action', 'event', 'grant', 'video', 'infographic', 'post' ), $args );

}

add_action( 'init', 'our_work', 0 );

function campaigns() {

	$labels = array(
		'name'                       => _x( 'Campaigns', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Campaign', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Campaigns', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'campaign', array( 'page', 'report', 'newsletter', 'news', 'action', 'event', 'grant', 'video', 'infographic', 'post' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'campaigns', 0 );


function places() {

	$labels = array(
		'name'                       => _x( 'Places', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Place', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Places', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'place', array( 'page', 'report', 'newsletter', 'news', 'action', 'event', 'grant', 'video', 'infographic', 'post' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'places', 0 );