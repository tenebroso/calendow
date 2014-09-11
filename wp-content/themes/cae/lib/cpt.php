<?php 

/* =============================================================================
   Jobs CPT
   ========================================================================== */

function jobs() {

	$labels = array(
		'name'                => 'Jobs',
		'singular_name'       => 'Job',
		'menu_name'           => 'Jobs',
		'parent_item_colon'   => 'Parent Job:',
		'all_items'           => 'All Jobs',
		'view_item'           => 'View Job',
		'add_new_item'        => 'Add New Job',
		'add_new'             => 'Add New',
		'edit_item'           => 'Edit Job',
		'update_item'         => 'Update Job',
		'search_items'        => 'Search Job',
		'not_found'           => 'Not found',
		'not_found_in_trash'  => 'Not found in Trash',
	);
	$args = array(
		'label'               => 'jobs',
		'description'         => 'Jobs for BLN',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', ),
		'hierarchical'        => false,
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
	register_post_type( 'jobs', $args );

}

//add_action( 'init', 'jobs', 0 );

/* =============================================================================
   Work CPT
   ========================================================================== */

function work() {

	$labels = array(
		'name'                => 'Work',
		'singular_name'       => 'Project',
		'menu_name'           => 'Projects',
		'parent_item_colon'   => 'Parent Project:',
		'all_items'           => 'All Projects',
		'view_item'           => 'View Project',
		'add_new_item'        => 'Add New Project',
		'add_new'             => 'Add New',
		'edit_item'           => 'Edit Project',
		'update_item'         => 'Update Project',
		'search_items'        => 'Search Projects',
		'not_found'           => 'Not found',
		'not_found_in_trash'  => 'Not found in Trash',
	);
	$args = array(
		'label'               => 'work',
		'description'         => 'Projects for BLN',
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

//add_action( 'init', 'work', 0 );

/* =============================================================================
   Team CPT
   ========================================================================== */

function team() {

	$labels = array(
		'name'                => 'Team',
		'singular_name'       => 'Team Member',
		'menu_name'           => 'Team Members',
		'parent_item_colon'   => 'Parent Team Member:',
		'all_items'           => 'All Team Members',
		'view_item'           => 'View Team Member',
		'add_new_item'        => 'Add New Team Member',
		'add_new'             => 'Add New',
		'edit_item'           => 'Edit Team Member',
		'update_item'         => 'Update Team Member',
		'search_items'        => 'Search Team Members',
		'not_found'           => 'Not found',
		'not_found_in_trash'  => 'Not found in Trash',
	);
	$args = array(
		'label'               => 'team',
		'description'         => 'BLN Team Members',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail','page-attributes'),
		'hierarchical'        => false,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => false,
		'capability_type'     => 'page',
	);
	register_post_type( 'team', $args );

}

//add_action( 'init', 'team', 0 );