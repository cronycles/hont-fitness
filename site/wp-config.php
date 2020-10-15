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
define( 'DB_NAME', 'crointhe_wp' );

/** MySQL database username */
define( 'DB_USER', 'crointhe_cronycles' );

/** MySQL database password */
define( 'DB_PASSWORD', 'CSidex142!G' );

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
define( 'AUTH_KEY',         '7r=zHbqS4jw}oYtvp*6,5d;l6L)jH=l}ze.]m7snonqY;V:n=vAqHz2=n]2pHtd/' );
define( 'SECURE_AUTH_KEY',  'm[jPM;<BL_S6vL?a#.%}Mc&?~67ixD+`fm#IQ,AsUc4l1emXAnch@Et}?X^TvX`[' );
define( 'LOGGED_IN_KEY',    'ygEUl;~~t8+a0`R} -KDU@f0[>/=M9|qh{1d=@iQ5Y^J(3q_C=%7c5=z0>5(JDnr' );
define( 'NONCE_KEY',        'eof_=r>AIW~}^$ei9Pu7@`H0*wBLf&3;~Qz.SqZz^$:IH.jxCA*.-y0=x3Y$Cw2Z' );
define( 'AUTH_SALT',        '.a^]<iX4ny4hFwPH{KIsVl0=U}Nch~wvi8u[C$b(g `t~hZ_PxdX_S?//3`[+b?W' );
define( 'SECURE_AUTH_SALT', 'B$0y8S(nk,E[Iv;4b=AIMq}RW;3I&zql K/x>6atB}E.*D^;YGL,Ox5Z *>:&cZ8' );
define( 'LOGGED_IN_SALT',   'KkK-DaF6Du30glh-Vh7vC^pr(^hzl1D8KLMlq]8Af6gGDy)d=RK +B$`vn-Y|qC`' );
define( 'NONCE_SALT',       '4|mVE|P,ge]~<o*&.3?53ODJN-B%Zm,U+q mGbqiZFbl<x4P]#z8yadGZiQ4A6M~' );

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
