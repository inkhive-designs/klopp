<?php
function klopp_customize_register_layouts($wp_customize){
    // Layout and Design
    $wp_customize->get_section('background_image')->panel = 'klopp_design_panel';

    $wp_customize->add_panel( 'klopp_design_panel', array(
        'priority'       => 40,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Design & Layout','klopp'),
    ) );

    $wp_customize->add_section(
        'klopp_design_options',
        array(
            'title'     => __('Blog Layout','klopp'),
            'priority'  => 0,
            'panel'     => 'klopp_design_panel'
        )
    );


    $wp_customize->add_setting(
        'klopp_blog_layout',
        array( 
        	'default'			=> 'klopp',
        	'sanitize_callback' => 'klopp_sanitize_blog_layout'
        )
    );

    function klopp_sanitize_blog_layout( $input ) {
        if ( in_array($input, array('grid','grid_2_column','grid_3_column','klopp', 'card-layout') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'klopp_blog_layout',array(
            'label' => __('Select Layout','klopp'),
            'settings' => 'klopp_blog_layout',
            'section'  => 'klopp_design_options',
            'type' => 'select',
            'choices' => array(
                'klopp' => __('Klopp Theme Layout','klopp'),
                'grid' => __('Standard Blog Layout','klopp'),
                'grid_2_column' => __('Grid - 2 Column','klopp'),
                'grid_3_column' => __('Grid - 3 Column','klopp'),
                'card-layout' => __('Card Layout', 'klopp'),

            )
        )
    );

    $wp_customize->add_section(
        'klopp_sidebar_options',
        array(
            'title'     => __('Sidebar Layout','klopp'),
            'priority'  => 0,
            'panel'     => 'klopp_design_panel'
        )
    );

    $wp_customize->add_setting(
        'klopp_disable_sidebar',
        array( 'sanitize_callback' => 'klopp_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'klopp_disable_sidebar', array(
            'settings' => 'klopp_disable_sidebar',
            'label'    => __( 'Disable Sidebar Everywhere.','klopp' ),
            'section'  => 'klopp_sidebar_options',
            'type'     => 'checkbox',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'klopp_disable_sidebar_home',
        array( 'sanitize_callback' => 'klopp_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'klopp_disable_sidebar_home', array(
            'settings' => 'klopp_disable_sidebar_home',
            'label'    => __( 'Disable Sidebar on Home/Blog.','klopp' ),
            'section'  => 'klopp_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'klopp_show_sidebar_options',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'klopp_disable_sidebar_front',
        array( 'sanitize_callback' => 'klopp_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'klopp_disable_sidebar_front', array(
            'settings' => 'klopp_disable_sidebar_front',
            'label'    => __( 'Disable Sidebar on Front Page.','klopp' ),
            'section'  => 'klopp_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'klopp_show_sidebar_options',
            'default'  => false
        )
    );


    $wp_customize->add_setting(
        'klopp_sidebar_width',
        array(
            'default' 			=> 4,
            'sanitize_callback' => 'klopp_sanitize_positive_number',
            'transport'			=>	'postMessage'
        )
    );

    $wp_customize->add_control(
        'klopp_sidebar_width', array(
            'settings' => 'klopp_sidebar_width',
            'label'    => __( 'Sidebar Width','klopp' ),
            'description' => __('Min: 25%, Default: 33%, Max: 40%','klopp'),
            'section'  => 'klopp_sidebar_options',
            'type'     => 'range',
            'active_callback' => 'klopp_show_sidebar_options',
            'input_attrs' => array(
                'min'   => 3,
                'max'   => 5,
                'step'  => 1,
                'class' => 'sidebar-width-range',
                'style' => 'color: #0a0',
            ),
        )
    );

    /* Active Callback Function */
    function klopp_show_sidebar_options($control) {

        $option = $control->manager->get_setting('klopp_disable_sidebar');
        return $option->value() == false ;

    }

    function klopp_sanitize_text( $input ) {
        return wp_kses_post( force_balance_tags( $input ) );
    }

    $wp_customize-> add_section(
        'klopp_custom_footer',
        array(
            'title'			=> __('Custom Footer Text','klopp'),
            'description'	=> __('Enter your Own Copyright Text.','klopp'),
            'priority'		=> 11,
            'panel'			=> 'klopp_design_panel'
        )
    );

    $wp_customize->add_setting(
        'klopp_footer_text',
        array(
            'default'		=> '',
            'sanitize_callback'	=> 'sanitize_text_field',
            'transport'     => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'klopp_footer_text',
        array(
            'section' => 'klopp_custom_footer',
            'settings' => 'klopp_footer_text',
            'type' => 'text'
        )
    );

    //Content Font Size Control
    $font_size = array(
        '14px' => 'Default',
        'initial' => 'Initial',
        'small' => 'Small',
        'medium' => 'Medium',
        'large' => 'Large',
        'larger' => 'Larger',
        'x-large' => 'Extra Large',
    );

    $wp_customize-> add_section(
        'klopp_content_font_size_section',
        array(
            'title'			=> __('Content Font Size','klopp'),
            'label'    => __( 'Custom Content Font Size.','klopp' ),
            'priority'		=> 12,
            'panel'			=> 'klopp_design_panel'
        )
    );

    $wp_customize->add_setting(
        'klopp_content_font_size', array(
            'default' => '14px',
            'sanitize_callback' => 'klopp_sanitize_fontsize',
            'transport'     => 'postMessage',
        )
    );
    
    function klopp_sanitize_fontsize( $input ) {
        if ( in_array($input, array('14px','initial','small','medium','large','larger','x-large') ) )
            return $input;
        else
            return '';
    }
    
    

    $wp_customize->add_control(
        'klopp_content_font_size', array(
            'settings' => 'klopp_content_font_size',
            'label' => __( 'Content Font Size','klopp' ),
            'description' => __('Select Font Size. This is only for the Posts and Pages area. Not for Blog Page or archives.', 'klopp'),
            'section'  => 'klopp_content_font_size_section',
            'type'     => 'select',
            'choices' => $font_size
        )
    );
}
add_action('customize_register', 'klopp_customize_register_layouts');