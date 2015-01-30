<?php

function cae_add_mce_button()
{
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) )	// check user permissions
	{
		return;
	}

	if ( 'true' == get_user_option( 'rich_editing' ) ) 	// WYSIWYG enabled?
	{
		add_filter( 'mce_external_plugins', 'cae_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'cae_register_mce_button' );
	}
}
add_action('admin_head', 'cae_add_mce_button');

function cae_add_tinymce_plugin( $plugin_array ) // script for the new button
{
	$plugin_array['cae_mce_button'] =  get_stylesheet_directory_uri() .'/assets/vendor/pullQuote.js';
	return $plugin_array;
}

function cae_register_mce_button( $buttons ) // register the new button
{
	array_push( $buttons, 'cae_mce_button' );
	return $buttons;
}

function cae_mce_css() { 
	wp_enqueue_style('gavickpro-tc', get_stylesheet_directory_uri() .'/assets/vendor/pullQuote.css' ); 
}  

add_action('admin_enqueue_scripts', 'cae_mce_css');

/* Functions taken from AJ Clarke: http://www.wpexplorer.com/wordpress-tinymce-tweaks/ */
?>