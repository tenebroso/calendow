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
   Use Taxonomy name in FacetWP Filtering
   ========================================================================== */

function index_taxonomy_slugs( $params, $class ) {
// if this is a taxonomy facet...
if ( 'tax/' == substr( $params['facet_source'], 0, 4 ) ) {
    $taxonomy = substr( $params['facet_source'], 4 );
    $id = $params['facet_value'];
    $term = get_term_by( 'id', $id, $taxonomy );
    if ( isset( $term->slug ) ) {
        $params['facet_value'] = $term->slug;
    }
}
return $params;
}
add_filter( 'facetwp_index_row', 'index_taxonomy_slugs', 10, 2 );

function places_facet_html( $output, $params ) {
    if ( 'places' == $params['facet']['name'] ) {
      $output = '';
      foreach ( $params['values'] as $result ) {
          $output .= '<li class="facetwp-page" data-value="' . $result->facet_value . '"><a>';
          $output .= $result->facet_display_value;
          $output .= '</a></li>';
      }
  }
  return $output;
}

add_filter( 'facetwp_facet_html', 'places_facet_html', 10, 2 );

function campaigns_facet_html( $output, $params ) {
    if ( 'campaigns' == $params['facet']['name'] ) {
      $output = '';
      foreach ( $params['values'] as $result ) {
          $output .= '<li class="facetwp-page" data-value="' . $result->facet_value . '"><a>';
          $output .= $result->facet_display_value;
          $output .= '</a></li>';
      }
  }
  return $output;
}

add_filter( 'facetwp_facet_html', 'campaigns_facet_html', 10, 2 );