<?php 
require_once get_template_directory(  ) . '/inc/fonts/font.php';
$MrI_Fishing_fonts_args = [];
$MrI_Fishing_hl1_fonts_args = [
    'element' => '.fishing-layout2-header .menu-container .fishing-mainmenu li',
    'selector' => [
        'defualt' => 'Poppins'
    ],
    'styles' => [
        'defualt' => 'normal'
    ],
    'speacing' => [
        'defualt' => '0.7'
    ],
    'weight' => [
        'defualt' => '400'
    ],
    'size' => [
        'defualt' => '16'
    ],
    'transform' => [
        'defualt' => 'none'
    ],
    'decoration' => [
        'defualt' => 'none'
    ],
    'lebel_prefixs' => [
        'select' => 'Select Nav',
        'font_style' => 'Nav',
        'text_style' => 'Nav' 
    ]

];

$MrI_Fishing_hl2_nav_fonts_args = [
    'element' => '.header-font-l222 .fishing-mainmenu li',
    'selector' => [
        'defualt' => 'Poppins'
    ],
    'styles' => [
        'defualt' => 'normal'
    ],
    'speacing' => [
        'defualt' => '0.7'
    ],
    'weight' => [
        'defualt' => '400'
    ],
    'size' => [
        'defualt' => '16'
    ],
    'transform' => [
        'defualt' => 'none'
    ],
    'decoration' => [
        'defualt' => 'none'
    ],
    'lebel_prefixs' => [
        'select' => 'Select Nav',
        'font_style' => 'Nav',
        'text_style' => 'Nav' 
    ]
];
$MrI_Fishing_hl2_topbar_fonts_args = [
    'element' => '#tobbar .fishing-topmenu li',
    'selector' => [
        'defualt' => 'Roboto'
    ],
    'styles' => [
        'defualt' => 'normal'
    ],
    'speacing' => [
        'defualt' => '0.6'
    ],
    'weight' => [
        'defualt' => '300'
    ],
    'size' => [
        'defualt' => '15'
    ],
    'transform' => [
        'defualt' => 'none'
    ],
    'decoration' => [
        'defualt' => 'none'
    ],
    'lebel_prefixs' => [
        'select' => 'Select Top Bar',
        'font_style' => 'Top Bar',
        'text_style' => 'Top Bar' 
    ]
];

if ( esc_attr( get_option( 'genarel_header_layout', 'layout1' ) ) == 'layout1' ) {
    $MrI_Fishing_fonts_args['header_nav_items_text'] = $MrI_Fishing_hl1_fonts_args;
} else {
    $MrI_Fishing_fonts_args['header2_nav_items_text'] = $MrI_Fishing_hl2_nav_fonts_args;   
    $MrI_Fishing_fonts_args['header2_topbar_items_text'] = $MrI_Fishing_hl2_topbar_fonts_args;
}
$MrI_font = new FishingFontFamilysInputs( $MrI_Fishing_fonts_args, 'fishing-typhograpic-options' );