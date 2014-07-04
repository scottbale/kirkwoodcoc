<?php
/** 
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information by
 * visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
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
define('DB_NAME', 'kirkwoodcoc2');

/** MySQL database username */
define('DB_USER', 'wp');

/** MySQL database password */
define('DB_PASSWORD', 'wp');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', '');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** uncomment for localhost copy */
define('WP_HOME','http://kirkwoodcoc.localhost');
define('WP_SITEURL','http://kirkwoodcoc.localhost/wordpress');

/**#@+
 * Authentication Unique Keys.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link http://api.wordpress.org/secret-key/1.1/ WordPress.org secret-key service}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',        'EFaTeHx_;|SM]S(IEV$!IY{Yo/<Jly+BY-]#Yc-PH@u;$6SBRDw+FCz~8yA6TjO7');
define('SECURE_AUTH_KEY', 'G=YAW.uC0r@P<V.]`N5|+rSzH|&IZtkkETP+@}-H-y~UM:L|8a}o**SRFxb2>> #');
define('LOGGED_IN_KEY',   'A$uI=uOT=3JL~;@zjIG6()Abwb8J)+6k}o$+%YE>bzKmb)A_-.6,]tQ,fg{[~nsQ');
define('NONCE_KEY',       '-<o*}&~s9Jh/r{1<%:K~NbG-J^sQ*GPcMa2(jud<<-@iOf6GRvJcPUQrI+iCj9uv');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'kwcoc_';
 

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
?>
