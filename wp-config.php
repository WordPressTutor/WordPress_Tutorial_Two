<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'site2' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );



/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'kjkgV+,f/19%4b#NSwVB2RIhp/>iZARpGI2c1+D>48JBSbQl==WB(]e`k:_VBF_O' );
define( 'SECURE_AUTH_KEY',  ' Rwh2pi8.pl=X?%B8x,Kpp= /k`t+p6OWDO<oD|R|RD`:tz=^oAc+5s`3S[G`+$@' );
define( 'LOGGED_IN_KEY',    'C6d*aZ/bp*IgYj`*,0,zNSO4kLg,@K#:<f09-05^Sd/=_IiZzx|/#lg_7[,JM$%)' );
define( 'NONCE_KEY',        'sHnVrIf[3;IJXWMmo-I=Upfkn/R]Ck|?tzaE[7OVOv/l4pe~VH&WwmkFQSt{xvyj' );
define( 'AUTH_SALT',        'Q3U@>PJXo8;[?IoKT:T`*p~f:V}^*GOl/TQq07^Qr|UY.uK@gGB/Au^q5I7gFahY' );
define( 'SECURE_AUTH_SALT', 'HFZJ$Zj?XD~aAuCA@dgwCKVzLo>rLil&KE#z^x5Sa!stI/w^SV3M|8y2CTK87CAE' );
define( 'LOGGED_IN_SALT',   'V,PyCv+(qwCA)|sC|D8+>Al3T0QDEvJ[2z`.40Xab~Qn C%>7$8:Ixfsfc^}pDN|' );
define( 'NONCE_SALT',       'N1NumN]lak#%Sy4bkn^s>W]@zUZn&+8xqB$x_~ok=59u=^lDG@klT:K2h{aMHm%|' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
