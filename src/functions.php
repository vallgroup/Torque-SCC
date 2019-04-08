<?php

require_once( get_stylesheet_directory() . '/includes/scc-child-nav-menus-class.php');
require_once( get_stylesheet_directory() . '/includes/acf/scc-child-acf-class.php');

/**
 * Child Theme Nav Menus
 */

 if ( class_exists( 'SCC_Nav_Menus' ) ) {
   new SCC_Nav_Menus();
 }


/**
 * Child Theme ACF
 */

 if ( class_exists( 'SCC_ACF' ) ) {
   new SCC_ACF();
 }


/**
 * Admin settings
 */

 // remove menu items
 function torque_remove_menus(){

   //remove_menu_page( 'index.php' );                  //Dashboard
   remove_menu_page( 'edit.php' );                   //Posts
   //remove_menu_page( 'upload.php' );                 //Media
   //remove_menu_page( 'edit.php?post_type=page' );    //Pages
   remove_menu_page( 'edit-comments.php' );          //Comments
   remove_menu_page( 'themes.php' );                 //Appearance
   remove_menu_page( 'plugins.php' );                //Plugins
   //remove_menu_page( 'users.php' );                  //Users
   //remove_menu_page( 'tools.php' );                  //Tools
   //remove_menu_page( 'options-general.php' );        //Settings

 }
 add_action( 'admin_menu', 'torque_remove_menus' );


?>
