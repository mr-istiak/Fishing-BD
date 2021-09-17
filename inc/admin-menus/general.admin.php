<?php
/**=====================================================================
 *                    General Menu Page In Admin Panel
 * ===================================================================== */

//============================ Genarel HTML Area ======================
 function fishing_admin_general_settings_body_width() { 
  admin_select_input( 'site_width', array('Boxed', 'Less Than Full Width', 'Full Width', 'Custom Width'), [ 'class' => 'auto_refreash_page_on_select' ], false );
}
if ( get_option( 'site_width' ) == 'Custom Width' ) {
   
  function fishing_admin_general_settings_header_width(){
    admin_select_input( 'header_width', array('Boxed', 'Less Than Full Width', 'Full Width', 'Custom Width'), [ 'class' => 'auto_refreash_page_on_select' ], false );
    if ( get_option( 'header_width' ) == 'Custom Width' ) {
      
      admin_online_inputs( 'number', 'header_custom_width', array('placeholder' => 'Width', 'style' => 'width:80px;'), false );
      admin_redio_inputs( 'header_custom_width_miters', array("px", "%", "em") );
    
    }
  }

  function fishing_admin_general_settings_content_width(){
    admin_select_input( 'content_width', array('Boxed', 'Less Than Full Width', 'Full Width', 'Custom Width'), [ 'class' => 'auto_refreash_page_on_select' ], false );
    if ( get_option( 'content_width' ) == 'Custom Width' ) {
     
      admin_online_inputs( 'number', 'content_custom_width', array('placeholder' => 'Width', 'style' => 'width:80px;'), false );
      admin_redio_inputs( 'content_custom_width_miters', array("px", "%", "em") );
   
    }

  }

  function fishing_admin_general_settings_footer_width(){
    admin_select_input( 'footer_width', array('Boxed', 'Less Than Full Width', 'Full Width', 'Custom Width'), [ 'class' => 'auto_refreash_page_on_select' ], false );
    if ( get_option( 'footer_width' ) == 'Custom Width' ) {
    
      admin_online_inputs( 'number', 'footer_custom_width', array('placeholder' => 'Width', 'style' => 'width:80px;'), false );
      admin_redio_inputs( 'footer_custom_width_miters', array("px", "%", "em") );
   
    }
  }

}

//========================== Style Area ===================================
function fishing_admin_general_settings_background() {
  admin_select_input( 'fishing_background', array('None', 'Background Image', 'Background Color'), [ 'class' => 'auto_refreash_page_on_select' ], false );
}

function fishing_admin_general_settings_body_color() {
  echo '<input type="color" name="body_color" value="'. get_option( 'body_color', '#069CFF' ) .'" />';
}

function fishing_admin_general_settings_background_color() {
  admin_online_inputs( 'color', 'fishing_background_color', [], false );
}

function fishing_admin_general_settings_background_image() {
  $background_img = esc_attr( get_option('fishing_background_image') );
  if ( empty($background_img) ) {
    echo '<input type="button" class="btn btn-success" id="upload-button" value="Choose Background Color Body" name="Choose Body Background Color" >';
    admin_online_inputs( 'hidden', 'fishing_background_image', array('id' => 'body-background'), false );
  } else {
    echo '<input type="button" class="btn btn-success" id="upload-button" value="Choose Background Color Body" name="Choose Body Background Color" >';
    echo '<button type="button" class="btn btn-success remove-buttton remove-bg-buttton"><span class="dashicons dashicons-trash"></span></button>';
    echo '<span class="bg-url-span"><a href="'.$background_img.'" class="bg-url-short bg-success" title="'.$background_img.'">' . image_short_url('fishing_background_image') . '</a></span>';
    admin_online_inputs( 'hidden', 'fishing_background_image', array('id' => 'body-background'), false );
  }
}

