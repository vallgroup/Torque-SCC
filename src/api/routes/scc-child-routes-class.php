<?php

require_once( get_template_directory() . '/api/permissions/torque-api-permissions-class.php');
require_once( SCC_API_ROOT . 'controllers/scc-child-init-controller-class.php');

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
  }

  public function get_init( $request ) {
    $controller = new SCC_Init_Controller( $request );
    return $controller->get_init();
  }
}

?>
