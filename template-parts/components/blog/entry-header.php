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
 $has_post_thumbnail = get_the_post_thumbnail( $get_the_post_id );

 $get_post_title = get_the_title( $get_the_post_id );

// echo "<pre>";
// print_r( $get_the_post_id . ' ' . $hide_page_title );
// wp_die();

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

            <?php if ( $hide_page_title !== 'yes' ) : ?>
                <div class="entry-header-title">
                    <?php echo $get_post_title; ?>
                </div>
            <?php endif; ?>

            <?php else : ?>
                <?php echo ""; ?>
    <?php endif; ?>
</header>