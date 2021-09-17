<?php

function fishing_header_layout_selector() {
    admin_redio_inputs( 'genarel_header_layout', array(
        'layout1' => '<div class="header-layout1-container"><div class="header-layout1"><h6>Site Logo Or Site Title</h6><h6>Main Manu</h6><span class="fishing-icon2 fishing-icon2-search"></span><span class="fishing-icon3 fishing-icon3-share2"></span></div><h6>Layout 1</h6></div>', 

        'layout2' => '<div class="header-layout2"><div class="layout2-container"><h6>Top Bar....</h6></div><div class="layout2-middle-header"><h3>Site Logo Or Site Title</h3></div><div class="layout2-mainmanu-container"><span class="fishing fishing-home"></span><h6>Main Manu</h6><span class="fishing-icon2 fishing-icon2-search"></span></div> <h6 class="text-center">Layout 2</h6></div>',
    ), 'layout1', [
        'class' => 'headerLayoutRedios'
    ] );
}
function fishing_site_logo() 
{
    echo '<a href="customize.php" target="_blank"><input type="button" class="site-logo-select-button" value="Set Site Logo" style="width:100px;" name="Set Site Logo"/></a>'; 
    echo '<p style="color:black; margin-left:10px;">After clicking the button go to <b>Site Identity -> Select Site Logo</b></p>';
}

function fishing_header_height() {
    admin_online_inputs( 'number', 'header_height', [ 'style' => 'width:65px;' ], false, 60 );
}

function fishing_header_nav_menu_color() {
    if (get_option( 'genarel_header_layout', 'layout1' ) === 'layout1') {
        $o = 'header_nav_menu_color'; 
        $d = '#dddddd';
    } else {
        $o = 'header2_nav_menu_color'; 
        $d = '#ffffff';
    }
    
    admin_online_inputs( 'color', $o, [], false, $d );
}

function fishing_header_nav_menu_hover_color() {
    if (get_option( 'genarel_header_layout', 'layout1' ) === 'layout1') {
        $o = 'header_nav_menu_hover_color'; 
        $d = '#ffffff';
    } else {
        $o = 'header2_nav_menu_hover_color'; 
        $d = '#212529';
    }
    admin_online_inputs( 'color', $o, [], false, $d ); 
}
function fishing_header_nav_menu_icons_color() {
    admin_online_inputs( 'color', 'header_nav_menu_icon_color', [], false, '#dddddd' );
}

function fishing_header_nav_menu_icons_hover_color() {
    admin_online_inputs( 'color', 'header_nav_menu_icon_hover_color', [], false, '#ffffff' );
}
function fishing_header_socal_icons_color() {
    admin_online_inputs( 'color', 'header_socal_icon_color', [], false, '#dddddd' );
}

function fishing_header_socal_icons_hover_color() {
    admin_online_inputs( 'color', 'header_socal_icon_hover_color', [], false, '#ffffff' );
}

function fishing_topbab_l2_chackbox()
{
    $o = get_option( 'h2_topber_chackbox', 1 );
    $checked = ( $o == 1 ) ? ' checked="checked"': '';
    echo '<input class="headerLayoutRedios" type="checkbox" value="1" name="h2_topber_chackbox"'. $checked .' />';
}

function fishing_header2_topbar_text_color()
{
    admin_online_inputs( 'color', 'header2_topbar_color', [], false, '#cccccc' );
}
function fishing_header2_topbar_text_hover_color()
{
    admin_online_inputs( 'color', 'header2_topbar_hover_color', [], false, '#ffffff' );
}

function fishing_header2_logo_alinement() {
    admin_redio_inputs( 'herder2_logo_alinement', [
        'flex-start' => '<span class="fishing-icon3 fishing-icon3-paragraph-left alinements"></span>', 
        'center' => '<span class="fishing-icon3 fishing-icon3-paragraph-center alinements"></span>', 
        'flex-end' => '<span class="fishing-icon3 fishing-icon3-paragraph-right alinements"></span>'
    ], 'center', [ 'class' => 'herder2_logo_alinement' ] );
}