<?php
/**
 * UFOTurismo Child Theme Functions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Enqueue Theme Styles
 */
function ufoturismo_child_enqueue_styles() {
    // Enqueue parent style
    wp_enqueue_style(
        'hello-elementor-parent-style',
        get_template_directory_uri() . '/style.css'
    );

    // Enqueue child style
    wp_enqueue_style(
        'ufoturismo-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        [ 'hello-elementor-parent-style' ],
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'ufoturismo_child_enqueue_styles', 20 );

/**
 * Enqueue Google Fonts (Outfit, Inter, Lora)
 */
function ufoturismo_enqueue_google_fonts() {
    wp_enqueue_style( 'ufoturismo-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Lora:ital,wght@0,400;0,700;1,400&family=Outfit:wght@300;400;600;700;800&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'ufoturismo_enqueue_google_fonts' );

// Disable Gutenberg Editor (Since we use Elementor entirely for layouts and Classic Editor for simple text if needed, though this is optional. We will keep it for now).
// add_filter('use_block_editor_for_post', '__return_false', 10);

/**
 * Register Navigation Menus
 */
function ufoturismo_register_menus() {
    register_nav_menus( array(
        'primary' => __( 'Menu Principal (Header)', 'ufoturismo-child' ),
        'footer'  => __( 'Menu do Rodapé (Footer)', 'ufoturismo-child' ),
    ) );
}
add_action( 'after_setup_theme', 'ufoturismo_register_menus' );

/**
 * Carregar Construtor Visual da Home (Metabox Nativo Sem ACF)
 */
require_once get_stylesheet_directory() . '/inc/home-metabox.php';

