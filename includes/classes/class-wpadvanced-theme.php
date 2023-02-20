<?php
/**
 * Bootstraps the Theme ( adds all the basic functionality of the theme )
 * 
 * @package wpadvancedtheme
 * 
 */

namespace WPADVANCEDTHEME\Includes;

use WPADVANCEDTHEME\Includes\Traits\Singleton;

class WPADVANCED_THEME {
    use Singleton;

    protected function __construct() {
        // loads/instantiate all classes
        Assets::get_instance();

        $this->setup_hooks();

    }

    protected function setup_hooks() {
        /**
         * Actions
         */
         add_action('after_setup_theme', [ $this, 'theme_setup' ]);
    }

    public function theme_setup() {
        add_theme_support( 'title-tag' );
        add_theme_support( 'custom-logo', [
            'header-text'          => array( 'site-title', 'site-description' ),
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,
            'unlink-homepage-logo' => true,
        ] );
    }

}