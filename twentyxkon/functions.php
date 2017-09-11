<?php

define( 'TWENTYXKON_VERSION', '1.0.0' );

/*-----------------------------------------------------------------------------------*/
/* Styles & Scripts
/*-----------------------------------------------------------------------------------*/
function twenty_xkon_enqueue_styles() {

	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'parent-style' ),
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_style( 'dashicons' );

	$tx_min_fa_css = ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? '/font-awesome/css/font-awesome.css' : '/font-awesome/css/font-awesome.min.css';
	wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . $tx_min_fa_css );

	$tx_min_sb_css = ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? '/css/swipebox.css' : '/css/swipebox.min.css';
	wp_enqueue_style( 'swipebox', get_stylesheet_directory_uri() . $tx_min_sb_css, array(), TWENTYXKON_VERSION );

	$tx_min_sb_js = ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? '/js/jquery.swipebox.js' : '/js/jquery.swipebox.min.js';
	wp_enqueue_script( 'twentyxkon-swipebox', get_stylesheet_directory_uri() . $tx_min_sb_js, array( 'jquery' ), TWENTYXKON_VERSION, true );

	wp_enqueue_script( 'fitvids', get_stylesheet_directory_uri() . '/js/fitvids.js', array( 'jquery' ), TWENTYXKON_VERSION, true );

	wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/scripts.js', array( 'jquery' ), TWENTYXKON_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'twenty_xkon_enqueue_styles' );

/*-----------------------------------------------------------------------------------*/
/* Change link on galleries to IMG instead of media page
/*-----------------------------------------------------------------------------------*/

add_filter( 'shortcode_atts_gallery',
	function( $out ) {
		$out['link'] = 'file';
		return $out;
	}
);

/*-----------------------------------------------------------------------------------*/
/* Theme customizer options
/*-----------------------------------------------------------------------------------*/
function twentyxkon_customize( $wp_customize )
{

	//	Social Media Options

	$wp_customize->add_section(
		'twentyxkon_social_media',
		array(
			'title' => __( 'Contact Details', 'twentyxkon' ),
			'priority' => 100,
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_setting( 'twentyxkon_sm_show_details',
		array(
			'default' => 'no',
			'sanitize_callback' => 'twentyxkon_sanitize_customizer_select',
		)
	);

	$wp_customize->add_control(
		'twentyxkon_sm_show_details', array(
			'label' => __( 'Show Details', 'twentyxkon' ),
			'section' => 'twentyxkon_social_media',
			'settings' => 'twentyxkon_sm_show_details',
			'type' => 'select',
			'choices' => array(
				'yes' => __( 'Yes', 'twentyxkon' ),
				'no' => __( 'No', 'twentyxkon' ),
			),
		)
	);

	$wp_customize->add_setting( 'twentyxkon_sm_birthdate',
		array(
			'default' => '',
			'sanitize_callback' => 'twentyxkon_sanitize_customizer_text',
		)
	);

	$wp_customize->add_control(
		'twentyxkon_sm_birthdate', array(
			'label' => __( 'Birthdate', 'twentyxkon' ),
			'section' => 'twentyxkon_social_media',
			'settings' => 'twentyxkon_sm_birthdate',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting( 'twentyxkon_sm_address',
		array(
			'default' => '',
			'sanitize_callback' => 'twentyxkon_sanitize_customizer_text',
		)
	);

	$wp_customize->add_control(
		'twentyxkon_sm_address', array(
			'label' => __( 'Address', 'twentyxkon' ),
			'section' => 'twentyxkon_social_media',
			'settings' => 'twentyxkon_sm_address',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting( 'twentyxkon_sm_cemail',
		array(
			'default' => '',
			'sanitize_callback' => 'twentyxkon_sanitize_customizer_email',
		)
	);

	$wp_customize->add_control(
		'twentyxkon_sm_cemail', array(
			'label' => __( 'Email', 'twentyxkon' ),
			'section' => 'twentyxkon_social_media',
			'settings' => 'twentyxkon_sm_cemail',
			'type' => 'email',
		)
	);

	$wp_customize->add_setting( 'twentyxkon_sm_cphone',
		array(
			'default' => '',
			'sanitize_callback' => 'twentyxkon_sanitize_customizer_text',
		)
	);

	$wp_customize->add_control(
		'twentyxkon_sm_cphone', array(
			'label' => __( 'Phone', 'twentyxkon' ),
			'section' => 'twentyxkon_social_media',
			'settings' => 'twentyxkon_sm_cphone',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting( 'twentyxkon_sm_cskype',
		array(
			'default' => '',
			'sanitize_callback' => 'twentyxkon_sanitize_customizer_text',
		)
	);

	$wp_customize->add_control(
		'twentyxkon_sm_cskype', array(
			'label' => __( 'Skype', 'twentyxkon' ),
			'section' => 'twentyxkon_social_media',
			'settings' => 'twentyxkon_sm_cskype',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting( 'twentyxkon_sm_show_sicons',
		array(
			'default' => 'no',
			'sanitize_callback' => 'twentyxkon_sanitize_customizer_select',
		)
	);

	$wp_customize->add_control(
		'twentyxkon_sm_show_sicons', array(
			'label' => __( 'Show Social Icons', 'twentyxkon' ),
			'section' => 'twentyxkon_social_media',
			'settings' => 'twentyxkon_sm_show_sicons',
			'type' => 'select',
			'choices' => array(
				'yes' => __( 'Yes', 'twentyxkon' ),
				'no' => __( 'No', 'twentyxkon' ),
			),
		)
	);

	$wp_customize->add_setting( 'twentyxkon_sm_wp',
		array(
			'default' => '',
			'sanitize_callback' => 'twentyxkon_sanitize_customizer_url',
		)
	);

	$wp_customize->add_control(
		'twentyxkon_sm_wp', array(
			'label' => __( 'WordPress Link', 'twentyxkon' ),
			'section' => 'twentyxkon_social_media',
			'settings' => 'twentyxkon_sm_wp',
			'type' => 'url',
		)
	);

	$wp_customize->add_setting( 'twentyxkon_sm_git',
		array(
			'default' => '',
			'sanitize_callback' => 'twentyxkon_sanitize_customizer_url',
		)
	);

	$wp_customize->add_control(
		'twentyxkon_sm_git', array(
			'label' => __( 'GitHub Link', 'twentyxkon' ),
			'section' => 'twentyxkon_social_media',
			'settings' => 'twentyxkon_sm_git',
			'type' => 'url',
		)
	);

	$wp_customize->add_setting( 'twentyxkon_sm_in',
		array(
			'default' => '',
			'sanitize_callback' => 'twentyxkon_sanitize_customizer_url',
		)
	);

	$wp_customize->add_control(
		'twentyxkon_sm_in', array(
			'label' => __( 'LinkedIn Link', 'twentyxkon' ),
			'section' => 'twentyxkon_social_media',
			'settings' => 'twentyxkon_sm_in',
			'type' => 'url',
		)
	);

	$wp_customize->add_setting( 'twentyxkon_sm_da',
		array(
			'default' => '',
			'sanitize_callback' => 'twentyxkon_sanitize_customizer_url',
		)
	);

	$wp_customize->add_control(
		'twentyxkon_sm_da', array(
			'label' => __( 'DeviantArt Link', 'twentyxkon' ),
			'section' => 'twentyxkon_social_media',
			'settings' => 'twentyxkon_sm_da',
			'type' => 'url',
		)
	);

	$wp_customize->add_setting( 'twentyxkon_sm_fb',
		array(
			'default' => '',
			'sanitize_callback' => 'twentyxkon_sanitize_customizer_url',
		)
	);

	$wp_customize->add_control(
		'twentyxkon_sm_fb', array(
			'label' => __( 'Facebook Link', 'twentyxkon' ),
			'section' => 'twentyxkon_social_media',
			'settings' => 'twentyxkon_sm_fb',
			'type' => 'url',
		)
	);

	$wp_customize->add_setting( 'twentyxkon_sm_tt',
		array(
			'default' => '',
			'sanitize_callback' => 'twentyxkon_sanitize_customizer_url',
		)
	);

	$wp_customize->add_control(
		'twentyxkon_sm_tt', array(
			'label' => __( 'Twitter Link', 'twentyxkon' ),
			'section' => 'twentyxkon_social_media',
			'settings' => 'twentyxkon_sm_tt',
			'type' => 'url',
		)
	);

	$wp_customize->add_setting( 'twentyxkon_sm_ig',
		array(
			'default' => '',
			'sanitize_callback' => 'twentyxkon_sanitize_customizer_url',
		)
	);

	$wp_customize->add_control(
		'twentyxkon_sm_ig', array(
			'label' => __( 'Instagram Link', 'twentyxkon' ),
			'section' => 'twentyxkon_social_media',
			'settings' => 'twentyxkon_sm_ig',
			'type' => 'url',
		)
	);

	$wp_customize->add_setting( 'twentyxkon_sm_gp',
		array(
			'default' => '',
			'sanitize_callback' => 'twentyxkon_sanitize_customizer_url',
		)
	);

	$wp_customize->add_control(
		'twentyxkon_sm_gp', array(
			'label' => __( 'Google+ Link', 'twentyxkon' ),
			'section' => 'twentyxkon_social_media',
			'settings' => 'twentyxkon_sm_gp',
			'type' => 'url',
		)
	);
}

add_action( 'customize_register', 'twentyxkon_customize' );

function twentyxkon_sanitize_customizer_text( $value )
{
	$sanitized = sanitize_text_field( $value );
	return $sanitized;
}

function twentyxkon_sanitize_customizer_email( $value )
{
	$sanitized = sanitize_email( $value );
	return $sanitized;
}

function twentyxkon_sanitize_customizer_url( $value )
{
	$sanitized = esc_url( $value );
	return $sanitized;
}

function twentyxkon_sanitize_customizer_select( $value )
{
	$sanitized = sanitize_text_field( $value );
	return $sanitized;
}
