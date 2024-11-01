<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://julianromero.ca
 * @since      1.0.0
 *
 * @package    Swimitup_Recordes
 * @subpackage Swimitup_Recordes/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Swimitup_Recordes
 * @subpackage Swimitup_Recordes/includes
 * @author     Julian Romero <me@julianromero.ca>
 */
class Swimitup_Recordes_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'swimitup-recordes',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
