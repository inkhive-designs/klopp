<?php
function klopp_customize_register_social_icons($wp_customize){
    // Social Icons
    $wp_customize->add_section('klopp_social_section', array(
        'title' => __('Social Icons','klopp'),
        'priority' => 44 ,
        'panel' => 'plum_header_panel'
    ));

    $social_networks = array( //Redefinied in Sanitization Function.
        'none' => __('-','klopp'),
        'facebook' => __('Facebook','klopp'),
        'twitter' => __('Twitter','klopp'),
        'google-plus' => __('Google Plus','klopp'),
        'instagram' => __('Instagram','klopp'),
        'rss' => __('RSS Feeds','klopp'),
        'vine' => __('Vine','klopp'),
        'vimeo-square' => __('Vimeo','klopp'),
        'youtube' => __('Youtube','klopp'),
        'flickr' => __('Flickr','klopp'),
    );

    $social_icons_style = array(
        'none' => __('Default', 'klopp'),
        'style1' => __('Style 1', 'klopp'),
        'style2' => __('Style 2', 'klopp'),
        'style3' => __('Style 3', 'klopp'),
        'style4' => __('Style 4', 'klopp'),
    );

    $wp_customize->add_setting('klopp_social_icon_style', array(
	    'default' => 'none',
	    'sanitize_callback' => 'klopp_sanitize_social_style'
    ));
    
    function klopp_sanitize_social_style( $input ) {
        $social_styles = array(
            'none' ,
            'style1',
            'style2',
            'style3',
            'style4',
        );
        if ( in_array($input, $social_styles) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control('klopp_social_icon_style', array(
            'setting' => 'klopp_social_icon_style',
            'section' => 'klopp_social_section',
            'label' => __('Social Icon Effects', 'klopp'),
            'type' => 'select',
            'choices' => $social_icons_style,
        )
    );

    $social_count = count($social_networks);

    for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :

        $wp_customize->add_setting(
            'klopp_social_'.$x, array(
            'sanitize_callback' => 'klopp_sanitize_social',
            'default' => 'none'
        ));

        $wp_customize->add_control( 'klopp_social_'.$x, array(
            'settings' => 'klopp_social_'.$x,
            'label' => __('Icon ','klopp').$x,
            'section' => 'klopp_social_section',
            'type' => 'select',
            'choices' => $social_networks,
        ));

        $wp_customize->add_setting(
            'klopp_social_url'.$x, array(
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control( 'klopp_social_url'.$x, array(
            'settings' => 'klopp_social_url'.$x,
            'description' => __('Icon ','klopp').$x.__(' Url','klopp'),
            'section' => 'klopp_social_section',
            'type' => 'url',
            'choices' => $social_networks,
        ));

    endfor;

    function klopp_sanitize_social( $input ) {
        $social_networks = array(
            'none' ,
            'facebook',
            'twitter',
            'google-plus',
            'instagram',
            'rss',
            'vine',
            'vimeo-square',
            'youtube',
            'flickr'
        );
        if ( in_array($input, $social_networks) )
            return $input;
        else
            return '';
    }
}
add_action('customize_register', 'klopp_customize_register_social_icons');