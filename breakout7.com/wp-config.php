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
define('DB_NAME', 'breakout');

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
define('AUTH_KEY',         '<huro,*9`UntAzM%MB07QKa`/}z1<WIJvcQze!i!D*S=y|cXdR:Sh787P<}D}Sn)');
define('SECURE_AUTH_KEY',  '>M_ 4x?g4) JBK#;*US|x%we(ExU;n1.@c>*k,IiafaY[(yCg6Hl`li.x[FwO{W9');
define('LOGGED_IN_KEY',    'rJ$3YE6X#)iw.ULNGyKvwsuYCSBN*8/uaY[2l$_#&U2>gi?&3l]`tqf?v Q3!}hT');
define('NONCE_KEY',        'dw+3Ai$u;kOsmI7MFVxc]&R0-HZ;lwicOD7TR<x`(2s9X/r9VAZl`Hyb_w76rkII');
define('AUTH_SALT',        'w5kqyr*z>g,4?$>0AsEJeUV,kc#+.Cl0Cxcu~!<{x6RVHs~qn(D2V^v7*`x&5X{i');
define('SECURE_AUTH_SALT', '7pr;wb!G6E_)[?lTOt L[@LQjyzW+z^l4bheB@AHX5y`B1H2ytsU!#DNKKYT71sk');
define('LOGGED_IN_SALT',   'I6y#i+d;WA,vS+Wf%[PDVY8F+h!r`RiKsb]pZ/{>C9a8N`KmR2#t(),V8xrqI<]#');
define('NONCE_SALT',       ' G`!3dYnE)K/1S=KTgU|$kN~TRb+>3RXhz=}8P)Ux,/}~%b$sbEtsw?[jiXRO ;b');

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