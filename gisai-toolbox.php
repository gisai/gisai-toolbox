<?php

/**
 * @since             1.0
 * @package           Gisai_Toolbox
 *
 * @wordpress-plugin
 * Plugin Name:       GISAI Toolbox
 * Description:       Registra nuevos tipos de entrada
 * Version:           1.02
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sydney-toolbox
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Set up and initialize
 */
class GISAI_Custom_Posts {

	private static $instance;

	/**
	 * Actions setup
	 */
	public function __construct() {
		add_action( 'plugins_loaded', array( $this, 'constants' ), 2 );
		add_action( 'plugins_loaded', array( $this, 'i18n' ), 3 );
		add_action( 'plugins_loaded', array( $this, 'includes' ), 4 );
	}

	/**
	 * Constants
	 */
	function constants() {
		define( 'ST_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) ); // CHANGED: prepared to import post types and metaboxes from child theme
		define( 'ST_URI', trailingslashit( plugin_dir_path( __FILE__ ) ) ); // CHANGED: to import post types and metaboxes from child theme
	}

	/**
	 * Includes
	 */
	function includes() {
		//Post types
		require_once( ST_DIR . 'inc/post-type-investigaciones.php' );
		require_once( ST_DIR . 'inc/post-type-miembros.php' );
		require_once( ST_DIR . 'inc/post-type-colaboraciones.php' );
		require_once( ST_DIR . 'inc/post-type-proyectos.php' );
		require_once( ST_DIR . 'inc/post-type-ofertas.php' );
		require_once( ST_DIR . 'inc/post-type-software.php' );
		require_once( ST_DIR . 'inc/post-type-patentes.php' );
		require_once( ST_DIR . 'inc/post-type-trabajos.php' );
		//Metaboxes
		require_once( ST_DIR . 'inc/metaboxes/investigaciones-metabox.php' );
		require_once( ST_DIR . 'inc/metaboxes/miembros-metabox.php' );
		require_once( ST_DIR . 'inc/metaboxes/colaboraciones-metabox.php' );
		require_once( ST_DIR . 'inc/metaboxes/proyectos-metabox.php' );
		require_once( ST_DIR . 'inc/metaboxes/patentes-metabox.php' );
		require_once( ST_DIR . 'inc/metaboxes/software-metabox.php' );
		require_once( ST_DIR . 'inc/metaboxes/singles-metabox.php' );
		require_once( ST_DIR . 'inc/metaboxes/ofertas-metabox.php' );
		require_once( ST_DIR . 'inc/metaboxes/trabajos-metabox.php' );
	}

	/**
	 * Translations
	 */
	function i18n() {
		load_plugin_textdomain( 'GISAI-toolbox', false, 'sydney-toolbox/languages' );
	}

	/**
	 * Returns the instance.
	 */
	public static function get_instance() {

		if ( !self::$instance )
			self::$instance = new self;

		return self::$instance;
	}
}

function gisai_toolbox_plugin() {
	if ( !function_exists('wpcf_init') ) //Make sure the Types plugin isn't active
		return GISAI_Custom_Posts::get_instance();
}
add_action('plugins_loaded', 'gisai_toolbox_plugin', 1);
