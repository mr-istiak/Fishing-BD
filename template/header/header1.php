<header class="bg-dark last-header-border fishing-layout2-header container-fluid"<?php print ' style="border-color: ' . esc_attr( get_option( 'body_color' ) ) . '; min-height: '.esc_attr( get_option( 'header_height', '60' ) ).'px;"' ?>>
    <div class="fishing-barnd-name">        
        <?php 
        if ( has_custom_logo() ) {
            echo '<div class="mt-2 mb-2">';
                the_custom_logo();
            echo '</div>';
        } else {
        $headerOutput = '<a href="' . get_site_url() . '" class="fishing-brand-logo"><h1>' .get_bloginfo( 'name' ). '</h1></a>';
        echo $headerOutput;
        } ?>        
    </div>
    <div class="menu-container display-inherit">
        <?php 
            wp_nav_menu( array(
            'theme_location' => '__no_such_location',
            'fallback_cb'    => false,
            'theme_location' => 'main-menu',
            'menu_class'     => 'navbar-nav me-auto mb-lg-0 fishing-mainmenu',
            'container'      => false,
            'walker'         => new Fishing_Bd_Walker_Nav_Main(),
            ) ); 
        ?> <!-- Main Manu -->
    
        <div class="searchform-contaier layout2-searchform-container">
            <div class="d-flex icon-container"><span class="searchOpen_icon fishing-icon2 fishing-icon2-search"></span></div>
            <div class="close-container">
                <div class="search-container-div display-none"><?php get_search_form() ?></div>
            </div>
        </div>
        
        <div class="layout2-header-socal-conteiner">  
            <div class="socalIcon-JsScript icon-container d-flex"><span class="fishing-icon3 fishing-icon3-share2"></span></div>
            <div class="l2-full-socalicons header-l2-socalicons-full-container display-none" <?php echo $border_color; ?> > 
            <ul class="nav full-socal icon-container">
                <?php 
                    echo fishing_socalmedia_icon_foreach();
                ?>
            </ul> 
        </div>
        </div>
    </div>
    <span class="js-mobileSidebarToggler fishing fishing-equalizer display-none"></span>
</header>