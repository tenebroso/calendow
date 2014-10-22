<?php
/* =============================================================================
   Scripts & Stylesheets
   ========================================================================== */

function roots_scripts() {
    $get_assets = file_get_contents(get_stylesheet_directory() . '/assets/rev-manifest.json');
    $assets     = json_decode($get_assets, true);
    $assets     = array(
      'scripts'       => '/assets/js/scripts.js',
      'js'       => '/assets/js/site.js',
      'css'       => '/assets/css/main.css',
      'modernizr' => '/assets/vendor/modernizr.min.js',
      'jquery'    => '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'
    );

  wp_enqueue_style('roots_css', get_template_directory_uri() . $assets['css'], false, null);


  if (!is_admin() && current_theme_supports('jquery-cdn')) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', $assets['jquery'], array(), null, false);
    add_filter('script_loader_src', 'roots_jquery_local_fallback', 10, 2);
  }

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_enqueue_script('modernizr', get_template_directory_uri() . $assets['modernizr'], array(), null, false);
  wp_enqueue_script('jquery');
  wp_enqueue_script('vendor_js', get_template_directory_uri() . $assets['scripts'], array(), null, true);
  wp_enqueue_script('site_js', get_stylesheet_directory_uri() . $assets['js'], array(), null, true);
  wp_enqueue_script( 'isotope', '//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.0.0/isotope.pkgd.min.js', array(), '2.0.0', true );
}
add_action('wp_enqueue_scripts', 'roots_scripts', 100);

/* =============================================================================
   jQuery Local Fallback from CDN
   ========================================================================== */

function roots_jquery_local_fallback($src, $handle = null) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/vendor/jquery/dist/jquery.min.js?1.11.1"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}
add_action('wp_head', 'roots_jquery_local_fallback');

/* =============================================================================
   Google Analytics Snippet from HTML5 Boilerplate
   ========================================================================== */

function roots_google_analytics() { ?>
<script>
  <?php if (WP_ENV === 'production') : ?>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
  <?php else : ?>
    function ga() {
      console.log('GoogleAnalytics: ' + [].slice.call(arguments));
    }
  <?php endif; ?>
  ga('create','<?php echo GOOGLE_ANALYTICS_ID; ?>','auto');ga('send','pageview');
</script>

<?php }
if (GOOGLE_ANALYTICS_ID && (WP_ENV !== 'production' || !current_user_can('manage_options'))) {
  add_action('wp_footer', 'roots_google_analytics', 20);
}

/* =============================================================================
   Typekit if required
   ========================================================================== */

function bln_typekit() { ?>
  <script type="text/javascript" src="//use.typekit.net/<?php echo TYPEKIT_ID; ?>.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<?php } 
if (TYPEKIT_ID) {
  add_action('wp_head','bln_typekit',10);
}