<?php
/**
 * Plugin Name.
 *
 * @package   Helpful_Information
 * @author    Gabe Shackle <gabe@hereswhatidid.com>
 * @license   GPL-2.0+
 * @link      http://hereswhatidid.com/helpful-information
 * @copyright 2013 Gabe Shackle
 */

/**
 * Plugin class.
 *
 * @package Helpful_Information
 * @author  Gabe Shackle <gabe@hereswhatidid.com>
 */
class Helpful_Information {

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since   1.0.0
	 *
	 * @var     string
	 */
	protected $version = '1.0.2';

	/**
	 * Unique identifier for the plugin.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_slug = 'helpful-information';

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Slug of the plugin screen.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_screen_hook_suffix = null;

	/**
	 * Initialize the plugin by setting localization, filters, and administration functions.
	 *
	 * @since     1.0.0
	 */
	private function __construct() {

		// Load plugin text domain
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
		add_action( 'init', array( $this, 'initialize_helpful_information' ) );

		// Add the options page and menu item.
		// add_action( 'admin_menu', array( $this, 'add_plugin_admin_menu' ) );


	}


	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Fired when the plugin is activated.
	 *
	 * @since    1.0.0
	 *
	 * @param    boolean    $network_wide    True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog.
	 */
	public static function activate( $network_wide ) {
	}

	/**
	 * Fired when the plugin is deactivated.
	 *
	 * @since    1.0.0
	 *
	 * @param    boolean    $network_wide    True if WPMU superadmin uses "Network Deactivate" action, false if WPMU is disabled or plugin is deactivated on an individual blog.
	 */
	public static function deactivate( $network_wide ) {
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		$domain = $this->plugin_slug;
		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

		load_textdomain( $domain, WP_LANG_DIR . '/' . $domain . '/' . $domain . '-' . $locale . '.mo' );
		load_plugin_textdomain( $domain, FALSE, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_admin_menu() {
		$this->plugin_screen_hook_suffix = add_plugins_page(
			__( 'Helpful Information Options', $this->plugin_slug ),
			__( 'Helpful Information', $this->plugin_slug ),
			'read',
			$this->plugin_slug,
			array( $this, 'display_plugin_admin_page' )
		);

	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */
	public function display_plugin_admin_page() {
		include_once( 'views/admin.php' );
	}
	/**
	 * Initialize the generation of the Helpful Information tab
	 * @author 		Gabe Shackle <gabe@hereswhatidid.com>
	 * @since    	1.0.2
	 * @return 		void
	 */
	public function initialize_helpful_information() {
		if ( current_user_can('activate_plugins') ) {
			add_action( 'wp_before_admin_bar_render', array( $this, 'add_helpful_information' ) ); 
		}
	}
	/**
	 * Generate the Helpful Information tab
	 * @since    	1.0.0
	 * @author Gabe Shackle <gabe@hereswhatidid.com>
	 */
	public function add_helpful_information() {
			global $wp_admin_bar,
				   $wp_scripts,
				   $wp_styles;

			$wp_admin_bar->add_node( array(
				'id' => 'helpful_information',
				'href' => false,
				'title' => __( 'Helpful Information', $this->plugin_slug )
			));

			$included_files = get_included_files();
			$stylesheet_dir = str_replace( '\\', '/', get_stylesheet_directory() );
			$plugin_dir = str_replace( '\\', '/', dirname( plugin_dir_path( __FILE__ ) ) );

			$includedFiles = array();
			$includedFiles['theme'] = array();
			$includedFiles['plugins'] = array();
			$includedFiles['core'] = array();
			$includedFiles['all'] = array();

			foreach ( $included_files as $key => $path ) {

				$path   = str_replace( '\\', '/', $path );

				if ( strpos( $path, $stylesheet_dir ) !== false ) {
					if ( ! isset( $includedFiles['theme'][basename( $stylesheet_dir )] ) ) {
						$includedFiles['theme'][basename( $stylesheet_dir )] = array();
					}
					$includedFiles['theme'][basename( $stylesheet_dir )][] = str_replace( $stylesheet_dir, '', $path);
				}
				if ( strpos( $path, $plugin_dir ) !== false ) {

					$pluginName = basename( dirname( $path ) );
					if ( ! isset( $includedFiles['plugins'][$pluginName] ) ) {
						$includedFiles['plugins'][$pluginName] = array();
					}
					$includedFiles['plugins'][$pluginName][] = basename( $path );
				}

				if ( strpos( $path, 'wp-includes' ) !== false ) {
					$includedFiles['core'][] = basename( $path );
				}

				$includedFiles['all'][] = $path;
			}

			global $template;

			$themeInfo = wp_get_theme();

			$wp_admin_bar->add_node( array(
				'id' => 'currentTheme',
				'href' => false,
				'parent' => 'helpful_information',
				'title' => __( 'Theme: ', $this->plugin_slug )
			));

			$wp_admin_bar->add_node( array(
				'id' => 'currentThemeInfo',
				'href' => $themeInfo->get('ThemeURI'),
				'parent' => 'currentTheme',
				'title' => $themeInfo->get('Name'),
				'meta' => array(
					'target' => '_blank'
				)
			));

			$wp_admin_bar->add_node( array(
				'id' => 'templateMethod',
				'href' => false,
				'parent' => 'helpful_information',
				'title' => __( 'Template: ', $this->plugin_slug ) . basename($template)
			));


			if ( ! is_admin() ) {
				$wp_admin_bar->add_node( array(
					'id' => 'postType',
					'href' => false,
					'parent' => 'helpful_information',
					'title' => __( 'Post Type: ', $this->plugin_slug ) . get_post_type()
				));
			} else {
				$wp_admin_bar->add_node( array(
					'id' => 'postType',
					'href' => false,
					'parent' => 'helpful_information',
					'title' => __( 'Post Type: Admin Screen', $this->plugin_slug )
				));
			}
			$wp_admin_bar->add_node( array(
				'id' => 'scripts',
				'href' => false,
				'parent' => 'helpful_information',
				'title' => __( 'Scripts: ', $this->plugin_slug )
			));

			$wp_admin_bar->add_node( array(
				'id' => 'scriptsQueued',
				'href' => false,
				'parent' => 'scripts',
				'title' => __( 'Queued: ', $this->plugin_slug )
			));

			$wp_admin_bar->add_node( array(
				'id' => 'scriptsRegistered',
				'href' => false,
				'parent' => 'scripts',
				'title' => __( 'Registered: ', $this->plugin_slug )
			));

			$wp_admin_bar->add_node( array(
				'id' => 'styles',
				'href' => false,
				'parent' => 'helpful_information',
				'title' => __( 'Styles: ', $this->plugin_slug )
			));

			$wp_admin_bar->add_node( array(
				'id' => 'includes',
				'href' => false,
				'parent' => 'helpful_information',
				'title' => __( 'Includes: ', $this->plugin_slug )
			));
			$wp_admin_bar->add_node( array(
				'id' => 'includesTheme',
				'href' => false,
				'parent' => 'includes',
				'title' => __( 'Theme', $this->plugin_slug )
			));
			foreach( $includedFiles['theme'] as $index => $themeIncludes ) {
				$wp_admin_bar->add_node( array(
					'id' => 'includesTheme' . $index,
					'href' => false,
					'parent' => 'includesTheme',
					'title' => __( $index, $this->plugin_slug )
				));
				foreach( $themeIncludes as $themeFile ) {
					$wp_admin_bar->add_node( array(
						'id' => 'includesTheme' . $index . $themeFile,
						'href' => false,
						'parent' => 'includesTheme' . $index,
						'title' => __( $themeFile, $this->plugin_slug )
					));
				}
			}

			$wp_admin_bar->add_node( array(
				'id' => 'includesPlugins',
				'href' => false,
				'parent' => 'includes',
				'title' => __( 'Plugins', $this->plugin_slug )
			));
			foreach( $includedFiles['plugins'] as $index => $pluginIncludes ) {
				$wp_admin_bar->add_node( array(
					'id' => 'includesPlugins' . $index,
					'href' => false,
					'parent' => 'includesPlugins',
					'title' => __( $index, $this->plugin_slug )
				));
				foreach( $pluginIncludes as $pluginFile ) {
					$wp_admin_bar->add_node( array(
						'id' => 'includesPlugins' . $index . $pluginFile,
						'href' => false,
						'parent' => 'includesPlugins' . $index,
						'title' => __( $pluginFile, $this->plugin_slug )
					));
				}
			}

			$wp_admin_bar->add_node( array(
				'id' => 'includesCore',
				'href' => false,
				'parent' => 'includes',
				'title' => __( 'Core', $this->plugin_slug )
			));

			$numElements = ceil( count( $includedFiles['core'] ) / 10 );

			for( $i=0; $i<$numElements; $i++ ) {
				$lower = ( ($i * 10) + 1 );
				$upper = ( ( $i + 1 ) * 10 );
				if ( $upper > count( $includedFiles['core'] ) ) {
					$upper = count( $includedFiles['core'] );
				}
				$nodeTitle = $lower . ' - ' . $upper;
				$wp_admin_bar->add_node( array(
					'id' => 'includesCore' . $i,
					'href' => false,
					'parent' => 'includesCore',
					'title' => __( $nodeTitle, $this->plugin_slug )
				));

				$fileList = array_slice( $includedFiles['core'], $i * 10, 10 );
				global $wp_version;

				foreach( $fileList as $fileName ) {
					$wp_admin_bar->add_node( array(
						'id' => 'includesCore' . $i . $fileName,
						'href' => 'http://core.svn.wordpress.org/tags/' . $wp_version . '/wp-includes/' . $fileName,
						'parent' => 'includesCore' . $i,
						'title' => __( $fileName, $this->plugin_slug ),
						'meta' => array(
							'target' => '_blank'
						)
					));
				}
			}

			$wp_scripts->registered;

			$numElements = ceil( count( $wp_scripts->registered ) / 10 );

			for( $i=0; $i<$numElements; $i++ ) {
				$lower = ( ($i * 10) + 1 );
				$upper = ( ( $i + 1 ) * 10 );
				if ( $upper > count( $wp_scripts->registered ) ) {
					$upper = count( $wp_scripts->registered );
				}
				$nodeTitle = $lower . ' - ' . $upper;
				$wp_admin_bar->add_node( array(
					'id' => 'scriptsRegistered' . $i,
					'href' => false,
					'parent' => 'scriptsRegistered',
					'title' => __( $nodeTitle, $this->plugin_slug )
				));

				$fileList = array_slice( $wp_scripts->registered, $i * 10, 10 );

				foreach( $fileList as $fileName ) {

					$wp_admin_bar->add_node( array(
						'id' => 'scriptsRegistered' . $i . $fileName->handle,
						'href' => $fileName->src,
						'parent' => 'scriptsRegistered' . $i,
						'title' => __( $fileName->handle, $this->plugin_slug ),
						'meta' => array(
							'target' => '_blank'
						)
					));
				}
			}

			foreach( $wp_scripts->queue as $script ) {
				$wp_admin_bar->add_node( array(
					'id' => 'scriptsQueued' . $script,
					'href' => $wp_scripts->registered[ $script ]->src,
					'parent' => 'scriptsQueued',
					'title' => $script,
					'meta' => array(
						'target' => '_blank'
					)
				));
			}

			foreach( $wp_styles->done as $script ) {
				$wp_admin_bar->add_node( array(
					'id' => 'styles' . $script,
					'href' => $wp_styles->registered[ $script ]->src,
					'parent' => 'styles',
					'title' => $script,
					'meta' => array(
						'target' => '_blank'
					)
				));
			}
		}

}