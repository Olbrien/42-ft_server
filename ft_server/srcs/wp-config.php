<?php

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'BUZtRW)E(!!]GhE/->CUZ*)yPeP:4+I@&!n&!IhZ22FnW+K`|bH6RYW(PkO{}T3_');
define('SECURE_AUTH_KEY',  'mLv]E9 a|,@=@#em?-fFj.:!=nIe|l,]s?/U:Kq<B|:=x=[ZL8K()ARwDm$g&GOu');
define('LOGGED_IN_KEY',    'XXfGXaFg*[}kj3 sLsXhAD9D>]vKU-Im@fw)Q~K(Ka!r#040+rGYr.D2FQh@;Y(q');
define('NONCE_KEY',        '|D94C;/MJsJw=L?kl~m45 &e&vX|h%d*4x|[{d%9rl)0.yv(n}g)r.nr+83F;wmP');
define('AUTH_SALT',        'V!*/U]|^ 4SHQw!:iBwMERF5>6B|1_ne95]ZTg!g-|EkT*H3>iaQdAq-a )RWTg<');
define('SECURE_AUTH_SALT', 'q| #Kjlj;bWG427wwNO#]ox57fZjV^Dco*)DDRAq*e+)D*XCt}o4TGZ|Cv?M0@<u');
define('LOGGED_IN_SALT',   'ig;Atqig&7-QWZYu3`(4R7{)]ux-,DcG:S3v[{$ Oz@x5(#F:x@&->bE:P*@kWG>');
define('NONCE_SALT',       'E?l+1C(0LSn,84}3L4nm`AR*qzyEAN+,`zN,=d;+n,St(Csy ~oBvEkOpGrHv59P');


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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
