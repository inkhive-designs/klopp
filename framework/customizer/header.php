<?php
function klopp_customize_register_header_settings($wp_customize){
    //Header Sections
    $wp_customize->add_panel(
        'klopp_header_panel',
        array(
            'title'     => __('Header Settings','klopp'),
            'priority'  => 30,
        )
    );

    $wp_customize->get_section('title_tagline')->panel = 'klopp_header_panel';

    $wp_customize->get_section('header_image')->panel = 'klopp_header_panel';
}
add_action('customize_register', 'klopp_customize_register_header_settings');