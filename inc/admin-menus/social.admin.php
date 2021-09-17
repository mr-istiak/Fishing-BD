<?php

function fishing_social_links( $setting )
{
    admin_online_inputs( 'url', 'fishing_social_' . $setting['settingOption'], [
        'placeholder' => 'Write Your ' . $setting['settingOption'] . ' Profile Link',
        'class' => 'form-control'
    ], false, '#' );
}
