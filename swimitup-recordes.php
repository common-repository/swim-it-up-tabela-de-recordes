<?php

/**
 * Swim It Up! Tabela de Recordes
 *
 * Exiba as tabelas dos recordes brasileiros, sul-americanos e mundiais
 * em seu site, de forma prática, rápida e dinâmica.
 * Todas as atualizações dos recordes aparecerão em seu site quando estiverem disponíveis,
 * não necessitando de nenhuma ação de sua parte.
 *
 * @link              http://julianromero.ca
 * @since             1.0.0
 * @package           Swimitup_Recordes
 *
 * @wordpress-plugin
 * Plugin Name: Swim It Up! Tabela de Recordes
 * Plugin URI: http://www.swim.com.br/
 * Description: Exibe uma tabela de recordes brasileiros, sul-americanos e mundiais atualizada em seu próprio site. Utilize o shortcode [swimitup-recordes] em seu post ou página para exibir a tabela.
 * Version:           1.0.0
 * Author:            Julian Aoki Romero
 * Author URI:        http://julianromero.ca/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       swimitup-recordes
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-swimitup-recordes-activator.php
 */
function activate_swimitup_recordes() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-swimitup-recordes-activator.php';
	Swimitup_Recordes_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-swimitup-recordes-deactivator.php
 */
function deactivate_swimitup_recordes() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-swimitup-recordes-deactivator.php';
	Swimitup_Recordes_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_swimitup_recordes' );
register_deactivation_hook( __FILE__, 'deactivate_swimitup_recordes' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-swimitup-recordes.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_swimitup_recordes() {

	$plugin = new Swimitup_Recordes();
	$plugin->run();

}
run_swimitup_recordes();
