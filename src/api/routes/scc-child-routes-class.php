<?php

require_once( get_template_directory() . '/api/permissions/torque-api-permissions-class.php');
require_once( SCC_API_ROOT . 'controllers/scc-child-init-controller-class.php');
require_once( SCC_API_ROOT . 'controllers/scc-child-page-controller-class.php');
require_once( SCC_API_ROOT . 'controllers/scc-child-screen-saver-controller-class.php');

class SCC_Routes {

  private $namespace;

  public function __construct( $namespace ) {
    $this->namespace = $namespace;
  }

  public function register_routes() {

    register_rest_route( $this->namespace, '/init/' , array(
	  	array(
	  		'methods'             => 'GET',
	  		'callback'            => array( $this, 'get_init' ),
	  		'args'                => SCC_Init_Controller::get_init_args(),
	  	),
	  ) );

    register_rest_route( $this->namespace, '/page/' , array(
	  	array(
	  		'methods'             => 'GET',
	  		'callback'            => array( $this, 'get_page' ),
	  		'args'                => SCC_Page_Controller::get_page_args(),
	  	),
	  ) );

    register_rest_route( $this->namespace, '/screen-saver/' , array(
	  	array(
	  		'methods'             => 'GET',
	  		'callback'            => array( $this, 'get_screen_saver' ),
	  		'args'                => SCC_Screen_Saver_Controller::get_screen_saver_args(),
	  	),
	  ) );
  }

  public function get_init( $request ) {
    $init_controller = new SCC_Init_Controller( $request );
    return $init_controller->get_init();
  }

  public function get_page( $request ) {
    $page_controller = new SCC_Page_Controller( $request );
    return $page_controller->get_page();
  }

  public function get_screen_saver( $request ) {
    $screen_saver_controller = new SCC_Screen_Saver_Controller( $request );
    return $screen_saver_controller->get_screen_saver();
  }
}

?>
