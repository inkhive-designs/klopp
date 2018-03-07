<?php
function klopp_customize_register_slider($wp_customize){
    // SLIDER PANEL
    $wp_customize->add_panel( 'klopp_slider_panel', array(
        'priority'       => 35,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Main Slider','klopp'),
    ) );

    $wp_customize->add_section(
        'klopp_sec_slider_options',
        array(
            'title'     => __('Enable/Disable','klopp'),
            'priority'  => 0,
            'panel'     => 'klopp_slider_panel'
        )
    );


    $wp_customize->add_setting(
        'klopp_main_slider_enable',
        array( 'sanitize_callback' => 'klopp_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'klopp_main_slider_enable', array(
            'settings' => 'klopp_main_slider_enable',
            'label'    => __( 'Enable Slider.', 'klopp' ),
            'section'  => 'klopp_sec_slider_options',
            'type'     => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'klopp_main_slider_count',
        array(
            'default' => '0',
            'sanitize_callback' => 'klopp_sanitize_positive_number'
        )
    );

    // Select How Many Slides the User wants, and Reload the Page.
    $wp_customize->add_control(
        'klopp_main_slider_count', array(
            'settings' => 'klopp_main_slider_count',
            'label'    => __( 'No. of Slides(Min:0, Max: 3)' ,'klopp'),
            'section'  => 'klopp_sec_slider_options',
            'type'     => 'number',
            'description' => __('Save the Settings, and go Back to configure the slides.','klopp'),

        )
    );


    for ( $i = 1 ; $i <= 3 ; $i++ ) :

        //Create the settings Once, and Loop through it.

        $wp_customize->add_setting(
            'klopp_slide_img'.$i,
            array( 'sanitize_callback' => 'esc_url_raw' )
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'klopp_slide_img'.$i,
                array(
                    'label' => '',
                    'section' => 'klopp_slide_sec'.$i,
                    'settings' => 'klopp_slide_img'.$i,
                )
            )
        );


        $wp_customize->add_section(
            'klopp_slide_sec'.$i,
            array(
                'title'     => __('Slide ','klopp').$i,
                'priority'  => $i,
                'panel'     => 'klopp_slider_panel'
            )
        );

        $wp_customize->add_setting(
            'klopp_slide_title'.$i,
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'klopp_slide_title'.$i, array(
                'settings' => 'klopp_slide_title'.$i,
                'label'    => __( 'Slide Title','klopp' ),
                'section'  => 'klopp_slide_sec'.$i,
                'type'     => 'text',
            )
        );

        $wp_customize->add_setting(
            'klopp_slide_desc'.$i,
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'klopp_slide_desc'.$i, array(
                'settings' => 'klopp_slide_desc'.$i,
                'label'    => __( 'Slide Description','klopp' ),
                'section'  => 'klopp_slide_sec'.$i,
                'type'     => 'text',
            )
        );



        $wp_customize->add_setting(
            'klopp_slide_CTA_button'.$i,
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'klopp_slide_CTA_button'.$i, array(
                'settings' => 'klopp_slide_CTA_button'.$i,
                'label'    => __( 'Custom Call to Action Button Text(Optional)','klopp' ),
                'section'  => 'klopp_slide_sec'.$i,
                'type'     => 'text',
            )
        );

        $wp_customize->add_setting(
            'klopp_slide_url'.$i,
            array( 'sanitize_callback' => 'esc_url_raw' )
        );

        $wp_customize->add_control(
            'klopp_slide_url'.$i, array(
                'settings' => 'klopp_slide_url'.$i,
                'label'    => __( 'Target URL','klopp' ),
                'section'  => 'klopp_slide_sec'.$i,
                'type'     => 'url',
            )
        );

    endfor;
}
add_action('customize_register', 'klopp_customize_register_slider');