<?php

require_once( get_template_directory() . '/api/responses/torque-api-responses-class.php');
require_once( get_template_directory() . '/includes/validation/torque-validation-class.php');

require_once( SCC_API_ROOT . 'controllers/helpers/scc-child-controller-helpers-class.php');

class SCC_Page_Controller {

	public static function get_page_args() {
		return array(
			'id' => array(
        'validate_callback' => array( 'Torque_Validation', 'int' ),
      )
		);
	}

	protected $request = null;

	function __construct( $request ) {

		$this->request = $request;
	}

	public function get_page() {
		try {
			$page = $this->get_page_data();

			if ($page) {
        return Torque_API_Responses::Success_Response( array(
					// keep response shape matching init response shape,
					// this will make it easier for our reducers on the front end
          'data'	=> array('pages' => [$page])
        ) );
			}

			return Torque_API_Responses::Failure_Response( array());

		} catch (Exception $e) {
			return Torque_API_Responses::Error_Response( $e );
		}
	}

	private function get_page_data() {
		$page_id = $this->request['id'];

		$page = SCC_Controller_Helpers::get_pages_data( [$page_id] );
		if (count($page) > 0) $page = $page[0];
		else return false;

		$page['type'] = get_field( 'type', $page['ID'] );

		switch($page['type']) {
			case 'tabbed':
				$page['tabs'] = get_field( 'tabs', $page['ID'] );
				break;

			case 'single':
				$page['content'] = get_field( 'content', $page['ID'] );
				$page['images'] = get_field( 'images', $page['ID'] );
				break;
		}


		return $page;
	}
}