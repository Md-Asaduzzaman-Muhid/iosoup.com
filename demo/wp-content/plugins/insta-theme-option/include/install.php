<?php
/*----------------------------------------------------------------------------------------------------
                        I N S T A L L A T I O N     F U N C T I O N  (  D A T A B A S E  )



----------------------------------------------------------------------------------------------------*/

register_activation_hook( INSTA_THEME_OPTION_PLUGIN_DIR . "/insta-theme-option.php" , 'init_ITO_plugin_db_option' );

function init_ITO_plugin_db_option(){
    global $wpdb;
    
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// ---------------------------------    add script and style   ----------------------------------------------------
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////


 add_action( "init" , "init_ITO_script_style" );

 function init_ITO_script_style(){
     
 }

function media_button_script(){
    if (is_admin ())
        wp_enqueue_media();
}

add_action ('admin_enqueue_scripts', 'media_button_script');

?>
