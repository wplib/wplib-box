<?php

if ( defined( 'WP_CLI' ) && WP_CLI ) {
	$_SERVER['HTTP_HOST'] = 'wplib.box';
}

// Autoload any non-WordPress dependencies
if ( is_file( __DIR__ . '/vendor/autoload.php' ) ) {
	require( __DIR__ . '/vendor/autoload.php' );
}

// Search for a wp-config-local.php in the current and parent directories for config overrides
if ( file_exists( __DIR__ . '/wp-config-local.php' ) ) {
	require( __DIR__ . '/wp-config-local.php' );
} else if ( file_exists( dirname( __DIR__ ) . '/wp-config-local.php' ) ) {
	require( dirname( __DIR__ ) . '/wp-config-local.php' );
}

if ( ! defined( 'WPLIB_BOX_DIRECTORY_LAYOUT' ) ) {
	define( 'WPLIB_BOX_DIRECTORY_LAYOUT', 'skeleton' );
}
if ( ! defined( 'APP_DOMAIN' ) ) {
	define( 'APP_DOMAIN', $_SERVER['HTTP_HOST'] );
}

if ( 'standard' === WPLIB_BOX_DIRECTORY_LAYOUT ) {
	define( 'WP_HOME', 'http://' . APP_DOMAIN );
	define( 'WP_SITEURL', 'http://' . APP_DOMAIN . '/wp' );

	define( 'WP_CONTENT_DIR', __DIR__ . '/content' );
	define( 'WP_CONTENT_URL', 'http://' . APP_DOMAIN . '/content' );
} else {
	define( 'WP_HOME', 'http://' . APP_DOMAIN );
	define( 'WP_SITEURL', 'http://' . APP_DOMAIN );
}

if ( ! defined( 'DB_NAME' ) ) {
	define( 'DB_NAME', 'wordpress' );
}

if ( ! defined( 'DB_USER' ) ) {
	define( 'DB_USER', 'wordpress' );
}

if ( ! defined( 'DB_PASSWORD' ) ) {
	define( 'DB_PASSWORD', 'wordpress' );
}

if ( ! defined( 'DB_HOST' ) ) {
	define( 'DB_HOST', 'localhost' );
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

// https://api.wordpress.org/secret-key/1.1/salt/
if ( file_exists( __DIR__ . '/salt.php' ) ) {
	require( __DIR__ . '/salt.php' );
} else {
	define('AUTH_KEY',         '~-hipd7(}dmj`QUW/_)7>0};$oI]F,[g}TnwSlMNC|zg&2<|/19M-pPcns>:fCdj');
	define('SECURE_AUTH_KEY',  'S_xbE6Sw}@1646+fZe4Gh1]9@>Ij@Sh+2ng{6 G/j3(3F #t+z+BUYwwY>.@[j~.');
	define('LOGGED_IN_KEY',    'JGD sHt8R%vK>Q#i3uR<)?oD7$kwx+TuMxSF1XA^[+8H)%rEh{Jv(d-^W{sl3@6p');
	define('NONCE_KEY',        '>5b)un/!Mq)/M(F+ziihL!&mXz+LH5s0 #yi^VLC)r&/u7Uw6E~pz.6c@8TE!Gua');
	define('AUTH_SALT',        '~/m+x1w:VGn?Z#4sw|(L?Ld^hr!;*nq,gN<#p}xHYf<Z(9uc]Vt8V}AOQ|@VZ{%0');
	define('SECURE_AUTH_SALT', ')QlZJ$Ur^4]BR($y9!]gM=zY7Hh1x.i i0_Wp?kcE+<_F6FI`sUcwZXzP<0|5bU4');
	define('LOGGED_IN_SALT',   '}jQ]F|h0Su0l4Nh^:9C3>$kLI__9!Sc&M9X+=vA`kicXZ4x?Cb!2qDzdC(w@/pG|');
	define('NONCE_SALT',       'O%afYX;J`-8v1G<y5Cge?}VmPH*,7#GaA53D*Cd^TH~0qUi<4wRTrI_b:xG`{.T,');
}


if ( ! defined( 'ABSPATH' ) ) {
	if ( 'standard' === WPLIB_BOX_DIRECTORY_LAYOUT ) {
		define( 'ABSPATH', dirname( __FILE__ ) . '/' );
	} else {
		define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
	}
}

require_once( ABSPATH . 'wp-settings.php' );
