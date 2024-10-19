<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sitio' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'GU3[?;e>a@#/7(tx9pI,_knU<3g$2D#Ppa?oW`_sk?=hlY{0{JI7jd64W8]E;K;i' );
define( 'SECURE_AUTH_KEY',  'G5, I6cOPEC*-rir)f>e>3i5u_38^#G$^Ny^T~^@Q9Rb^=[MB?$_42Gq.,f~Ud}8' );
define( 'LOGGED_IN_KEY',    'C8%K7gY[&OT@)GVBt#`sPXDaaQp`SKPvCzhaXSt+s1uOf:E:D&[!ba=$fS{P)r@>' );
define( 'NONCE_KEY',        'It`j0d@U*5oSWKAMd:}vwlz&[zR-XmPOS;~oZ|;IxLm^RIO[jHsEq^Xglq1tQq^ ' );
define( 'AUTH_SALT',        'c?sQ8Wv`D~ILptl2.GUvPI~Gf;AQmmP6RpItu,*J,~+d*xn<c|Inr3E9Q^A0:29J' );
define( 'SECURE_AUTH_SALT', 'KV4<!rUoO.A`i=0,!(6g2U=#RjIo(C&PS=u/s|$dWjg|3N(7%;6A<P_peK0;NZ.7' );
define( 'LOGGED_IN_SALT',   '&|jd!eIb14n:d*F[.U:~T[V^A| S+p9?}V;`H)!Fiv+la2eN?xq3&q0k ~u?4j!m' );
define( 'NONCE_SALT',       '4_EO/uk BpWucYY0-x8LuXeDlTNd(pHW`S+eGNT}u1~Q-UG2]oa2Pve>#@qa?qO.' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
