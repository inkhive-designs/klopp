<?php
function klopp_customize_register_fonts($wp_customize){
    $wp_customize->add_section(
        'klopp_typo_options',
        array(
            'title'     => __('Google Web Fonts','klopp'),
            'priority'  => 41,
            'panel' => 'klopp_design_panel'
        )
    );

    $font_array = array('Yanone Kaffeesatz','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo 27px','Lora','Source Sans Pro','PT Sans','Ubuntu','Lobster','Arimo','Bitter','Noto Sans');
    $fonts = array_combine($font_array, $font_array);

    $wp_customize->add_setting(
        'klopp_title_font',
        array(
            'default'=> 'Yanone Kaffeesatz',
            'sanitize_callback' => 'klopp_sanitize_gfont'
        )
    );

    function klopp_sanitize_gfont( $input ) {
        if ( in_array($input, array('Source Sans Pro','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo 27px','Lora','PT Sans','Ubuntu','Lobster','Arimo','Bitter','Noto Sans') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'klopp_title_font',array(
            'label' => __('Title','klopp'),
            'settings' => 'klopp_title_font',
            'section'  => 'klopp_typo_options',
            'type' => 'select',
            'choices' => $fonts,
        )
    );

    $wp_customize->add_setting(
        'klopp_body_font',
        array(	'default'=> 'Source Sans Pro',
            'sanitize_callback' => 'klopp_sanitize_gfont' )
    );

    $wp_customize->add_control(
        'klopp_body_font',array(
            'label' => __('Body','klopp'),
            'settings' => 'klopp_body_font',
            'section'  => 'klopp_typo_options',
            'type' => 'select',
            'choices' => $fonts
        )
    );
}
add_action('customize_register', 'klopp_customize_register_fonts');