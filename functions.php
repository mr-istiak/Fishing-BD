<?php
//============  Initing Home Latest Posts  ===========================
function initsializing_latest_posts() {
  update_option( 'show_on_front', 'posts' );
}
add_action( 'init', 'initsializing_latest_posts' );

//============  Adding Theme Menus  ===========================
function adding_custom_menu_fising() {
  add_theme_support( 'menus' );
  register_nav_menus( array(
    'top-bar'  => 'Top Bar',
    'main-menu'=> 'Main Menu',
  ) );
}
add_action( 'init', 'adding_custom_menu_fising' );

//============  Adding Wedgets Area  ===========================
function adding_widgets_area() {
  register_sidebar( [
    'name' => 'SideBar',
    'id' => 'fishing_sidebar',
    'before_widget' => '<widget id="%1$s" class="widget %2$s">',
    'after_widget' => '</widget>',
    'before_title' => '<h3 class="widget_title">',
    'after_title' => '</h3>'
  ] );
}
add_action( 'widgets_init', 'adding_widgets_area' );

//============  Adding Theme Support  ===========================
add_theme_support( 'custom-logo', array( 'height'  => 115, 'width'   => 310 ) );
add_theme_support( 'html5', array('search-form') );
add_theme_support( 'post-thumbnails' );

//============  Enquqing Scripts  ===========================
require_once get_template_directory() . '/inc/enqueuing-scripts.php';

//============  Adding Admin Theme Menus  ===========================
require get_template_directory() . '/inc/admin-menus/admin-menu.php';

//============  Walker Nav Menu  ===========================
require get_template_directory() . '/inc/walker.php';

//============  FontEnd Functions  ===========================
require get_template_directory() . '/inc/fontend-funtions.php';

//============  Featured Image  ===========================
require_once get_template_directory() . '/inc/featured-image.php';
