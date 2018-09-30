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
define('DB_NAME', 'bdm114585168_db');

/** MySQL database username */
define('DB_USER', 'bdm114585168');

/** MySQL database password */
define('DB_PASSWORD', 'qiujunpeng');

/** MySQL hostname */
define('DB_HOST', 'bdm114585168.my3w.com');

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
define('AUTH_KEY',         '=:Y=ecH|ZCy%NtB1:XBDPW ~|5j=t/AaVDI&Pc%Y4c<~#D3t+[[Ce`+aS|4ZS/8?');
define('SECURE_AUTH_KEY',  ',$.thqJ5D%SB<C&H;(~qrl(0hXq|b-VPMH!@Mh@*&I-|0A;q<].`Bta$pqA@Nqmy');
define('LOGGED_IN_KEY',    'sj4]i:w`jDSBk7h7a(SZZJPxk9R])g,gY1>b{oYhXV[:mpy)vUAqJBzUnr F2SSp');
define('NONCE_KEY',        '$76]S)C~w,^aCR-(9{#iLj{c_e7{#pPXfDS2[J(;!o?[pnujp2S?syPFgfSB_wur');
define('AUTH_SALT',        '#t!D@;WxVZ.WT^Mg2,,E,,J30zMW]JZ7TYf^1K#wym3b:d;=hE^|PB6jIe@Ii]t2');
define('SECURE_AUTH_SALT', 'c}6p#[hp&>iIje/NTlKgo1BM~J1XJsvMt6=m ?edfva +MW@Tb0dB|g@jqo*uQ)S');
define('LOGGED_IN_SALT',   'CAPZL!r73ZlcFYMf~pn[{{,BbeUORx]1D:>[{_bob/[-|OB3V7k0cOmbK@^dz=dy');
define('NONCE_SALT',       'p`!.j9&PFL_}&1f&Aup[BfSFOY1$t/I9[qzuX?i8N%pRbEO?B,L$WQuU7qFnGfgG');

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
