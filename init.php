<?php
if (!defined('ABSPATH')) exit;
/* Inicializa*/
add_action('admin_init','caip_init');
/* Inicializa thickbox*/
add_action('admin_init','caip_init_thickbox');
/*	Agrega fontawesome y main*/
add_action('admin_init','caip_init_files_CSS');
/*	Agrega main */
add_action('admin_enqueue_scripts','caip_init_files_JS');
/*  Agrega views */
add_action('admin_head', 'caip_init_files_views');
/* Agrega notices */
add_action( 'admin_notices', 'caip_admin_notice_warn' );

if ( ! function_exists( 'caip_init' ) ) {
	function caip_init(){
		global $current_user;
		global $cibelesAiPlugin;
		$cibelesAiPlugin['nick'] = $current_user->user_login;
		$cibelesAiPlugin['settings'] = get_option('caip_settings');
		$cibelesAiPlugin['settings']['caip_API_KEY'] = 			(isset($cibelesAiPlugin['settings']['caip_API_KEY']))? $cibelesAiPlugin['settings']['caip_API_KEY'] : '';
		$cibelesAiPlugin['settings']['caip_numero_titulares'] = (isset($cibelesAiPlugin['settings']['caip_numero_titulares']))? $cibelesAiPlugin['settings']['caip_numero_titulares'] : '5';
		$cibelesAiPlugin['settings']['caip_numero_tags'] = 		(isset($cibelesAiPlugin['settings']['caip_numero_tags']))? $cibelesAiPlugin['settings']['caip_numero_tags'] : '10';
		$cibelesAiPlugin['settings']['caip_numero_resumenes'] = (isset($cibelesAiPlugin['settings']['caip_numero_resumenes']))? $cibelesAiPlugin['settings']['caip_numero_resumenes'] : '3';
	}
}


if ( ! function_exists( 'caip_init_thickbox' ) ) {
	function caip_init_thickbox(){
		global $pagenow;
		if ( ( 'post.php' == $pagenow || 'post-new.php' == $pagenow ) ) {
			add_thickbox();
		}
	}
}

if ( ! function_exists( 'caip_init_files_CSS' ) ) {
	function caip_init_files_CSS(){
		global $pagenow;
		if ( ( 'post.php' == $pagenow || 'post-new.php' == $pagenow ) ) {
			wp_enqueue_style('fontawesome_css',  plugin_dir_url( __FILE__ ) . 'libs/fontawesome/css/main.css', '', '', 'all');
			wp_enqueue_style('post_css',  plugin_dir_url( __FILE__ ) . 'css/main.css', '', '1.0.0', 'all');
		}
	}
}

if ( ! function_exists( 'caip_init_files_JS' ) ) {
	function caip_init_files_JS(){

		global $cibelesAiPlugin;
		global $pagenow;
		global $post;

		if ( ( 'post.php' == $pagenow || 'post-new.php' == $pagenow ) && 'post' == $post->post_type ) {
			wp_enqueue_script( 'language_js', plugin_dir_url( __FILE__ ) . 'js/init_language.js', array( 'jquery' ), '1.0', true );
			wp_set_script_translations( 'language_js', 'cibeles-ai', plugin_basename( __DIR__ ) . '/languages/');
			
			if (caip_is_classic_editor()) {
				wp_enqueue_script( 'post_js', plugin_dir_url( __FILE__ ) . 'js/init_ai_fields.js', array( 'jquery' ), '1.0', true );
				wp_set_script_translations( 'post_js', 'cibeles-ai', plugin_basename( __DIR__ ) . '/languages/');
				wp_localize_script( 'post_js', 'caip_settings', $cibelesAiPlugin['settings']  );
				
				wp_enqueue_script( 	'caip_main',		plugin_dir_url( __FILE__ ) 		.'js/main.js', 		array( 'jquery' ), '1.0', true );
				wp_set_script_translations( 'caip_main', 	'cibeles-ai', plugin_basename( __DIR__ ) . '/languages/');
				
			}else{
				wp_enqueue_script( 'gutenberg_js', plugin_dir_url( __FILE__ ) . 'js/gutenberg.js', array( 'jquery' ), '1.0', true );
				wp_set_script_translations( 'gutenberg_js', 'cibeles-ai', plugin_basename( __DIR__ ) . '/languages/');
			}
			
			
		}
	}
}

if ( ! function_exists( 'caip_init_files_views' ) ) {
	function caip_init_files_views(){
		global $post;
		global $cibelesAiPlugin;
		global $pagenow;
		
		if ( ( 'post.php' == $pagenow || 'post-new.php' == $pagenow ) && $post->post_type == 'post') {
			//include $cibelesAiPlugin['path'] . 'views' . DS . 'scripts.phtml';
				
			if(caip_is_classic_editor()){
				require_once $cibelesAiPlugin['path'] . 'views' . DS . 'buttons.php';
				require_once $cibelesAiPlugin['path'] . 'views' . DS . 'thickbox' . DS . 'titular.php';
				require_once $cibelesAiPlugin['path'] . 'views' . DS . 'thickbox' . DS . 'titularcorto.php';
				require_once $cibelesAiPlugin['path'] . 'views' . DS . 'thickbox' . DS . 'clickbait.php';
				require_once $cibelesAiPlugin['path'] . 'views' . DS . 'thickbox' . DS . 'tags.php';
				require_once $cibelesAiPlugin['path'] . 'views' . DS . 'thickbox' . DS . 'autotags.php';
				require_once $cibelesAiPlugin['path'] . 'views' . DS . 'thickbox' . DS . 'resumen.php';
				require_once $cibelesAiPlugin['path'] . 'views' . DS . 'thickbox' . DS . 'autoexcerpt.php';
			}		
		}
	}
}


if ( ! function_exists( 'caip_admin_notice_warn' ) ) {
	function caip_admin_notice_warn() {
		global $cibelesAiPlugin;
		$url = $cibelesAiPlugin['api_url'].'words.php?domain='.urlencode(get_site_url());
		$response = wp_remote_get($url);
		//echo  $response['body'];
		
		if(isset($response['body']) && $response['body'] == 'NOWORDS'){
			echo '<div class="notice notice-error is-dismissible">
			  <p>'
			  .esc_html(__('Importante: Cibeles AI Plugin, están sin palabras y no funcionará correctamente, puede adquirir más en ','cibeles-ai')).
			  '<a href="https://ai.cibeles.net/" target="_blank">https://ai.cibeles.net/</a>
			  </p>
			  </div>'; 
		}
	}
}




