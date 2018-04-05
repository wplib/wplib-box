<?php
/**
 * mu-plugins/wplib-box-provisioner/wplib-box-provisioner.php
 *
 * This file provisions WPLib Box's WordPress database for default use.
 * If it not needed after you first install WordPress, but might be
 * instructive to review for who to create a similar configuration
 * for WordPress sites you want to be configured upon first load.
 *
 * Class WPLib_Box_DB_Provisioner
 */
class WPLib_Box_DB_Provisioner {

	const PROVISION_FILENAME = 'provisioned';
	const WELCOME_THEME = 'wplib-box-welcome';

	static function on_load() {
		static $provisioned_filepath;

		if ( ! isset( $provisioned_filepath ) ) {
			$provisioned_filepath = __DIR__ . '/' . self::PROVISION_FILENAME;
		}

		do {

			if ( ! isset( $_SERVER[ 'WPLIB_BOX' ] ) ) {
				break;
			}

			if ( is_file( $provisioned_filepath ) ) {
				break;
			}

			global $wpdb;
			if ( ! isset( $wpdb ) ) {
				break;
			}

			if ( ! is_object( $wpdb ) ) {
				break;
			}

			if ( ! method_exists( $wpdb, 'query' ) ) {
				break;
			}

			$default_plugins = array(
				'query-monitor/query-monitor.php',
				'helpful-information/helpful-information.php',
				'wplib-box-support/wplib-box-support.php',
			);
			self::update_option( 'active_plugins', serialize( $default_plugins ) );

			self::update_option( 'current_theme', 'WPLib Box Welcome Theme' );
			self::update_option( 'template', self::WELCOME_THEME );
			self::update_option( 'stylesheet', self::WELCOME_THEME );

			self::update_option( 'blogname', 'WPLib Box Default WordPress Install' );

			self::update_option( 'siteurl', 'http://wplib.box' );
			self::update_option( 'home', 'http://wplib.box' );

			self::delete_transients();

			file_put_contents( $provisioned_filepath, date( DATE_W3C ) );

		} while ( false );

	}

	static function update_option( $option_name, $option_value ) {
		global $wpdb;
		static $sql;
		if ( ! isset( $sql ) ) {
			$sql = "UPDATE {$wpdb->options} SET option_value = '%s' WHERE option_name='%s'";
		}
		$wpdb->query( $wpdb->prepare( $sql, $option_value, $option_name ) );
	}

	static function delete_transients() {
		global $wpdb;
		$wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_%%'" );
		$wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE '_site_transient_%%'" );
	}

}

WPLib_Box_DB_Provisioner::on_load();

