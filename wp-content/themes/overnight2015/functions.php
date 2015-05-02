<?php


/**
 * Registers a new settings field on the 'General Settings' page of the WordPress dashboard.
 */
function ovn_initialize_theme_options() {

	// Define the settings field
	add_settings_field( 
		'facebook_url', 					// The ID (or the name) of the field
		'Facebook URL', 					// The text used to label the field
		'ovn_facebook_url_display', 		// The callback function used to render the field
		'general'							// The section to which we're adding the setting
	);
	
	// Register the 'footer_message' setting with the 'General' section
	register_setting(
		'general',
		'facebook_url'
	);
	
} // end ovn_facebook_url_display
add_action( 'admin_init', 'ovn_initialize_theme_options' );

/**
 * Renders the input field for the 'Footer Message' setting in the 'General Settings' section.
 */
function ovn_facebook_url_display() {
	echo '<input type="text" name="facebook_url" id="facebook_url" value="' . get_option( 'facebook_url' ) . '" />';
} // end demo_footer_message_display










/**
 * Registers and enqueues the `theme-customizer.js` file responsible
 * for handling the transport messages for the Theme Customizer.
 *
 * @package tctheme
 * @since   1.0.0
 */
function tctheme_customizer_live_preview() {
	
	wp_enqueue_script(
	    'tctheme-theme-customizer',
	    get_template_directory_uri() . '/js/theme-customizer.js',
	    array( 'jquery', 'customize-preview' ),
	    '1.0.0',
	    true
	);
	
}
add_action( 'customize_preview_init', 'tctheme_customizer_live_preview' );

/**
 * Writes out the CSS as defined by the values in the Theme Customizer
 * to the `head` element of the header template.
 *
 * @package tctheme
 * @since   1.0.0
 */
function tctheme_customizer_css() {
	?>
	<style type="text/css">
		a { 
			color: <?php echo get_theme_mod( 'tctheme_link_color' ); ?>
		}
		
		<?php if ( false === get_theme_mod( 'tctheme_display_header' ) ) { ?>
			#header {
				display: none;
			}
		<?php } ?>
		
		<?php if ( '' != get_theme_mod( 'tctheme_background_image' ) ) { ?>
			body {
				background-image: url( <?php echo get_theme_mod( 'tctheme_background_image' ) ?> );
			}
		<?php } ?>
		
	</style>
	<?php
}
add_action( 'wp_head', 'tctheme_customizer_css' );

/**
 * Defines all of the sections, settings, and controls for the various
 * options introduced into the Theme Customizer
 *
 * @param   object    $wp_customizer    A reference to the Theme Customizer
 * @package tctheme
 * @since   1.0.0
 */
function tctheme_register_theme_customizer( $wp_customizer ) {

	/* Display Options
	 *------------------------------------------*/

	$wp_customizer->add_section(
		'tctheme_display_options',
		array(
			'title'    => 'Display Options',
			'priority' => 200
		)
	);
	
	$wp_customizer->add_setting(
		'tctheme_link_color',
		array(
			'default'    =>  '#000000',
	        'transport'  =>  'postMessage'
		)
	);
	
	$wp_customizer->add_control(
		new WP_Customize_Color_Control(
			$wp_customizer,
			'tctheme_link_color',
			array(
				'label'    => 'Link Color',
				'section'  => 'tctheme_display_options',
				'settings' => 'tctheme_link_color'
			)
		)
	);
	
	$wp_customizer->add_setting(
		'tctheme_display_header',
		array(
			'default'    => 'true',
			'transport'  => 'postMessage'
		)
	);
	
	$wp_customizer->add_control(
		'tctheme_display_header',
		array(
			'section'    => 'tctheme_display_options',
			'label'      => 'Display Header?',
			'type'       => 'checkbox'
		)
	);
	
	
	$wp_customizer->add_setting(
		'tctheme_background_image',
		array(
			'default'    =>  '',
	        'transport'  =>  'postMessage'
		)
	);
	
	$wp_customizer->add_control(
		new WP_Customize_Image_Control(
			$wp_customizer,
			'tctheme_background_image',
			array(
				'label'    => 'Background Image',
				'section'  => 'tctheme_display_options',
				'settings' => 'tctheme_background_image'
			)
		)
	);
	
	$wp_customizer->add_setting(
		'tctheme_demo_file',
		array(
			'default'    =>  '',
	        'transport'  =>  'postMessage'
		)
	);
	
	$wp_customizer->add_control(
		new WP_Customize_Upload_Control(
			$wp_customizer,
			'tctheme_demo_file',
			array(
				'label'    => 'Sample File',
				'section'  => 'tctheme_display_options',
				'settings' => 'tctheme_demo_file'
			)
		)
	);
	
	/* Footer Options
	 *------------------------------------------*/
	
	$wp_customizer->add_section(
		'tctheme_footer_options',
		array(
			'title'    => 'Footer Options',
			'priority' => 201
		)
	);
	
	
	$wp_customizer->add_setting(
		'tctheme_footer_message',
		array(
			'default'    => 'Copyright 2013 All Rights Reserved',
			'transport'  => 'postMessage'
		)
	);
	
	$wp_customizer->add_control(
		'tctheme_footer_message',
		array(
			'section'    => 'tctheme_footer_options',
			'label'      => 'Footer Content',
			'type'       => 'text'
		)
	);
	
	$wp_customizer->add_setting(
		'tctheme_display_footer_title',
		array(
			'default'    => 'always',
			'transport'  => 'postMessage'
		)
	);
	
	$wp_customizer->add_control(
		'tctheme_display_footer_title',
		array(
			'section'    => 'tctheme_footer_options',
			'label'      => 'Display Blog Title',
			'type'       => 'select',
			'choices'    => array(
			    'always'     => 'Always',
			    'never'      => 'Never'
			)
		)
	);

}
add_action( 'customize_register', 'tctheme_register_theme_customizer' );