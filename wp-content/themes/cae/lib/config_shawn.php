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
   Transients
   ========================================================================== */

function delete_transients() {
     delete_transient( 'places' );
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

/* =============================================================================
   Add Campaigns Shortcode
   ========================================================================== */

function custom_query_shortcode($atts) {

   global $post;
   $thePost = $post->ID;

   // de-funkify query
   $the_query = array(
      'posts_per_page' => -1,
      'post_parent' => $thePost,
      'post_type' => 'page'
    );

   // query is made               
   query_posts($the_query);
   
   // Reset and setup variables
   $output = '';
   $temp_title = '';
   $temp_link = '';
   $large_image_url = '';

   $output .= "<ul class='campaign-grid'>";
   
   // the loop
   $i = 1; if (have_posts()) : while (have_posts()) : the_post();
   
      $temp_title = get_the_title($post->ID);
      $temp_link = get_permalink($post->ID);
      if($i == 2):
        $image_url = get_field('campaigns_grid_image_2');
          if(!$image_url): $image_url = 'http://placehold.it/267x525'; endif;
      else:
        $image_url = get_field('campaigns_grid_image_1');
          if(!$image_url): $image_url = 'http://placehold.it/267x260'; endif;
      endif;
      
      
      $output .= "<li style='background-image:url($image_url);'><a href='$temp_link'><h2 class='grid-title white-text'>$temp_title</h2></a></li>";
     
          
  $i++; endwhile; else:
   
      $output .= "nothing found.";
      
  endif;

  $output .= "</ul>";
   
   wp_reset_query();
   return $output;
   
}
add_shortcode("campaigns", "custom_query_shortcode");

/* =============================================================================
   Homepage AJAX filtering
   ========================================================================== */

$result = array();

function do_the_query($result, $args) {
  $query = new WP_Query( $args );
 
  if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();

    $result['response'] = get_template_part('templates/home/grid');

  endwhile; else: endif;

  wp_reset_postdata(); // need to reset on each query
}


function ajax_filter_get_posts( $taxonomy ) {
 
  // Verify nonce
  if( !isset( $_POST['afp_nonce'] ) || !wp_verify_nonce( $_POST['afp_nonce'], 'afp_nonce' ) )
    die('Sorry! There was a server error. Please try again.');
 
  $taxonomy = $_POST['taxonomy'];
  $tax = $_POST['tax'];
  $name = $_POST['name'];
  $postTypes = array('post', 'video', 'infographic', 'action', 'event', 'grant', 'newsletter', 'report', 'news');
  
  // WP Query
  $args = array(
    $tax => $taxonomy,
    'post_type' => $postTypes,
    'posts_per_page' => -1,
    'orderby' => 'date'
  );
 
  // If taxonomy is not set, remove key from array and get all posts
  if( !$taxonomy ) {
    unset($args['posts_per_page']);
  } else { ?>

  <div class="grid-item hero-item">
    <a href="/<?php echo $taxonomy; ?>">
      <div class="v-centered reset-margins">
        <p>Learn About</p>
        <h2 class="grid-title page-subtext caps"><?php echo $name; ?></h2>
        <img src="<?php echo img_dir(); ?>/health-happens-here-pin.png" >
      </div>
    </a>
  </div>

  <?php }
  
  if(is_array($taxonomy)){
    // if array we need to query multiple taxonomies...
    // post variables would need to be arrays like taxonomy[0] and tax[0]
    foreach($taxonomy as $key=>$val) {

      // WP Query
      $args = array(
        $tax[$key] => $taxonomy[$key],
        'post_type' => $postTypes,
        'posts_per_page' => -1,
        'orderby' => 'date'
      );

      //print_r($args); // can see what args are being passed...

      do_the_query($result, $args); // run the query function

    };

    foreach ($result as $item) {
      echo $item;
    } 


  } else {
    do_the_query($result, $args);
   
    //$result = json_encode($result);
    foreach ($result as $item) {
      echo $item;
    }    
  }



  die();
}
 
add_action('wp_ajax_filter_posts', 'ajax_filter_get_posts');
add_action('wp_ajax_nopriv_filter_posts', 'ajax_filter_get_posts');