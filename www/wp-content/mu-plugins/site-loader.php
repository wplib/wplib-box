<?php
/**
 * Plugin Name: WPLib Box Site Loader
 */

/**
 * This file provisions WPLib Box's WordPress database for default use.
 * If it not needed after you first install WordPress, but might be
 * instructive to review for who to create a similar configuration
 * for WordPress sites you want to be configured upon first load.
 */
require dirname( __FILE__ ) . '/wplib-box-db-provisioner/wplib-box-db-provisioner.php';

require dirname( __FILE__ ) . '/box-support/box-support.php';
