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
        add_action( 'init', [ $this, 'wpat_register_menus' ] );
    }

    public function wpat_register_menus() {
        register_nav_menus([
            'wpat-header-menu' => esc_html__( 'Header Menu', 'wpadvancedtheme' ),
            'wpat-footer-menu' => esc_html__( 'Footer Menu', 'wpadvancedtheme' )
        ]);
    }

    public function get_menu_id($location) {
        // get all available menu locations.
        $locations = get_nav_menu_locations();

        // get Object ID by location.
        $menu_id = $locations[ $location ];

        return ! empty( $menu_id ) ? $menu_id : '';
    }

    public function get_child_menu_items( $menu_array, $parent_id ) {
        // push the child menu itmes into the empty array
        $child_menus = [];

        if ( ! empty( $menu_array ) && is_array( $menu_array )) {

            foreach ( $menu_array as $menu ) {
                if ( intval( $menu->menu_item_parent ) === $parent_id ) {
                    array_push( $child_menus, $menu );
                }
            }

        }
        return $child_menus;
    }

}