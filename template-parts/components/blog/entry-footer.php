<?php
/**
 * Template for Post Entry Footer
 * 
 * @package wpadvancedtheme
 * 
 * ( this file is within the WP Loop )
 */

 $the_post_id = get_the_ID();
 $article_terms = wp_get_post_terms( $the_post_id, [ 'category', 'post_tag' ] );

 if ( empty( $article_terms ) || ! is_array( $article_terms ) ) {
    return;
 }

?>

 <div class="entry-footer">
    <?php foreach ( $article_terms as $key => $wpat_term ) : ?>

        <button class="btn btn-secondary mr-1" type="button">
            <a href="<?php echo esc_url( get_term_link( $wpat_term ) ) ?>" class="text-white">
             <?php echo esc_html( $wpat_term->name ) ?>
            </a>
        </button>

    <?php endforeach; ?>
 </div>