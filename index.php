<?php
/*
Plugin Name: Custom WP CSS & JS
Plugin URI: http://coderssociety.in
Description: Add your custom css and javascript/jquery using this plugin on Header or Footer.
Version: 1.1
Author: Coders Society
Author URI: http://coderssociety.in
License: GPL2
*/
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
/* ---- plugin head ---- */
//add settings page to menu
function custom_css_options() {
add_menu_page( 'Custom WP CSS & JS', 'Custom WP CSS & JS', 'manage_options', 'custom-wp-css-js.php', 'custom_css_js_plugin', plugins_url( 'custom-wp-css-js/assets/img/icon.png' ), '120');
}
add_action( 'admin_menu', 'custom_css_options' );
//add actions
function custom_css_js_register(){
    register_setting( 'custom_css_js_get', 'custom_css_js_form' );
}
add_action( 'admin_init', 'custom_css_js_register' );
// Add settings link on plugin page
function custom_css_js_link($links) { 
  $settings_link = '<a href="admin.php?page=custom-wp-css-js.php">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'custom_css_js_link' );
/* ---- plugin head end ---- */

function custom_css_init() {
	if (!is_admin()){	
  }
	else {
		wp_register_style('css-style', plugins_url( '/assets/css/admin-style.css' , __FILE__ ));
		wp_enqueue_style('css-style');
		wp_register_style('codemirror-style', plugins_url( '/assets/css/codemirror.css' , __FILE__ ));
		wp_enqueue_style('codemirror-style');
		wp_register_style('codemirror-theme', plugins_url( '/assets/css/base16-dark.css' , __FILE__ ));
		wp_enqueue_style('codemirror-theme');
		wp_register_script('codemirror-script', plugins_url( '/assets/js/codemirror.js' , __FILE__ ));
		wp_enqueue_script('codemirror-script');
		wp_register_script('codemirror-css', plugins_url( '/assets/js/css.js' , __FILE__ ));
		wp_enqueue_script('codemirror-css');
		wp_register_script('codemirror-java', plugins_url( '/assets/js/javascript.js' , __FILE__ ));
		wp_enqueue_script('codemirror-java');
		wp_register_script('codemirror-html', plugins_url( '/assets/js/htmlmixed.js' , __FILE__ ));
		wp_enqueue_script('codemirror-html');
		wp_register_script('codemirror-active', plugins_url( '/assets/js/active-line.js' , __FILE__ ));
		wp_enqueue_script('codemirror-active');
		wp_register_script('codemirror-brac', plugins_url( '/assets/js/matchbrackets.js' , __FILE__ ));
		wp_enqueue_script('codemirror-brac');
	}
}
add_action('init', 'custom_css_init');
include_once( plugin_dir_path( __FILE__ ) . "assets/main.php");
