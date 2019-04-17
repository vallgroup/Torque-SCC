<?php

require_once( get_template_directory() . '/includes/acf/torque-acf-search-class.php' );

class SCC_ACF {

  public function __construct() {
    add_action('admin_init', array( $this, 'acf_admin_init'), 99);
    add_action('acf/init', array( $this, 'acf_init' ) );

    // hide acf in admin - client doesnt need to see this
    add_filter('acf/settings/show_admin', '__return_false');

    // add acf fields to wp search
    if ( class_exists( 'Torque_ACF_Search' ) ) {
      add_filter( Torque_ACF_Search::$ACF_SEARCHABLE_FIELDS_FILTER_HANDLE, array( $this, 'add_fields_to_search' ) );
    }
  }

  public function acf_admin_init() {
    // hide options page
    // remove_menu_page('acf-options');
  }

  public function add_fields_to_search( $fields ) {
    // $fields[] = 'custom_field_name';
    return $fields;
  }

  public function acf_init() {
    if( function_exists('acf_add_local_field_group') ):

      acf_add_local_field_group(array(
      	'key' => 'group_5cabb30247943',
      	'title' => 'Settings',
      	'fields' => array(
      		array(
      			'key' => 'field_5cabb315de99b',
      			'label' => 'Type',
      			'name' => 'type',
      			'type' => 'radio',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'choices' => array(
      				'single' => 'Single',
      				'tabbed' => 'Tabbed',
      				'map' => 'Map',
      			),
      			'allow_null' => 0,
      			'other_choice' => 0,
      			'default_value' => 'single',
      			'layout' => 'horizontal',
      			'return_format' => 'value',
      			'save_other_choice' => 0,
      		),
      		array(
      			'key' => 'field_5cabb3e1d9c98',
      			'label' => 'Colors',
      			'name' => 'colors',
      			'type' => 'group',
      			'instructions' => '',
      			'required' => 1,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'layout' => 'table',
      			'sub_fields' => array(
      				array(
      					'key' => 'field_5cabb40fd9c99',
      					'label' => 'Primary Color',
      					'name' => 'primary_color',
      					'type' => 'color_picker',
      					'instructions' => '',
      					'required' => 1,
      					'conditional_logic' => 0,
      					'wrapper' => array(
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'default_value' => '#df4c37',
      				),
      				array(
      					'key' => 'field_5cabb436d9c9a',
      					'label' => 'Secondary Color',
      					'name' => 'secondary_color',
      					'type' => 'color_picker',
      					'instructions' => '',
      					'required' => 0,
      					'conditional_logic' => 0,
      					'wrapper' => array(
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'default_value' => '#ae4351',
      				),
      			),
      		),
      		array(
      			'key' => 'field_5cabb49dd9c9b',
      			'label' => 'Icons',
      			'name' => 'icons',
      			'type' => 'group',
      			'instructions' => '',
      			'required' => 1,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'layout' => 'block',
      			'sub_fields' => array(
      				array(
      					'key' => 'field_5cabb4b9d9c9c',
      					'label' => 'Icon Empty',
      					'name' => 'icon_empty',
      					'type' => 'image',
      					'instructions' => 'An SVG icon with no fill, just stroke. Icon\'s color should be configurable via the stroke property.',
      					'required' => 1,
      					'conditional_logic' => 0,
      					'wrapper' => array(
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'return_format' => 'url',
      					'preview_size' => 'thumbnail',
      					'library' => 'all',
      					'min_width' => '',
      					'min_height' => '',
      					'min_size' => '',
      					'max_width' => '',
      					'max_height' => '',
      					'max_size' => '',
      					'mime_types' => 'svg',
      				),
      				array(
      					'key' => 'field_5cabb668d9c9d',
      					'label' => 'Icon Filled',
      					'name' => 'icon_filled',
      					'type' => 'image',
      					'instructions' => 'The same icon, but filled. Icon\'s color should be configurable via the fill property.',
      					'required' => 1,
      					'conditional_logic' => 0,
      					'wrapper' => array(
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'return_format' => 'url',
      					'preview_size' => 'thumbnail',
      					'library' => 'all',
      					'min_width' => '',
      					'min_height' => '',
      					'min_size' => '',
      					'max_width' => '',
      					'max_height' => '',
      					'max_size' => '',
      					'mime_types' => 'svg',
      				),
      			),
      		),
      		array(
      			'key' => 'field_5cabbabecba5a',
      			'label' => 'Content',
      			'name' => 'content',
      			'type' => 'wysiwyg',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => array(
      				array(
      					array(
      						'field' => 'field_5cabb315de99b',
      						'operator' => '==',
      						'value' => 'single',
      					),
      				),
      			),
      			'wrapper' => array(
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'default_value' => '',
      			'tabs' => 'all',
      			'toolbar' => 'full',
      			'media_upload' => 0,
      			'delay' => 0,
      		),
      		array(
      			'key' => 'field_5cabb8ed3ea82',
      			'label' => 'Images',
      			'name' => 'images',
      			'type' => 'repeater',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => array(
      				array(
      					array(
      						'field' => 'field_5cabb315de99b',
      						'operator' => '==',
      						'value' => 'single',
      					),
      				),
      			),
      			'wrapper' => array(
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'collapsed' => 'field_5cabb95e3ea83',
      			'min' => 0,
      			'max' => 0,
      			'layout' => 'table',
      			'button_label' => 'Add Image',
      			'sub_fields' => array(
      				array(
      					'key' => 'field_5cabb95e3ea83',
      					'label' => 'Image',
      					'name' => 'image',
      					'type' => 'image',
      					'instructions' => '',
      					'required' => 1,
      					'conditional_logic' => 0,
      					'wrapper' => array(
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'return_format' => 'array',
      					'preview_size' => 'thumbnail',
      					'library' => 'all',
      					'min_width' => '',
      					'min_height' => '',
      					'min_size' => '',
      					'max_width' => '',
      					'max_height' => '',
      					'max_size' => '',
      					'mime_types' => '',
      				),
      				array(
      					'key' => 'field_5cabb9753ea84',
      					'label' => 'Row Start',
      					'name' => 'row_start',
      					'type' => 'range',
      					'instructions' => '',
      					'required' => 1,
      					'conditional_logic' => 0,
      					'wrapper' => array(
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'default_value' => 0,
      					'min' => 0,
      					'max' => 1,
      					'step' => 1,
      					'prepend' => '',
      					'append' => '',
      				),
      				array(
      					'key' => 'field_5cabb9a53ea85',
      					'label' => 'Row End',
      					'name' => 'row_end',
      					'type' => 'range',
      					'instructions' => '',
      					'required' => 1,
      					'conditional_logic' => 0,
      					'wrapper' => array(
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'default_value' => 1,
      					'min' => 1,
      					'max' => 2,
      					'step' => 1,
      					'prepend' => '',
      					'append' => '',
      				),
      				array(
      					'key' => 'field_5cabb9dc3ea86',
      					'label' => 'Column Start',
      					'name' => 'column_start',
      					'type' => 'range',
      					'instructions' => '',
      					'required' => 1,
      					'conditional_logic' => 0,
      					'wrapper' => array(
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'default_value' => 0,
      					'min' => 0,
      					'max' => 10,
      					'step' => 2,
      					'prepend' => '',
      					'append' => '',
      				),
      				array(
      					'key' => 'field_5cabba0d3ea87',
      					'label' => 'Column End',
      					'name' => 'column_end',
      					'type' => 'range',
      					'instructions' => '',
      					'required' => 1,
      					'conditional_logic' => 0,
      					'wrapper' => array(
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'default_value' => 6,
      					'min' => 2,
      					'max' => 12,
      					'step' => 2,
      					'prepend' => '',
      					'append' => '',
      				),
      			),
      		),
      		array(
      			'key' => 'field_5cabb70ad9c9e',
      			'label' => 'Tabs',
      			'name' => 'tabs',
      			'type' => 'repeater',
      			'instructions' => '',
      			'required' => 1,
      			'conditional_logic' => array(
      				array(
      					array(
      						'field' => 'field_5cabb315de99b',
      						'operator' => '==',
      						'value' => 'tabbed',
      					),
      				),
      			),
      			'wrapper' => array(
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'collapsed' => 'field_5cabbb2dcba61',
      			'min' => 0,
      			'max' => 0,
      			'layout' => 'row',
      			'button_label' => 'Add Tab',
      			'sub_fields' => array(
      				array(
      					'key' => 'field_5cabbb2dcba61',
      					'label' => 'Heading',
      					'name' => 'heading',
      					'type' => 'text',
      					'instructions' => '',
      					'required' => 0,
      					'conditional_logic' => 0,
      					'wrapper' => array(
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'default_value' => '',
      					'placeholder' => '',
      					'prepend' => '',
      					'append' => '',
      					'maxlength' => '',
      				),
      				array(
      					'key' => 'field_5cabbb45cba62',
      					'label' => 'Content',
      					'name' => 'content',
      					'type' => 'wysiwyg',
      					'instructions' => '',
      					'required' => 0,
      					'conditional_logic' => 0,
      					'wrapper' => array(
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'default_value' => '',
      					'tabs' => 'all',
      					'toolbar' => 'full',
      					'media_upload' => 0,
      					'delay' => 0,
      				),
      				array(
      					'key' => 'field_5cabbaffcba5b',
      					'label' => 'Images',
      					'name' => 'images',
      					'type' => 'repeater',
      					'instructions' => '',
      					'required' => 0,
      					'conditional_logic' => 0,
      					'wrapper' => array(
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'collapsed' => 'field_5cabb95e3ea83',
      					'min' => 0,
      					'max' => 0,
      					'layout' => 'row',
      					'button_label' => 'Add Image',
      					'sub_fields' => array(
      						array(
      							'key' => 'field_5cabbaffcba5c',
      							'label' => 'Image',
      							'name' => 'image',
      							'type' => 'image',
      							'instructions' => '',
      							'required' => 1,
      							'conditional_logic' => 0,
      							'wrapper' => array(
      								'width' => '',
      								'class' => '',
      								'id' => '',
      							),
      							'return_format' => 'array',
      							'preview_size' => 'thumbnail',
      							'library' => 'all',
      							'min_width' => '',
      							'min_height' => '',
      							'min_size' => '',
      							'max_width' => '',
      							'max_height' => '',
      							'max_size' => '',
      							'mime_types' => '',
      						),
      						array(
      							'key' => 'field_5cabbaffcba5d',
      							'label' => 'Row Start',
      							'name' => 'row_start',
      							'type' => 'range',
      							'instructions' => '',
      							'required' => 1,
      							'conditional_logic' => 0,
      							'wrapper' => array(
      								'width' => '',
      								'class' => '',
      								'id' => '',
      							),
      							'default_value' => 0,
      							'min' => 0,
      							'max' => 1,
      							'step' => 1,
      							'prepend' => '',
      							'append' => '',
      						),
      						array(
      							'key' => 'field_5cabbaffcba5e',
      							'label' => 'Row End',
      							'name' => 'row_end',
      							'type' => 'range',
      							'instructions' => '',
      							'required' => 1,
      							'conditional_logic' => 0,
      							'wrapper' => array(
      								'width' => '',
      								'class' => '',
      								'id' => '',
      							),
      							'default_value' => 1,
      							'min' => 1,
      							'max' => 2,
      							'step' => 1,
      							'prepend' => '',
      							'append' => '',
      						),
      						array(
      							'key' => 'field_5cabbaffcba5f',
      							'label' => 'Column Start',
      							'name' => 'column_start',
      							'type' => 'range',
      							'instructions' => '',
      							'required' => 1,
      							'conditional_logic' => 0,
      							'wrapper' => array(
      								'width' => '',
      								'class' => '',
      								'id' => '',
      							),
      							'default_value' => 0,
      							'min' => 0,
      							'max' => 10,
      							'step' => 2,
      							'prepend' => '',
      							'append' => '',
      						),
      						array(
      							'key' => 'field_5cabbaffcba60',
      							'label' => 'Column End',
      							'name' => 'column_end',
      							'type' => 'range',
      							'instructions' => '',
      							'required' => 1,
      							'conditional_logic' => 0,
      							'wrapper' => array(
      								'width' => '',
      								'class' => '',
      								'id' => '',
      							),
      							'default_value' => 6,
      							'min' => 2,
      							'max' => 12,
      							'step' => 2,
      							'prepend' => '',
      							'append' => '',
      						),
      					),
      				),
      			),
      		),
      	),
      	'location' => array(
      		array(
      			array(
      				'param' => 'post_type',
      				'operator' => '==',
      				'value' => 'page',
      			),
      		),
      	),
      	'menu_order' => 0,
      	'position' => 'normal',
      	'style' => 'default',
      	'label_placement' => 'top',
      	'instruction_placement' => 'label',
      	'hide_on_screen' => '',
      	'active' => 1,
      	'description' => '',
      ));

      acf_add_local_field_group(array(
      	'key' => 'group_5cabce70899c0',
      	'title' => 'Options',
      	'fields' => array(
      		array(
      			'key' => 'field_5cabce820f01a',
      			'label' => 'Logos',
      			'name' => 'logos',
      			'type' => 'group',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'layout' => 'table',
      			'sub_fields' => array(
      				array(
      					'key' => 'field_5cabcea60f01b',
      					'label' => 'GlenStar Logos',
      					'name' => 'glenstar_logos',
      					'type' => 'group',
      					'instructions' => '',
      					'required' => 0,
      					'conditional_logic' => 0,
      					'wrapper' => array(
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'layout' => 'block',
      					'sub_fields' => array(
      						array(
      							'key' => 'field_5cabceb70f01c',
      							'label' => 'Icon',
      							'name' => 'icon',
      							'type' => 'image',
      							'instructions' => '',
      							'required' => 1,
      							'conditional_logic' => 0,
      							'wrapper' => array(
      								'width' => '',
      								'class' => '',
      								'id' => '',
      							),
      							'return_format' => 'url',
      							'preview_size' => 'thumbnail',
      							'library' => 'all',
      							'min_width' => '',
      							'min_height' => '',
      							'min_size' => '',
      							'max_width' => '',
      							'max_height' => '',
      							'max_size' => '',
      							'mime_types' => '',
      						),
      						array(
      							'key' => 'field_5cabcece0f01d',
      							'label' => 'Text Logo',
      							'name' => 'text_logo',
      							'type' => 'image',
      							'instructions' => '',
      							'required' => 1,
      							'conditional_logic' => 0,
      							'wrapper' => array(
      								'width' => '',
      								'class' => '',
      								'id' => '',
      							),
      							'return_format' => 'url',
      							'preview_size' => 'thumbnail',
      							'library' => 'all',
      							'min_width' => '',
      							'min_height' => '',
      							'min_size' => '',
      							'max_width' => '',
      							'max_height' => '',
      							'max_size' => '',
      							'mime_types' => '',
      						),
      					),
      				),
      				array(
      					'key' => 'field_5cabcef90f01e',
      					'label' => 'Certifications',
      					'name' => 'certifications',
      					'type' => 'repeater',
      					'instructions' => '',
      					'required' => 0,
      					'conditional_logic' => 0,
      					'wrapper' => array(
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'collapsed' => '',
      					'min' => 0,
      					'max' => 0,
      					'layout' => 'table',
      					'button_label' => '',
      					'sub_fields' => array(
      						array(
      							'key' => 'field_5cabcf2d0f01f',
      							'label' => 'Logo',
      							'name' => 'logo',
      							'type' => 'image',
      							'instructions' => '',
      							'required' => 1,
      							'conditional_logic' => 0,
      							'wrapper' => array(
      								'width' => '',
      								'class' => '',
      								'id' => '',
      							),
      							'return_format' => 'url',
      							'preview_size' => 'thumbnail',
      							'library' => 'all',
      							'min_width' => '',
      							'min_height' => '',
      							'min_size' => '',
      							'max_width' => '',
      							'max_height' => '',
      							'max_size' => '',
      							'mime_types' => '',
      						),
      					),
      				),
      			),
      		),
          array(
      			'key' => 'field_5caf6a988f1fe',
      			'label' => 'Screensaver Slideshow',
      			'name' => 'screensaver_slideshow',
      			'type' => 'repeater',
      			'instructions' => '',
      			'required' => 0,
      			'conditional_logic' => 0,
      			'wrapper' => array(
      				'width' => '',
      				'class' => '',
      				'id' => '',
      			),
      			'collapsed' => 'field_5caf6ab38f1ff',
      			'min' => 0,
      			'max' => 0,
      			'layout' => 'table',
      			'button_label' => 'Add Image',
      			'sub_fields' => array(
      				array(
      					'key' => 'field_5caf6ab38f1ff',
      					'label' => 'Image',
      					'name' => 'image',
      					'type' => 'image',
      					'instructions' => '',
      					'required' => 1,
      					'conditional_logic' => 0,
      					'wrapper' => array(
      						'width' => '',
      						'class' => '',
      						'id' => '',
      					),
      					'return_format' => 'url',
      					'preview_size' => 'thumbnail',
      					'library' => 'all',
      					'min_width' => '',
      					'min_height' => '',
      					'min_size' => '',
      					'max_width' => '',
      					'max_height' => '',
      					'max_size' => '',
      					'mime_types' => '',
      				),
      			),
      		),
      	),
      	'location' => array(
      		array(
      			array(
      				'param' => 'options_page',
      				'operator' => '==',
      				'value' => 'acf-options',
      			),
      		),
      	),
      	'menu_order' => 0,
      	'position' => 'normal',
      	'style' => 'default',
      	'label_placement' => 'top',
      	'instruction_placement' => 'label',
      	'hide_on_screen' => '',
      	'active' => 1,
      	'description' => '',
      ));


      endif;
  }
}

?>
