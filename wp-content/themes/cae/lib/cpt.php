<?php 

/* =============================================================================
   Places CPT
   ========================================================================== */

function places() {

	$labels = array(
		'name'                => 'Places',
		'singular_name'       => 'Place',
		'menu_name'           => 'Places',
		'parent_item_colon'   => 'Parent Place:',
		'all_items'           => 'All Places',
		'view_item'           => 'View Place',
		'add_new_item'        => 'Add New Place',
		'add_new'             => 'Add New',
		'edit_item'           => 'Edit Place',
		'update_item'         => 'Update Place',
		'search_items'        => 'Search Place',
		'not_found'           => 'Not found',
		'not_found_in_trash'  => 'Not found in Trash',
	);
	$args = array(
		'label'               => 'place',
		'description'         => 'CAE Places',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail'),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'place', $args );

}

add_action( 'init', 'places', 0 );

/* =============================================================================
   Reports CPT
   ========================================================================== */

function reports() {

	$labels = array(
		'name'                => 'Reports',
		'singular_name'       => 'Report',
		'menu_name'           => 'Reports',
		'parent_item_colon'   => 'Parent Report:',
		'all_items'           => 'All Reports',
		'view_item'           => 'View Report',
		'add_new_item'        => 'Add New Report',
		'add_new'             => 'Add New',
		'edit_item'           => 'Edit Report',
		'update_item'         => 'Update Report',
		'search_items'        => 'Search Reports',
		'not_found'           => 'Not found',
		'not_found_in_trash'  => 'Not found in Trash',
	);
	$args = array(
		'label'               => 'report',
		'description'         => 'CAE Reports',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'work', $args );

}

add_action( 'init', 'reports', 0 );

/* =============================================================================
   Newsletters CPT
   ========================================================================== */

function newsletters() {

	$labels = array(
		'name'                => 'Newsletters',
		'singular_name'       => 'Newsletter',
		'menu_name'           => 'Newsletters',
		'parent_item_colon'   => 'Parent Newsletter:',
		'all_items'           => 'All Newsletters',
		'view_item'           => 'View Newsletter',
		'add_new_item'        => 'Add New Newsletter',
		'add_new'             => 'Add New',
		'edit_item'           => 'Edit Newsletter',
		'update_item'         => 'Update Newsletter',
		'search_items'        => 'Search Newsletters',
		'not_found'           => 'Not found',
		'not_found_in_trash'  => 'Not found in Trash',
	);
	$args = array(
		'label'               => 'newsletter',
		'description'         => 'CAE Newsletters',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'newsletter', $args );

}

add_action( 'init', 'newsletters', 0 );