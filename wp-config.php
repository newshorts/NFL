<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
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
define('DB_NAME', 'sfsb_wordpress');

/** MySQL database username */
define('DB_USER', 'sfsb_admin');

/** MySQL database password */
define('DB_PASSWORD', 'superdata');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'gP61<}nj8?4sulmz-(` XK#%JcnI_nPpij5|;9u E6+x~s]r.r+6fzgp{0z^:e#b');
define('SECURE_AUTH_KEY',  '7},9}|x%@tG],Scxo~e-m[=ck1IeH+d03*oPN|*+0YK6zfcg.1Cph}N$||l@Zb~#');
define('LOGGED_IN_KEY',    '7/a6gMEMCnJA4`WG?cw??*_26wxhVqcCkfHe^:t+k&TYYR*imsSa fs_E[:HTp.1');
define('NONCE_KEY',        '<_H4h+Gt5dQHW+rZH[/_-&M`:}Bj/oRt|uzH{Jn+uh&u;y;Eeq1!NkLnhez LL,8');
define('AUTH_SALT',        's^?Im6vk`PHoF=KnO.>R>-l+svQ0wm +cc>q^WB6Jj=unEDO|_P#[bmT~u|a^_ef');
define('SECURE_AUTH_SALT', '@fyCZ<CKJ.!Cs74!@S;,*AFucsp+aHB}/J-U35N_-h+gLU4_g4+|WWk(ivqn$3BF');
define('LOGGED_IN_SALT',   '&4C| -OnUv&5m[nF@BA*_$kk/Ya^r~ohbng/%+yk7 t.;Ui;5/Mo%mE+*30gTcW`');
define('NONCE_SALT',       '}qRXB 7 P0E~}icVS`P41+dE+_4|!05xyn0#-j+{x^>xX3;7]-p~QwL=ob&o)}%6');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
