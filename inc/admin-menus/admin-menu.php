<?php
function admin_fishing_bd_menu() {
  add_menu_page( 'Fishing BD', 'Fishing BD', 'manage_options', 'fishing_bd', 'fishing_theme_general_options', get_template_directory_uri() . '/css/images/sliders.svg', 60 );

  add_submenu_page( 'fishing_bd', 'Fishing BD', 'General', 'manage_options', 'fishing_bd', 'fishing_theme_general_options' );
  add_submenu_page( 'fishing_bd', 'Header', 'Header Options', 'manage_options', 'header_options', 'fishing_header_options' );
  add_submenu_page( 'fishing_bd', 'Social', 'Social Options', 'manage_options', 'social_options', 'fishing_social_options' );
  add_submenu_page( 'fishing_bd', 'Typhograpic', 'Typhograpic Options', 'manage_options', 'typhograpic_options', 'fishing_typhograpic_options' );
  add_submenu_page( 'fishing_bd', 'Featured', 'Featured', 'manage_options', 'featured_options', 'fishing_featured_options' );

  // Active custom Setting
  add_action( 'admin_init', 'fising_custom_settings' );

}
add_action( 'admin_menu', 'admin_fishing_bd_menu' );

function fising_custom_settings() {
  //-------------------------------------  General Fishing Page In Admin Panel ---------------------------------------------------
  register_setting( 'fishing-general-setting', 'site_width' );
  register_setting( 'fishing-general-setting', 'body_color' );

  add_settings_section( 'fishing-general-settings-section', 'General Setting', function() {}, 'fishing_bd' );
  add_settings_section( 'fishing-general-settings-section-style', 'Body Style', function() {}, 'fishing_bd' );

  add_settings_field( 'fishing-general-setting-body-width', 'Body Width', 'fishing_admin_general_settings_body_width', 'fishing_bd', 'fishing-general-settings-section' );
   if ( get_option( 'site_width' ) == 'Boxed' ) {
    register_setting( 'fishing-general-setting', 'fishing_background' );
    add_settings_field( 'fishing-general-setting-body-background', 'Background', 'fishing_admin_general_settings_background', 'fishing_bd', 'fishing-general-settings-section-style' );
   
    if ( get_option( 'fishing_background' ) == 'Background Color' ) {
      register_setting( 'fishing-general-setting', 'fishing_background_color' );
      add_settings_field( 'fishing-general-setting-body-background-color', 'Background Color', 'fishing_admin_general_settings_background_color', 'fishing_bd', 'fishing-general-settings-section-style' );
    }
    if ( get_option( 'fishing_background' ) == 'Background Image' ) {
      register_setting( 'fishing-general-setting', 'fishing_background_image' );    
      add_settings_field( 'fishing-general-setting-body-background-color', 'Background Image', 'fishing_admin_general_settings_background_image', 'fishing_bd', 'fishing-general-settings-section-style' );
    }
  }
  add_settings_field( 'fishing-general-setting-body-color', 'Body Color', 'fishing_admin_general_settings_body_color', 'fishing_bd', 'fishing-general-settings-section-style' );

   if ( get_option( 'site_width' ) == 'Custom Width' ) { 
      register_setting( 'fishing-general-setting', 'header_width' );
      if ( get_option( 'header_width' ) == 'Custom Width' ) {
        register_setting( 'fishing-general-setting', 'header_custom_width' );
        register_setting( 'fishing-general-setting', 'header_custom_width_miters' );
      }  
      register_setting( 'fishing-general-setting', 'content_width' );
      if ( get_option( 'content_width' ) == 'Custom Width' ) {
        register_setting( 'fishing-general-setting', 'content_custom_width' );
        register_setting( 'fishing-general-setting', 'content_custom_width_miters' );
      }    
      register_setting( 'fishing-general-setting', 'footer_width' );
      if ( get_option( 'footer_width' ) == 'Custom Width' ) {
        register_setting( 'fishing-general-setting', 'footer_custom_width' );
        register_setting( 'fishing-general-setting', 'footer_custom_width_miters' );
      }
      add_settings_field( 'fishing-general-setting-header-width', 'Header Width', 'fishing_admin_general_settings_header_width', 'fishing_bd', 'fishing-general-settings-section' );
      add_settings_field( 'fishing-general-setting-content-width', 'Content Width', 'fishing_admin_general_settings_content_width', 'fishing_bd', 'fishing-general-settings-section' );
      add_settings_field( 'fishing-general-setting-footer-width', 'Footer Width', 'fishing_admin_general_settings_footer_width', 'fishing_bd', 'fishing-general-settings-section' );
  }
  
  

  //------------------------------  Header Fishing Page In Admin Panel --------------------------------
  register_setting( 'fishing-header-setting', 'genarel_header_layout' );

  add_settings_section( 'fishing-genarel-header-options', 'Genarel Header Options', function() {}, 'header_options' );
  add_settings_section( 'fishing-genarel-header-style', 'Header Style', function() {}, 'header_options' ); 

  add_settings_field( 'fishing-header-layout-selector', 'Select Header Layout', 'fishing_header_layout_selector', 'header_options', 'fishing-genarel-header-options' );
  add_settings_field( 'site-logo', 'Select Site Logo', 'fishing_site_logo', 'header_options', 'fishing-genarel-header-options' );

  if ( esc_attr( get_option( 'genarel_header_layout', 'layout1' ) ) == 'layout1' ) {  
    register_setting( 'fishing-header-setting', 'header_height' );
    register_setting( 'fishing-header-setting', 'header_nav_menu_color' );
    register_setting( 'fishing-header-setting', 'header_nav_menu_hover_color' );
    register_setting( 'fishing-header-setting', 'header_nav_menu_icon_color' );
    register_setting( 'fishing-header-setting', 'header_nav_menu_icon_hover_color' );
    register_setting( 'fishing-header-setting', 'header_socal_icon_color' );
    register_setting( 'fishing-header-setting', 'header_socal_icon_hover_color' );

    add_settings_field( 'header-height', 'Select Header Height', 'fishing_header_height', 'header_options', 'fishing-genarel-header-style' );
    add_settings_field( 'header-nav-menu-color', 'Select Header Nav Menu Color', 'fishing_header_nav_menu_color', 'header_options', 'fishing-genarel-header-style' );   
    add_settings_field( 'header-nav-menu-hover-color', 'Select Header Nav Menu Hover Color', 'fishing_header_nav_menu_hover_color', 'header_options', 'fishing-genarel-header-style' );   
    add_settings_field( 'header-nav-icon-menu-color', 'Select Header Icons Color', 'fishing_header_nav_menu_icons_color', 'header_options', 'fishing-genarel-header-style' );   
    add_settings_field( 'header-nav-menu-icon-hover-color', 'Select Header Icons Hover Color', 'fishing_header_nav_menu_icons_hover_color', 'header_options', 'fishing-genarel-header-style' );   
    add_settings_field( 'header-socal-icon-color', 'Select Header Socal Color', 'fishing_header_socal_icons_color', 'header_options', 'fishing-genarel-header-style' );   
    add_settings_field( 'header-socal-icon-hover-color', 'Select Header Socal Hover Color', 'fishing_header_socal_icons_hover_color', 'header_options', 'fishing-genarel-header-style' );   
  } else {
    
    register_setting( 'fishing-header-setting', 'h2_topber_chackbox' );
    register_setting( 'fishing-header-setting', 'header2_nav_menu_color' );
    register_setting( 'fishing-header-setting', 'header2_nav_menu_hover_color' );
    register_setting( 'fishing-header-setting', 'header2_topbar_color' );
    register_setting( 'fishing-header-setting', 'header2_topbar_hover_color' );
    register_setting( 'fishing-header-setting', 'herder2_logo_alinement' );

    add_settings_section( 'fishing-herder2-middle-part', 'Logo Section', function() {}, 'header_options' );

    add_settings_field( 'h2-topber-chackbox', 'Top Bar', 'fishing_topbab_l2_chackbox', 'header_options', 'fishing-genarel-header-style' );
    add_settings_field( 'header-nav-menu-color', 'Select Header Nav Menu Color', 'fishing_header_nav_menu_color', 'header_options', 'fishing-genarel-header-style' );   
    add_settings_field( 'header-nav-menu-hover-color', 'Select Header Nav Menu Hover Color', 'fishing_header_nav_menu_hover_color', 'header_options', 'fishing-genarel-header-style' );   
    add_settings_field( 'header2-logo-alinement', 'Select Logo Alinement', 'fishing_header2_logo_alinement', 'header_options', 'fishing-herder2-middle-part' );       

    if ( get_option( 'h2_topber_chackbox', 1 ) == 1 ) {
      register_setting( 'fishing-header-setting', 'header_socal_icon_color' );
      register_setting( 'fishing-header-setting', 'header_socal_icon_hover_color' );

      add_settings_section( 'fishing-genarel-topbar-options', 'Top Bar Options', function() {}, 'header_options' );

      add_settings_field( 'header-socal-icon-color', 'Select Header Socal Color', 'fishing_header_socal_icons_color', 'header_options', 'fishing-genarel-topbar-options' );   
      add_settings_field( 'header-socal-icon-hover-color', 'Select Header Socal Hover Color', 'fishing_header_socal_icons_hover_color', 'header_options', 'fishing-genarel-topbar-options' );      
      add_settings_field( 'header2-topber-color', 'Select Top Bar Text Color', 'fishing_header2_topbar_text_color', 'header_options', 'fishing-genarel-topbar-options' );   
      add_settings_field( 'header2-topbar-hover-color', 'Select Top Bar Text Hover Color', 'fishing_header2_topbar_text_hover_color', 'header_options', 'fishing-genarel-topbar-options' );     
    }

  }

//---------------------------------- Social Page In Admin Panel ----------------------------------
  add_settings_section( 'fishing-site-social-link', 'Social Links', function () {}, 'social_options' );  

  social_media_link();

//------------------------------  Typhograpic Page In Admin Panel --------------------------------
  add_settings_section( 'fishing-navbar-typhograpic', 'Header Typhograpic', function () {}, 'typhograpic_options' );

//------------------------------  Featured Image Page In Admin Panel --------------------------------

  register_setting( 'fishing-featured-setting', 'fishing_featured_layout' );

  add_settings_section( 'fishing-featured-layout', 'Featured Image Layout', function() {}, 'featured_options' );

  add_settings_field( 'fishing-featured-image-layout', 'Featured Layout', 'fishing_featured_image_layout', 'featured_options', 'fishing-featured-layout' );

}

require_once get_template_directory() . '/inc/admin-menus/backend_genaric_functions.php';

require_once get_template_directory() . '/inc/admin-menus/general.admin.php';

require_once get_template_directory() . '/inc/admin-menus/header.admin.php';

require_once get_template_directory() . '/inc/admin-menus/social.admin.php';

require_once get_template_directory() . '/inc/admin-menus/typhograpic.admin.php';

require_once get_template_directory() . '/inc/admin-menus/featured.admin.php';

function fishing_theme_general_options() {
  require_once get_template_directory() . '/template/admin-template/theme-general-options.php';
}

function fishing_header_options() {
  require_once get_template_directory() . '/template/admin-template/fishing-header-options.php';
}
function fishing_social_options() {
  require_once get_template_directory() . '/template/admin-template/social-options.php';
}
function fishing_typhograpic_options() {
  require_once get_template_directory() . '/template/admin-template/typhograpic-options.php';
}

function fishing_featured_options() {
  require_once get_template_directory() . '/template/admin-template/featured-image.php';
}

function sanatize_header2_callback( $input )
{
  $output = sanitize_textarea_field( $input );

  return $output;
}

