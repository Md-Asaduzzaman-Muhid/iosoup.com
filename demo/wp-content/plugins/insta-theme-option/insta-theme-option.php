<?php
/*
Plugin Name: Insta Theme Option
Plugin URI: http://instalogic.com
Description:
Version: 1.0.0
Author: sanaul
Author URI: http://instalogic.com
*/


/*----------------------------------------------------------------------------------------------------
					D E C L E A R I N G     V A R I A B L E S
----------------------------------------------------------------------------------------------------*/

if ( ! defined( 'WP_CONTENT_URL' ) ) define( 'WP_CONTENT_URL' , get_option( 'siteurl' ) . '/wp-content' );
if ( ! defined( 'WP_CONTENT_DIR' ) ) define( 'WP_CONTENT_DIR' , ABSPATH . 'wp-content' );
if ( ! defined( 'WP_PLUGIN_URL'  ) ) define( 'WP_PLUGIN_URL' ,  WP_CONTENT_URL. '/plugins' );
if ( ! defined( 'WP_PLUGIN_DIR'  ) ) define( 'WP_PLUGIN_DIR' ,  WP_CONTENT_DIR . '/plugins' );
if ( ! defined( 'INSTA_THEME_OPTION_PLUGIN_FOLDER_NAME'  ) ) define( 'WP_PLUGIN_FOLDER_NAME' ,  'insta-theme-option' );
if ( ! defined( 'INSTA_THEME_OPTION_PLUGIN_NAME'  ) ) define( 'WP_PLUGIN_NAME' ,  'Insta Theme Option' );
if ( ! defined( 'INSTA_THEME_OPTION_PLUGIN_DIR'  ) ) define( 'INSTA_THEME_OPTION_PLUGIN_DIR' ,  WP_PLUGIN_DIR . '/'.WP_PLUGIN_FOLDER_NAME );
if ( ! defined( 'INSTA_THEME_OPTION_PLUGIN_URL'  ) ) define( 'INSTA_THEME_OPTION_PLUGIN_URL' ,  WP_PLUGIN_URL . '/'.WP_PLUGIN_FOLDER_NAME );

//user level
$admin_plugin_access = 0;

//include plugin install file
include_once(dirname(__FILE__) . '/include/install.php');
//include router class file which is routing user request
include_once(dirname(__FILE__) . '/include/router.php');

ini_set( "output_buffering" , "on" );
/*----------------------------------------------------------------------------------------------------
                                                A D M I N     M E N U
----------------------------------------------------------------------------------------------------*/

function insta_theme_menu() {
    $mymenu = new InstaThemeOption();
}

add_action('admin_menu', 'insta_theme_menu');

class InstaThemeOption
{
    public function __construct(){
        // the method that handles all requests
        $request_handler = array( $this, 'request_handler' );
        global $admin_plugin_access;
		
        // wordpress functions to add menus and submenus
       add_menu_page( __( "Theme Option" ) , __( "Theme Option" ) , 'edit_pages' , 'theme-option' , $request_handler );
    }
    /*The request handler function that declares the needed vars and calls
      the router*/
    public function request_handler(){
        /*as mentioned, we use the page as the controller*/
        $controller = $_GET['page'];
       // echo $controller."<<<<";
        /*and the action variable for the method*/

        // $action = $_GET['action'];
        $action = '';

        // we add a small check to see if the page requested is this
         //  controller
        if( $controller == get_class( $this ) ){
            // if it is, we can use the instance of this controller instead
            $controller = $this;
        }

        // now the params. All the other get variables
        $params = $_GET;

        // we can remove the page and action variables first
        unset( $params['page'] );
        unset( $params['action'] );

        $controller = str_replace(' ','',ucwords(str_replace('-',' ',$controller)));
        // finally! let's set up data for the router
        $route = array( $controller, $action, $params );
       // print_r($route);
        // we are using the instance of this class as the default controller
        $default_controller = $this;

        // the default method
        $default_method = 'index';
	
        if(is_string($route[0]) && file_exists( INSTA_THEME_OPTION_PLUGIN_DIR."/modules/controller/".$route[0].".php"))
            include_once("modules/controller/".$route[0].".php");

        $router = new Router( $route, $default_controller, $default_method );
    }    
}

?>