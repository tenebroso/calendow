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

define('GOOGLE_ANALYTICS_ID', 'UA-102979-9');

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

    acf_add_options_sub_page(
      array(
        'title' => 'Oakland Map',
        'capability' => 'edit_posts'
      )
    );

    acf_add_options_sub_page(
      array(
        'title' => 'Los Angeles Map',
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
   Add Pullquote Shortcode
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
   Add Drivers of Change Shortcode
   ========================================================================== */

function drivers_shortcode($atts) {

   
   // Reset and setup variables
   $output = '';
   $temp_title = '';
   $temp_link = '';
   $large_image_url = '';

   $output .= "<ul class='doc__module'>";

   if( have_rows('drivers_of_change_builder','options') ):

    while ( have_rows('drivers_of_change_builder','options') ) : the_row();

      $docUrl = get_sub_field('drivers_url');
      $docTitle = get_sub_field('drivers_text_block');

        $output .= "<li class='doc__module--item'><a class='doc__module--item-link' href='$docUrl'>$docTitle</a></li>";

    endwhile; else : endif;

  $output .= "<li class='clearfix'></li>";
  $output .= "</ul>";
   
   wp_reset_query();
   return $output;
   
}
add_shortcode("drivers", "drivers_shortcode");

/* =============================================================================
   Add Content Map Shortcode
   ========================================================================== */

function content_map_shortcode($atts) {

   global $post;
   $thePost = $post->ID;

   $a = shortcode_atts( array(
      'id' => 'content-map',
    ), $atts );

   $mapId = $a['id'];

   // de-funkify query
   $the_query = array(
      'posts_per_page' => 1,
      'post_type' => 'content-map',
      'p' => $mapId
    );

   // query is made               
   query_posts($the_query);
   
   // Reset and setup variables
   $output = '';

   $output .= "<div class='content-map--container' id='cm-modal'>";
   
   
   $i = 0; if (have_posts()) : while (have_posts()) : the_post();

    // schools
      if( have_rows('cm_schools') ): 

        $output .= "<div class='content-map--container-column schools'>";
        $output .= "<div class='content-map--container-column-title'><strong>Health Happens in Schools</strong></div>";

        $output .= "<div class='content-map--container-column-outline'>";

        while ( have_rows('cm_schools') ) : 

        the_row();

          $buttonTitle = get_sub_field('cm_button_title');
          $buttonModal = get_sub_field('cm_modal_content');

          $output .= "<a class='content-map--container-column-cell schools' href='#cm-modal' data-id='$i'>$buttonTitle</a>";
          $output .= "<div class='mfp-hide content-map--modal schools'>";
          $output .= "<div class='content-map--modal-heading'><strong>Health Happens in Schools</strong><br />$buttonTitle</div>";
          $output .= "<div class='content-map--modal-content'>";
          $output .= $buttonModal;
          $output .= "</div></div>";

        $i++; endwhile;

        $output .= "</div></div>";

      else : endif;

   // neighborhoods

      if( have_rows('cm_neighborhoods') ): 

        $output .= "<div class='content-map--container-column neighborhoods'>";
        $output .= "<div class='content-map--container-column-title'><strong>Health Happens in Neighborhoods</strong></div>";

        $output .= "<div class='content-map--container-column-outline'>";

        while ( have_rows('cm_neighborhoods') ) : 

        the_row();

          $buttonTitle = get_sub_field('cm_button_title');
          $buttonModal = get_sub_field('cm_modal_content');

          $output .= "<a class='content-map--container-column-cell neighborhoods' href='#cm-modal' data-id='$i'>$buttonTitle</a>";
          $output .= "<div class='mfp-hide content-map--modal neighborhoods'>";
          $output .= "<div class='content-map--modal-heading'><strong>Health Happens in Neighborhoods</strong><br />$buttonTitle</div>";
          $output .= "<div class='content-map--modal-content'>";
          $output .= $buttonModal;
          $output .= "</div></div>";

        $i++; endwhile;

        $output .= "</div></div>";

      else : endif;

      // prevention

      if( have_rows('cm_prevention') ): 

        $output .= "<div class='content-map--container-column prevention'>";
        $output .= "<div class='content-map--container-column-title'><strong>Health Happens in Prevention</strong></div>";

        $output .= "<div class='content-map--container-column-outline'>";

        while ( have_rows('cm_prevention') ) : 

        the_row();

          $buttonTitle = get_sub_field('cm_button_title');
          $buttonModal = get_sub_field('cm_modal_content');

          $output .= "<a class='content-map--container-column-cell prevention' href='#cm-modal' data-id='$i'>$buttonTitle</a>";
          $output .= "<div class='mfp-hide content-map--modal prevention'>";
          $output .= "<div class='content-map--modal-heading'><strong>Health Happens in Prevention</strong><br />$buttonTitle</div>";
          $output .= "<div class='content-map--modal-content'>";
          $output .= $buttonModal;
          $output .= "</div></div>";

        $i++; endwhile;

        $output .= "</div></div>";

      else : endif;

     
          
  endwhile; else:
   
      $output .= "nothing found.";
      
  endif;

  $output .= "</div>";
   
   wp_reset_query();
   return $output;
   
}
add_shortcode("content-map", "content_map_shortcode");

/* =============================================================================
   Add Content Map ID to post column for using in shortcode
   ========================================================================== */

add_filter( 'manage_content-map_posts_columns', 'revealid_add_id_column', 5 );
add_action( 'manage_content-map_posts_custom_column', 'revealid_id_column_content', 5, 2 );


function revealid_add_id_column( $columns ) {
   $columns['revealid_id'] = 'ID';
   return $columns;
}

function revealid_id_column_content( $column, $id ) {
  if( 'revealid_id' == $column ) {
    echo $id;
  }
}

/* =============================================================================
   Add Contact ID to post column for using in shortcode
   ========================================================================== */

add_filter( 'manage_contact_posts_columns', 'revealid_add_id_contact_column', 5 );
add_action( 'manage_contact_posts_custom_column', 'revealid_id_contact_column_content', 5, 2 );


function revealid_add_id_contact_column( $columns2 ) {
   $columns2['revealid_id'] = 'ID';
   return $columns2;
}

function revealid_id_contact_column_content( $column2, $id2 ) {
  if( 'revealid_id' == $column2 ) {
    echo $id2;
  }
}

/* =============================================================================
   AJAX filtering
   ========================================================================== */

$result = array();

function home_query($result, $args) {

        $filterquery = new WP_Query($args);

        if ($filterquery->have_posts()) : while ($filterquery->have_posts()) : $filterquery->the_post();

            $result['response'] = get_template_part('templates/home/grid');

        endwhile; else: endif;

        wp_reset_postdata();
}

function newsletter_query($result, $args) {

        $filterquery = new WP_Query($args);

        if ($filterquery->have_posts()) : while ($filterquery->have_posts()) : $filterquery->the_post();

            $result['response'] = get_template_part('templates/newsletter/newsletters','grid');

        endwhile; else: endif;

        wp_reset_postdata();
}

function ajax_filter_get_posts($taxonomy) {

        // Verify nonce
        if (!isset($_POST['afp_nonce']) || !wp_verify_nonce($_POST['afp_nonce'], 'afp_nonce'))
                die('Sorry! There was a server error. Please try again.');

        $tax_details = $_POST['tax_details'];

        $pageTitle = $_POST['page_title'];

        $count = count($tax_details);
        
        $html = '';

        foreach ($tax_details as $tax){
                
                $tax_query[] = array(
                    'taxonomy'  => $tax['taxonomy'],
                    'field'     => 'slug',
                    'terms'     => array($tax['term']),
                    'custom'     => $tax['custom']
                );
                
                ob_start();
                ?>
                <div class="grid-item hero-item">
                        <a href="<?php echo $tax['custom']; ?>">
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

        if($pageTitle == 'Newsletters'):

          $postTypes = array('newsletter');

        elseif($pageTitle == 'Press Releases'):

          $postTypes = array('press-release');

        else:

          $postTypes = array('post', 'video', 'infographic', 'action', 'event', 'grant', 'newsletter', 'report', 'news');

        endif;

       
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

        if($pageTitle == 'Newsletters' || $pageTitle == 'Press Releases'):

          newsletter_query($result, $args);

        else:
        
          home_query($result, $args);

        endif;

        //$result = json_encode($result);
        foreach ($result as $item) {
          echo $item;
        }
        
        die();
}

add_action('wp_ajax_filter_posts', 'ajax_filter_get_posts');
add_action('wp_ajax_nopriv_filter_posts', 'ajax_filter_get_posts');


/*
Plugin Name: Bit.ly Shortlinks
Version: 0.3
Plugin URI: http://yoast.com/wordpress/bitly-shortlinks/
Description: Use Bit.ly shortlinks instead of the shortlink WP generates. Works with Bit.ly Pro too, so you can immediately use the right URL.
Author: Joost de Valk
Author URI: http://yoast.com/
*/

function yoast_bitly_shortlink($url, $id, $context, $allow_slugs) {
  $poststatus = get_post_status($id);
  $statusesthatgetshortlinks = array('publish','future','private');
  if ( ( ( is_singular() && !is_preview() ) || $context == 'post' ) && in_array($poststatus, $statusesthatgetshortlinks, true) ){
    $short = get_post_meta($id, '_yoast_bitlylink', true);
    $url = get_permalink( $id );
    //if shortlink doesn't exist
    if ( !$short || $short == '' ) {
      if ( !defined('BITLY_USERNAME') || !defined('BITLY_APIKEY') ) {
        $short = 'http://yoast.com/wordpress/bitly-shortlinks/configure-bitly/';
      } else {
        //send permalink to bitly to shorten
        //ref: http://dev.bitly.com/best_practices.html
        $req = 'http://api.bit.ly/v3/shorten?format=txt&longUrl='.urlencode($url).'&login='.BITLY_USERNAME.'&apiKey='.BITLY_APIKEY;
        if ( defined('BITLY_JMP') && BITLY_JMP )
          $req .= '&domain=j.mp';
        //receive shortlink from bitly
        $resp = wp_remote_get( $req );
        if ( !is_wp_error( $resp ) && is_array( $resp['response'] ) && 200 == $resp['response']['code'] ) {
          $short = trim( $resp['body'] );
          update_post_meta( $id, '_yoast_bitlylink', $short);
        }
      }
    }
    //can add this to wp-config.php: define('BITLY_VERIFY', true);
    //if shortlink already exists, verify it is correct
    //ref: http://dev.bitly.com/rate_limiting.html -- 403 response if API rate limited per http://dev.bitly.com/formats.html
    elseif( defined('BITLY_VERIFY') && constant('BITLY_VERIFY') == true ) {
      if( defined('BITLY_USERNAME') && defined('BITLY_APIKEY') ) {
        $reqv = 'http://api.bit.ly/v3/expand?format=txt&shortUrl='.$short.'&login='.BITLY_USERNAME.'&apiKey='.BITLY_APIKEY;
        $respv = wp_remote_get( $reqv );
        if ( !is_wp_error( $respv ) && is_array( $respv['response'] ) && 200 == $respv['response']['code'] ) {
          $long = trim( $respv['body'] );
          //if the shortlink does not expand to permalink
          if( $long != $url ) {
            delete_post_meta( $id, '_yoast_bitlylink');
          }
        }
      }
    }
    return $short;
  }
  return false;
}
add_filter( 'pre_get_shortlink', 'yoast_bitly_shortlink', 99, 4 );

function yoast_bitly_admin_bar_menu() {
  global $wp_admin_bar, $post;

  if ( !isset($post->ID) )
    return;

  $short = wp_get_shortlink( $post->ID, 'query' );

  if ( is_singular() && !is_preview() ) {
    if ( $short != 'http://yoast.com/wordpress/bitly-shortlinks/configure-bitly/' )
      $shortstats = $short.'+';

    // Remove the old shortlink menu, because it has some weird JS issues with admin bar when giving it submenu's.
    $wp_admin_bar->remove_menu('get-shortlink');
    $wp_admin_bar->add_menu( array( 'id' => 'shortlink', 'title' => __( 'Bit.ly' ), 'href' => 'javascript:prompt(&#39;Short Link:&#39;, &#39;'.$short.'&#39;); return false;' ) );
    $wp_admin_bar->add_menu( array( 'parent' => 'shortlink', 'id' => 'yoast_bitly-link', 'title' => __( 'Bit.ly Link' ), 'href' => 'javascript:prompt(&#39;Short Link:&#39;, &#39;'.$short.'&#39;); return false;' ) );
    $wp_admin_bar->add_menu( array( 'parent' => 'shortlink', 'id' => 'yoast_bitly-twitterlink', 'title' => __( 'Share on Twitter' ), 'href' => 'http://twitter.com/?status='.str_replace('+','%20', urlencode( $post->post_title.' - '.$short) ) ) );
    $wp_admin_bar->add_menu( array( 'parent' => 'shortlink', 'id' => 'yoast_bitly-stats', 'title' => __( 'Bit.ly Stats' ), 'href' => $shortstats, 'meta' => array('target' => '_blank') ) );
  }
}
add_action( 'admin_bar_menu', 'yoast_bitly_admin_bar_menu', 95 );

/* =============================================================================
   Add Contact Module Shortcode
   ========================================================================== */

function contact_module_shortcode($atts) {

   global $post;
   $thePost = $post->ID;

   $b = shortcode_atts( array(
      'id' => 'contact',
    ), $atts );

   $contactId = $b['id'];

   // de-funkify query
   $the_query = array(
      'posts_per_page' => 1,
      'post_type' => 'contact',
      'p' => $contactId
    );

   // query is made               
   query_posts($the_query);
   
   // Reset and setup variables
   $contactOutput = '';

   $contactOutput .= "<div class='contact-module--container'>";
   $contactOutput .= "<div class='contact-module--container-field'><strong class='form-title'>Contact</strong></div>";
   
   
   $i = 0; if (have_posts()) : while (have_posts()) : the_post();

          $name = get_field('name');
          $title = get_field('title');
          $address = get_field('address');
          $phone = get_field('phone');
          $twitter = get_field('twitter');
          $facebook = get_field('facebook');
          $instagram = get_field('instagram');
          $youtube = get_field('youtube');
          $optional = get_field('optional_open_field');
          $optionalTitle = get_field('optional_open_field_title');
          $form = get_field('form');

          if($name):
            $contactOutput .= "<div class='contact-module--container-field'><strong>Name</strong><br />";
            $contactOutput .= $name;
            $contactOutput .= "</div>";
          endif;

          if($title):
            $contactOutput .= "<div class='contact-module--container-field'><strong>Title</strong><br />";
            $contactOutput .= $title;
            $contactOutput .= "</div>";
          endif;

          if($address):
            $contactOutput .= "<div class='contact-module--container-field'><strong>Address</strong><br />";
            $contactOutput .= $address;
            $contactOutput .= "</div>";
          endif;

          if($phone):
            $contactOutput .= "<div class='contact-module--container-field'><strong>Phone</strong><br />";
            $contactOutput .= $phone;
            $contactOutput .= "</div>";
          endif;

          if($twitter || $facebook || $instagram || $youtube):
            $contactOutput .= "<div class='contact-module--container-field'><strong>Social</strong><br />";
            
            if($twitter):
              $contactOutput .= '<a class="contact-module--container-field-social" href="'.$twitter.'">';
              $contactOutput .= 'Twitter';
              $contactOutput .= "</a>";
            endif;

            if($youtube):
              $contactOutput .= '<a class="contact-module--container-field-social" href="'.$youtube.'">';
              $contactOutput .= 'Youtube';
              $contactOutput .= "</a>";
            endif;

            if($facebook):
              $contactOutput .= '<a class="contact-module--container-field-social" href="'.$facebook.'">';
              $contactOutput .= 'Facebook';
              $contactOutput .= "</a>";
            endif;

            if($instagram):
              $contactOutput .= '<a class="contact-module--container-field-social" href="'.$instagram.'">';
              $contactOutput .= 'Instagram';
              $contactOutput .= "</a>";
            endif;

          $contactOutput .= '</div>';

          endif;

          if($optional):
            $contactOutput .= "<div class='contact-module--container-field'><strong>";
            $contactOutput .= $optionalTitle;
            $contactOutput .= "</strong><br />";
            $contactOutput .= $optional;
            $contactOutput .= "</div>";
          endif;

          if($form):
            $contactOutput .= "<div class='contact-module--container-field-form'><strong class='form-title'>Send Email</strong><br />";
            $contactOutput .= do_shortcode('[gravityform id="' . $form['id'] . '" title="false" description="false" ajax="true"]');
            $contactOutput .= "</div>";
          endif;

          
  endwhile; else:
   
      $contactOutput .= "nothing found.";
      
  endif;

  $contactOutput .= "</div>";
   
   wp_reset_query();
   return $contactOutput;
   
}
add_shortcode("contact", "contact_module_shortcode");