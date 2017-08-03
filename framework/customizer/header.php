<?php
function klopp_customize_register_header($wp_customize){
    //Logo Settings
    $wp_customize->add_setting( 'klopp_logo_resize' , array(
        'default'     => 100,
        'sanitize_callback' => 'klopp_sanitize_positive_number',
    ) );
    $wp_customize->add_control(
        'klopp_logo_resize',
        array(
            'label' => __('Resize & Adjust Logo','klopp'),
            'section' => 'title_tagline',
            'settings' => 'klopp_logo_resize',
            'priority' => 6,
            'type' => 'range',
            'active_callback' => 'klopp_logo_enabled',
            'input_attrs' => array(
                'min'   => 30,
                'max'   => 200,
                'step'  => 5,
            ),
        )
    );

    function klopp_logo_enabled($control) {
        $option = $control->manager->get_setting('custom_logo');
        return $option->value() == true;
    }


    //Replace Header Text Color with, separate colors for Title and Description
    //Override klopp_site_titlecolor
    $wp_customize->remove_control('display_header_text');
    $wp_customize->remove_setting('header_textcolor');
    $wp_customize->add_setting('klopp_site_titlecolor', array(
        'default'     => '#FFF',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'klopp_site_titlecolor', array(
            'label' => __('Site Title Color','klopp'),
            'section' => 'colors',
            'settings' => 'klopp_site_titlecolor',
            'type' => 'color'
        ) )
    );

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


    //Settings for Header Image
    $wp_customize->add_setting( 'klopp_himg_style' , array(
        'default'     => 'cover',
        'sanitize_callback' => 'klopp_sanitize_himg_style'
    ) );

    /* Sanitization Function */
    function klopp_sanitize_himg_style( $input ) {
        if (in_array( $input, array('contain','cover') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'klopp_himg_style', array(
        'label' => __('Header Image Arrangement','klopp'),
        'section' => 'header_image',
        'settings' => 'klopp_himg_style',
        'type' => 'select',
        'choices' => array(
            'contain' => __('Contain','klopp'),
            'cover' => __('Cover Completely (Recommended)','klopp'),
        )
    ) );

    $wp_customize->add_setting( 'klopp_himg_align' , array(
        'default'     => 'center',
        'sanitize_callback' => 'klopp_sanitize_himg_align'
    ) );

    /* Sanitization Function */
    function klopp_sanitize_himg_align( $input ) {
        if (in_array( $input, array('center','left','right') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'klopp_himg_align', array(
        'label' => __('Header Image Alignment','klopp'),
        'section' => 'header_image',
        'settings' => 'klopp_himg_align',
        'type' => 'select',
        'choices' => array(
            'center' => __('Center','klopp'),
            'left' => __('Left','klopp'),
            'right' => __('Right','klopp'),
        )
    ) );

    $wp_customize->add_setting( 'klopp_himg_repeat' , array(
        'default'     => true,
        'sanitize_callback' => 'klopp_sanitize_checkbox'
    ) );

    $wp_customize->add_control(
        'klopp_himg_repeat', array(
        'label' => __('Repeat Header Image','klopp'),
        'section' => 'header_image',
        'settings' => 'klopp_himg_repeat',
        'type' => 'checkbox',
    ) );


    //Settings For Logo Area

    $wp_customize->add_setting(
        'klopp_hide_title_tagline',
        array( 'sanitize_callback' => 'klopp_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'klopp_hide_title_tagline', array(
            'settings' => 'klopp_hide_title_tagline',
            'label'    => __( 'Hide Title and Tagline.', 'klopp' ),
            'section'  => 'title_tagline',
            'type'     => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'klopp_branding_below_logo',
        array( 'sanitize_callback' => 'klopp_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'klopp_branding_below_logo', array(
            'settings' => 'klopp_branding_below_logo',
            'label'    => __( 'Display Site Title and Tagline Below the Logo.', 'klopp' ),
            'section'  => 'title_tagline',
            'type'     => 'checkbox',
            'active_callback' => 'klopp_title_visible'
        )
    );

    function klopp_title_visible( $control ) {
        $option = $control->manager->get_setting('klopp_hide_title_tagline');
        return $option->value() == false ;
    }
}
add_action('cutomize_register', 'klopp_customize_register_header');