<?php

if ( defined( 'WP_CLI' ) && WP_CLI ) {
	$_SERVER[ 'HTTP_HOST' ] = 'wplib.box';
}

if ( ! isset( $_SERVER[ 'HTTP_HOST' ] ) ) {
	trigger_error( '$_SERVER[ \'HTTP_HOST\' ] not set (server may be misconfigured)' );
	exit;
}

define( 'WPLIB_BOX_HOST', preg_match( '#^www\.(.+)$#', $_SERVER[ 'HTTP_HOST' ] )
	? preg_replace( '#^www\.(.+)$#', '$1', $_SERVER[ 'HTTP_HOST' ] )
	: $_SERVER[ 'HTTP_HOST' ]
);

define( 'WPLIB_BOX_LOCAL_CONFIG', '/wp-config-' . WPLIB_BOX_HOST . '.php' );


/**
 * Search for a wp-config-{HTTP_HOST}.php in current
 * and parent directories for config overrides
 */
if ( file_exists( __DIR__ . WPLIB_BOX_LOCAL_CONFIG ) ) {
	require( __DIR__ . WPLIB_BOX_LOCAL_CONFIG );
} else if ( file_exists( dirname( __DIR__ ) . WPLIB_BOX_LOCAL_CONFIG ) ) {
	require( dirname( __DIR__ ) . WPLIB_BOX_LOCAL_CONFIG );
}

if ( ! defined( 'WPLIB_BOX_DIRECTORY_LAYOUT' ) ) {
	if ( is_dir( __DIR__ . '/wp-include' ) ) {
		define( 'WPLIB_BOX_DIRECTORY_LAYOUT', 'standard' );
	} else if ( is_dir( __DIR__ . '/wp/wp-include' ) ) {
		define( 'WPLIB_BOX_DIRECTORY_LAYOUT', 'skeleton' );
	} else {
		trigger_error( 'WordPress includes directory not found (expected at ' . __DIR__ . '/wp-include/)' );
		exit;
	}
}

if ( ! defined( 'WPLIB_BOX_URL_SCHEME' ) ) {
	define( 'WPLIB_BOX_URL_SCHEME', 'https' );
}

if ( ! defined( 'SITE_DOMAIN' ) ) {
	define( 'SITE_DOMAIN', $_SERVER[ 'HTTP_HOST' ] );
}

define( 'WP_HOME', WPLIB_BOX_URL_SCHEME . '://' . SITE_DOMAIN );

if ( 'standard' === WPLIB_BOX_DIRECTORY_LAYOUT ) {
	define( 'WP_SITEURL', WPLIB_BOX_URL_SCHEME . '://' . SITE_DOMAIN );

} else if ( 'skeleton' === WPLIB_BOX_DIRECTORY_LAYOUT ) {
	define( 'WP_SITEURL', WPLIB_BOX_URL_SCHEME . '://' . SITE_DOMAIN . '/wp' );
	define( 'WP_CONTENT_DIR', __DIR__ . '/content' );
	define( 'WP_CONTENT_URL', WPLIB_BOX_URL_SCHEME . '://' . SITE_DOMAIN . '/content' );
}

if ( ! defined( 'DB_NAME' ) ) {
	define( 'DB_NAME', $_SERVER[ 'DB_NAME' ] );
}

if ( ! defined( 'DB_USER' ) ) {
	define( 'DB_USER',  $_SERVER[ 'DB_USER' ] );
}

if ( ! defined( 'DB_PASSWORD' ) ) {
	define( 'DB_PASSWORD',  $_SERVER[ 'DB_PASSWORD' ] );
}

if ( ! defined( 'DB_HOST' ) ) {
	define( 'DB_HOST', '172.17.0.1' );
}

if ( ! defined( 'DB_CHARSET' ) ) {
	define( 'DB_CHARSET', 'utf8' );
}

if ( ! defined( 'DB_COLLATE' ) ) {
	define( 'DB_COLLATE', '' );
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
if ( file_exists( __DIR__ . '/salt-' . WPLIB_BOX_HOST . '.php' ) ) {
	require( __DIR__ . '/salt-' . WPLIB_BOX_HOST . '.php' );
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
	if ( 'standard' === WPLIB_BOX_DIRECTORY_LAYOUT ) {
		define( 'ABSPATH', dirname( __FILE__ ) . '/' );
	} else if ( 'skeleton' === WPLIB_BOX_DIRECTORY_LAYOUT ) {
		define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
	}
}

require_once( ABSPATH . 'wp-settings.php' );
