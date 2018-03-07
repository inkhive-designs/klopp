<?php
/* 
**   Custom Modifcations in CSS depending on user settings.
*/

function klopp_custom_css_mods() {

	echo "<style id='custom-css-mods'>";
	
	//If Highlighting Nav active item is disabled
	if ( get_theme_mod('klopp_disable_active_nav') ) :
		echo "#site-navigation ul .current_page_item > a, #site-navigation ul .current-menu-item > a, #site-navigation ul .current_page_ancestor > a { border:none; background: inherit; }"; 
	endif;
	
	//If Logo is Centered
	if ( get_theme_mod('klopp_center_logo') ) :
		
		echo "#masthead #text-title-desc, #masthead #site-logo { float: none; } .site-branding { text-align: center; } #text-title-desc { display: inline-block; }";
		
	endif;
	
	if ( get_theme_mod('klopp_title_font') ) :
		echo ".title-font, h1, h2, .section-title { font-family: ".esc_html(get_theme_mod('klopp_title_font', 'Yanone Kaffeesatz'))."; }";
	endif;
	
	if ( get_theme_mod('klopp_body_font') ) :
		echo "body, h2.site-description { font-family: ".esc_html(get_theme_mod('klopp_body_font', 'Source Sans Pro'))."; }";
	endif;

    if ( get_header_textcolor() ) :
        echo "#masthead h1.site-title a { color: #".get_header_textcolor()."; }";
    endif;


    if ( get_theme_mod('klopp_header_desccolor','#FFF') ) :
        echo "#masthead h2.site-description { color: ".esc_html(get_theme_mod('klopp_header_desccolor','#FFF'))."; }";
    endif;
	
	if ( get_theme_mod('klopp_custom_css') ) :
		echo  esc_html(get_theme_mod('klopp_custom_css'));
	endif;

    if ( !display_header_text() ) :
        echo "#masthead .site-branding #text-title-desc { display: none; }";
    endif;
	
	if ( get_theme_mod('klopp_logo_resize') ) :
		$val = esc_html(get_theme_mod('klopp_logo_resize')/100);
		echo "#masthead .custom-logo { transform: scale(".$val."); -webkit-transform: scale(".$val."); -moz-transform: scale(".$val."); -ms-transform: scale(".$val."); }";
		endif;

	if ( get_theme_mod('klopp_content_font_size') ) :
        $size = (get_theme_mod('klopp_content_font_size'));
	    echo "#primary-mono .entry-content { font-size:".$size.";}";
    endif;
    
    if (is_page() && has_post_thumbnail()) :
    	global $post;
   		$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
   		var_dump($image);
    	echo "#masthead {
                    background-image: url('". $image[0]."') !important;;
                }";
    endif;            

	echo "</style>";
}

add_action('wp_head', 'klopp_custom_css_mods');