<?php
/**
 * Plugin Name
 *
 * @package           trmCol
 * @author            @gxbaquero
 * @copyright         2020 gxbaquero
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       TRM - Dolar en Pesos Colombianos
 * Plugin URI:        https://github.com/gxbaquero/trmCol.git
 * Description:       Trae la TRM desde el Banco de la República de Colombia y la muestra como widget.
 * Version:           0.0.5
 * Requires at least: 5.2
 * Requires PHP:      5.6
 * Author:            @gxbaquero
 * Author URI:        https://gxbaquero.github.io/
 * Text Domain:       trm_col_gxb
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

//include 'includes/getValue.php';
//getAll();
if(!defined('ABSPATH')){
  exit;
}
if(!defined('GXB_TRMCO_FILE')){
  define('GXB_TRMCO_FILE',__FILE__);
}

if(!defined('GXB_TRMCO_URL')){
  define('GXB_TRMCO_URL',plugins_url('/',GXB_TRMCO_FILE));
}

if (!defined ('GXB_TRMCO_DIR')){
  define('GXB_TRMCO_DIR',plugin_dir_path(GXB_TRMCO_FILE));
}
//loadScripts

require_once GXB_TRMCO_DIR.'includes/loadIni.php';
require_once GXB_TRMCO_DIR.'includes/trmCol-class.php';

// Register widget
function trm_col_gxb_register(){
  register_widget('trm_col_gxb_Widget');
}

//hook in widget
add_action('widget_init','trm_col_gxb_register');