<?php
/**
 *
 *
 * The template for displaying all pages.
 * Template Name: Full-Width
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package klopp
 */

get_header(); ?>

<div id="primary-mono" class="content-area col-md-12 page">
    <main id="main" class="site-main" role="main">

        <?php while ( have_posts() ) : the_post();
        if (has_post_thumbnail( $post->ID ) ): ?>
            <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
            <style>
                #masthead {
                    background-image: url('<?php echo $image[0]; ?>');
                }
            </style>
        <?php endif; ?>

            <?php get_template_part( '/modules/content/content', 'page' ); ?>

            <?php
            // If comments are open or we have at least one comment, load up the comment template
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            ?>

        <?php endwhile; // end of the loop. ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
