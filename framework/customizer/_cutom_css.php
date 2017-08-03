<?php
function klopp_customize_register_custom_css($wp_customize){
    $wp_customize-> add_section(
        'klopp_custom_codes',
        array(
            'title'			=> __('Custom CSS','klopp'),
            'description'	=> __('Enter your Custom CSS to Modify design.','klopp'),
            'priority'		=> 11,
            'panel'			=> 'klopp_design_panel'
        )
    );

    $wp_customize->add_setting(
        'klopp_custom_css',
        array(
            'default'		=> '',
            'sanitize_callback'    => 'wp_filter_nohtml_kses',
            'sanitize_js_callback' => 'wp_filter_nohtml_kses'
        )
    );

    $wp_customize->add_control(
        new Klopp_Custom_CSS_Control(
            $wp_customize,
            'klopp_custom_css',
            array(
                'section' => 'klopp_custom_codes',
                'settings' => 'klopp_custom_css'
            )
        )
    );
}
add_action('customize_register', 'klopp_customize_register_custom_css');