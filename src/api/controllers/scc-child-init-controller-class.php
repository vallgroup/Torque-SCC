<?php

require_once( get_template_directory() . '/api/responses/torque-api-responses-class.php');
require_once( get_template_directory() . '/includes/validation/torque-validation-class.php');

require_once( SCC_API_ROOT . 'controllers/helpers/scc-child-controller-helpers-class.php');

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
			$data = $this->get_init_data();

			if ($data) {
        return Torque_API_Responses::Success_Response( array(
          'data'	=> $data
        ) );
			}

			return Torque_API_Responses::Failure_Response( array());

		} catch (Exception $e) {
			return Torque_API_Responses::Error_Response( $e );
		}
	}

	private function get_init_data() {
		$data = array();

		$page_ids = $this->get_primary_menu_page_ids();
		if (!count($page_ids)) { return false; }

		$data['pages'] = $this->get_init_pages( $page_ids );
		$data['logos'] = $this->get_logos();

		return $data;
	}

	private function get_primary_menu_page_ids(): array {
		$menu = wp_get_nav_menu_items( 2 ); // primary

		$filtered_menu = array_filter( $menu, function($item) { // keep only page nav menu item types
			return $item->object === 'page';
		} );

		$sliced_menu = array_slice( $filtered_menu, 0, 5 ); // keep only the first 5 items

		$page_ids = array_map( function($item) { // keep only ids
			return $item->object_id;
		}, $sliced_menu );

		return $page_ids;
	}

	private function get_init_pages( array $page_ids ) {
		return SCC_Controller_Helpers::get_pages_data( $page_ids );
	}

	private function get_logos() {
		return get_field('logos', 'option');
	}
}
