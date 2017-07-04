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
define('DB_NAME', 'mail-wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         ',9$aAb!;0HtPJES8(wx6f&[hI2lBuARSq8qvtoc/t1SPIQiH{(1e)1TM}+E2g6X=');
define('SECURE_AUTH_KEY',  '0bD4/B}DUpt(36K:J}?N,*o;Wjw93t#fNAa&zoT:=B-(L!lNar%5Wi{_ K.ye3ob');
define('LOGGED_IN_KEY',    '@99.yb{~uZGl1iHD*3[w;;5$6AT%Z^H>njJ{:9t<`;wu[#o;@:Kb ,g&9$/$:4x}');
define('NONCE_KEY',        ',0a_PY8e2,j%}!h#Rg S)A^TXe1DrF}^l1xjt-&F203^2Qnce9]J5C[@}5(jpa(n');
define('AUTH_SALT',        '6w[iAz^73{go,Ch`izJ%@<H)oO-%(+rAj>7w8EWwylwUx]em<f9w?#M)d7*67L_g');
define('SECURE_AUTH_SALT', 'KO+``b0eP;K+NLb65VrV-Dvt09N{%0m/PClLd ZSE1oEVorux[`VjJ4Njq4Kt4lN');
define('LOGGED_IN_SALT',   'uKYUIwk:cjx|_<g+](]$.TuHraKj(~RRB@*vPEy}&a]U(K#lj#TXbb1sW>[eoMMK');
define('NONCE_SALT',       '2R@sd`$BRlo&<%j&tl[0-6`O2:X-p9mMC0y7C[;+X6Ql`PW?y?8j`OJej<}(Z_!W');

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
