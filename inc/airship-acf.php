<?php
// Load only limited functionality
define( 'ACF_LITE' , true );

// Load the ACF Core
include_once( get_template_directory() . '/plugins/advanced-custom-fields/acf.php' );

// Repeater Add-On
include_once( get_template_directory() . '/plugins/acf-repeater/acf-repeater.php');

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_button',
		'title' => 'Button',
		'fields' => array (
			array (
				'key' => 'field_53bd4e347036a',
				'label' => 'Button Link',
				'name' => 'button_link',
				'type' => 'page_link',
				'post_type' => array (
					0 => 'post',
					1 => 'page',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'gallery',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_carousel',
		'title' => 'Carousel',
		'fields' => array (
			array (
				'key' => 'field_526472c9bd224',
				'label' => 'Images',
				'name' => 'project_images',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_5264733dfaf4f',
						'label' => 'Project Image',
						'name' => 'project_image',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'full',
						'library' => 'all',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Slide',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_format',
					'operator' => '==',
					'value' => 'gallery',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_introduction',
		'title' => 'Introduction',
		'fields' => array (
			array (
				'key' => 'field_53b2e017e5369',
				'label' => 'Introduction Title',
				'name' => 'introduction_title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53be0c5d0ba00',
				'label' => 'Introduction Paragraph',
				'name' => 'introduction_paragraph',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-home.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 1,
	));
	register_field_group(array (
		'id' => 'acf_column-one',
		'title' => 'Column One',
		'fields' => array (
			array (
				'key' => 'field_53b2d8ce89c4b',
				'label' => 'Title',
				'name' => 'column_one_title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53b2d8ce8fe48',
				'label' => 'Paragraph',
				'name' => 'column_one_copy',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_53b2d8ce8ebe7',
				'label' => 'Image',
				'name' => 'column_one_image',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'full',
				'library' => 'all',
			),
			array (
				'key' => 'field_53be0ca262d8d',
				'label' => 'Link',
				'name' => 'column_one_link',
				'type' => 'page_link',
				'post_type' => array (
					0 => 'post',
					1 => 'page',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-home.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 2,
	));
	register_field_group(array (
		'id' => 'acf_column-two',
		'title' => 'Column Two',
		'fields' => array (
			array (
				'key' => 'field_53b2d8f96230e',
				'label' => 'Title',
				'name' => 'column_two_title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53b2d8f968ac1',
				'label' => 'Paragraph',
				'name' => 'column_two_copy',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_53b2d8f967502',
				'label' => 'Image',
				'name' => 'column_two_image',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'full',
				'library' => 'all',
			),
			array (
				'key' => 'field_53be0cc79a1d7',
				'label' => 'Link',
				'name' => 'column_two_link',
				'type' => 'page_link',
				'post_type' => array (
					0 => 'post',
					1 => 'page',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-home.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 3,
	));
	register_field_group(array (
		'id' => 'acf_column-three',
		'title' => 'Column Three',
		'fields' => array (
			array (
				'key' => 'field_53b2d958ada94',
				'label' => 'Title',
				'name' => 'column_three_title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53b2d958b16e6',
				'label' => 'Paragraph',
				'name' => 'column_three_copy',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_53b2d958b01fe',
				'label' => 'Image',
				'name' => 'column_three_image',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'full',
				'library' => 'all',
			),
			array (
				'key' => 'field_53be0cf3c94aa',
				'label' => 'Link',
				'name' => 'column_three_link',
				'type' => 'page_link',
				'post_type' => array (
					0 => 'post',
					1 => 'page',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-home.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 4,
	));
	register_field_group(array (
		'id' => 'acf_testimonial',
		'title' => 'Testimonial',
		'fields' => array (
			array (
				'key' => 'field_53b2dc3b3a8ef',
				'label' => 'Testimonial Title',
				'name' => 'testimonial_title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_53be0d21265b5',
				'label' => 'Testimonial Quote',
				'name' => 'testimonial_quote',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_53b2dc593a8f1',
				'label' => 'Testimonial Author',
				'name' => 'testimonial_author',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-home.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'contact.php',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-portfolio-two.php',
					'order_no' => 0,
					'group_no' => 2,
				),
			),
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-portfolio-three.php',
					'order_no' => 0,
					'group_no' => 3,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 5,
	));
}
?>