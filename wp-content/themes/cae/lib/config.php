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
   Remove Transients
   ========================================================================== */

function delete_transients() {
     delete_transient( 'newsletters' );
     delete_transient( 'newsletter-archive' );
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
   Define pages that do not have a sidebar
   ========================================================================== */

add_image_size( 'homepage-thumb', 351, 329, true ); // (cropped)

/* =============================================================================
   Homepage AJAX filtering
   ========================================================================== */

$result = array();

function ajax_filter_get_posts( $taxonomy ) {
 
  // Verify nonce
  if( !isset( $_POST['afp_nonce'] ) || !wp_verify_nonce( $_POST['afp_nonce'], 'afp_nonce' ) )
    die('Sorry! There was a server error. Please try again.');
 
  $taxonomy = $_POST['taxonomy'];
  $tax = $_POST['tax'];
  $name = $_POST['name'];
  
  // WP Query
  $args = array(
    $tax => $taxonomy,
    'post_type' => 'any',
    'posts_per_page' => -1,
    'orderby' => 'type'
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
 
  $query = new WP_Query( $args );
 
if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();

    $result['response'] = get_template_part('templates/home/grid');
    //$result['status']   = 'success';

  endwhile; else: endif;
 
  //$result = json_encode($result);
  foreach ($result as $item) {
    echo $item;
  }

  die();
}
 
add_action('wp_ajax_filter_posts', 'ajax_filter_get_posts');
add_action('wp_ajax_nopriv_filter_posts', 'ajax_filter_get_posts');