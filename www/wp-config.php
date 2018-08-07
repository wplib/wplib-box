<?php


if ( getcwd()=='/var/www' && isset( $_SERVER[ 'HTTP_HOST' ] ) ) {
	$hostname = $_SERVER[ 'HTTP_HOST' ];
} else if ( is_file( __DIR__ . '/../HOSTNAME' ) ) {
	$hostname = file_get_contents( __DIR__ . '/../HOSTNAME' );
} else {
	$hostname = 'wplib.box';
}
if ( defined( 'WP_CLI' ) && WP_CLI ) {
	$_SERVER[ 'HTTP_HOST' ] = $hostname;
} else {
	define( 'WP_CLI', false );
}

if ( ! isset( $_SERVER[ 'HTTP_HOST' ] ) ) {
	trigger_error( '$_SERVER[ \'HTTP_HOST\' ] not set (server may be misconfigured)' );
	exit;
}

define( 'BOX_HOST', preg_match( '#^www\.(.+)$#', $hostname )
	? preg_replace( '#^www\.(.+)$#', '$1', $hostname )
	: $hostname
);

define( 'BOX_LOCAL_CONFIG', __DIR__ . '/wp-config-' . BOX_HOST . '.php' );
if ( isset( $_ENV[ 'WPLIB_BOX' ] ) && ! is_file( BOX_LOCAL_CONFIG ) ) {
	file_put_contents( BOX_LOCAL_CONFIG, "<?php\n#\n# Local configuration for {$hostname}\n#\n" );
}
unset( $hostname );

/**
 * Search for a wp-config-{HTTP_HOST}.php in current
 * and parent directories for config overrides
 */
if ( file_exists( dirname( __FILE__ ) . BOX_LOCAL_CONFIG ) ) {
	require( dirname( __FILE__ ) . BOX_LOCAL_CONFIG );
} else if ( file_exists( dirname( dirname( __FILE__ ) ) . BOX_LOCAL_CONFIG ) ) {
	require( dirname( dirname( __FILE__ ) ) . BOX_LOCAL_CONFIG );
}

if ( ! defined( 'BOX_DIRECTORY_LAYOUT' ) ) {
	if ( is_dir( dirname( __FILE__ ) . '/wp-includes' ) ) {
		define( 'BOX_DIRECTORY_LAYOUT', 'standard' );
	} else if ( is_dir( dirname( __FILE__ ) . '/wp/wp-includes' ) ) {
		define( 'BOX_DIRECTORY_LAYOUT', 'skeleton' );
	} else {
		trigger_error( 'WordPress includes directory not found (expected at ' . dirname( __FILE__ ) . '/wp-includes/)' );
		exit;
	}
}

if ( ! defined( 'BOX_URL_SCHEME' ) ) {
	define( 'BOX_URL_SCHEME', 'https' );
}

if ( ! defined( 'SITE_DOMAIN' ) ) {
	define( 'SITE_DOMAIN', $_SERVER[ 'HTTP_HOST' ] );
}

define( 'WP_HOME', BOX_URL_SCHEME . '://' . SITE_DOMAIN );

if ( 'standard' === BOX_DIRECTORY_LAYOUT ) {
	define( 'WP_SITEURL', BOX_URL_SCHEME . '://' . SITE_DOMAIN );

} else if ( 'skeleton' === BOX_DIRECTORY_LAYOUT ) {
	define( 'WP_SITEURL', BOX_URL_SCHEME . '://' . SITE_DOMAIN . '/wp' );
	define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );
	define( 'WP_CONTENT_URL', BOX_URL_SCHEME . '://' . SITE_DOMAIN . '/content' );
}

if ( ! defined( 'DB_NAME' ) ) {
	define( 'DB_NAME', isset( $_ENV[ 'DB_NAME' ] ) ? $_ENV[ 'DB_NAME' ] : 'wordpress' );
}

if ( ! defined( 'DB_USER' ) ) {
	define( 'DB_USER', isset( $_ENV[ 'DB_USER' ] ) ? $_ENV[ 'DB_USER' ] : 'wordpress' );
}

if ( ! defined( 'DB_PASSWORD' ) ) {
	define( 'DB_PASSWORD', isset( $_ENV[ 'DB_PASSWORD' ] ) ? $_ENV[ 'DB_PASSWORD' ] : 'wordpress' );
}

if ( ! defined( 'DB_HOST' ) ) {
	define( 'DB_HOST', isset( $_ENV[ 'DB_HOST' ] ) ? $_ENV[ 'DB_HOST' ] : '172.42.0.1' );
}

if ( ! defined( 'DB_CHARSET' ) ) {
	define( 'DB_CHARSET', isset( $_ENV[ 'DB_CHARSET' ] ) ? $_ENV[ 'DB_CHARSET' ] : 'utf8' );
}

if ( ! defined( 'DB_COLLATE' ) ) {
	define( 'DB_COLLATE', isset( $_ENV[ 'DB_COLLATE' ] ) ? $_ENV[ 'DB_COLLATE' ] : '' );
}

if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
	define( 'DISALLOW_FILE_EDIT', true );
}

if ( ! isset( $table_prefix ) ) {
	$table_prefix = 'wp_';
}

/**
 * Search for a salt-{HTTP_HOST}.php in current
 * and parent directories for config overrides
 */
/**
 * https://api.wordpress.org/secret-key/1.1/salt/
 */
if ( file_exists( dirname( __FILE__ ) . '/salt-' . BOX_HOST . '.php' ) ) {
	require( dirname( __FILE__ ) . '/salt-' . BOX_HOST . '.php' );
} else {
	define('AUTH_KEY',         'Insecure' );
	define('SECURE_AUTH_KEY',  'Insecure' );
	define('LOGGED_IN_KEY',    'Insecure' );
	define('NONCE_KEY',        'Insecure' );
	define('AUTH_SALT',        'Insecure' );
	define('SECURE_AUTH_SALT', 'Insecure' );
	define('LOGGED_IN_SALT',   'Insecure' );
	define('NONCE_SALT',       'Insecure' );
}

if ( ! defined( 'ABSPATH' ) ) {
	if ( 'standard' === BOX_DIRECTORY_LAYOUT ) {
		define( 'ABSPATH', dirname( __FILE__ ) . '/' );
	} else if ( 'skeleton' === BOX_DIRECTORY_LAYOUT ) {
		define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
	}
}

require_once( ABSPATH . 'wp-settings.php' );
