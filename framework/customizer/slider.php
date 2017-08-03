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


    $wp_customize->add_section(
        'klopp_sec_upgrade',
        array(
            'title'     => __('Klopp Theme Help & Support','klopp'),
            'priority'  => 45,
        )
    );

    $wp_customize->add_setting(
        'klopp_upgrade',
        array( 'sanitize_callback' => 'esc_textarea' )
    );

    $wp_customize->add_control(
        new WP_Customize_Upgrade_Control(
            $wp_customize,
            'klopp_upgrade',
            array(
                'label' => __('Help & Support','klopp'),
                'description' => __('Thank you for choosing Klopp Theme. For Support Related to Klopp WordPress Theme Please Visit the WordPress <a target="_blank" href="https://wordpress.org/support/theme/klopp">Support Forums</a> or <a  href="https://inkhive.com" target="_blank">InkHive.com</a>','klopp'),
                'section' => 'klopp_sec_upgrade',
                'settings' => 'klopp_upgrade',
            )
        )
    );

    $wp_customize->add_section(
        'klopp_sec_upgrade_pro',
        array(
            'title'     => __('Discover Klopp Plus','klopp'),
            'priority'  => 15,
        )
    );

    $wp_customize->add_setting(
        'klopp_upgrade_pro',
        array( 'sanitize_callback' => 'esc_textarea' )
    );

    $wp_customize->add_control(
        new WP_Customize_Upgrade_Control(
            $wp_customize,
            'klopp_upgrade_pro',
            array(
                'label' => __('More of Everything','klopp'),
                'description' => __('Klopp Plus is the extended version of Klopp. It has More Features Including multiple header layouts, google fonts with over 650 choices, Unlimited Colors, Custom Skin Designer, Footer Layouts, Custom Widgets, More Blog Layouts, More Page Layouts and Options, More Featured Areas, More Showcases, Powerful Slider and so much more.  <a  href="https://inkhive.com/product/klopp-plus/" target="_blank">More Details</a>','klopp'),
                'section' => 'klopp_sec_upgrade_pro',
                'settings' => 'klopp_upgrade_pro',
            )
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