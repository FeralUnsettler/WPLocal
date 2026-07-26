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

/**
 * Carregar Módulo de Feeds RSS e Vídeos do YouTube (Parallax Gallery)
 */
require_once get_stylesheet_directory() . '/inc/yt-rss-helper.php';

/**
 * Carregar Módulo de Flexbox Editáveis e Widgets Nativos para o Elementor PRO
 */
require_once get_stylesheet_directory() . '/inc/elementor-flexbox-sections.php';

/**
 * Carregar Módulo de Sincronização de Rede Interna (LAN & Acesso Equipe Dev em IP 192.168.x.x:8000)
 */
require_once get_stylesheet_directory() . '/inc/lan-sync.php';

/**
 * OTIMIZAÇÃO DE AMBIENTE LOCAL & BLINDAGEM CONTRA TIMEOUTS DO WORDPRESS.ORG
 * Elimina erros de conexão SSL, travamentos no /wp-admin/ e alertas de "headers already sent" ao usar rede local/offline.
 */
if ( defined( 'WP_DEBUG' ) && WP_DEBUG && ! defined( 'WP_DEBUG_DISPLAY' ) ) {
    @ini_set( 'display_errors', 0 );
}

add_filter( 'pre_http_request', function( $preempt, $parsed_args, $url ) {
    // Verifica se estamos rodando em ambiente local (Docker, localhost ou IP LAN do seu estúdio 192.168.x)
    if ( isset( $_SERVER['HTTP_HOST'] ) && ( strpos( $_SERVER['HTTP_HOST'], 'localhost' ) !== false || strpos( $_SERVER['HTTP_HOST'], '192.168.' ) !== false || strpos( $_SERVER['HTTP_HOST'], '10.0.' ) !== false || strpos( $_SERVER['HTTP_HOST'], '127.0.0.1' ) !== false ) ) {
        // Intercepta requisições de checagem do WordPress e retorna 200 OK imediato sem tentar internet externa
        if ( strpos( $url, 'api.wordpress.org' ) !== false || strpos( $url, 'downloads.wordpress.org' ) !== false || strpos( $url, 'w.org' ) !== false ) {
            return array(
                'headers'  => array(),
                'body'     => '{"offers":[],"translations":[]}',
                'response' => array( 'code' => 200, 'message' => 'OK' ),
                'cookies'  => array(),
                'filename' => null
            );
        }
    }
    return $preempt;
}, 10, 3 );

// Silencia rotinas pesadas de verificação no admin quando conectado sem internet externa em modo LAN
add_action( 'admin_init', function() {
    if ( isset( $_SERVER['HTTP_HOST'] ) && ( strpos( $_SERVER['HTTP_HOST'], 'localhost' ) !== false || strpos( $_SERVER['HTTP_HOST'], '192.168.' ) !== false ) ) {
        remove_action( 'admin_init', '_maybe_update_core' );
        remove_action( 'admin_init', '_maybe_update_plugins' );
        remove_action( 'admin_init', '_maybe_update_themes' );
    }
}, 1 );
