<?php
if (!defined('ABSPATH')) exit;
/*
 * Plugin Name: Cibeles AI
 * Plugin URI:  https://ai.cibeles.net/
 * Description: Asistente de redacción de entradas de inteligencia artificial para Wordpress hecho por cibeles.net
 * Plugin Prefix: caip
 * Text Domain: cibeles-ai
 * Domain Path: /languages/
 * Author: Cibeles.net
 * Author URI:  https://www.cibeles.net/
 * Version: 1.0.0
 * License: GPLv2
 * Released under the GNU General Public License (GPL)
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/


if (!defined('ABSPATH')) exit;
if(!defined('DS')) define('DS',DIRECTORY_SEPARATOR);


$cibelesAiPlugin = [
  'namespace' => 'cibeles-ai',
  'version' => '1.0.0',
  'path' => dirname(__FILE__).DS,
  'url' => plugin_dir_url( __FILE__ ),
  'filename' => __FILE__,
  'api_url' => 'https://openai.editmaker.com/wp/api/',
];

if ( is_admin() ) {	
	require_once $cibelesAiPlugin['path'] . 'init.php'; 
	require_once $cibelesAiPlugin['path'] . 'functions.php'; 
	require_once $cibelesAiPlugin['path'] . 'options.php'; 
}

