<?php

require_once( get_template_directory() . '/api/responses/torque-api-responses-class.php');
require_once( get_template_directory() . '/includes/validation/torque-validation-class.php');

class SCC_Init_Controller {

	public static function get_init_args() {
		return array();
	}

	protected $request = null;

	function __construct( $request ) {

		$this->request = $request;
	}

	public function get_init() {
		try {

			if (true) {
        return Torque_API_Responses::Success_Response( array(
          'data'	=> 'worked'
        ) );
			}

			return Torque_API_Responses::Failure_Response( array(
				''	=> ''
			));

		} catch (Exception $e) {
			return Torque_API_Responses::Error_Response( $e );
		}
	}
}
