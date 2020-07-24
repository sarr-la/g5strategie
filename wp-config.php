<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'g5strategie' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'VAacf%?.]R=pE)Nx~w0(xjZa-KGR}54MQC7:J<cuvay @N6#-Zzv{Xk8SEW`@zo6' );
define( 'SECURE_AUTH_KEY',  ':weL?2cWFWmn3QR%j8ty_}0D?!!e`mmY*J$AHwp~+jbp^N/.i(!YLmx5X3P~R&`g' );
define( 'LOGGED_IN_KEY',    'A<J#~>e]hRsp/kHYQJ[|6UEZ<RNZg+!jsFREnp0a*:Twy[E+=OilEfml[ v-_(R4' );
define( 'NONCE_KEY',        '7&H;~ZUL,^0HwktQDLnk8~Ku>/L!]&zh_}={h`n<]PIcv)OSj6?o`A )?Xl[|:hW' );
define( 'AUTH_SALT',        '[%~vJs()ue8xXULk9U.edhXVn3e=dS`4Qo5>!m2grc7#)$2fcFy6bTNz77;ccZS&' );
define( 'SECURE_AUTH_SALT', 'c<z!`6lyAQ8=?N.>|d}}$f90Bp vldS]cN{^M0!wcCvw AxjEANu-(@GhY$_.C-Z' );
define( 'LOGGED_IN_SALT',   'ulHGF&X:i`IA{8V|$&3W)}zpM_-F(2RrpQ~NMvySbVEzP*xk~BqUp3O/(u1ny9+]' );
define( 'NONCE_SALT',       '%{N<6k>%o_4TLqtnRc3B=gHn)oX5%w?iQh+$_sqbd_i{2C{St=+ M$uM&jQ<*XHi' );
define( 'FS_METHOD', 'direct' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
