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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'gymfitness' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'mudasser' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'SZr[JV*Tvc9!nuCkfhj7;S=L d+yp_;Zwi8Y;|<~9POZ*jnR1S#(XS&+n8S^-6n9' );
define( 'SECURE_AUTH_KEY',  '1)Syjm&TRVrLK4cJ5aWnnC!hni{N5v9sJ>X8VN!z!AH.RR>{;$eTwH~`}#E&[^6k' );
define( 'LOGGED_IN_KEY',    'w=n-#*c,&O1u`K/G(h/CG^GP!(>|I2)]H{@l2dU?!GxD}=xGSStU]4tF8a^~[_5w' );
define( 'NONCE_KEY',        ']j?.oGA>*3# KO0-]0&#6+=BAy3KYE9y?fOJ7!R,<prH~qXlsi)6|ppNpCejqySB' );
define( 'AUTH_SALT',        '&mrD3.!cvYH34q6_SA5Im2iF$^h<ZFo9l557^n5G YJGbiTVu.SQVWn=-i|[(I`_' );
define( 'SECURE_AUTH_SALT', ')TqfM~/T8-N:f;:RuTj}irqtv1Gu6s6,WdR?+oiigm(/wiw<14=Dg}/,U_}rUm{C' );
define( 'LOGGED_IN_SALT',   'WEj#_sL$a^~MG*bJR3:#qaoqC4N^Nl: hbP0o1j]ja`5u#&~J/oIvS)e~PL.Q=v@' );
define( 'NONCE_SALT',       '-fx[N28L^b8Dmc][<br79^f-dh`{(fq2hSO5v_>M})#9Ike4<MOAXZCn}2G!h@+1' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define( 'FS_METHOD', 'direct' );

