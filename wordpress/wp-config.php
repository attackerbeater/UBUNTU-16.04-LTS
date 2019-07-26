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
define( 'DB_NAME', 'wordpress_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'ujohn1234' );

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
define( 'AUTH_KEY',         '-JGGh#Oku=2dRE!hfV2FS]*p#;%fIG^6]r#xPmNL)JCH0|_sqN-Wd;}MF.JDiP_p' );
define( 'SECURE_AUTH_KEY',  '&y #KPH|fi31,7E7lc+[Svk#m P%8[Dr&A#Qz^6[9I&7V =5~!2Q-e3~,X_:=EI}' );
define( 'LOGGED_IN_KEY',    '*XXWuan3C!>g|A-8$Yy>Yt]OEI4mvBq6hZR+#P-JRED/1/Y/vFCcvsA+8ZLv!?Uy' );
define( 'NONCE_KEY',        'XHp8w=j~Gymk-|T[b S}s4:q/i}{Ie@=U).B%T)7I_wW++6ZHs^AWZE~<R,GkCh1' );
define( 'AUTH_SALT',        'iv{<P;%O6 #b3>:^3d46Qi;/W?..sg-]_H~J^2lCf;cr)UXYM<0J:$F3dkP[(g!Y' );
define( 'SECURE_AUTH_SALT', 'eB5VUk;Uu6@`/y[j|KDRROnN?F{JBcd}vA3e7U3T1ZFt]+}4)Xj{}aEF0h?+VynG' );
define( 'LOGGED_IN_SALT',   '7Q~%U?d}L1D-WYE&Lt>)C%Z,EY(zLWEy~[<R5=y7e;Ps{U9$%?`Rj0t:T6+-p9zj' );
define( 'NONCE_SALT',       'F2*8[uxpYjznL4gV)!N!M_L<=ZLa}Ak;JurpJcb62&)FdUy~2ns*C>zFOHT;J5{z' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
