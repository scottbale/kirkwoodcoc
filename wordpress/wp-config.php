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
define('DB_NAME', 'database_name_here');

/** MySQL database username */
define('DB_USER', 'username_here');

/** MySQL database password */
define('DB_PASSWORD', 'password_here');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** uncomment for localhost copy */
define('WP_HOME','https://'.$_SERVER['HTTP_HOST']);
define('WP_SITEURL', 'https://'.$_SERVER['HTTP_HOST'].'/wordpress');

/* if( $_SERVER['HTTPS'] */
/*   //|| substr_count($_SERVER['SCRIPT_FILENAME'],"wp-admin") > 0  */
/*   //|| substr_count($_SERVER['SCRIPT_FILENAME'],"wp-login.php") > 0 */
/*     ) */
/*   { */
/*     // if we need to force SSL */
/*     define('WP_HOME','https://54.84.24.112:8443'); */
/*     define('WP_SITEURL', 'https://54.84.24.112:8443/wordpress'); */
/*   } */

/* else */
/*   { */
/*     // if we don't need to force SSL */
/*     define('WP_HOME','http://54.84.24.112:8080'); */
/*     define('WP_SITEURL', 'http://54.84.24.112:8080/wordpress'); */
/*   } */

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '!$|0{#&alI}:c]+Vf!q7v[rO+JmFV7zLhpl{-+M8K}TD<^gRC3PR,E?y4(sp`E1:');
define('SECURE_AUTH_KEY',  'K /{Gx?/]p|lZ!M)a21&aHqym|jxMnv|Ql^N+]zM!|KbpFK[)xKM /&S]q:J! &J');
define('LOGGED_IN_KEY',    '#BuCTC3U]3[O&^2{Jc1=/o3hEuK0O& bH{ys!jwP/X)e|(KHZx&upx6]Qu}paErg');
define('NONCE_KEY',        ')cncclz=Ak|[1~sh1t{jb$&;7(L5a[Al[+? X#&=S-oA-Q1@QT#+uqOf9teM|F:?');
define('AUTH_SALT',        'cxjia,|L;*gpR^zt$-D7LD2CZ,F>w;2qWZeM_TfT-<.W8>nb:#1LTp<SDE%LlcKW');
define('SECURE_AUTH_SALT', 'PcWK=L$Y;VubS^z3>4_`*_C0 D*/#*]dED$aq2!<$$l,?jB[Jym`1d;sFbd-RWT_');
define('LOGGED_IN_SALT',   'Ur+hu~XcNVyp#4V1eq<#PpCF@By@1+jh)%|;~iXq,j+~^3=O5LR4E^j>4|N@Wi7i');
define('NONCE_SALT',       'M9|@89@4l~|lm8ESJ$UEo^Rv6u%:%:Dr[)8FU0$47u-zOJ9+JP`TAri/LU4Za|MV');
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

/** 
 * Additional security 
 * codex.wordpress.org/Editing_wp-config.php
 */
define( 'DISALLOW_FILE_EDIT', true );
define( 'FORCE_SSL_ADMIN', true );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
