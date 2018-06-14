<?php
/**
 * Load all mu-plugins required.
 *
 * @example:
 *
 *      require dirname( __FILE__ ) . '/foo-bar/foo-bar.php';
 */

/**
 * This file provisions WPLib Box's WordPress database for default use.
 * If it not needed after you first install WordPress, but might be
 * instructive to review for who to create a similar configuration
 * for WordPress sites you want to be configured upon first load.
 */
require dirname( __FILE__ ) . '/wplib-box-db-provisioner/wplib-box-db-provisioner.php';
