<?php
/**
* Register Meta Boxes
* 
* @package wpadvancedtheme
* 
*/

namespace WPADVANCEDTHEME\Includes;

use WPADVANCEDTHEME\Includes\Traits\Singleton;

class Meta_boxes {
    use Singleton;

    protected function __construct() {
        // loads all classes
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions
         */
        add_action( 'add_meta_boxes', [ $this, 'add_custom_meta_boxes' ] );
        add_action( 'save_post', [ $this, 'wpat_save_postdata' ] );
    }

    public function add_custom_meta_boxes( $post ) {
        $screens = [ 'post' ];
        foreach ( $screens as $screen ) {
            add_meta_box(
                'hide_page_title',                           // Unique ID
                __( 'Hide Page Title', 'wpadvancedtheme' ),  // Box title
                [ $this, 'wpat_custom_meta_box_html' ],      // Content callback, must be of type callable
                $screen, 'side'                              // Post type
            );
        }
    }

    // Adds custom Meta Box to the admin dashboard ( bottom of page or sidebar )
    public function wpat_custom_meta_box_html( $post ) {
        $value = get_post_meta( $post->ID, '_wpat_hide_page_title', true ); 
        
        /**
         * Create Nonce for verificaiton
         */
        wp_nonce_field( plugin_basename(__DIR__), 'hide_title_field_metabox_nonce' );

        ?>
        <label for="wpat-field"><?php esc_html_e( 'Hide the page title', 'wpadvancedtheme' ); ?></label>
        <select name="wpat_hide_title_field" id="wpat-field" class="postbox">
            <option value=""><?php esc_html_e( 'Select', 'wpadvancedtheme' ); ?></option>
            <option value="yes" <?php selected( $value, 'yes' ); ?>>
                <?php esc_html_e( 'Yes', 'wpadvancedtheme' ); ?>
            </option>
            <option value="no" <?php selected( $value, 'no' ); ?>>
                <?php esc_html_e( 'No', 'wpadvancedtheme' ); ?>
            </option>
        </select>
    
   <?php }

   // Saves the Selected value to the database
   public function wpat_save_postdata( $post_id ) {

        /**
         * When the post is saved or updated we access to $_POST variable
         * check if current user is authorized
         */
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        /**
         * Check if Nonce value recieved is the same as the created nonce
         */
        if ( ! isset( $_POST['hide_title_field_metabox_nonce'] ) || 
             ! wp_verify_nonce( $_POST['hide_title_field_metabox_nonce'], plugin_basename(__DIR__) ) 
        ) {
            return;
        }

        if ( array_key_exists( 'wpat_hide_title_field', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_wpat_hide_page_title',
                $_POST['wpat_hide_title_field']
            );
        }
    }

}