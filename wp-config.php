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
define( 'DB_NAME', 'kakamega_exhb' );

/** MySQL database username */
define( 'DB_USER', 'kakamega_exhb' );

/** MySQL database password */
define( 'DB_PASSWORD', 'S7p1cX[!8b' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'cfhbylrkwjqr8b0sfwd15swn8itdyo2ua8eepk2aoqwwidhhlvkkr7db4xsrsghl' );
define( 'SECURE_AUTH_KEY',  'rbjgftfiiqanxn7n234plmvwewkovif8pv0hidubrnevlvo3mrbyhhycqiv6gpdj' );
define( 'LOGGED_IN_KEY',    'crf65rilh70qql5ndmyfmaywbftidboamddss66lxjeyilv7bkycdp1wiehsals3' );
define( 'NONCE_KEY',        '5tkf1lpny9mooyivqhqj0larfx7kbgkilkpdbttycwyf5bfc7afpmj6zn4dgmdv8' );
define( 'AUTH_SALT',        't1xg9ganwvsqzgosaxyzqdl2u69kyvagp3jltkfjky8ll1so550pgwmpnrqmzpor' );
define( 'SECURE_AUTH_SALT', 'lsqtirij38vhdljhrfoggkwhawlayjjq33xectrjkgi4qsdvio0bhapovytfqqqu' );
define( 'LOGGED_IN_SALT',   'xp98tlk3m4tv4bqbmqm5onxeuezackuy9cuuimkwxbkmm5dy0vluqtzwzokmglwr' );
define( 'NONCE_SALT',       'ythdtifkpmuflqo5nrw0tj1erw0fl9igia594zysgfsma7yr8otnvwko0b3ourqw' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpvv_';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
