<?php
/**
 * @package Klopp
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-12 col-sm-12 grid card-layout'); ?>>

    <div class="featured-thumb col-md-4 col-sm-4">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_post_thumbnail('klopp-pop-thumb'); ?></a>
        <?php else: ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/placeholder2.jpg"; ?>"></a>
        <?php endif; ?>
    </div><!--.featured-thumb-->

    <div class="out-thumb col-md-8 col-sm-8">
        <header class="entry-header">
            <h1 class="entry-title title-font"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
            <div class="postedon"><div class="date"><?php echo get_the_date( 'D, M j' ); ?> </div><div class="author"><?php the_author(); ?></div></div>
            <div class="clearfix"></div>
            <span class="entry-excerpt"><?php echo substr(get_the_excerpt(),0,100).(get_the_excerpt() ? "..." : "" ); ?></span>
            <span class="readmore"><a class="hvr-underline-from-center" href="<?php the_permalink() ?>"><?php _e('Read More','klopp'); ?></a></span>
        </header><!-- .entry-header -->
    </div><!--.out-thumb-->

</article><!-- #post-## -->