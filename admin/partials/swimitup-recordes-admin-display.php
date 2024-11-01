<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://julianromero.ca
 * @since      1.0.0
 *
 * @package    Swimitup_Recordes
 * @subpackage Swimitup_Recordes/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">

	<div id="icon-options-general" class="icon32"></div>
	<h1><?php esc_attr_e( esc_html(get_admin_page_title()), 'wp_admin_style' ); ?></h1>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle"><span><?php esc_attr_e( 'Opções para exibição', 'wp_admin_style' ); ?></span>
						</h2>

						<div class="inside">

							<form method="post" name="cleanup_options" action="options.php">
								<?php
									//Grab all options
									$plugin_geral = new Swimitup_Recordes();
									$this->default_values=$plugin_geral->define_default_values();
									$options = get_option($this->plugin_name,$this->default_values);
									settings_fields($this->plugin_name);
									do_settings_sections($this->plugin_name);
								?>    

								<input type="hidden" id="<?php echo $this->plugin_name; ?>-chave-acesso" name="<?php echo $this->plugin_name; ?>[chave-acesso]" value="<?php echo $this->default_values["chave-acesso"]; ?>" />
								<h4>Níveis a exibir</h4>
								<fieldset>
									<legend class="screen-reader-text"><span>Recorde mundial</span></legend>
									<label for="<?php echo $this->plugin_name; ?>-exibir-mundial">
										<input type="checkbox" id="<?php echo $this->plugin_name; ?>-exibir-mundial" name="<?php echo $this->plugin_name; ?>[exibir-mundial]" value="1" <?php checked($options["exibir-mundial"], 1); ?> />
										<span><?php esc_attr_e('Recorde mundial', $this->plugin_name); ?></span>
									</label>
									<legend class="screen-reader-text"><span>Recorde sul-americano</span></legend>
									<label for="<?php echo $this->plugin_name; ?>-exibir-sul-americano">
										<input type="checkbox" id="<?php echo $this->plugin_name; ?>-exibir-sul-americano" name="<?php echo $this->plugin_name; ?>[exibir-sul-americano]" value="1" <?php checked($options["exibir-sul-americano"], 1); ?>/>
										<span><?php esc_attr_e('Recorde sul-americano', $this->plugin_name); ?></span>
									</label>
									<legend class="screen-reader-text"><span>Recorde brasileiro</span></legend>
									<label for="<?php echo $this->plugin_name; ?>-exibir-brasileiro">
										<input type="checkbox" id="<?php echo $this->plugin_name; ?>-exibir-brasileiro" name="<?php echo $this->plugin_name; ?>[exibir-brasileiro]" value="1" <?php checked($options["exibir-brasileiro"], 1); ?>/>
										<span><?php esc_attr_e('Recorde brasileiro', $this->plugin_name); ?></span>
									</label>
								</fieldset>

								<h4>Piscinas a exibir</h4>
								<fieldset>
									<legend class="screen-reader-text"><span>Piscina de 50m</span></legend>
									<label for="<?php echo $this->plugin_name; ?>-exibir-50m">
										<input type="checkbox" id="<?php echo $this->plugin_name; ?>-exibir-50m" name="<?php echo $this->plugin_name; ?>[exibir-50m]" value="1" <?php checked($options["exibir-50m"], 1); ?>/>
										<span><?php esc_attr_e('Recordes em piscina de 50m', $this->plugin_name); ?></span>
									</label>
									<legend class="screen-reader-text"><span>Piscina de 25m</span></legend>
									<label for="<?php echo $this->plugin_name; ?>-exibir-25m">
										<input type="checkbox" id="<?php echo $this->plugin_name; ?>-exibir-25m" name="<?php echo $this->plugin_name; ?>[exibir-25m]" value="1" <?php checked($options["exibir-25m"], 1); ?>/>
										<span><?php esc_attr_e('Recordes em piscina de 25m', $this->plugin_name); ?></span>
									</label>
								</fieldset>

								<h4>Categorias a exibir</h4>
								<fieldset>
									<legend class="screen-reader-text"><span>Absoluto</span></legend>
									<label for="<?php echo $this->plugin_name; ?>-exibir-absoluto">
										<input type="checkbox" id="<?php echo $this->plugin_name; ?>-exibir-absoluto" name="<?php echo $this->plugin_name; ?>[exibir-absoluto]" value="1" <?php checked($options["exibir-absoluto"], 1); ?>/>
										<span><?php esc_attr_e('Recordes da categoria absoluto', $this->plugin_name); ?></span>
									</label>
								</fieldset>

								<?php submit_button('Salvar opções', 'primary','submit', TRUE); ?>

							</form>


						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables .ui-sortable -->

			</div>
			<!-- post-body-content -->

			<!-- sidebar -->
			<div id="postbox-container-1" class="postbox-container">

				<div class="meta-box-sortables">

					<div class="postbox">

						<div class="handlediv" title="Click to toggle"><br></div>
						<!-- Toggle -->

						<h2 class="hndle"><span><?php esc_attr_e(
									'Sobre', 'wp_admin_style'
								); ?></span></h2>

						<div class="inside">
<?php echo '<p align="center"><a href="https://www.swim.com.br/" target="_blank"><img src="' . plugins_url() . '/'. $this->plugin_name. '/images/swimitup.png" width="200" border="0"></a></p> '; ?>
							<p>A <strong>Tabela de Recordes Swim It Up!</strong> é um plugin muito fácil de usar e configurar. Use os campos ao lado para configurar sua tabela de acordo com o que quer e clique em <i>Salvar</i>.</p>
<p>Depois, inclua o shortcode <strong><span class="regular-text code">[swimitup-recordes]</span></strong> no seu post ou página onde deseja exibir a tabela. Ela será exibida em full-width, utilizando toda a largura disponível do local onde foi incluída.</p>
<p>Obrigado por usar uma ferramenta <strong>Swim It Up!</strong>. O crédito é obrigatório ao fim da tabela, exceto quando você está utilizando uma chave válida para expandir as opções da tabela (<i>opção disponível apenas para assinantes do conteúdo do <strong>Swim It Up!</strong></i>)</p>
						</div>
						<!-- .inside -->

					</div>
					<!-- .postbox -->

				</div>
				<!-- .meta-box-sortables -->

			</div>
			<!-- #postbox-container-1 .postbox-container -->

		</div>
		<!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div>
	<!-- #poststuff -->

</div> <!-- .wrap -->

