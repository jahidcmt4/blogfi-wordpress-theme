<?php
/**
 * blogfi Theme Customizer
 *
 * @package Blogfi
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blogfi_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'blogfi_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'blogfi_customize_partial_blogdescription',
			)
		);
	}

	// Global Option
	$wp_customize->add_panel( 'blogfi_global_options', 
	    array(
	        'priority'       => 50,
	        'title'            => __( 'Global Options', 'blogfi' ),
	        'description'      => __( 'Global Modifications like social Profile and Contact info', 'blogfi' ),
	    ) 
	);

	// Top Header
	$wp_customize->add_section( 'blogfi_top_header_options', 
	    array(
	        'title'         => __( 'Top Header', 'blogfi' ),
	        'priority'      => 1,
	        'panel'         => 'blogfi_global_options'
	    ) 
	);
	// Setting for Top Header
	$wp_customize->add_setting( 'blogfi_top_head_field',
	    array(
	        'sanitize_callback' => 'sanitize_text_field',
	        'transport'         => 'refresh',
	    )
	);

	$wp_customize->add_control( 'blogfi_top_head_field', 
	    array(
	        'type'        => 'checkbox',
	        'priority'    => 10,
	        'section'     => 'blogfi_top_header_options',
	        'label'       => 'Are you want to remove top Header?',
	    )
	);


	// Contact Option
	$wp_customize->add_section( 'blogfi_contact_options', 
	    array(
	        'title'         => __( 'Contact Option', 'blogfi' ),
	        'priority'      => 2,
	        'panel'         => 'blogfi_global_options'
	    ) 
	);
	// Setting for Contact info
	$wp_customize->add_setting( 'blogfi_phone_field',
	    array(
        	'default'           => __( '+2808272282', 'blogfi' ),
	        'sanitize_callback' => 'sanitize_text_field',
	        'transport'         => 'refresh',
	    )
	);
	
	$wp_customize->add_setting( 'blogfi_email_field',
	    array(
        	'default'           => __( 'info@yourmail.com', 'blogfi' ),
	        'sanitize_callback' => 'sanitize_email',
	        'transport'         => 'refresh',
	    )
	);
	
	// Control for Contact info

	$wp_customize->add_control( 'blogfi_phone_field', 
	    array(
	        'type'        => 'text',
	        'priority'    => 10,
	        'section'     => 'blogfi_contact_options',
	        'label'       => 'Phone Number',
	    )
	);
	$wp_customize->add_control( 'blogfi_email_field', 
	    array(
	        'type'        => 'text',
	        'priority'    => 20,
	        'section'     => 'blogfi_contact_options',
	        'label'       => 'Email Address',
	    )
	);


	// Social Profile Option
	$wp_customize->add_section( 'blogfi_social_options', 
	    array(
	        'title'         => __( 'Social Profile', 'blogfi' ),
	        'priority'      => 3,
	        'panel'         => 'blogfi_global_options'
	    ) 
	);

	// Setting for Social Profile
	$wp_customize->add_setting( 'blogfi_facebook_field',
	    array(
        	'default'           => __( 'https://www.facebook.com/', 'blogfi' ),
	        'sanitize_callback' => 'sanitize_url',
	        'transport'         => 'refresh',
	    )
	);
	$wp_customize->add_setting( 'blogfi_twitter_field',
	    array(
        	'default'           => __( 'https://www.twitter.com/', 'blogfi' ),
	        'sanitize_callback' => 'sanitize_url',
	        'transport'         => 'refresh',
	    )
	);
	$wp_customize->add_setting( 'blogfi_youtube_field',
	    array(
        	'default'           => __( 'https://www.youtube.com/', 'blogfi' ),
	        'sanitize_callback' => 'sanitize_url',
	        'transport'         => 'refresh',
	    )
	);
	// Control for Social Profile
	$wp_customize->add_control( 'blogfi_facebook_field', 
	    array(
	        'type'        => 'text',
	        'priority'    => 10,
	        'section'     => 'blogfi_social_options',
	        'label'       => 'Facebook Profile',
	    )
	);
	$wp_customize->add_control( 'blogfi_twitter_field', 
	    array(
	        'type'        => 'text',
	        'priority'    => 20,
	        'section'     => 'blogfi_social_options',
	        'label'       => 'Twitter Profile',
	    )
	);
	$wp_customize->add_control( 'blogfi_youtube_field', 
	    array(
	        'type'        => 'text',
	        'priority'    => 30,
	        'section'     => 'blogfi_social_options',
	        'label'       => 'Youtube Profile',
	    )
	);

}
add_action( 'customize_register', 'blogfi_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blogfi_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blogfi_customize_partial_blogdescription() {
	bloginfo( 'description' );
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blogfi_customize_preview_js() {
	wp_enqueue_script( 'blogfi-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), BLOGFI_VERSION, true );
}
add_action( 'customize_preview_init', 'blogfi_customize_preview_js' );
