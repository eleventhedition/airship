<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {
	$options[] = array(
		'name' => __('Icons', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Favicon', 'options_check'),
		'desc' => __('This needs to be a 16x16 .ico file', 'options_check'),
		'id' => 'favicon',
		'type' => 'upload');

	$options[] = array(
		'name' => __('57x57 Apple Touch Icon', 'options_check'),
		'desc' => __('This should be a 57x57 PNG file', 'options_check'),
		'id' => 'icon1',
		'type' => 'upload');

	$options[] = array(
		'name' => __('72x72 Apple Touch Icon', 'options_check'),
		'desc' => __('This should be a 72x72 PNG file', 'options_check'),
		'id' => 'icon2',
		'type' => 'upload');

	$options[] = array(
		'name' => __('114x114 Apple Touch Icon', 'options_check'),
		'desc' => __('This should be a 114x114 PNG file', 'options_check'),
		'id' => 'icon3',
		'type' => 'upload');

	$options[] = array( 'name' => 'Typography and Colors',
		'type' => 'heading');
	
	$typography_mixed_fonts = array_merge( options_typography_get_os_fonts() , options_typography_get_google_fonts() );
	asort($typography_mixed_fonts);

	$options[] = array( 'name' => 'Body Font',
		'desc' => '',
		'id' => 'body_font',
		'std' => array( 'size' => '16px', 'face' => 'montserratregular, sans-serif', 'color' => '#878787'),
		'type' => 'typography',
		'options' => array(
			'faces' => $typography_mixed_fonts,
			'styles' => false )
		);

	$options[] = array( 'name' => 'Heading Font',
		'desc' => '',
		'id' => 'header_font',
		'std' => array( 'size' => '26px', 'face' => 'montserratregular, sans-serif', 'color' => '#383838'),
		'type' => 'typography',
		'options' => array(
			'faces' => $typography_mixed_fonts,
			'styles' => false )
		);

	$options[] = array( 'name' => 'Menu Font',
		'desc' => '',
		'id' => 'menu_font',
		'std' => array( 'size' => '17px', 'face' => 'montserratregular, sans-serif', 'color' => '#646464'),
		'type' => 'typography',
		'options' => array(
			'faces' => $typography_mixed_fonts,
			'styles' => false )
		);
		
	$options[] = array( 'name' => 'Introduction Paragraph Font',
		'desc' => '',
		'id' => 'large_font',
		'std' => array( 'size' => '18px', 'face' => 'montserratregular, sans-serif', 'color' => '#878787'),
		'type' => 'typography',
		'options' => array(
			'faces' => $typography_mixed_fonts,
			'styles' => false )
		);

	$options[] = array( 'name' => 'Testimonial Quote',
		'desc' => '',
		'id' => 'testimonial_quote',
		'std' => array( 'size' => '20px', 'face' => 'montserratregular, sans-serif', 'color' => '#878787'),
		'type' => 'typography',
		'options' => array(
			'faces' => $typography_mixed_fonts,
			'styles' => false )
		);

	$options[] = array( 'name' => 'Testimonial Author',
		'desc' => '',
		'id' => 'testimonial_author',
		'std' => array( 'size' => '18px', 'face' => 'montserratregular, sans-serif', 'color' => '#4083b5'),
		'type' => 'typography',
		'options' => array(
			'faces' => $typography_mixed_fonts,
			'styles' => false )
		);
	
	$options[] = array( 'name' => 'Link color',
		"desc" => "Select the color for links.",
		"id" => "link_color",
		"std" => "#646464",
		"type" => "color" );
		
	$options[] = array( 'name' => 'Link hover color',
		"desc" => 'Select the hover color for links.',
		"id" => "link_hover_color",
		"std" => "#4083b5",
		"type" => "color" );
		
	$options[] = array( 'name' => 'Disable Styles',
		'desc' => 'Disable option styles and use theme defaults.',
		'id' => 'disable_styles',
		'std' => true,
		'type' => 'checkbox' );

	$options[] = array( 'name' => 'Social',
		'type' => 'heading');

	$options[] = array(
		'name' => __('Facebook Link', 'options_framework_theme'),
		'id' => 'facebook',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Twitter Link', 'options_framework_theme'),
		'id' => 'twitter',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Google Plus Link', 'options_framework_theme'),
		'id' => 'gp',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Instagram Link', 'options_framework_theme'),
		'id' => 'instagram',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('YouTube Link', 'options_framework_theme'),
		'id' => 'youtube',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Twitter Username', 'options_framework_theme'),
		'desc' => 'Enter your twitter username here.',
		'id' => 'tweets',
		'std' => '',
		'type' => 'text');

	$options[] = array( 'name' => 'Posts',
		'type' => 'heading');

	$options[] = array( 'name' => 'Disable Contact Button on Posts',
		'desc' => 'Check box to disable the contact button which appears on posts.',
		'id' => 'contact_button',
		'std' => false,
		'type' => 'checkbox' );

	$options[] = array( 'name' => 'Comments',
		'type' => 'heading');

	$options[] = array( 'name' => 'Disable Comments',
		'desc' => 'Check box to disable comments.',
		'id' => 'comment_area',
		'std' => false,
		'type' => 'checkbox' );

	$options[] = array( 'name' => 'Testimonials',
		'type' => 'heading');

	$options[] = array( 'name' => 'Disable Testimonials',
		'desc' => 'Check box to disable the testimonials section.',
		'id' => 'testimonials',
		'std' => false,
		'type' => 'checkbox' );

	$options[] = array( 'name' => 'Analytics',
		'type' => 'heading');

	$options[] = array(
		'name' => __('Analytics Code', 'options_framework_theme'),
		'desc' => __('Insert your analytics code here', 'options_framework_theme'),
		'id' => 'analytics',
		'type' => 'textarea');

	$options[] = array( 'name' => 'Custom CSS',
		'type' => 'heading');

	$options[] = array(
		'name' => __('Enter your custom CSS styles here', 'options_framework_theme'),
		'id' => 'css',
		'type' => 'textarea');

	$options[] = array( 'name' => 'Contact Form',
		'type' => 'heading');

	$options[] = array(
		'name' => __('Disable Contact Form', 'options_framework_theme'),
		'desc' => 'Check box to disable the built in contact form.',
		'id' => 'contact_form',
		'std' => false,
		'type' => 'checkbox' );

	$options[] = array( 'name' => 'Footer',
		'type' => 'heading');

	$options[] = array(
		'name' => __('Site Name', 'options_framework_theme'),
		'desc' => __('Site name will appear in the footer.', 'options_framework_theme'),
		'id' => 'copyright',
		'std' => 'Airship',
		'type' => 'text');

	$options[] = array( 'name' => 'Powered By Wordpress Link',
		'desc' => 'Disable Wordpress Link.',
		'id' => 'by_wordpress',
		'std' => true,
		'type' => 'checkbox' );
	
	return $options;
}