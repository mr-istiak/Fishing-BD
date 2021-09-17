<!DOCTYPE html>
<html>
  <head <?php language_attributes(); ?>>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?php echo bloginfo( 'name' ); wp_title(); ?> </title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ): ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
    <?php $border_color = ' style="border-color: ' . esc_attr( get_option( 'body_color' ) ) . ';"'; ?>
    <?php fontend_php_css(); ?>
  </head>
<body <?php body_class( 'fishing-own-body-class' ); ?> <?php echo body_background_style(); ?> >

  <span id="data-container" style="display:none" 

    data-font-page="<?php echo is_front_page(); ?>" 
    data-body-color="<?php echo esc_attr( get_option( 'body_color' ) ); ?>"
    data-header-layout="<?php echo get_option( 'genarel_header_layout', 'layout1' ); ?>"
    data-haeder-l2-socal-number-counter="<?php echo fishing_socalmedia_icon_foreach(); ?>"
    data-header2-ad-left="<?php echo get_option( 'header2_ad__left' ) ?>"
    data-headerr2-ad-right="<?php echo get_option( 'header2_ad__right' ) ?>"
  >
  </span> <!-- Data Container -->
  <span id="data-container1" style="display:none" 
    data-ajax-url="<?php echo admin_url( 'admin-ajax.php' ) ?>"
  >
  </span> <!-- Data Container -->
  
  <!-- ===-===-=== Mobile Side Bar ===-===-=== -->
  <?php get_template_part( '/template/mobile.sidebar' ) ?>



  <?php if ( esc_attr( get_option( 'site_width' ) ) == 'Boxed' && esc_attr( get_option( 'fishing_background' ) ) ==  'Background Image' ): ?> 
    <div class="bg-overlay">
  <?php endif; ?>    
  <?php fishing_general_body_widths( 'site_width', '', '<div class="body-flex">', '<div id="fishing-background" class="container">' ); ?> <!-- container Div -->
  <?php
    if ( get_option( 'site_width' ) == 'Custom Width' ) {
      fishing_general_body_widths( 'header_width', 'header', '<div style="width: ' . get_option( 'header_custom_width' ) . get_option( 'header_custom_width_miters' ) . ';">', '<div class="container">' );
    }
  ?>

    <?php if ( get_option( 'genarel_header_layout', 'layout1' ) == 'layout1' ) {
      require_once get_template_directory() . '/template/header/header1.php';
    } else {
      require_once get_template_directory() . '/template/header/header2.php';
    } ?>

<?php if ( get_option( 'site_width' ) == 'Custom Width' ) {
  print '</div>';
} ?>
