<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package klopp
 */

get_template_part('modules/header/head'); ?>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'klopp' ); ?></a>
    <?php
        get_template_part('modules/header/jumbo', 'search');
        get_template_part('modules/header/top', 'bar');
        get_template_part('modules/header/masthead'); ?>
    <div id="social-search">
        <div class="container">
            <?php
                get_template_part('modules/social/social', 'none');
                get_template_part('modules/header/social', 'search');
            ?>
        </div>
    </div>

	<?php get_template_part('slider', 'nivo' ); ?>
	
	<div class="mega-container">
		<?php get_template_part('/framework/featured-components/featured', 'showcase' ); ?>
		<?php get_template_part('/framework/featured-components/featured', 'posts' ); ?>
		<?php get_template_part('featured', 'content2'); ?>
		<?php get_template_part('featured', 'content1'); ?>
	
		<div id="content" class="site-content container">