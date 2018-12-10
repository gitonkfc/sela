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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'polycroll');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'kolkijn123');

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
define('AUTH_KEY',         'tPA9ca/=g&QBB g-[a,0<e-AlUi3^<)cn7;1Uf|r/RI;!P![$:Ht!3vTQe7am/kr');
define('SECURE_AUTH_KEY',  '@j0}Q$dJo]+9BWOe?(/}~T4LBry!3=)4 ZrOFY66Rx=mq)%K^; gVvE5.TI8Th57');
define('LOGGED_IN_KEY',    'Sy};! bb_o,SqQXBmL$Y<qxH|Pi?WDL+)kvN3oD*)s]wci:/AR`QBH9u#P!FgM`r');
define('NONCE_KEY',        '3b{EzZ/%=`2]mqUSy/At,]=[<9~ypY.KPyv<i28buY?PP>^S4<r@-i9(!&`odLZz');
define('AUTH_SALT',        'Z|aTmk!PolZk*#GCi#2PWG3YP9nkWt{e4UQnVA7N() o/_jOV!olFIYbjI7FTc)d');
define('SECURE_AUTH_SALT', 'RK?8}+Tfevj?:HpfX)5u`T8w]g5zOAB Td+:Je*YeX~xBUM-(hd+u087AU>D~`l`');
define('LOGGED_IN_SALT',   'a{#7;31M;Y*uQ$}_l/T(vJ:z8KVFl=[^x)Z*69vz-l##X9m%LA{F=YVB?<&j?jrT');
define('NONCE_SALT',       'Rw?maol2%c~m/<P@2A33mvBU0La+4?-%dF$oVAF+bMWFt=NGIaaol:^>iwK0d%J+');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);
define( 'WP_DEBUG_DISPLAY', true );
define( 'WP_DEBUG_LOG', true );



/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
@ini_set( 'upload_max_size' , '200M' );
@ini_set( 'post_max_size', '13M');
@ini_set( 'memory_limit', '15M' );