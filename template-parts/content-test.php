<?php
/**
 * Content Template for Testing
 * 
 * @package wpadvancedtheme
 * 
 * ( this file is within the WP Loop )
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-5' ); ?>>
    <?php 
        get_template_part( 'template-parts/components/test/test-home' );
     ?>
</article>