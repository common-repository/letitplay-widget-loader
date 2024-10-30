<?php
/**
 * Plugin Name: LetItPlay Widget Loader
 * Plugin URI: http://letitplay.io
 * Description: Plugin allows to insert LetItPlay widget in footer of WordPress site
 * Version: 0.9
 * Author: Vadim Kropotin
 * Text Domain: letitplay-widget-loader
 * Domain Path: /lang
 * License: MIT
 */


define('WID_LR',str_replace('\\','/',dirname(__FILE__)));

if ( !class_exists( 'LetitplayWidgetLoader' ) ) {

	class LetitplayWidgetLoader {

		function __construct() {

			add_action( 'init', array( &$this, 'init' ) );
			add_action( 'admin_init', array( &$this, 'admin_init' ) );
			add_action( 'admin_menu', array( &$this, 'admin_menu' ) );
			add_action( 'wp_footer', array( &$this, 'wp_footer' ) );

		}

		function init() {

			load_plugin_textdomain( 'letitplay-widget-loader', false, dirname( plugin_basename ( __FILE__ ) ).'/lang' );
		}

		function admin_init() {


			register_setting( 'letitplay-widget-loader', 'insert_code', 'trim' );
	
		}

		function admin_menu() {
			$page = add_submenu_page( 'options-general.php', __('Letitplay Widget', 'letitplay-widget-loader'), __('LetItPlay Widget Loader', 'letitplay-widget-loader'), 'manage_options', __FILE__, array( &$this, 'options_panel' ) );
			}

		

		function wp_footer() {
			if ( !is_admin() && !is_feed() && !is_robots() && !is_trackback() ) {
				$text = get_option( 'insert_code', '' );
				$text = convert_smilies( $text );
				$text = do_shortcode( $text );

				if ( $text != '' ) {
					echo $text, "\n";
				}
			}
		}

		function options_panel() {

				require_once(WID_LR . '/inc/options.php');
		}
	}

	

	$letitplay_letitplay_widget_loader = new LetitplayWidgetLoader();
}
