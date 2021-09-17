<?php

class FishingSystemFontsList
{
    
    public $system_fonts = array();

    public function __construct()
    {

        $this->system_fonts = array(
            'Helvetica' => array(
                'fallback' => 'Verdana, Arial, sans-serif',
                'weights'  => array(
                    '300',
                    '400',
                    '700',
                ),
            ),
            'Verdana'   => array(
                'fallback' => 'Helvetica, Arial, sans-serif',
                'weights'  => array(
                    '300',
                    '400',
                    '700',
                ),
            ),
            'Arial'     => array(
                'fallback' => 'Helvetica, Verdana, sans-serif',
                'weights'  => array(
                    '300',
                    '400',
                    '700',
                ),
            ),
            'Times'     => array(
                'fallback' => 'Georgia, serif',
                'weights'  => array(
                    '300',
                    '400',
                    '700',
                ),
            ),
            'Georgia'   => array(
                'fallback' => 'Times, serif',
                'weights'  => array(
                    '300',
                    '400',
                    '700',
                ),
            ),
            'Courier'   => array(
                'fallback' => 'monospace',
                'weights'  => array(
                    '300',
                    '400',
                    '700',
                ),
            ),
        );

    }

}
