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
define('DB_NAME', 'opdracht2awd');

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
define('AUTH_KEY',         '_wdT*{K[0?wb{Ys^]tH^M9h>b<+Kj0,cR`vx,I(QO$Y:/@y!TJFoDhJxz gZ2c4$');
define('SECURE_AUTH_KEY',  '5Q_p+8iuLa~>+LT/NIAV9|IyYr?Eup4:m/LU]-}=K=yh>fQ>&(~%7d4~+0lAlX23');
define('LOGGED_IN_KEY',    'pXwk_GkolCf}+5NMyd._u8YHjepO3|4 Z==Nt,qT8-Ggv)`V805OCK6~9qG51.7s');
define('NONCE_KEY',        'zQxIdp9WQ5YP6ZIea,1;bS0o0lPi-es-(4T&(6V^2D5;_m<7hWl-lt#vtJ<ETpN@');
define('AUTH_SALT',        '##RTjPY6^OgsJ{A~>lT7WceH1QGO<QrQcNuk)?c8@2:, BH}/()$sujZ9gv;+`.+');
define('SECURE_AUTH_SALT', '|CZGtJ_z!tgG*|>k2r4D t(beumEnWhF8(i@7P]v`lzwZP{x!, A|YT||UY)R1s;');
define('LOGGED_IN_SALT',   '!!%~Ooka!|govbdhn(o|NR!~`GGx_zmvo<4&EGqP)n6dSy:W;;N[h??+4t< TLH@');
define('NONCE_SALT',       '|s$cCf4|C-GDb(-|n>8`p]T6~jC1LqzEV) Cyw{OQ*9|Xd_w*|.c= W:@qVloD3X');

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
