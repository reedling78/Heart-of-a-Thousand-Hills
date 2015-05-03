<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'Heart-of-a-Thousand');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'Ygop4% k[!U:[f_ru7_T++B/g@CA>+M5IEHKnwm5SyCO=6jO#L+U48FO-Ov k9.z');
define('SECURE_AUTH_KEY',  '$tv-<>+{+KQNuLt0qt[6jo(-|r]^4n1sBgaTH,M;XmpQdSHa>~}(g5!jz1a.yH$(');
define('LOGGED_IN_KEY',    'H.FE B|W[>*)L]K1--4%C,R/p3@j|d<HAFWGGfsgBY%WI1V$/vP4T[!$M|}p/K7Z');
define('NONCE_KEY',        '{>RKW}_~*mgBu_n)dUVS4NTYB3Un#O:Q=#s#v@CS;t%SagZjw<MJ;Y10../;cBq2');
define('AUTH_SALT',        '%=&lDIZ@^Fc2@L NE_OqA-3+dN=-1jgV(yB: qI*D/Xq`|nH-xf5V8P%-CaSt2B(');
define('SECURE_AUTH_SALT', '.dU~%|i5{k:*Xx }-EEU`yA]:lQ{v2%U`2g*Bx!IX6CI^p-Q7U!,1 *n-dS#6]zF');
define('LOGGED_IN_SALT',   'RHj:a+,j/6nivh4`Hlr%]Rw`K6OZO};}MsQ8.tJrfX_3Wfo)T+lIF>T0m=f.vY-r');
define('NONCE_SALT',       '_Oj^xT,0Cyx9.XNsk$AmP?bUIlJ9?f`1t4_j~ZRq[SM:-[ZvxA2vVO08--X@Xi;0');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
