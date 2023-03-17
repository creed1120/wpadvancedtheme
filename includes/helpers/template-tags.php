<?php
/*************************
 * Theme Template Tags
 *************************/

/**
 * Post Thumbnail
 * 
 * ( this file is loaded in functions.php )
 */
function get_the_custom_post_thumbnail( $post_id, $size = 'featured-thumbnail', $addtional_attr = [] ) {

    $custom_thumbnail = '';

    if ( $post_id === null ) {
        $post_id = get_the_ID();
    }

    if ( has_post_thumbnail( $post_id ) ) {
        $default_attributes = [
            'loading' => 'lazy'
        ];

        // Merges passed in 'additional_attr' and '$default_attributes' arrays
        $attributes = array_merge( $addtional_attr, $default_attributes );

        $custom_thumbnail = wp_get_attachment_image(
            get_post_thumbnail_id( $post_id ),
            $size,
            false,
            $attributes
        );
    }
    return $custom_thumbnail;
}

function the_custom_post_thumbnail( $post_id, $size = 'featured-thumbnail', $addtional_attr = [] ) {
    echo get_the_custom_post_thumbnail( $post_id, $size, $addtional_attr );
}