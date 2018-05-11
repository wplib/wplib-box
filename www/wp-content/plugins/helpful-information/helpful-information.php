<?php
/**
 * Helpful Information
 *
 * The Helpful Information plugin for WordPress is a small addon to the standard 
 * admin bar that contains several bits of helpful information pertaining to what 
 * you are currently viewing in your web browser.
 *
 * @package   Helpful_Information
 * @author    Gabe Shackle <gabe@hereswhatidid.com>
 * @license   GPL-2.0+
 * @link      http://hereswhatidid.com/helpful-information
 * @copyright 2013 Gabe Shackle
 *
 * @wordpress-plugin
 * Plugin Name: Helpful Information
 * Plugin URI:  http://hereswhatidid.com/helpful-information
 * Description: The Helpful Information plugin for WordPress is a small addon to the standard admin bar that contains several bits of helpful information pertaining to what you are currently viewing
 * Version:     1.0.2
 * Author:      Gabe Shackle
 * Author URI:  http://hereswhatidid.com
 * Text Domain: helpful-information-locale
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /lang
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once( plugin_dir_path( __FILE__ ) . 'class-helpful-information.php' );

register_activation_hook( __FILE__, array( 'Helpful_Information', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Helpful_Information', 'deactivate' ) );

Helpful_Information::get_instance();