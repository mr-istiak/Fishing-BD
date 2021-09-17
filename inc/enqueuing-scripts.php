<?php

function wp_enqueuing_fising_scripts() {

  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '5.0.0', 'all' );
  wp_enqueue_style( 'header', get_template_directory_uri() . '/css/header.css', array(), '1.0.0', 'all' );

  wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '5.0.0', true );
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'header-js', get_template_directory_uri() . '/js/header.js', array(), '1.0.0', true );
  wp_enqueue_script( 'featuredSlide', get_template_directory_uri() . '/js/components/featuredSlide.js', array(), '1.0.0', true );


}

add_action( 'wp_enqueue_scripts', 'wp_enqueuing_fising_scripts' );

function fishing_load_scripts( $hook ) {
  wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '5.0.0', 'all' );
  wp_register_style( 'fishing-admin', get_template_directory_uri() . '/css/fishing.admin.css', array(), '1.0.0', 'all' );
  wp_register_style( 'selectize-css', get_template_directory_uri() . '/css/selectize.bootstrap3.min.css', [], '1.0.0', 'all' );

  wp_register_script( 'selectize-js', get_template_directory_uri() . '/js/selectize.js', [], '1.0.0', true );
  wp_register_script( 'ace', get_template_directory_uri() . '/js/ace/ace.js', [], '6.7.20', true );
  wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '5.0.0', true );
  wp_register_script( 'fishing-admin', get_template_directory_uri() . '/js/fishing.admin.js', array('jquery'), '1.0.0', true );


  if ( $hook == 'toplevel_page_fishing_bd' ) {
    wp_enqueue_style( 'bootstrap' );
    wp_enqueue_style( 'selectize-css' );
    wp_enqueue_style( 'fishing-admin' );

    wp_enqueue_media();

    wp_enqueue_script( 'bootstrap-js' );
    wp_enqueue_script( 'ace' );
    wp_enqueue_script( 'selectize-js' );
    wp_enqueue_script( 'fishing-admin' );
  }
  if ( $hook == 'fishing-bd_page_header_options' ) {
    wp_enqueue_style( 'bootstrap' );
    wp_enqueue_style( 'selectize-css' );
    wp_enqueue_style( 'fishing-admin' );

    wp_enqueue_media();

    wp_enqueue_script( 'bootstrap-js' );
    wp_enqueue_script( 'selectize-js' );
    wp_enqueue_script( 'ace' );    
    wp_enqueue_script( 'header-ace', get_template_directory_uri() . '/js/header-ace.js', [], '1.0.0', true );
    wp_enqueue_script( 'fishing-admin' );    
  }
  if ( $hook == 'fishing-bd_page_social_options' ) {
    wp_enqueue_style( 'bootstrap' );
    wp_enqueue_style( 'selectize-css' );
    wp_enqueue_style( 'fishing-admin' );

    wp_enqueue_script( 'bootstrap-js' );
    wp_enqueue_script( 'selectize-js' );
    wp_enqueue_script( 'ace' );
    wp_enqueue_script( 'fishing-admin' );
  }
  if ( $hook == 'fishing-bd_page_typhograpic_options' ) {
    wp_enqueue_style( 'bootstrap' );
    wp_enqueue_style( 'selectize-css' );
    wp_enqueue_style( 'fishing-admin' );

    wp_enqueue_script( 'bootstrap-js' );
    wp_enqueue_script( 'selectize-js' );
    wp_enqueue_script( 'ace' );
    wp_enqueue_script( 'fishing-admin' );
  }
  if ( $hook == 'fishing-bd_page_featured_options' ) {
    wp_enqueue_style( 'bootstrap' );
    wp_enqueue_style( 'selectize-css' );
    wp_enqueue_style( 'fishing-admin' );

    wp_enqueue_script( 'bootstrap-js' );
    wp_enqueue_script( 'selectize-js' );
    wp_enqueue_script( 'ace' );
    wp_enqueue_script( 'fishing-admin' );
  }
}
add_action( 'admin_enqueue_scripts', 'fishing_load_scripts' );