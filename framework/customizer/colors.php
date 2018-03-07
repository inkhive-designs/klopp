<?php
function klopp_customize_register_skin($wp_customize){
    $wp_customize->get_section('colors')->title = __('Colors','klopp');
    $wp_customize->get_section('colors')->panel = 'plum_header_panel';
    $wp_customize->get_control('header_textcolor')->label = __('Site Title Color','klopp');

    $wp_customize->add_setting('klopp_header_desccolor', array(
        'default'     => '#FFF',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'klopp_header_desccolor', array(
            'label' => __('Site Tagline Color','klopp'),
            'section' => 'colors',
            'settings' => 'klopp_header_desccolor',
            'type' => 'color'
        ) )
    );
}
add_action('customize_register', 'klopp_customize_register_skin');