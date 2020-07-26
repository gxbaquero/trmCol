<?
if(!defined('GXB_TRMCO_URL')){
  define('GXB_TRMCO_URL',plugins_url('/',GXB_TRMCO_FILE));
}
function trm_col_gxb_scripts(){
  wp_enqueue_style('trm_col_gxb-style',GXB_TRMCO_URL."includes/style.css");
}

add_action('wp_enqueue_scripts','trm_col_gxb_scripts');

