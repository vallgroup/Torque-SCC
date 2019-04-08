<?php

require_once( get_stylesheet_directory() . '/includes/scc-child-nav-menus-class.php');
require_once( get_stylesheet_directory() . '/includes/acf/scc-child-acf-class.php');
require_once( get_stylesheet_directory() . '/api/scc-child-rest-controller-class.php');

if ( class_exists( 'SCC_REST_Controller' ) ) {
  new SCC_REST_Controller();
}

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
 * Configure page post type
 */
add_action( 'init', function() {
  remove_post_type_support( 'page',  'editor' );
  remove_post_type_support( 'page',  'excerpt' );
  remove_post_type_support( 'page',  'thumbnail' );
  remove_post_type_support( 'page',  'comments' );
});


// add svg mime type
add_filter('upload_mimes', function($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
});

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
   // remove_menu_page( 'themes.php' );                 //Appearance
   remove_menu_page( 'plugins.php' );                //Plugins
   //remove_menu_page( 'users.php' );                  //Users
   //remove_menu_page( 'tools.php' );                  //Tools
   //remove_menu_page( 'options-general.php' );        //Settings

 }
 add_action( 'admin_menu', 'torque_remove_menus' );

 // remove unwanted submenus
 add_action( 'admin_menu', function () {
 	remove_submenu_page( 'themes.php', 'widgets.php' );
 }, 999 );
?>
