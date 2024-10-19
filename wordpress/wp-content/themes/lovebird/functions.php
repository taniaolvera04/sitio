<?php
/**
 * Lovebird functions and definitions
 */

if ( ! function_exists( 'lovebird_support' ) ) {

	// Sets up theme defaults and registers support for various WordPress features.
	function lovebird_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}
}
add_action( 'after_setup_theme', 'lovebird_support' );

if ( ! function_exists( 'lovebird_styles' ) ) {
	// Enqueue styles.
	function lovebird_styles() {

		// Register theme stylesheet.
		wp_register_style(
			'lovebird-style',
			get_template_directory_uri() . '/assets/css/theme.min.css',
			array(),
			wp_get_theme()->get( 'Version' )
		);

		// Add styles inline.
		wp_add_inline_style( 'lovebird-style', lovebird_get_font_face_styles() );
		wp_add_inline_style( 'lovebird-style', lovebird_background_noise_image() );

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'lovebird-style' );

	}
}
add_action( 'wp_enqueue_scripts', 'lovebird_styles' );

if ( ! function_exists( 'lovebird_editor_styles' ) ) {
	// Enqueue editor styles.
	function lovebird_editor_styles() {
		// Add styles inline.
		wp_add_inline_style( 'wp-block-library', lovebird_get_font_face_styles() );

		add_editor_style(
			get_template_directory_uri() . '/assets/css/theme.min.css'
		);
	}
}
add_action( 'admin_init', 'lovebird_editor_styles' );

// Get font face styles.
if ( ! function_exists( 'lovebird_get_font_face_styles' ) ) {
	function lovebird_get_font_face_styles() {
		return "
		@font-face{
			font-family: 'Poppins';
			font-weight: 100;
			font-style: normal;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/Poppins-Thin.woff2' ) . "') format('woff2');
		}
		@font-face{
			font-family: 'Poppins';
			font-weight: 200;
			font-style: normal;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/Poppins-ExtraLight.woff2' ) . "') format('woff2');
		}
		@font-face{
			font-family: 'Poppins';
			font-weight: 300;
			font-style: normal;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/Poppins-Light.woff2' ) . "') format('woff2');
		}
		@font-face{
			font-family: 'Poppins';
			font-weight: 400;
			font-style: normal;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/Poppins-Regular.woff2' ) . "') format('woff2');
		}
		@font-face{
			font-family: 'Poppins';
			font-weight: 500;
			font-style: normal;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/Poppins-Medium.woff2' ) . "') format('woff2');
		}
		@font-face{
			font-family: 'Poppins';
			font-weight: 600;
			font-style: normal;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/Poppins-SemiBold.woff2' ) . "') format('woff2');
		}
		@font-face{
			font-family: 'Poppins';
			font-weight: 700;
			font-style: normal;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/Poppins-Bold.woff2' ) . "') format('woff2');
		}
		@font-face{
			font-family: 'Poppins';
			font-weight: 800;
			font-style: normal;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/Poppins-ExtraBold.woff2' ) . "') format('woff2');
		}
		@font-face{
			font-family: 'Poppins';
			font-weight: 900;
			font-style: normal;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/Poppins-Black.woff2' ) . "') format('woff2');
		}
		";
	}
}

// Enqueue lovebird scripts
if ( ! function_exists( 'lovebird_register_scripts' ) ) {
	add_action( 'wp_enqueue_scripts', 'lovebird_register_scripts' );
	function lovebird_register_scripts() {
		wp_enqueue_script(
			'lovebird-noise',
			get_theme_file_uri( 'assets/js/noise.min.js', __FILE__ ),
			'',
			'1.0.0', 
			true
		);
	}
}

// Add script to Editor
if ( ! function_exists( 'lovebird_admin_add_scripts' ) ) {
	function lovebird_admin_add_scripts( $hook ){
		if ( 'appearance_page_lovebird' != $hook ) {
			return;
		}
		
		wp_register_style( 'lovebird-settings-css',  get_template_directory_uri() . '/assets/css/admin.min.css' , '1.0.0' );
		wp_enqueue_style( 'lovebird-settings-css');
	
	}
}
add_action( 'admin_enqueue_scripts', 'lovebird_admin_add_scripts');

// Extra cutomizer functions
if ( ! function_exists( 'lovebird_customize_register' ) ) {
	add_action( 'customize_register', 'lovebird_customize_register' );
	function lovebird_customize_register( $wp_customize ) {
				
		// Add noise customizer section
		$wp_customize->add_section(
			'lovebird_layout_effects',
			array(
				'title' => __( 'Noise image', 'lovebird' ),
				'priority' => 24,
			)
		);
		
		$wp_customize->add_setting(
			'lovebird_settings[noise_image]',
			array(
				'default' => get_template_directory_uri().'/assets/images/lovebird-noise.webp',
				'type' => 'option',
				'sanitize_callback' => 'esc_url_raw'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'lovebird_settings[noise_image]',
				array(
					'label' => __( 'Background noise image', 'lovebird' ),
					'section' => 'lovebird_layout_effects',
					'priority' => 10,
					'settings' => 'lovebird_settings[noise_image]',
					'description' => __( 'Recommended size: 100*100px.', 'lovebird' )
				)
			)
		);
	}
}

// lovebird effects colors css
if ( ! function_exists( 'lovebird_background_noise_image' ) ) {
	function lovebird_background_noise_image() {
		// Get Customizer settings
		$lovebird_settings = get_option( 'lovebird_settings' );
		
		$noise_image = get_template_directory_uri().'/assets/images/lovebird-noise.webp';
		if ( isset( $lovebird_settings['noise_image'] ) ) {
			$noise_image = $lovebird_settings['noise_image'];
		}
		
		$lovebird_noise = '.lovebird-noise{background: transparent url(' . esc_url( $noise_image ) . ') repeat 0 0;}';
		
		return $lovebird_noise;
	}
}

// Add admin page content
get_template_part( 'inc/theme' );

// Add admin page
if ( ! function_exists( 'lovebird_create_menu' ) ) {
	add_action( 'admin_menu', 'lovebird_create_menu' );
	// Adds our dashboard menu item
	function lovebird_create_menu() {
		add_theme_page( 'Lovebird WordPress Theme', 'Lovebird', 'edit_theme_options', 'lovebird', 'lovebird_admin_theme_page' );
	}
}