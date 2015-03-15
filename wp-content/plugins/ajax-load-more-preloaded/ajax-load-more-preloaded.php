<?php
/*
Plugin Name: Ajax Load More: Preloaded
Plugin URI: http://connekthq.com/plugins/ajax-load-more/preloaded/
Description: Ajax Load More extension to preload content before making Ajax requests to your server.
Author: Darren Cooney
Twitter: @KaptonKaos
Author URI: http://connekthq.com
Version: 1.0
License: GPL
Copyright: Darren Cooney & Connekt Media
*/


define('ALM_PRELOADED_PATH', plugin_dir_path(__FILE__));
define('ALM_PRELOADED_URL', plugins_url('', __FILE__));
define('ALM_PRELOADED_VERSION', '1.0');
define('ALM_PRELOADED_RELEASE', 'February 10, 2015');

require 'plugin-updates/plugin-update-checker.php';
$ExampleUpdateChecker = PucFactory::buildUpdateChecker(
	'http://download.connekthq.com/alm-preloaded.json',
	__FILE__
);



/*
*  alm_preload_install
*  Install the Preloaded add-on
*
*  @since 1.0
*/

register_activation_hook( __FILE__, 'alm_preloaded_install' );
function alm_preloaded_install() {   
   if(!is_plugin_active('ajax-load-more/ajax-load-more.php')){	//if Ajax Load More is activated
   	die('You must install and activate <a href="https://wordpress.org/plugins/ajax-load-more/">Ajax Load More</a> before installing the Ajax Load More Preloaded add-on.');
	}	
}



if( !class_exists('ALMPreloadedPosts') ):
   class ALMPreloadedPosts{	   
   	function __construct(){		
   		 
   		add_action( 'alm_preload_installed', array(&$this, 'alm_is_preloaded_installed') );	
   	   add_filter( 'alm_preload_args', array(&$this, 'alm_preloaded_args' ), 10, 1 );	
   	   add_filter( 'alm_preload_inc', array(&$this, 'alm_preloaded_inc' ), 10, 5 );	
   	   
   	}   	   	
   	
   	
   	
   	/*
   	*  alm_preload_args
   	*  Build the preload query $args
   	*
   	*  @since 1.0
   	*/
   	
   	function alm_preloaded_args($a){	
   	   
      	$posts_per_page = $a['posts_per_page'];
      	$post_type = explode(",", $a['post_type']);  
      	$post_format = (isset($a['post_format'])) ? $a['post_format'] : '';
   		$category = (isset($a['category'])) ? $a['category'] : '';
   		$category__not_in = (isset($a['category__not_in'])) ? $a['category__not_in'] : '';
   		$tag = (isset($a['tag'])) ? $a['tag'] : '';
   		$tag__not_in = (isset($a['tag__not_in'])) ? $a['tag__not_in'] : '';
   		
   		// Taxonomy
   		$taxonomy = (isset($a['taxonomy'])) ? $a['taxonomy'] : '';
   		$taxonomy_terms = (isset($a['taxonomy_terms'])) ? $a['taxonomy_terms'] : '';
   		$taxonomy_operator = $a['taxonomy_operator'];
   		if(empty($taxonomy_operator))$taxonomy_operator = 'IN';
   		
   		// Custom Fields
   		$meta_key = (isset($a['meta_key'])) ? $a['meta_key'] : '';
   		$meta_value = (isset($a['meta_value'])) ? $a['meta_value'] : '';
   		$meta_compare = $a['meta_compare'];
   		if(empty($meta_compare)) $meta_compare = "IN";
   		
   		$s = (isset($a['search'])) ? $a['search'] : '';
   		$author_id = (isset($a['author'])) ? $a['author'] : '';		
   		
   		// Ordering
   		$order = (isset($a['order'])) ? $a['order'] : 'DESC';
   		$orderby = (isset($a['orderby'])) ? $a['orderby'] : 'date';
   		
   		// Exclude, Offset, Status
   		$exclude = (isset($a['exclude'])) ? $a['exclude'] : '';	
   		$offset = (isset($a['offset'])) ? $a['offset'] : 0;
   		$post_status = $a['post_status'];
   		if($post_status == '') $post_status = 'publish';
   		
      	// $args
   		$args = array(
   			'post_type' => $post_type,
   			'posts_per_page' => $posts_per_page,
   			'offset' => $offset,
   			'order' => $order,
   			'orderby' => $orderby,		
   			'post_status' => $post_status,		
   			'ignore_sticky_posts' => false,
   		);	
   		
   		// Post Format & taxonomy
   		if(!empty($post_format) || !empty($taxonomy)){	
   		   $args['tax_query'] = array(			
   				'relation' => 'AND',
   		      alm_get_tax_query($post_format, $taxonomy, $taxonomy_terms, $taxonomy_operator)
   		   );
   	   }	
   	   
   	   // Category
   		if(!empty($category)){
   			$args['category_name'] = $category;
   		}
         
         // Category Not In
   		if(!empty($category__not_in)){
   		   $exclude_cats = explode(",",$category__not_in);
   			$args['category__not_in'] = $exclude_cats;
   		}
         
         // Tag
   		if(!empty($tag)){
   			$args['tag'] = $tag;
   		} 		 
         
         // Tag Not In
   		if(!empty($tag__not_in)){
   		   $exclude_tags = explode(",",$tag__not_in);
   			$args['tag__not_in'] = $exclude_tags;
   		}
   	    
   	   // Date (not using date_query as there was issue with year/month archives)
   		if(!empty($year)){
      		$args['year'] = $year;
   	   } 
   	   if(!empty($month)){
      		$args['monthnum'] = $month;
   	   }  
   	   if(!empty($day)){
      		$args['day'] = $day;
   	   }	
   	   
   	   // Meta Query
   		if(!empty($meta_key) && !empty($meta_value)){
   			$args['meta_query'] = array(
   			   alm_get_meta_query($meta_key, $meta_value, $meta_compare)				
   			);
   	   }
         
         // Author
   		if(!empty($author_id)){
   			$args['author'] = $author_id;
   		}
         
         // Search Term
   		if(!empty($s)){
   			$args['s'] = $s;
   		}  
   	   
         // Meta_key, used for ordering by meta value
         if(!empty($meta_key)){
            $args['meta_key'] = $meta_key;
         }    	   
         
   		// Exclude posts
   		if(!empty($exclude)){
   			$exclude = explode(",",$exclude);
   			$args['post__not_in'] = $exclude;
   		}
   		
         // Language
   		if(!empty($lang)){
   			$args['lang'] = $lang;
   		}	
   		
   	   return $args;
      }
   	
   	
   	
   	/*
   	*  alm_preload_inc
   	*  Get the preloaded post include file
   	*
   	*  @since 1.0
   	*/
   	
   	function alm_preloaded_inc($repeater, $preload_type, $alm_found_posts, $alm_page, $alm_item){
	   	ob_start(); // As seen here - http://stackoverflow.com/a/1288634/921927
			$file = alm_get_current_repeater($repeater, $preload_type);
			include($file);
			$return = ob_get_contents();
			ob_end_clean();
			return $return;
	   }	
	    	
   	
   	
   	/*
   	*  alm_is_preload_installed
   	*  an empty function to determine if preload is true.
   	*
   	*  @since 1.0
   	*/
   	
   	function alm_is_preloaded_installed(){
   	   //Empty return
   	}	
   	
   }   	
   	
   	
   /*
   *  ALMPRELOAD
   *  The main function responsible for returning Ajax Load More PRELOAD.
   *
   *  @since 1.0
   */	
   
   function ALMPreloadedPosts(){
   	global $alm_preloaded_posts;
   
   	if( !isset($alm_preloaded_posts) ){
   		$alm_preloaded_posts = new ALMPreloadedPosts();
   	}
   
   	return $alm_preloaded_posts;
   }
   
   // initialize
   ALMPreloadedPosts();

endif; // class_exists check
