<?php
/**
 * No Content Template that displays nothing found if there are no posts available
 * 
 * @package wpadvancedtheme
 * 
 */
?>

<section class="no-results not-found">
    <header class="page-header">
        <h2 class="page-title"><?php esc_html_e( 'Nothing Found', 'wpadvancedtheme' ); ?></h2>
    </header>

    <div class="page-content">
        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
            <p>
                <?php 
                    printf( 
                        wp_kses( __( 'Ready to publish your first post? <a href="%s">Get started here</a>', 'wpadvancedtheme' ), [ 'a' => [ 'href' => [] ] ] ), esc_url( admin_url( 'post-new.php' ) ) 
                    ) ?>
            </p>
            
            <?php elseif ( is_search() ) : ?>

            <p><?php esc_html_e( 'Sorry nothing matched your search critera. Please try again with different keywords.' ) ?></p>
            <?php get_search_form(); ?>

            <?php else : ?>

            <p><?php esc_html_e( 'We could not find what you are looking for. Maybe search again.' ) ?></p>
            <?php get_search_form(); ?>

        <?php endif; ?>
    </div>
</section>