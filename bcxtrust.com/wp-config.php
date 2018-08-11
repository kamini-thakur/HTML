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
define('DB_NAME', 'bcxtrust');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'mediabaseapps123');

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
define('AUTH_KEY',         'cY 9W0r8}k2We80K-mRcr7F!MacxXSQW%S E*F4etNbkGX*WC5cwHarxin/o_rDo');
define('SECURE_AUTH_KEY',  'HCj$%7+;FTC/aToh(%Gq,N;|=X[9YjD!ScO!JVH/yYikGUR/btusG^7.ZH3g0a?|');
define('LOGGED_IN_KEY',    'G@l?N^6T32e2<V_R/Oq,m_aaIu]hXq:Px2+`bR&>D@,GO9poPjtxu9t*IB_p7?)_');
define('NONCE_KEY',        'Rn,@,X8p{1+4C%k,-T@16B?<K5dPx%%PGX%!I)VacMa2[t%cOq>O`Kp.ji7q^wN6');
define('AUTH_SALT',        'W~jLqWky RmRpz73zhnkOLf=OkjibUL?f!DncbFh^I<Dp+Vp97z9F[;,3BDv6[`G');
define('SECURE_AUTH_SALT', 'f(jbE!u8~:T-enSMxxk3^.$e?1Gc%d>T8#RqWp%3`4J2=^oMLlu=xYUdqQ|7Oa{1');
define('LOGGED_IN_SALT',   '[O6I=Oe>!|uyrH}Eivd/a[i}QSO*oB/n1] eG7n:A=<Ker]YHnv=FaWv_iQ;w}ur');
define('NONCE_SALT',       'dhok3n8{sKsj!-oVCuw4%>-6rP!Fa;vZ.qbB^hj>q@SX3R33`Y!A?4H$<g@hw5LP');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
define('FS_METHOD', 'direct');
