<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ca_endow');

/** MySQL database username */
define('DB_USER', 'ca_endow');

/** MySQL database password */
define('DB_PASSWORD', 'PEUKMLmU');

/** MySQL hostname */
define('DB_HOST', 'wcst-staging.cxvefgi4j12x.us-east-1.rds.amazonaws.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'SC:.`Y>ka%%Bs>3b$.!-j. !butr|vu%sCL%VV{_|fJ+PuZDMUQPcOSD-5J?P6<0');
define('SECURE_AUTH_KEY',  'N=jJHd#fj@x^NLhOqsN++xR`g,U^-@>.a-5*,gE|of/$zKS(9n@{J:UT9WA].6X)');
define('LOGGED_IN_KEY',    '/F]U5MY-mQ,8^O4HMi/ 5+&P[bq3DHh{W7-aaIk-Vf<ea@e+L;l{|Q9G8mam`}-/');
define('NONCE_KEY',        '!L-Z`0f^w+d;Bx &ZAaM>|l#~4E-3[NWK2D0Ac,^(,pR?| ?Ee?=3m}CFQp2CgQq');
define('AUTH_SALT',        'z*1Hk|cCq_OTpqi|%nnkjt;)gWXX5H;5Tc3.:xRY%F~H]vSpShpE^|v#n)HDn-ea');
define('SECURE_AUTH_SALT', '_W*>Eb|?[p|})0HLz8.!1|cO74-AmuTACz4PQF5J4{[@9 o5)n|KHt89uv10N7.D');
define('LOGGED_IN_SALT',   'EQ%u<h+yph-Z*L%li>r13R7FN,.i |xvz|i+2eK/Kuj?S>9Y+qtP:Nui7c~XF+C:');
define('NONCE_SALT',       '-5zP|}[0P|/#,DrkfPEoj1+f(GAV5wo+$2<k%;MM@;W.W_L;mF4Ky/f[eP5!+_+6');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('DISALLOW_FILE_EDIT',true);
define('WP_DEBUG', false);

define( 'AWS_ACCESS_KEY_ID', 'AKIAIE3VANGH3O725CEA' );
define( 'AWS_SECRET_ACCESS_KEY', '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' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
