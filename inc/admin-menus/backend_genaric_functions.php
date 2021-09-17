<?php
//Select Input
function admin_select_input( $field_id, $array_item, $custom_attr_array = array(), $i, $default = null, $array_value = null, $name = '' ) {
  $fishing_field_action = get_option( $field_id, $default );
  $body_width_items = $array_item;
  $attr = '';
  foreach($custom_attr_array as $custom_attr => $value) {
    $attr .= $custom_attr .'="' . $value . '" '; 
  }
  echo '<select name="'. ($name ?: $field_id) .'" '.$attr.'>';
  foreach ($body_width_items as $body_width_item) {
    $width_selected = ( ( ($i === true) ? ($fishing_field_action[$array_value] ?? $default) : $fishing_field_action) == $body_width_item) ? ' selected="selected"' : '' ;
    echo '<option value="' . $body_width_item . '"' . $width_selected . '>' . $body_width_item . '</option>';
  }
  echo '</select>';
}

//Online Inputs 
function admin_online_inputs( $input_type, $field_id, $custom_attr_array = array(), $i, $default = null, $array_value = null, $name = '') 
{
    $admin_field_action = get_option( $field_id, $default );
    $attr = '';
    foreach($custom_attr_array as $custom_attr => $value) {
        $attr .= $custom_attr .'="' . $value . '" '; 
    }
    $val = ($i === true) ? ($admin_field_action[$array_value] ?? $default) : $admin_field_action;
    $n = $name ?: $field_id;
    echo '<input type="'. $input_type .'" value="' . $val . '" name="'. $n .'" '. $attr .'>';
}
//Radio
function admin_redio_inputs( $field_id, $array_item, $default = null, $custom_attrs = [] ) {
  $attr = '';
  foreach($custom_attrs as $custom_attr => $value) {
    if ( is_string($value) ) {
      $attr .= $custom_attr .'="' . $value . '" '; 
    }  
  }
  $redio_miters = get_option( $field_id, $default );
  $redio_miters_items = $array_item;
  foreach($redio_miters_items as $redio_miters_item => $val) {
      $checked = ($redio_miters == $redio_miters_item) ? ' checked="checked" ' : '';
      echo '<label class="'.($custom_attrs['label']['class'] ?? '').'"><input'.$checked.' value="'.$redio_miters_item.'" name="' . $field_id . '" type="radio" '.$attr.' />'.$val.'</label>';
  }
}

// General Functions
function image_short_url( $field_id ) {
  $field_id_action = esc_attr( get_option($field_id) );
  $urlArray = explode( '/', $field_id_action );
  $urlParts = $urlArray[0] . '/' . $urlArray[2] . '/' . $urlArray[3] . '/' . $urlArray[4] . '/' . $urlArray[5] . '/...';
  return $urlParts;
}

function social_media_link() {
  $socials = array( 'facebook', 'twitter', 'google-plus', 'pinterest', 'instagram', 'linkedin', 'youtube', 'github', 'skype', 'twitch', 'whatsapp', 'amazon', 'vk', 'rss', 'steam', 'blogger', 'tumblr' );

  foreach ($socials as $key) {
    
    register_setting( 'fishing-social-setting', "fishing_social_$key" );

    add_settings_field( "fishing-socal-link-$key", "$key Link", 'fishing_social_links', 'social_options', 'fishing-site-social-link', array( 'class' => 'social-links-field',
    'settingOption' => $key ) );

  }
}