<?php

define( 'SCC_API_ROOT', dirname(__FILE__) . '/' );

require_once( SCC_API_ROOT . 'routes/scc-child-routes-class.php');

/**
* The plugin API class
*/
class SCC_REST_Controller {

  private $namespace;

  public function __construct() {
    $this->namespace = 'scc/v1/';

    // add API endpoints
		add_action( 'rest_api_init', array( $this, 'register_routes' ) );
  }

  // Register our routes.
  public function register_routes() {

    $routes = new SCC_Routes( $this->namespace );
    $routes->register_routes();
  }
}

?>
