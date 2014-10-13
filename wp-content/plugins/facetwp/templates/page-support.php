<?php

if ( '' == get_option( 'facetwp_license', '' ) ) {
    echo '<h3>Active License Required</h3>';
    echo '<p>To access support, please activate your license in the "Settings" tab, then refresh the page.</p>';
    return;
}

$plugins = get_plugins();
$active_plugins = get_option( 'active_plugins', array() );
$theme = wp_get_theme();

ob_start();

?>
FacetWP License:          <?php echo '~' . substr( get_option( 'facetwp_license' ), -8 ) . "\n"; ?>
WordPress Version:        <?php echo get_bloginfo( 'version' ) . "\n"; ?>
Active Theme:             <?php echo $theme->get( 'Name' ) . ' ' . $theme->get( 'Version' ) . "\n"; ?>

PHP Version:              <?php echo phpversion() . "\n"; ?>
MySQL Version:            <?php echo $wpdb->get_var( "SELECT VERSION()" ) . "\n"; ?>
Web Server Info:          <?php echo $_SERVER['SERVER_SOFTWARE'] . "\n"; ?>

WordPress Memory Limit:   <?php echo WP_MEMORY_LIMIT . "\n"; ?>
PHP Memory Limit:         <?php echo ini_get( 'memory_limit' ) . "\n"; ?>
PHP Memory Usage:         <?php echo round( memory_get_usage( true ) / 1048576 ) . "M\n"; ?>
PHP Post Max Size:        <?php echo ini_get( 'post_max_size' ) . "\n"; ?>
PHP Time Limit:           <?php echo ini_get( 'max_execution_time' ) . "\n"; ?>

<?php
foreach ( $plugins as $plugin_path => $plugin ) {
    if ( in_array( $plugin_path, $active_plugins ) ) {
        echo $plugin['Name'] . ' ' . $plugin['Version'] . "\n";
    }
}

$sysinfo = ob_get_clean();
$sysinfo = str_replace( "\n", '{n}', trim( $sysinfo ) );
$sysinfo = urlencode( $sysinfo );
$email = urlencode( get_bloginfo( 'admin_email' ) );
?>
<iframe src="https://facetwp.com/create-ticket/?email=<?php echo $email; ?>&sysinfo=<?php echo $sysinfo; ?>" style="width:100%; height:600px"></iframe>
