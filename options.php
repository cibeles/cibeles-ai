<?php
add_action( 'admin_menu', 'caip_add_admin_menu' );
add_action( 'admin_init', 'caip_settings_init' );


function caip_add_admin_menu(  ) { 

	add_options_page( 'Cibeles AI', 'Cibeles AI', 'manage_options', 'cibeles_ai', 'caip_options_page' );

}


function caip_settings_init(  ) { 

	register_setting( 'caip_pluginPage', 'caip_settings' );

	add_settings_section(
		'caip_pluginPage_section', 
		__( 'Asistente de redacción de entradas con inteligencia artificial para Wordpress', 'cibeles-ai' ), 
		
		'caip_settings_section_callback', 
		'caip_pluginPage'
	);
/*
	add_settings_field( 
		'caip_API_KEY', 
		__( 'API KEY', 'cibeles-ai' ), 
		'caip_API_KEY_render', 
		'caip_pluginPage', 
		'caip_pluginPage_section' 
	);
*/
	add_settings_field( 
		'caip_numero_titulares', 
		__( 'Cantidad de titulares generados', 'cibeles-ai' ), 
		'caip_numero_titulares_render', 
		'caip_pluginPage', 
		'caip_pluginPage_section' 
	);
	
	add_settings_field( 
		'caip_numero_tags', 
		__( 'Cantidad de tags generados', 'cibeles-ai' ), 
		'caip_numero_tags_render', 
		'caip_pluginPage', 
		'caip_pluginPage_section' 
	);
	/*
	add_settings_field( 
		'caip_numero_resumenes', 
		__( 'Cantidad de resúmenes generados', 'cibeles-ai' ), 
		'caip_numero_resumenes_render', 
		'caip_pluginPage', 
		'caip_pluginPage_section' 
	);
	*/
}


function caip_API_KEY_render(  ) { 

	$options = get_option( 'caip_settings' );
	?>
	<input type='text' name='caip_settings[caip_API_KEY]' value='<?php esc_html_e($options['caip_API_KEY']); ?>' style="min-width:400px;">
	<?php

}

function caip_numero_titulares_render(  ) { 

	$options = get_option( 'caip_settings' );
	if(!isset($options['caip_numero_titulares']) || $options['caip_numero_titulares'] == ''  || $options['caip_numero_titulares'] < 1  || $options['caip_numero_titulares'] > 15){
		$options['caip_numero_titulares'] = 5;
	}
	?>
	<input type='number' name='caip_settings[caip_numero_titulares]' min="1" max="15" value='<?php esc_html_e($options['caip_numero_titulares']); ?>' style="max-width:80px;">
	<?php
}

function caip_numero_tags_render(  ) { 

	$options = get_option( 'caip_settings' );
	if(!isset($options['caip_numero_tags']) || $options['caip_numero_tags'] == ''  || $options['caip_numero_tags'] < 1  || $options['caip_numero_tags'] > 25){
		$options['caip_numero_tags'] = 10;
	}
	?>
	<input type='number' name='caip_settings[caip_numero_tags]' min="1" max="20" value='<?php esc_html_e($options['caip_numero_tags']); ?>' style="max-width:80px;">
	<?php
}
function caip_numero_resumenes_render(  ) { 

	$options = get_option( 'caip_settings' );
	if(!isset($options['caip_numero_resumenes']) || $options['caip_numero_resumenes'] == ''  || $options['caip_numero_resumenes'] < 1  || $options['caip_numero_resumenes'] > 7){
		$options['caip_numero_resumenes'] = 3;
	}
	?>
	<input type='number' name='caip_settings[caip_numero_resumenes]' min="1" max="7" value='<?php esc_html_e($options['caip_numero_resumenes']); ?>' style="max-width:80px;">
	<?php

}

function caip_settings_section_callback(  ) { 

	wp_kses_post(_e('Configuración de Plugin de AI Cibeles - OpenAI y otros ajustes. (Uso del modelo gpt-3.5-turbo). <br /><br />Tiene gratis 50.000 palabras. <br />
	<strong>Palabras usadas: <span id="palabrasusadas">0</span></strong> <br />
	<h2>Palabras disponibles: <span id="palabrasdisponibles">0</span></h2> <br />
	', 'cibeles-ai' ));
	echo '<script>';
	echo "
		document.addEventListener('DOMContentLoaded', () => {	
			jQuery.get( 'https://openai.editmaker.com/wp/api/get.php?palabrasUsadas=get', function( data ) {
			  jQuery('#palabrasusadas').html( data );
			});
			jQuery.get( 'https://openai.editmaker.com/wp/api/get.php?palabrasDisponibles=get', function( data ) {
			  jQuery('#palabrasdisponibles').html( data );
			});
		});";
	echo '</script>';
}


function caip_options_page(  ) { 

		?>
		<form action='options.php' method='post'>

			<h2>Cibeles AI</h2>
			<div class="logoAjustes">
				<a href="https://ai.cibeles.net/" target="_blank">
				<img src="<?php echo esc_url(plugin_dir_url( __FILE__ )) .'img/logo-ai.cibeles.net.png'; ?> " width="" />
				</a>
				<br />
				<?php esc_html_e('Puede adquirir más palabras en','cibeles-ai');?> <br /><a href="https://ai.cibeles.net/" target="_blank">https://ai.cibeles.net/</a>
				
			</div>
			<style>
				.logoAjustes {
					float: right;
					text-align: center;
					margin-right: 20px;
				}
				.logoAjustes img{
					max-width: 180px;
				}
			</style>
			<?php
			settings_fields( 'caip_pluginPage' );
			do_settings_sections( 'caip_pluginPage' );
			submit_button();
			?>

		</form>
		<?php

}


function caip_plugin_add_settings_link( $links ) {
    $settings_link = '<a href="/wp-admin/options-general.php?page=cibeles_ai">' . esc_html('Settings') . '</a>';
    array_push( $links, $settings_link );
  	return $links;
}
add_filter( "plugin_action_links_cibeles-ai/cibeles-ai.php", 'caip_plugin_add_settings_link' );





?>