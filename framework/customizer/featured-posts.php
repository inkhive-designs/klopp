<?php
function klopp_customize_register_featured_posts($wp_customize){
    //FEATURED POSTS

    $wp_customize->add_section(
        'klopp_featposts',
        array(
            'title'     => __('Featured Posts','klopp'),
            'priority'  => 35,
            'panel'     => 'klopp_a_fcp_panel'
        )
    );

    $wp_customize->add_setting(
        'klopp_featposts_enable',
        array( 'sanitize_callback' => 'klopp_sanitize_checkbox' )
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
        array( 'sanitize_callback' => 'sanitize_text_field' )
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
}
add_action('customize_register', 'klopp_customize_register_featured_posts');