<?php
function klopp_customize_register_showcase($wp_customize){
    //CUSTOM SHOWCASE
    $wp_customize->add_panel( 'klopp_showcase_panel', array(
        'priority'       => 35,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Custom Showcase','klopp'),
    ) );

    $wp_customize->add_section(
        'klopp_sec_showcase_options',
        array(
            'title'     => __('Enable/Disable','klopp'),
            'priority'  => 0,
            'panel'     => 'klopp_showcase_panel'
        )
    );


    $wp_customize->add_setting(
        'klopp_showcase_enable',
        array( 'sanitize_callback' => 'klopp_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'klopp_showcase_enable', array(
            'settings' => 'klopp_showcase_enable',
            'label'    => __( 'Enable Showcase on Front Page.', 'klopp' ),
            'section'  => 'klopp_sec_showcase_options',
            'type'     => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'klopp_showcase_title',
        array( 'sanitize_callback' => 'sanitize_text_field' )
    );

    $wp_customize->add_control(
        'klopp_showcase_title', array(
            'settings' => 'klopp_showcase_title',
            'label'    => __( 'Title','klopp' ),
            'section'  => 'klopp_sec_showcase_options',
            'type'     => 'text',
        )
    );

    for ( $i = 1 ; $i <= 3 ; $i++ ) :

        //Create the settings Once, and Loop through it.
        $wp_customize->add_section(
            'klopp_showcase_sec'.$i,
            array(
                'title'     => __('ShowCase ','klopp').$i,
                'priority'  => $i,
                'panel'     => 'klopp_showcase_panel',

            )
        );

        $wp_customize->add_setting(
            'klopp_showcase_img'.$i,
            array( 'sanitize_callback' => 'esc_url_raw' )
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'klopp_showcase_img'.$i,
                array(
                    'label' => '',
                    'section' => 'klopp_showcase_sec'.$i,
                    'settings' => 'klopp_showcase_img'.$i,
                )
            )
        );

        $wp_customize->add_setting(
            'klopp_showcase_title'.$i,
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'klopp_showcase_title'.$i, array(
                'settings' => 'klopp_showcase_title'.$i,
                'label'    => __( 'Showcase Title','klopp' ),
                'section'  => 'klopp_showcase_sec'.$i,
                'type'     => 'text',
            )
        );

        $wp_customize->add_setting(
            'klopp_showcase_desc'.$i,
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'klopp_showcase_desc'.$i, array(
                'settings' => 'klopp_showcase_desc'.$i,
                'label'    => __( 'Showcase Description','klopp' ),
                'section'  => 'klopp_showcase_sec'.$i,
                'type'     => 'text',
            )
        );


        $wp_customize->add_setting(
            'klopp_showcase_url'.$i,
            array( 'sanitize_callback' => 'esc_url_raw' )
        );

        $wp_customize->add_control(
            'klopp_showcase_url'.$i, array(
                'settings' => 'klopp_showcase_url'.$i,
                'label'    => __( 'Target URL','klopp' ),
                'section'  => 'klopp_showcase_sec'.$i,
                'type'     => 'url',
            )
        );

    endfor;
}
add_action('customize_register', 'klopp_customize_register_showcase');