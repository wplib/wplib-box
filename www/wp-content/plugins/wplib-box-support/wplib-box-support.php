<?php

/*
 * Plugin Name: WPLib Box Support Plugin
 * Plugin URL: https://github.com/wplib/wplib-box-support-plugin
 * Description: Plugin to provide UX support to WPLib Box
 * Version: 0.16.0-rc
 * Author: The WPLib Team
 * Author URI: https://github.com/wplib
 */

/**
 * Class WPLib_Box_Support
 */
class WPLib_Box_Support {

	const AUTO_LOGIN_PATH = '/auto-login';

	/**
	 *
	 */
	static function on_load() {

		if ( isset( $_SERVER[ 'WPLIB_BOX' ] ) ) {
			/**
			 * ONLY run WPLib Box support plugin when WPLib Box is the host.
			 */
			add_action( 'login_message', array( __CLASS__, '_login_message' ) );
			add_action( 'do_parse_request', array( __CLASS__, '_do_parse_request' ) );
			add_action( 'set_url_scheme', array( __CLASS__, '_set_url_scheme' ) );
		}

	}

	/**
	 * @param string $url
	 *
	 * @return string
	 */
	static function _set_url_scheme( $url ) {
		return defined( 'WPLIB_BOX_URL_SCHEME' )
			? preg_replace( '#^https?#', WPLIB_BOX_URL_SCHEME, $url )
			: $url;
	}

	/**
	 * @param bool $continue
	 *
	 * @return bool
	 */
	static function _do_parse_request( $continue ) {
		do {

			$home_url = preg_quote( home_url() );

			$login_path = preg_replace( "#^{$home_url}(.+)$#", '$1', self::auto_login_url() );

			if ( $login_path !== rtrim( $_SERVER['REQUEST_URI'] , '/' ) ) {
				break;
			}

			self::auto_login_admin();

		} while ( false );

		return $continue;
	}

	/**
	 * Automatically logs in a user as 'admin' and redirects to the admin console.
	 */
	static function auto_login_admin() {

		do {

			$user = get_user_by( 'login', 'admin' );

			if ( isset( $user->ID ) ) {
				break;
			}

			$user_id = wp_insert_user( array(
				'user_login'    => 'admin',
				'user_pass'     => 'password',
				'user_nicename' => 'WPLib Box User',
				'user_email'    => 'admin@wplib.box',
				'user_url'      => 'https://wplib.github.io/wplib-box/',
				'role'          => 'administrator',
				'description'   => 'Default WPLib Box User',
			) );

			if ( is_wp_error( $user_id ) ) {
				break;
			}

			if ( ! is_numeric( $user_id ) ) {
				break;
			}

			$user = get_user_by( 'id', $user_id );

		} while ( false );

		if ( isset( $user->ID ) ) {
			wp_set_current_user( $user->ID );
			wp_set_auth_cookie( $user->ID, true );
			do_action( 'wp_login', 'admin', $user );
			wp_safe_redirect( admin_url(), 302 );
			exit;
		}

	}

	/**
	 * @return string
	 */
	static function auto_login_url() {
		return admin_url( self::AUTO_LOGIN_PATH );
	}

	/**
	 * @return string
	 */
	static function _login_message( $message ) {
		$auto_login = self::auto_login_url();
		$html       = <<< HTML
<style type="text/css">
.wplib-box\:login-callout {margin-top:1em; font-size:2em;}
.wplib-box\:login-helper h2 {margin-bottom:0.5em;}
.wplib-box\:login-helper {width:100%;text-align:center;float:left;}
.wplib-box\:login-helper .inner {margin:0 auto 2em;width:320px;}
.wplib-box\:login-helper .inner p {margin:1em 50px 0;}
.wplib-box\:login-helper .inner ul {margin-left:80px;text-align:left;}
.wplib-box\:login-helper .inner ul li {margin-top:0.35em;}
.wplib-box\:login-helper .inner .name {font-weight:bold;width:6em;display:inline-block;}
.wplib-box\:login-helper .inner .value {}
.wplib-box\:login-helper .inner .credentials {font-family:monospace;background:white;padding:0.13em 0.25em;}
</style>		
<div class="wplib-box:login-helper">
	<h2 class="wplib-box:login-callout">WPLib Box Users</h2>
	<div class="inner">
		<p>The <strong>default</strong> login credentials are:</p>
		<ul>
			<li><span class="name">Username:</span> <span class="value credentials">admin</span></li>
			<li><span class="name">Password:</span> <span class="value credentials">password</span></li>
		</ul>
		<p><a href="{$auto_login}"><strong>Click here</strong></a> to auto-login as <span class="credentials">admin</span>.</p>
	</div>
</div>
HTML;

		return "{$html}{$message}";

	}

}

WPLib_Box_Support::on_load();