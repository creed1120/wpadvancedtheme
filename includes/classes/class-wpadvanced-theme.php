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
        
        // loads/instantiates all classes
        Assets::get_instance();
        Menus::get_instance();
        Meta_boxes::get_instance();

        // load the setup_hooks() function below
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions
         * 
         * Loads action hooks through the __construct function above.
         */
         add_action('after_setup_theme', [ $this, 'theme_setup' ]);
    }

    // Theme Functionality setup
    public function theme_setup() {


        add_theme_support( 'title-tag' );

        add_theme_support( 'custom-logo', [
            'header-text'          => array( 'site-title', 'site-description' ),
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,
            'unlink-homepage-logo' => false,
        ] );

        add_theme_support( 'custom-background' );

        add_theme_support( 'post-thumbnails' );

        /**
         * Register Image Sizes
         * 
         */
        add_image_size(
            'featured-thumbnail', 350, 233, true
        );

        add_theme_support( 'post-formats', [ 
            'aside',
            'gallery'
            ] );

        add_theme_support( 'customize-selective-refresh-widgets' );

        add_theme_support( 'automatic-feed-links' );

        add_theme_support( 'html5', [ 
            'comment-list',
            'comment-form',
            'search-form',
            'gallery',
            'caption',
            'style',
            'script'
        ] );

        add_editor_style();

        add_theme_support( 'editor-styles' );

        add_theme_support( 'align-wide' );

        global $content_width;
        if ( ! isset( $content_width ) ) {
            $content_width = 1400;
        }
    }

}