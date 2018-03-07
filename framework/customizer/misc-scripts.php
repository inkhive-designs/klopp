<?php

function klopp_customize_register_misc( $wp_customize ) {
	//Upgrade to Pro
	$wp_customize->add_section(
	    'klopp_sec_pro',
	    array(
	        'title'     => __('Important Links','klopp'),
	        'priority'  => 10,
	    )
	);
	
	$wp_customize->add_setting(
			'klopp_pro',
			array( 'sanitize_callback' => 'esc_textarea' )
		);
			
	$wp_customize->add_control(
	    new Klopp_WP_Customize_Upgrade_Control(
	        $wp_customize,
	        'klopp_pro',
	        array(
                'description'	=> '<a class="klopp-important-links" href="https://inkhive.com/contact-us/" target="_blank">'.__('InkHive Support Forum', 'klopp').'</a>
                                    <a class="klopp-important-links" href="http://demo.inkhive.com/klopp-plus/" target="_blank">'.__('Klopp Plus Live Demo', 'klopp').'</a>
                                    <a class="klopp-important-links" href="https://www.facebook.com/inkhivethemes/" target="_blank">'.__('We Love Our Facebook Fans', 'klopp').'</a>
                                    <a class="klopp-important-links" href="https://wordpress.org/support/theme/klopp/reviews" target="_blank">'.__('Review Klopp on WordPress', 'klopp').'</a>',
	            'section' => 'klopp_sec_pro',
	            'settings' => 'klopp_pro',			       
	        )
		)
	);
}
add_action('customize_register', 'klopp_customize_register_misc');