<?php
function klopp_customize_register_featured_posts($wp_customize){
    //FEATURED POSTS

    $wp_customize->add_section(
        'klopp_featposts',
        array(
            'title'     => __('Featured Area 1','klopp'),
            'priority'  => 10,
            'panel'     => 'klopp_a_fcp_panel'
        )
    );

    $wp_customize->add_setting(
        'klopp_featposts_enable',
        array(
            'sanitize_callback' => 'klopp_sanitize_checkbox',
            'transport'     => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'klopp_featposts_enable', array(
            'settings' => 'klopp_featposts_enable',
            'label'    => __( 'Enable', 'klopp' ),
            'section'  => 'klopp_featposts',
            'type'     => 'checkbox',
        )
    );


    $wp_customize->add_setting(
        'klopp_featposts_title',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'     => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'klopp_featposts_title', array(
            'settings' => 'klopp_featposts_title',
            'label'    => __( 'Title', 'klopp' ),
            'section'  => 'klopp_featposts',
            'type'     => 'text',
        )
    );



    $wp_customize->add_setting(
        'klopp_featposts_cat',
        array( 'sanitize_callback' => 'klopp_sanitize_category' )
    );


    $wp_customize->add_control(
        new WP_Customize_Category_Control(
            $wp_customize,
            'klopp_featposts_cat',
            array(
                'label'    => __('Category For Featured Posts','klopp'),
                'settings' => 'klopp_featposts_cat',
                'section'  => 'klopp_featposts'
            )
        )
    );

    $wp_customize->add_setting(
        'klopp_featposts_rows',
        array( 'sanitize_callback' => 'klopp_sanitize_positive_number' )
    );

    $wp_customize->add_control(
        'klopp_featposts_rows', array(
            'settings' => 'klopp_featposts_rows',
            'label'    => __( 'Max No. of Rows.', 'klopp' ),
            'section'  => 'klopp_featposts',
            'type'     => 'number',
            'default'  => '0'
        )
    );

    //Featured Area2
    $wp_customize->add_section(
        'klopp_fc_fa2',
        array(
            'title'     => __('Featured Area 2','klopp'),
            'priority'  => 20,
            'panel'     => 'klopp_a_fcp_panel'
        )
    );

    $wp_customize->add_setting(
        'klopp_fa2_enable',
        array(
            'sanitize_callback' => 'klopp_sanitize_checkbox',
            'transport'     => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'klopp_fa2_enable', array(
            'settings' => 'klopp_fa2_enable',
            'label'    => __( 'Enable', 'klopp' ),
            'section'  => 'klopp_fc_fa2',
            'type'     => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'klopp_fa2_title',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'     => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'klopp_fa2_title', array(
            'settings' => 'klopp_fa2_title',
            'label'    => __( 'Title','klopp' ),
            'section'  => 'klopp_fc_fa2',
            'type'     => 'text',
        )
    );

    $wp_customize->add_setting(
        'klopp_fa2_cat',
        array( 'sanitize_callback' => 'klopp_sanitize_category' )
    );

    $wp_customize->add_control(
        new WP_Customize_Category_Control(
            $wp_customize,
            'klopp_fa2_cat',
            array(
                'label'    => __('Category.','klopp'),
                'settings' => 'klopp_fa2_cat',
                'section'  => 'klopp_fc_fa2'
            )
        )
    );
}
add_action('customize_register', 'klopp_customize_register_featured_posts');