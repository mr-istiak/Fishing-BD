<?php

function fishing_featured_image_layout()
{
    admin_redio_inputs( 'fishing_featured_layout', [
        '1' => '<div class="admin-feaured-base__layout"><div class="header"></div><div class="main"><div class="body"><div class="featured1"><span> < </span><span> > </span></div></div><div class="sidebar"></div></div><div class="footer"></div></div>',
        '2' => '<div class="admin-feaured-base__layout"><div class="header"></div><div class="featured1 featured2"><span> < </span><span> > </span></div><div class="main featured2"><div class="body"></div><div class="sidebar"></div></div><div class="footer"></div></div>',
        '3' => '<div class="admin-feaured-base__layout"><div class="header"></div><div class="featured1 featured3"><div class="empty"><div class="emtpy"></div><div class="sm-fb"><div class="sm sm-3"></div><div class="sm sm-4"></div><div class="sm sm-5"></div></div></div><div class="sm-fr"><div class="sm sm-1"></div><div class="sm sm-2"></div></div></div><div class="main featured2"><div class="body"></div><div class="sidebar"></div></div><div class="footer"></div></div>',
        '4' => '<div class="admin-feaured-base__layout"><div class="header"></div><div class="main"><div class="body"><div class="featured1 featured3 f4"><div class="empty f4"><div class="emtpy"></div><div class="sm-fb"><div class="sm sm-3"></div><div class="sm sm-4"></div><div class="sm sm-5"></div></div></div></div></div><div class="sidebar"></div></div><div class="footer"></div></div>',
        '5' => '
        <div class="admin-feaured-base__layout">
            <div class="header"></div>
            <div class="featured1 featured3 f5">
                <div class="left"></div>
                <div class="middle"></div>
                <div class="right"></div>
            </div>
            <div class="main featured2">
                <div class="body"></div>
                <div class="sidebar"></div>
            </div>
            <div class="footer"></div>
        </div>'
    ], '1', [
        'class' => 'fishing_admin_featured_layouts',
        'label' => [
            'class' => 'fishing_admin_featured__label'
        ]
    ] );
}