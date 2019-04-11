<?php

require_once( get_template_directory() . '/api/responses/torque-api-responses-class.php');
require_once( get_template_directory() . '/includes/validation/torque-validation-class.php');

class SCC_Screen_Saver_Controller {

	public static function get_screen_saver_args() {
		return array();
	}

	protected $request = null;

	function __construct( $request ) {

		$this->request = $request;
	}

	public function get_screen_saver() {
		try {
			$screen_saver_field = get_field('screensaver_slideshow', 'option');

			if (!$screen_saver_field) return Torque_API_Responses::Failure_Response( array());

			$screen_saver = array_map( function( $repeater_field ) {
				return $repeater_field['image'];
			}, $screen_saver_field );

      return Torque_API_Responses::Success_Response( array(
        'data'	=> $screen_saver
      ) );

		} catch (Exception $e) {
			return Torque_API_Responses::Error_Response( $e );
		}
	}
}
