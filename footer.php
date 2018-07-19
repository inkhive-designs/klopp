<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package klopp
 */
?>

	</div><!-- #content -->

	<?php get_sidebar('footer'); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info container">
            <span class="fc-line">
                <?php printf( __( 'Theme Designed by %1$s.', 'klopp' ), '<a href="'.esc_url("http://inkhive.com/").'" rel="designer">InkHive</a>' ); ?>
            </span>
			<span class="sep"></span>
            <span class="fcustom-text">
                <?php echo ( get_theme_mod('klopp_footer_text') == '' ) ? ('&copy; '.date('Y').' '.get_bloginfo('name').__('. All Rights Reserved. ','klopp')) : esc_html(get_theme_mod('klopp_footer_text')); ?>
            </span>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	
</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
