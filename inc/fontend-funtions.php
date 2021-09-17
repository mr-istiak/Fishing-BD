<?php
//============================== Genaric FontEnd General Settings ===============================
function fishing_general_body_widths( $field_id, $area_name, $custom_var_function, $custom_var_function2, array $id = [] )
{
    ${$area_name.'less_than_full_width'} = ( get_option( $field_id ) == 'Less Than Full Width' ) ? '<div id="'. ($id[0] ?? '') .'" class="'.($id['flex'] ?? '').'container-fluid">' : '' ;
    ${$area_name.'full_width'} = ( get_option( $field_id ) == 'Full Width' ) ? '<div id="'.( $id[1] ?? '') .'" class="'.($id['flex'] ?? '').'" style="width:100%;">' : ''; 
    ${$area_name.'boxed'} = ( get_option( $field_id ) == 'Boxed' ) ? $custom_var_function2 : '';
    ${$area_name.'custom_width'} = ( get_option( $field_id ) == 'Custom Width' ) ? $custom_var_function : '';
    print ${$area_name.'less_than_full_width'} . ${$area_name.'full_width'} . ${$area_name.'boxed'} . ${$area_name.'custom_width'};
}

function fishing_socalmedia_icon( $name, $number_counter, $a_styles = [], $li_styles = [], $a_attrs = [] ) {
    $a_output = '';
    foreach ($a_styles as $a_style => $value) {
        $a_output .= $a_style . ': ' . $value . '; ';
    }
    $a_attrsOutput = '';
    foreach ($a_attrs as $a_attr => $value) {
        $a_attrsOutput .= $a_attr . '="' . $value . '" ';
    }
    $li_output = '';
    foreach ($li_styles as $li_style => $value) {
        $li_output .= $li_style . ': ' . $value . '; ';
    }
    $output = 
    '<li class="icon-hover header-layout2-number fishing-social-icons '.$number_counter.'" style="'.$li_output.'" <!--  '.$name.'  -->
        <a class="socalmediaicons" style="'.$a_output.'" '.$a_attrsOutput.'>
            <span class="fishing fishing-'.$name.'"></span>
        </a>
    </li>';
    return $output;
}

//============================== General FontEnd General Settings ===============================
function body_background_style() {
    $varIfBgColor = esc_attr( get_option( 'site_width' ) ) == 'Boxed' && esc_attr( get_option( 'fishing_background' ) ) ==  'Background Color';
    $varIfBgImage = esc_attr( get_option( 'site_width' ) ) == 'Boxed' && esc_attr( get_option( 'fishing_background' ) ) ==  'Background Image';

    $backgroundColor =( $varIfBgColor ) ? 'style="background-color: '. esc_attr( get_option('fishing_background_color') ) .';"' : '';
    $backgroundImage =( $varIfBgImage ) ? 'style="
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    background-image: url('. esc_attr( get_option('fishing_background_image') ) .');
    background-attachment: fixed;"' : '';

    $bgOutput = $backgroundColor . $backgroundImage;

    return $bgOutput;
}

function fishing_home_button_settings() {
    $output = '';

    if ( is_front_page() ) {
        $output .= ' style="background: '.esc_attr( get_option( 'body_color' ) ).';"';
    } else {
        $output .= ' style="background: '.esc_attr( get_option( 'body_color' ) ).'b3;"';
    }

    return $output;
}

function fishing_socalmedia_icon_foreach() {
    $socalmedia_icons = array( 'facebook', 'twitter', 'google-plus', 'pinterest', 'instagram', 'linkedin2', 'youtube', 'github', 'skype', 'twitch', 'whatsapp', 'amazon', 'vk', 'rss', 'steam', 'blogger', 'tumblr' );
    $main_social_icons = [];
    foreach ( $socalmedia_icons as $social ) {
        if ( ! empty( ( ( $social == 'linkedin2' ) ? get_option( "fishing_social_linkedin", '#' ) : get_option( "fishing_social_$social", '#' ) ) ) ) {
            $main_social_icons[] = $social;
        }
    }
    $output = '';
    $i = 1;
    foreach ( $main_social_icons as $main_social_icon ) {
        $link = ( ( $main_social_icon == 'linkedin2' ) ? get_option( "fishing_social_linkedin", '#' ) : get_option( "fishing_social_$main_social_icon", '#' ) );
        $exploded_link = explode( '/', $link );
        if ( $exploded_link[0] == 'https:' ) {
            $https = '';
        } elseif ( $exploded_link[0] == 'http:' ) {
            $https = '';
        } else {
            $https = 'https://';
        }

        $output .= fishing_socalmedia_icon( $main_social_icon, $i , [], [], [
            'href' => $https . $link,
            'target' => '_blank',
            'rel' => 'external'
        ] );
        $i++;
    }
    return $output;
}

//============================== Font End CSS ===============================
function fontend_php_css() {

    if (get_option( 'genarel_header_layout', 'layout1' ) === 'layout1') {
        $header_nav_colors_option = 'header_nav_menu_color';
        $header_nav_hover_colors_option = 'header_nav_menu_hover_color'; 
        $header_nav_colors_option_defualt = '#dddddd';
        $header_nav_hover_colors_option_defualt = '$ffffff';
    } else {
        $header_nav_colors_option = 'header2_nav_menu_color';
        $header_nav_hover_colors_option = 'header2_nav_menu_hover_color'; 
        $header_nav_colors_option_defualt = '#ffffff';
        $header_nav_hover_colors_option_defualt = '#212529';
    }

    $logo_alignment = esc_attr( get_option( 'herder2_logo_alinement', 'center' ) );

    $output = 
     '<style type="text/css">
        .fishing-mainmenu li a:hover {
            color: '. esc_attr( get_option( $header_nav_hover_colors_option, $header_nav_hover_colors_option_defualt ) ) .';
            background-color: '. get_option( 'body_color' ) .';
        }
        header .searchform-contaier .search-container-div form,
        .fishing-layout2-header .menu-container .close-container .search-container-div .search-form {
            border-color: '. get_option( 'body_color' ) .';
        }
        .fishing-mainmanu-activ-area {
            background-color: '. esc_attr( get_option( 'body_color' ) ) .'; 
            color: '. esc_attr( get_option( $header_nav_hover_colors_option, $header_nav_hover_colors_option_defualt ) ) .';
        }
        #fishing-mainmenu-active-area-li-a {
            color: '. esc_attr( get_option( $header_nav_hover_colors_option, $header_nav_hover_colors_option_defualt ) ) .';
        }
        .fishing-layout2-header .fishing,
        .fishing-layout2-header .fishing-icon2,
        .fishing-layout2-header .fishing-icon3 {
            color:'.esc_attr( get_option( 'header_nav_menu_icon_color', '#dddddd' ) ) .' !important;
        }
        .fishing-layout2-header .fishing:hover,
        .fishing-layout2-header .fishing-icon2:hover,
        .fishing-layout2-header .fishing-icon3:hover,
        .fishing-layout2-header .fishing:focus,
        .fishing-layout2-header .fishing-icon2:focus,
        .fishing-layout2-header .fishing-icon3:focus {
            color:'.esc_attr( get_option( 'header_nav_menu_icon_hover_color', '#ffffff' ) ) .' !important;
        }
        .fishing-social-icons a span.fishing,
        .fishing-social-icons a span.fishing-icon2,
        .fishing-social-icons a span.fishing-icon3 {
            color:'.esc_attr( get_option( 'header_socal_icon_color', '#dddddd' ) ) .' !important;
        }
        .fishing-social-icons a span.fishing:hover,
        .fishing-social-icons a span.fishing-icon2:hover,
        .fishing-social-icons a span.fishing-icon3:hover,
        .fishing-social-icons a span.fishing:focus,
        .fishing-social-icons a span.fishing-icon2:focus,
        .fishing-social-icons a span.fishing-icon3:focus {
            color:'.esc_attr( get_option( 'header_socal_icon_hover_color', '#ffffff' ) ) .' !important;
        }
        header .fishing-mainmenu li a {
            color: '. esc_attr( get_option( $header_nav_colors_option, $header_nav_colors_option_defualt ) ) .';
        }
        #tobbar .fishing-topmenu li a {
            color: '. esc_attr( get_option( 'header2_topbar_color', '#cccccc' ) ) .';
        }
        #tobbar .fishing-topmenu li a:hover,
        #tobbar .fishing-topmenu li #active {
            color: '. esc_attr( get_option( 'header2_topbar_hover_color', '#ffffff' ) ) .' !important;
        }
        .middle-header {
            align-items: '. $logo_alignment .';
        }
        .middle-header > section[type=img][img=logo] {
            text-align: '. ( $logo_alignment == 'flex-start' ? 'start' : ( $logo_alignment == 'flex-end' ? 'end' : 'center' ) ) .';
        }
        .fishing_mobile_sidebar_container .mobile_sidebar_inner_constainer .searchform-contaier > .search-container-div > form {
            background-color: '. get_option( 'body_color', '#069cff' ) .';
            border-color: '. get_option( 'body_color', '#069cff' ) .';
        }
        main.body_content article.entry-articale .content-container .entry-title a:hover,        
        main.body_content article.entry-articale .content-container .entry-title a:focus {
            color: '. get_option( 'body_color', '#069cff' ) .';
        }
    </style>';
    echo $output;
}