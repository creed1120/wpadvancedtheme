<?php
/**
 * Theme Template Tags
 * 
 * @package wpadvancedtheme
 * 
 * ( this file is loaded in functions.php )
 */

//=======================
//  Post Thumbnail 
//=======================
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

//===========================================
//  Post Header Entry Meta (Date & Time)
//===========================================
function wpat_post_time() {

    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    if ( get_the_time( 'U' ) !== get_post_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" date-time="%3$s">%4$s</time>';
    }

    $time_string = sprintf( $time_string, 
        esc_attr( get_the_date( 'DATE_W3C' ) ),
        esc_attr( get_the_date() ),
        esc_attr( get_the_modified_date( 'DATE_W3C' ) ),
        esc_attr( get_the_modified_date() )
    );

    $posted_on = sprintf( esc_html_x( 'Posted on %s', 'post date', 'wpadvancedtheme'),
    '<a href="'. get_the_permalink() .'">'. $time_string .'</a>' );

    echo '<span class="posted-on text-secondary">'. $posted_on .'</span>';
}

//===========================================
//  Post Header Entry Meta (Author)
//===========================================
function wpat_posted_by() {

    $the_author = get_the_author_meta('display_name');

    $posted_by = sprintf( 
        esc_html_x( ' by %s', 'post author', 'wpadvancedtheme' ),
        '<span class="author vcard"><a href="'. esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) .'">'. esc_html( $the_author ) .'</a></span>'
    );

    echo '<span class="posted-by text-secondary">'. $posted_by .'</span>';
}

//===========================================
//  Post Entry Meta (the excerpt)
//===========================================

function wpat_the_excerpt( $trim_char_count = 0 ) {

    if ( ! has_excerpt() || 0 === $trim_char_count ) {
        the_excerpt();
        return;
    }

    $excerpt = wp_strip_all_tags( get_the_excerpt() );
    $excerpt = substr( $excerpt, 0, $trim_char_count );
    $excerpt = substr( $excerpt, 0, strrpos( $excerpt,  ' ' ) );

    echo $excerpt . '[...]';

}

//===========================================
//  Post Entry Meta (the excerpt "Read More")
//===========================================

function wpat_excerpt_read_more( $more = '' ) {

    if ( ! is_single() ) {
        $more = sprintf( '<button class="btn btn-primary mt-4"><a class="text-white" href="%1$s">%2$s</a></button>', 
            get_the_permalink( get_the_ID() ),
            __( 'Read More', 'wpadvancedtheme' )
        );
    }
    return $more;
}