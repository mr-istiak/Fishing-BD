<?php if ( (get_option( 'h2_topber_chackbox', 1 ) == 1) ) :?>

<nav class="navbar navbar-expand-lg navbar-light bg-dark" id="tobbar" <?php print $border_color; ?>>
  <div class="container-fluid">
    <div>
      <?php
      wp_nav_menu( array(
        'theme_location' => '__no_such_location',
        'fallback_cb'    => false,
        'theme_location' => 'top-bar',
        'menu_class'     => 'navbar-nav me-auto mb-2 mb-lg-0 fishing-topmenu',
        'container'      => false,
        'walker'         => new Fishing_Bd_Walker_Nav_Primary(),
      ) );
        ?>
    </div>
    <div>
    
    <ul class="nav">
      <?php 
        echo fishing_socalmedia_icon_foreach();
      ?>
    </ul>
    
    </div>
  </div>
</nav>
<?php endif; ?>
<div class="middle-header">
  <section type="img" img="logo">     
    <?php 
    if ( has_custom_logo() ) {
      the_custom_logo();
    } else {
      $headerOutput = '<a href="' . get_site_url() . '" class="fishing-brand-logo"><h1>' .get_bloginfo( 'name' ). '</h1></a> <p>' .get_bloginfo( 'description' ). '</p>';
      echo $headerOutput;
    } ?> 
  </section> 
</div>
<header class="mb-4 bg-dark last-header-border header-font-l222"<?php print $border_color; ?>>
  <div class="main-manu-container">
    <a href="<?php print get_site_url(); ?>" class="home-button"<?php  echo fishing_home_button_settings(); ?>>
      <span class="fishing fishing-home"></span>
    </a>  <!-- Home Button -->
    <?php
      wp_nav_menu( array(
        'theme_location' => '__no_such_location',
        'fallback_cb'    => false,
        'theme_location' => 'main-menu',
        'menu_class'     => 'navbar-nav me-auto mb-lg-0 fishing-mainmenu',
        'container'      => false,
        'walker'         => new Fishing_Bd_Walker_Nav_Main(),
      ) ); ?> <!-- Main Manu -->
  </div>
      
  <div class="searchform-contaier">
    <div class="close-container display-none">
      <div class="search-container-div"><?php get_search_form(); ?></div>
      <div class="d-flex icon-container" style="background-color: <?php echo esc_attr( get_option( 'body_color' ) ); ?>;"><span class="searchOpen_icon fishing-icon3 fishing-icon3-cross"></span></div>
    </div>
    <div class="d-flex icon-container" style="background-color: <?php echo esc_attr( get_option( 'body_color' ) ); ?>;"><span class="searchOpen_icon fishing-icon2 fishing-icon2-search"></span></div>
  </div>
  <div class="js-mobileSidebarToggler display-none icon-container header-l2-mobile-sidebar-toggler" style="background-color: <?php echo esc_attr( get_option( 'body_color' ) ); ?>;"><span class="fishing fishing-equalizer"></span></div>

</header>