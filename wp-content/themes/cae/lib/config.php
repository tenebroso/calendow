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

define('TYPEKIT_ID', 'jvo7ecn');

/* =============================================================================
   Transients
   ========================================================================== */

function delete_transients() {
     delete_transient( 'places' );
}

add_action( 'edit_post', 'delete_transients' );

/* =============================================================================
   Add Menu Options page to Options
   ========================================================================== */


if( function_exists('acf_add_options_sub_page') )
{
    acf_add_options_sub_page(
      array(
        'title' => 'Menu Options',
       //'parent' => 'acf-options-cae-options',
        'capability' => 'manage_options',
        'position' => 7
      )
    );

    acf_add_options_sub_page(
      array(
        'title' => 'Drivers of Change',
        'capability' => 'edit_posts'
      )
    );
}

if( function_exists('acf_set_options_page_title') )
{
    acf_set_options_page_title( __('CAE Options') );
}

function options_css(){ ?>

  <style>
    li.toplevel_page_acf-options-menu-options .wp-menu-image:before {
      content: '';
      background: url(../wp-content/themes/cae/assets/img/svg/pin.svg);
      background-size: 14px;
      background-repeat: no-repeat;
      background-position: center center;
    }
    li.toplevel_page_acf-options-menu-options .menu-top {
      background: #272A3F;
    }
    li.toplevel_page_ajax-load-more,
    li.menu-icon-comments {
      display: none;
    }
    </style>

<?php } 

add_action('admin_head', 'options_css');

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
   Customize Login Logo
   ========================================================================== */

function cae_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/svg/logo-v2.svg);
            padding-bottom: 30px;
            background-size: contain;
            width: 320px;
            height: 70px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'cae_login_logo' );

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
   Add Pullquote
   ========================================================================== */

function pullquote_shortcode_pullquote( $atts, $content = null ) {

  return '<div class="pullquote">' . esc_html( $content ) . '</div>';

}

add_shortcode( 'pullquote', 'pullquote_shortcode_pullquote' );

/* =============================================================================
   Add Button Shortcode
   ========================================================================== */

function button_shortcode( $atts, $content = null ) {

  $a = shortcode_atts( array(
    'textcolor' => 'button',
    'bgcolor' => 'button',
    'bghovercolor' => 'button',
    'text' => 'button',
    'link' => 'button'
  ), $atts );

  $btnClass = rand();

  $btn = '<a class="btn btn-' . $btnClass . '" style="text-decoration:none;color:' . esc_attr($a['textcolor']) .';background-color:' . esc_attr($a['bgcolor']) .';" href="' . esc_attr($a['link']) .'">' . esc_attr( $a['text'] ) . '</a>';
  $btn .= '<style type="text/css">.btn-'.$btnClass.':hover { background-color:' . esc_attr($a['bghovercolor']) .' !important; }</style>';

  return $btn;

}

add_shortcode( 'button', 'button_shortcode' );

/* =============================================================================
   Homepage AJAX filtering
   ========================================================================== */

$result = array();

function do_the_query($result, $args) {
        $query = new WP_Query($args);

        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

                        $result['response'] = get_template_part('templates/home/grid');

                endwhile;
        else: endif;

        wp_reset_postdata(); // need to reset on each query
}

function ajax_filter_get_posts($taxonomy) {

        // Verify nonce
        if (!isset($_POST['afp_nonce']) || !wp_verify_nonce($_POST['afp_nonce'], 'afp_nonce'))
                die('Sorry! There was a server error. Please try again.');

        $tax_details = $_POST['tax_details'];

        $count = $tax_details.length;
        
        $html = '';
        
        foreach ($tax_details as $tax){
                
                $tax_query[] = array(
                    'taxonomy'  => $tax['taxonomy'],
                    'field'     => 'slug',
                    'terms'     => array($tax['term'])
                );
                
                ob_start();
                ?>
                <div class="grid-item hero-item">
                        <a href="/<?php echo $tax['taxonomy']; ?>">
                                <div class="v-centered reset-margins">
                                        <p>Learn About</p>
                                        <h2 class="grid-title page-subtext caps"><?php echo $tax['name']; ?></h2>
                                        <img src="<?php echo img_dir(); ?>/health-happens-here-pin.png" >
                                </div>
                        </a>
                </div>
                <?php
                $html .= ob_get_clean();
        }
        
        
        if ($count>1){
                $tax_query['relation'] = 'AND';
        }
        
        $postTypes = array('post', 'video', 'infographic', 'action', 'event', 'grant', 'newsletter', 'report', 'news');

        // WP Query
        $args = array(
            'post_type' => $postTypes,
            'posts_per_page' => -1,
            'tax_query' => $tax_query
        );

        // If taxonomy is not set, remove key from array and get all posts
        if (empty($tax_details)) {
                unset($args['posts_per_page']);
        } else {
                echo $html;
        }
        
        $result = array();
        
        do_the_query($result, $args);

        //$result = json_encode($result);
        foreach ($result as $item) {
                echo $item;
        }
        
        die();
}

add_action('wp_ajax_filter_posts', 'ajax_filter_get_posts');
add_action('wp_ajax_nopriv_filter_posts', 'ajax_filter_get_posts');