<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://julianromero.ca
 * @since      1.0.0
 *
 * @package    Swimitup_Recordes
 * @subpackage Swimitup_Recordes/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Swimitup_Recordes
 * @subpackage Swimitup_Recordes/public
 * @author     Julian Romero <me@julianromero.ca>
 */
class Swimitup_Recordes_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Swimitup_Recordes_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Swimitup_Recordes_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/swimitup-recordes-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Swimitup_Recordes_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Swimitup_Recordes_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/swimitup-recordes-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * transformar o shortcode swimitup-recordes na tabela apropriada
	**/

	public function swimitup_register_shortcodes(){

		function swimitup_recordes_shortcode($atts){
			extract( shortcode_atts( array(
					//your options
			), $atts ) );

			$options = get_option('swimitup-recordes');
			$string='';
			foreach ($options as $opcao => $value) {
				$string.=$value;
			}
			$options["token"]=sha1($string);
			$options["acao"]="tabela-de-recordes";
			$options_query = json_encode ($options);
			$htm='<div id="tabela-de-recorde-swimitup"></div>';
			$htm.='<script>
			var div_tabela = "#tabela-de-recorde-swimitup";
			if (typeof jQuery == "undefined") {  
				alert("jQuery não está carregado, ele é essencial para o funcionamento da tabela de recordes...");
			} else {
				jQuery.ajax({
					url: "http://api.swim.com.br",
					data: '.$options_query.',
					error: function() {
						jQuery(div_tabela).html("<h2>Não foi possível gerar a tabela</h2>");
					},
					dataType: "html",
					success: function(data) {
						jQuery(div_tabela).html(data);
					},
					type: "GET"
				});

			}
			</script>';
			return $htm;
      }

      add_shortcode("swimitup-recordes", "swimitup_recordes_shortcode");

    }


}
