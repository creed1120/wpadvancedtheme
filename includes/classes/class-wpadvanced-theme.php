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

    }

}