<?php
/**
 * klopp Theme Customizer
 *
 * @package klopp
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function klopp_customize_register( $wp_customize ) {
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    $wp_customize->add_panel( 'klopp_a_fcp_panel', array(
        'priority'       => 40,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => 'Featured Content Areas',
        'description'    => '',
    ) );
}
add_action('customize_register', 'klopp_customize_register');

//Load All Individual Settings Based on Sections/Panels.
require_once get_template_directory().'/framework/customizer/_customizer_controls.php';
require_once get_template_directory().'/framework/customizer/_layouts.php';
require_once get_template_directory().'/framework/customizer/_googlefonts.php';
require_once get_template_directory().'/framework/customizer/_sanitization.php';
require_once get_template_directory().'/framework/customizer/misc-scripts.php';
require_once get_template_directory().'/framework/customizer/header.php';
require_once get_template_directory().'/framework/customizer/init.php';
require_once get_template_directory().'/framework/customizer/colors.php';
require_once get_template_directory().'/framework/customizer/slider.php';
require_once get_template_directory().'/framework/customizer/showcase.php';
require_once get_template_directory().'/framework/customizer/social-icons.php';
require_once get_template_directory().'/framework/customizer/featured-posts.php';



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function klopp_customize_preview_js() {
    if(is_customize_preview()) {
        wp_enqueue_script( 'klopp_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
    }
}
add_action( 'customize_preview_init', 'klopp_customize_preview_js' );


function klopp_customize_control_js() {
		wp_enqueue_script( 'klopp_customize_control', get_template_directory_uri() . '/js/customize-control.js', array(), '', true );
}
add_action( 'customize_controls_enqueue_scripts', 'klopp_customize_control_js' );