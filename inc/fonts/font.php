<?php 
require_once get_template_directory() . '/inc/fonts/google-fonts.php';
require_once get_template_directory() . '/inc/fonts/system_fonts.php';

class FishingFontFamilysInputs
{
    
    // private vriables
    private $google_fonts_class;
    private $options;
    private $option_group;

    // public vriables
    public $system_fonts;
    public $google_fonts = array(); 
    
    // __construnct mathod for int everyting
    public function __construct( $options, $group )
    {
        $this->options = $options;
        $this->option_group = $group;
        $this->system_fonts = new FishingSystemFontsList();
        $this->google_fonts_class = new FishingGoogleFontsList();
        $this->googleFonts();
        add_action( 'admin_init', [ $this, 'registerAdminFields' ] );
        add_filter( 'wp_head', [ $this, 'enqueueStyles' ] );      
        add_filter( 'wp_enqueue_scripts', [ $this, 'enqueueFontFamilys' ] );
    }

    // semplifing google fonts array
    private function googleFonts()
    {
        foreach ($this->google_fonts_class->google_fonts as $google_font) {
            $array_keys = array_keys( $google_font );
            $array_values = array_values( $google_font );
            $this->google_fonts[ $array_keys[0] ] = $array_values[0];
        }
    }

    // registering and adding input fields
    public function registerAdminFields()
    {
        foreach ($this->options as $key => $value) {

            register_setting( $this->option_group, $key );
            
            add_settings_field( 'fishing_select_'.$key, $value['lebel_prefixs']['select']." Text Font", [ $this, 'fontFamilySelector' ], 'typhograpic_options', 'fishing-navbar-typhograpic', 
            [
                'id' => $key,
                'defualt' => $value['selector']['defualt']
            ] );
            add_settings_field( 'fishing_font_style_'.$key, $value['lebel_prefixs']['font_style'].' Text Font Styles', [ $this, 'fontStyles'], 'typhograpic_options', 'fishing-navbar-typhograpic', 
            [ 
                'style' => [
                    'defualt' => $value['styles']['defualt']
                ],
                'speacing' => [
                    'defualt' => $value['speacing']['defualt'],
                ],
                'weight' => [
                    'defualt' => $value['weight']['defualt']
                ],
                'size' => [
                    'defualt' => $value['size']['defualt'],
                ],
                'id' => $key
            ] );
            $tect_args= [ 
                'decoration' => [
                    'defualt' => $value['decoration']['defualt']
                ],
                'transform' => [
                    'defualt' => $value['transform']['defualt']
                ],
                'id' => $key
            ];

            if ( isset( $value['line-height']['defualt'] ) ) {
                $tect_args['line-height'] = [ 'defualt'=>$value['line-height']['defualt'] ];
            }
            
            add_settings_field( 'fishing_text_style_'.$key, $value['lebel_prefixs']['text_style'].' Text Styles', [ $this, 'textStyles'], 'typhograpic_options', 'fishing-navbar-typhograpic', 
            $tect_args);

        }
    }

    // fields callbacks
    public function fontFamilySelector( $field_id )
    {
        $updated_system_fonts = array_keys( $this->system_fonts->system_fonts );
        $google_fonts = array_keys( $this->google_fonts );
        
        $fonts = array_merge( $google_fonts, $updated_system_fonts );
    
        admin_select_input( $field_id['id'], $fonts, [ 'class' => 'fishing_typhograpy_select' ], true, $field_id['defualt'], 'selector', $field_id['id']."[selector]" );
    }

    
    public function fontStyles( $id ) 
    {
        
        echo '<div class="fishing_typhograpic_inputs">';   
            admin_select_input( $id['id'], ['normal', 'italic'], [], true, $id['style']['defualt'], 'font_style', $id['id']."[font_style]" );    

            echo '<div><h6>Font Size</h6>';
            admin_online_inputs( 'number', $id['id'], ['style' => 'width: 60px;', 'placeholder' => 'Size'], true, $id['size']['defualt'], 'font_size', $id['id']."[font_size]" );
            echo ' <strong style="color:black;">px</strong></div>';

            echo '<div><h6>Font Weight</h6>';
            $weights = [ '100'=>'100 Thin', '200'=>'200 Extra Light', '300'=>'300 Light', '400'=>'400 Regular', '500'=>'500 Medium', '600'=>'600 Semi-Bold', '700'=>'700 Bold', '800'=>'800 Extra Bold', '900'=>'900 Black' ];
            echo '<select name="'.($id['id']."[font_weight]").'">';
            foreach ($weights as $key=>$value){ $width_selected=(((get_option( $id['id'], $id['weight']['defualt'] )['font_weight']) ?? $id['weight']['defualt'])==$key) ? ' selected="selected"' : '' ; echo '<option value="'. $key .'"'. $width_selected .'>'. $value .'</option>';}
            echo '</select>';

            echo '<div><h6>Letter Speacing</h6>';
            admin_online_inputs( 'number', $id['id'], ['style' => 'width: 60px;', 'placeholder' => 'Speacing', 'step' => '0.0001'], true, $id['speacing']['defualt'], 'letter_spacing', $id['id']."[letter_spacing]" );
            echo ' <strong style="color:black;">px</strong></div>';
        echo '</div>';

    }

    public function textStyles( $id ) 
    {
        echo '<div class="fishing_typhograpic_inputs">';   
            admin_select_input( $id['id'], ['none', 'overline', 'line-through', 'underline'], [], true, $id['decoration']['defualt'], 'text_decoration', $id['id']."[text_decoration]" );    
            echo '<div><h6>Text Transform</h6>';
                admin_select_input( $id['id'], ['none', 'capitalize', 'lowercase', 'uppercase'], [ 'class' => 'select_inputs' ], true, $id['transform']['defualt'], 'text_transform', $id['id']."[text_transform]" );    
            echo '</div>';

            if ( isset($id['line-height']) ) {
                echo '<div><h6>Line Height</h6>';
                admin_online_inputs( 'number', $id['id'], ['style' => 'width: 60px;', 'placeholder' => 'Line Height', 'step' => '0.0001'], true, $id['line-height']['defualt'], 'line_height', $id['id']."[line_height]" );    
                echo ' <strong style="color:black;">px</strong></div>';
            }
            echo '</div>';

        echo '</div>';
    }

    // enqueuing styles
    public function enqueueStyles()
    {
        ?>
        <style type="text/css">
            <?php foreach ($this->options as $key => $value) {
                $f = get_option( $key, $value['selector']['defualt'] )['selector'] ?? $value['selector']['defualt'];
                $s = get_option( $key, $value['size']['defualt'] )['font_size'] ?? $value['size']['defualt'];
                $w = get_option( $key, $value['weight']['defualt'] )['font_weight'] ?? $value['weight']['defualt'];
                $st = get_option( $key, $value['styles']['defualt'] )['font_style'] ?? $value['styles']['defualt'];
                $sp = get_option( $key, $value['speacing']['defualt'] )['letter_spacing'] ?? $value['speacing']['defualt'];
                $d = get_option( $key, $value['decoration']['defualt'] )['text_decoration'] ?? $value['decoration']['defualt'];
                $t = get_option( $key, $value['transform']['defualt'] )['text_transform'] ?? $value['transform']['defualt'];
                $lh = isset($value['line-height']) ? get_option( $key, $value['line-height']['defualt'] )['line_height'] ?? $value['line-height']['defualt']: null;
                ?>                
<?php echo $value['element'] ?> {
    font-family: <?php echo $f?>, Helvetica, Verdana, sans-serif ;
    font-size: <?php echo $s?>px;
    font-weight: <?php echo $w?>;
    font-style: <?php echo $st?>;
    letter-spacing: <?php echo $sp?>px;
    text-decoration: <?php echo $d?>;
    text-transform: <?php echo $t?>;
    <?php if ( $lh ) :?>
        line-height: <?php echo $lh ?>px;
    <?php endif; ?>
}
            <?php } ?>
        </style>
        <?php
    }
    // enqueuing font family styles
    public function enqueueFontFamilys()
    {
        $scr_texts = 'https://fonts.googleapis.com/css2';

        foreach ($this->options as $key => $value) {
            $til = get_option( $key, $value['selector']['defualt'] )['selector'] ?? $value['selector']['defualt'];
            $style = get_option( $key, $value['styles']['defualt'] )['font_style'] ?? $value['styles']['defualt'];
            $weight = get_option( $key, $value['weight']['defualt'] )['font_weight'] ?? $value['weight']['defualt'];

            foreach ($this->system_fonts->system_fonts as $system_font => $value) {
                $is_system_font = ( '0' == $system_font) ? '' : 'NO';
            }

            if ( $is_system_font === 'NO' ) {
                $exploded_til = explode( ' ', $til);
                $title = '';
                foreach ($exploded_til as $til_part) { 
                    $title .=( $exploded_til[0]==$til_part ) ? $til_part : "+$til_part" ;
                }           
    
                $sudo_names = '';
                $pre_text = '';
                $after_text = '';
                if ( $style == 'normal' && $weight == 400 ) {
                    //
                } else {
                    if ( $style != 'normal' ) {
                        $sudo_names .= "ital";
                        if ( $weight != 400 ) {
                            $sudo_names .= ',wght';
                            $after_text .= "1,$weight";
                        } else {
                            $after_text.= 1;
                        }
                    } else {
                        if ( $weight != 400 ) {
                            $sudo_names .= 'wght';
                            $after_text .= $weight;
                        }  
                    }
                }
    
                $main_text = ":$sudo_names@$pre_text$after_text";
                $font_text = "family=$title".( ($style == 'normal' && $weight == 400) ? '' : $main_text );
                
                $scr_texts .= ( $scr_texts == 'https://fonts.googleapis.com/css2' ) ? "?$font_text" : "&$font_text"; 
            }

        }

        $abc = $scr_texts.'&display=swap';
        ?> <link rel="stylesheet" href="<?php echo $abc ?>"> <?php

    }

}









/* 
class FishingFontFamilysInput
{
    
    private $google_fonts_class;
    private $options;
    private $scr_texts;

    public $system_fonts;
    public $google_fonts = array();

    public function __construct()
    {
        $this->system_fonts = new FishingSystemFontsList();
        $this->google_fonts_class = new FishingGoogleFontsList();
        $this->googleFonts();
    }

    public function registerEnqueue( $options )
    {

        $this->options = $options;
        
        $this->makeFontLink();

        add_action( 'wp_enqueue_scripts', [ $this, 'enqueuingGoogleFonts' ] );
    }

    private function googleFonts()
    {
        foreach ($this->google_fonts_class->google_fonts as $google_font) {
            $array_keys = array_keys( $google_font );
            $array_values = array_values( $google_font );
            $this->google_fonts[ $array_keys[0] ] = $array_values[0];
        }
    }

    private function makeFontLink()
    {
        $scr_text = 'https://fonts.googleapis.com/css2';
        foreach ( $this->options  as $option => $defult ) { 
            
            $f = get_option($option, $defult);
            foreach ($this->system_fonts->system_fonts as $system_font => $value) {
                $is_system_font = ( $f == $system_font) ? 'YES' : '';
            } 
            
            if ( $is_system_font !== 'YES' ) {
                
                $i = [];
                $r = [];
                
                $italics = [ '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ];
                $regular = [ '100', '200', '300', 'regular', '500', '600', '700', '800', '900' ];
                foreach ($this->google_fonts[$f]['variants'] as $variant ){ 
                    foreach ($italics as $Italic){ if ( $variant==$Italic ){ 
                        $i[]=( $Italic==='italic' ) ? '400' : explode('i', $Italic)[0];
                    }
                } 
                foreach ($regular as $Regular){ 
                    if ( $variant==$Regular ){ 
                        $r[]=( $Regular==='regular' ) ? '400' : $Regular;
                    }
                }
            }
                
                $e_title = explode( ' ', $f );

                $title = '';
                foreach ($e_title as $titles){ $title .=( $e_title[0]==$titles ) ? $titles : "+$titles" ;}

                $regul = '';
                foreach ($r as $value){ if ( count($r) !==0 ){ $regul .=(($r[0])==$value) ? '0,' . $value: ';0,' . $value;}}

                $itals = '';
                foreach ($i as $value) { if ( count($i) !== 0 ) { $itals .= ';1,' . $value; } }

                $wo_regul = '';
                foreach ($r as $value){ if ( count($r) !==0 ){ $wo_regul .=(($r[0])==$value) ? $value: ';' . $value;}}

                $reg = ( count($r) <= 1 && ($r[0]) == '400' && count($i) <= 1 && ($i[0]) == '400' ) ? '0': (( count($r) > 1 && count($i) == 0 ) ? $wo_regul: $regul);
                $itl = ( count($r) == 0 && count($i) <= 1 && ($i[0]) == '400' ) ? '1': ( ( count($r) <= 1 && ($r[0]) == '400' && count($i) <= 1 && ($i[0]) == '400' ) ? ';1': (( count($r) > 1 && count($i) == 0 ) ? '': $itals) );
                
                $wght = (count($r) > 1 OR count($i) > 1) ? ( (count($i) > 0) ? ',wght': 'wght') : ( ( (count($r) <= 1 && ($r[0]) != '400') OR (count($i) <= 1 && ($i[0]) != '400') ) ? ( (count($i) > 0) ? ',wght': 'wght'): '');                                      
                $ital = (count($i) > 0) ? 'ital': '';

                
                $o_varints_text = ":$ital$wght@$reg$itl";
                $main_text = ( count($r) == 1 && ($r[0]) == '400' && count($i) == 0 ) ? '': $o_varints_text;
                $font_text = "family=$title$main_text";

                $scr_text .= ( $scr_text == 'https://fonts.googleapis.com/css2' ) ? "?$font_text" : "&$font_text";
                
            }

        }

        $this->scr_texts = $scr_text;
    }

    public function enqueuingGoogleFonts()
    {
        $scr_text = $this->scr_texts;
        wp_enqueue_style( 'fishing-font-familys', "$scr_text&display=swap" );
    }

    public function getFont( $field_id, $defult = '' )
    {

        $f = get_option( $field_id, $defult );

        $f_catagory = $this->google_fonts[$f]['category'];

        $output = "font-family: '$f', Helvetica, Verdana, $f_catagory;";
        return $output;
    }

}
 */