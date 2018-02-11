<?php

class WPLib_Box_Support {

	const AUTO_LOGIN_ACTION = 'auto-login';

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
		}

	}

	/**
	 * @param bool $continue
	 *
	 * @return bool
	 */
	static function _do_parse_request( $continue ) {
		do {

			if ( ! preg_match( '#/auto-login\?_wpnonce=(.+)$#', $_SERVER['REQUEST_URI'], $match ) ) {
				break;
			}

			if ( ! wp_verify_nonce( $match[1], self::AUTO_LOGIN_ACTION ) ) {
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

		$user = get_user_by( 'login', 'admin' );

		if ( false === $user ) {
			$user_id = wp_insert_user( array(
				'user_login'    => 'admin',
				'user_pass'     => 'password',
				'user_nicename' => 'WPLib Box Administrator',
				'user_url'      => 'https://wplib.github.io/wplib-box/',
				'role'          => 'administrator',
				'description'   => 'Default WPLib Box Administrator',
			));
			$user = get_user_by( 'id', $user_id );
		}

		wp_set_current_user( $user->ID );
		wp_set_auth_cookie( $user->ID, true );
		do_action( 'wp_login', $user->data->user_login );

		wp_safe_redirect( admin_url(), 302 );
		exit;

	}

	/**
	 * @return string
	 */
	static function _login_message( $message ) {
		$auto_login = wp_nonce_url( site_url( "/auto-login" ), self::AUTO_LOGIN_ACTION );
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