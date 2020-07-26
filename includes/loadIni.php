<?
function trm_col_gxb_scripts(){
  wp_enqueue_style('trm_col_gxb-style',"/wp-content/plugins/trmCol/includes/style.css");
}

add_action('wp_enqueue_scripts','trm_col_gxb_scripts');

