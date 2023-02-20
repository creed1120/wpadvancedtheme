<?php
/**
 * Register Menus
 * 
 * @package wpadvancedtheme
 * 
 */

 namespace WPADVANCEDTHEME\Includes;

use WPADVANCEDTHEME\Includes\Traits\Singleton;

 class Menus {
    use Singleton;

    protected function __construct() {
        // loads all classes
        $this->setup_hooks();

    }

    protected function setup_hooks() {
        /**
         * Actions
         */
        add_action( 'init', [ $this, 'register_my_menus' ] );

    }

    public function register_my_menus() {
        register_nav_menus([
            'wpat-header-menu' => esc_html__( 'Header Menu', 'wpadvancedtheme' ),
            'wpat-footer-menu' => esc_html__( 'Footer Menu', 'wpadvancedtheme' )
          ]);
       }

 }