<div id="top-bar">
    <div class="container">
        <div id="slickmenu"></div>
        <nav id="site-navigation" class="main-navigation front" role="navigation">
            <?php
            // Get the Appropriate Walker First.
            if (has_nav_menu(  'primary' ) && !get_theme_mod('klopp_disable_nav_desc',true) ) :
                $walker = new Klopp_Menu_With_Description;
            elseif(!has_nav_menu( 'primary' ))	:
                $walker = '';
            else :
                $walker = new Klopp_Menu_With_Icon;
            endif;
            //Display the Menu.
            wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => $walker ) ); ?>
        </nav><!-- #site-navigation -->
    </div>
</div>