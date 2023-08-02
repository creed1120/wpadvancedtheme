<?php
/**
 * Template for Post Entry Header
 * 
 * @package wpadvancedtheme
 * 
 * ( this file is within the WP Loop )
 */

 // Variables
 $get_the_post_id = get_the_ID();
 $hide_page_title = get_post_meta( $get_the_post_id, '_wpat_hide_page_title', true );
  /**
  * apply this heading class 'd-none' to post title html tag if "hide page title" custom meta box is 'yes' to hide the post * title
  */
 $heading_class = ! empty( $hide_page_title ) && 'yes' === $hide_page_title ? 'd-none' : '';

 $has_post_thumbnail = get_the_post_thumbnail( $get_the_post_id );
 $get_post_title = get_the_title( $get_the_post_id );

?>

<header class="entry-header">
    <?php
        // add Featured Image
        if ( $has_post_thumbnail ) : ?>

            <div class="entry-image mb-3">
                <a href="<?php echo esc_url( get_permalink() ) ?>">
                    <?php the_custom_post_thumbnail(
                        $get_the_post_id,
                        'featured-thumbnail',
                        [
                            'sizes' => '(max-width: 350px) 350px, 233px',
                            'class' => 'attachment-featured-large featured-image-large'
                        ]
                    ); ?>
                </a>
            </div>
    <?php elseif ( ! $has_post_thumbnail ) : ?>

        <div class="entry-image mb-3">
            <a href="<?php echo esc_url( get_permalink() ) ?>">
                <img width="350" height="233" class="attachment-featured-large featured-image-large" src="/wp-content/uploads/2023/07/ef3-placeholder-image.jpeg" alt="placeholder image" sizes="(max-width: 350px) 350px, 233px">
            </a>
        </div>
            
    <?php endif; ?>

    <?php if ( is_single() || is_page() ) : ?>
        <?php
            printf( 
                '<h2 class="post-title text-dark %1$s">%2$s</h2>',
                esc_attr( $heading_class ),
                wp_kses_post( get_the_title() )
            );
        ?>

        <?php else : ?>

            <?php
                printf( 
                    '<h3 class="entry-title mb-3"><a class="text-dark" href="%1$s">%2$s</a></h3>',
                    esc_url( get_the_permalink() ),
                    wp_kses_post( get_the_title() )
                );
            ?>

    <?php endif; ?>
</header>