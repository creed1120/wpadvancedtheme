<?php
/**
 * Theme Functions
 * 
 * @package wpadvancedtheme
 * 
 */

// print_r();
// echo filemtime( get_template_directory() . '/style.css' ); - "Use this function to avoid browser caching for Stylesheets & Scripts"
// wp_die();

// CONSTANTS
if ( ! defined( 'WPADVANCEDTHEME_DIR_PATH' ) ) {
   define( 'WPADVANCEDTHEME_DIR_PATH', untrailingslashit( get_template_directory() ) );
}
if ( ! defined( 'WPADVANCEDTHEME_DIR_URI' ) ) {
   define( 'WPADVANCEDTHEME_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

require_once WPADVANCEDTHEME_DIR_PATH . '/includes/helpers/autoloader.php';
require_once WPADVANCEDTHEME_DIR_PATH . '/includes/helpers/template-tags.php';


//Get Class Instances
function wpadvancedtheme_get_theme_instance() {
   \WPADVANCEDTHEME\Includes\WPADVANCED_THEME::get_instance();
}
wpadvancedtheme_get_theme_instance();
