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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'AU6wqxEngK1shP1oh4FqtgPJ3BM5Tdd4thauyFlQsHwycDUd74g9JlXEXgfSxgbYuTnr9JBC2AN5femkItSGqg==');
define('SECURE_AUTH_KEY',  'dkAD6ZaL88Xxcup36DE3RFbBmml61MadHBrq3MtVbfPDf4ak+sGrm8MiuAsFPI3sd+9wuuqbDLVO0seAQaXf/A==');
define('LOGGED_IN_KEY',    'USrpHVAiZjSQsRMLnGId/qM6x9ujbybv5EYUFJ08KIEncsQj9/xBx5WiSWQ8bBIOVzbBdvAbn83nkpEGJiU3uw==');
define('NONCE_KEY',        '/ln9Ofz3/hG9U/4q79iYjGeTH6vVl0GMGMw3P6fF5PnXRn15yN9YyVwjx6qnkO+1kDn3KTKmgaqKoYzX9l3c7g==');
define('AUTH_SALT',        'C4jvnSOVGnupmUsKO2dIAQexNldk+mfr1S2Sl80xHfxd6Pxo1uRzUrN8YH7bAT9mQ1RDa0m1IZHuTyKP9J+rIA==');
define('SECURE_AUTH_SALT', 'OLA4yG5dyvZCYaUyW6QoBlJy20NLqM8PP7aHPjo2HE9RtkwkoKQF/4AZ1Eud2i9EuSTR7iZ8NoAb1AI9L6UM8g==');
define('LOGGED_IN_SALT',   'gh30Aj5C1bTA2rlkjJvl1iJ4XUPaJQZGNVg7yA+LdkqcUyNI0e7mgwAdT+bCVqIvc0ggzHl2S4PhMyJbM/tMng==');
define('NONCE_SALT',       'fnKj4MTZXhLxV2B4cBjt5YdNWfFTdoFer4abQgbzlyBm2Djm27zfMkRKcS/DNH5aeq2dg/nm/VKSb3+QhvAykw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
