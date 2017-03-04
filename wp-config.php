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
define('DB_NAME', 'smartworksintl_555');

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
define('AUTH_KEY',         'f6qsw9n85trpoijjrrasm3q0d7ikmgtbwetnyhbf3c6dkai8fgbfht7t7qu3numo');
define('SECURE_AUTH_KEY',  'ttsjwuzaejdbrf2tegaue7o7bk40xevx6vj6bqrcoqn9gs3ybt9ugwvcqm7xb7vo');
define('LOGGED_IN_KEY',    '0o49ng3wjgk8vncdco0kszxl4tkdmarlyaeulcs42qsdxmx6rf9s4cquoorkjfwv');
define('NONCE_KEY',        'fhljlcp8kym8kuy0pfkhduwzkx7gzxtljii7acnomj8yp0upcgjwdk0oe7ptexb6');
define('AUTH_SALT',        'fnyvafhg9kqltlubgkaplhazusoiegsgukokuzjlufiks3uzv2gjwbmimzqntrkh');
define('SECURE_AUTH_SALT', '0lk46qyj7ijvxkbcoqyok34ewxcdwpznzx9r7tnszgelpgrpp0zbtzep4whvfowj');
define('LOGGED_IN_SALT',   '3gpmlm4zujgohab9qxbybbqyu94ragwrsbmjgyrr0qfqmif82cmyhvcgd3it1lj2');
define('NONCE_SALT',       'odkpt4ionegssj8ehnhv0klrqxdt1h6awpd8sknk0wzx8qodth0sejbfbqkhpp3l');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpdv_';

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
