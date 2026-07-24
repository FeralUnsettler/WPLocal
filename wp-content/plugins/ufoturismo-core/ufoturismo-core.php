<?php
/**
 * Plugin Name: UFO Turismo Core
 * Plugin URI: https://ufoturismoperuibe.com
 * Description: Plugin essencial para o Portal UFOTurismo. Responsável por registrar Custom Post Types (Eventos, Enciclopédia, Relatos, Roteiros) e Taxonomias.
 * Version: 1.0.0
 * Author: Antigravity AI
 * Text Domain: ufoturismo-core
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Inclui arquivos de dependência
require_once plugin_dir_path( __FILE__ ) . 'inc/meta-boxes.php';
require_once plugin_dir_path( __FILE__ ) . 'inc/relatos-form.php';

// Desabilita a verificação SSL local para chamadas do WordPress (como update de plugins) para evitar erros de cURL no Docker
add_filter( 'https_ssl_verify', '__return_false' );
add_filter( 'https_local_ssl_verify', '__return_false' );
add_filter( 'http_request_args', function( $args, $url ) {
    $args['sslverify'] = false;
    return $args;
}, 10, 2 );

/**
 * Registra todos os Custom Post Types e Taxonomias
 */
function ufoturismo_register_post_types_and_taxonomies() {

    // 1. Enciclopédia
    $labels_enciclopedia = array(
        'name'                  => _x( 'Enciclopédia', 'Post Type General Name', 'ufoturismo-core' ),
        'singular_name'         => _x( 'Verbete', 'Post Type Singular Name', 'ufoturismo-core' ),
        'menu_name'             => __( 'Enciclopédia', 'ufoturismo-core' ),
        'name_admin_bar'        => __( 'Enciclopédia', 'ufoturismo-core' ),
        'archives'              => __( 'Arquivos da Enciclopédia', 'ufoturismo-core' ),
        'all_items'             => __( 'Todos os Verbetes', 'ufoturismo-core' ),
        'add_new_item'          => __( 'Adicionar Novo Verbete', 'ufoturismo-core' ),
        'add_new'               => __( 'Adicionar Novo', 'ufoturismo-core' ),
        'new_item'              => __( 'Novo Verbete', 'ufoturismo-core' ),
        'edit_item'             => __( 'Editar Verbete', 'ufoturismo-core' ),
        'update_item'           => __( 'Atualizar Verbete', 'ufoturismo-core' ),
        'view_item'             => __( 'Ver Verbete', 'ufoturismo-core' ),
        'search_items'          => __( 'Procurar Verbete', 'ufoturismo-core' ),
    );
    $args_enciclopedia = array(
        'label'                 => __( 'Enciclopédia', 'ufoturismo-core' ),
        'labels'                => $labels_enciclopedia,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-book-alt',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true, // Ativa Gutenberg se suportado
    );
    register_post_type( 'enciclopedia', $args_enciclopedia );

    // 2. Eventos
    $labels_eventos = array(
        'name'                  => _x( 'Eventos', 'Post Type General Name', 'ufoturismo-core' ),
        'singular_name'         => _x( 'Evento', 'Post Type Singular Name', 'ufoturismo-core' ),
        'menu_name'             => __( 'Eventos', 'ufoturismo-core' ),
        'all_items'             => __( 'Todos os Eventos', 'ufoturismo-core' ),
        'add_new_item'          => __( 'Adicionar Novo Evento', 'ufoturismo-core' ),
    );
    $args_eventos = array(
        'labels'                => $labels_eventos,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'public'                => true,
        'has_archive'           => true,
        'menu_icon'             => 'dashicons-calendar-alt',
        'show_in_rest'          => true,
    );
    register_post_type( 'eventos', $args_eventos );

    // 3. Relatos
    $labels_relatos = array(
        'name'                  => _x( 'Relatos', 'Post Type General Name', 'ufoturismo-core' ),
        'singular_name'         => _x( 'Relato', 'Post Type Singular Name', 'ufoturismo-core' ),
        'menu_name'             => __( 'Relatos', 'ufoturismo-core' ),
        'all_items'             => __( 'Todos os Relatos', 'ufoturismo-core' ),
        'add_new_item'          => __( 'Adicionar Novo Relato', 'ufoturismo-core' ),
    );
    $args_relatos = array(
        'labels'                => $labels_relatos,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
        'public'                => true,
        'has_archive'           => true,
        'menu_icon'             => 'dashicons-testimonial',
        'show_in_rest'          => true,
    );
    register_post_type( 'relatos', $args_relatos );

    // 4. Roteiros (Turismo)
    $labels_roteiros = array(
        'name'                  => _x( 'Roteiros', 'Post Type General Name', 'ufoturismo-core' ),
        'singular_name'         => _x( 'Roteiro', 'Post Type Singular Name', 'ufoturismo-core' ),
        'menu_name'             => __( 'Roteiros de Turismo', 'ufoturismo-core' ),
        'all_items'             => __( 'Todos os Roteiros', 'ufoturismo-core' ),
        'add_new_item'          => __( 'Adicionar Novo Roteiro', 'ufoturismo-core' ),
    );
    $args_roteiros = array(
        'labels'                => $labels_roteiros,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'public'                => true,
        'has_archive'           => true,
        'menu_icon'             => 'dashicons-location',
        'show_in_rest'          => true,
    );
    register_post_type( 'roteiros', $args_roteiros );

    // 5. Vídeos
    $labels_videos = array(
        'name'                  => _x( 'Vídeos', 'Post Type General Name', 'ufoturismo-core' ),
        'singular_name'         => _x( 'Vídeo', 'Post Type Singular Name', 'ufoturismo-core' ),
        'menu_name'             => __( 'Vídeos', 'ufoturismo-core' ),
        'all_items'             => __( 'Todos os Vídeos', 'ufoturismo-core' ),
        'add_new_item'          => __( 'Adicionar Novo Vídeo', 'ufoturismo-core' ),
    );
    $args_videos = array(
        'labels'                => $labels_videos,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'public'                => true,
        'has_archive'           => true,
        'menu_icon'             => 'dashicons-video-alt3',
        'show_in_rest'          => true,
    );
    register_post_type( 'videos', $args_videos );

    // --- TAXONOMIAS ---

    // Assuntos (Para todos)
    register_taxonomy( 'assuntos', array( 'post', 'enciclopedia', 'videos' ), array(
        'hierarchical'      => true,
        'labels'            => array(
            'name'          => _x( 'Assuntos', 'Taxonomy General Name', 'ufoturismo-core' ),
            'singular_name' => _x( 'Assunto', 'Taxonomy Singular Name', 'ufoturismo-core' ),
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
    ));

    // Localização (Estado/Cidade/País para Relatos, Eventos e Roteiros)
    register_taxonomy( 'localizacao', array( 'relatos', 'eventos', 'roteiros' ), array(
        'hierarchical'      => true,
        'labels'            => array(
            'name'          => _x( 'Localização', 'Taxonomy General Name', 'ufoturismo-core' ),
            'singular_name' => _x( 'Localização', 'Taxonomy Singular Name', 'ufoturismo-core' ),
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
    ));

    // Dificuldade (Para Roteiros)
    register_taxonomy( 'dificuldade', array( 'roteiros' ), array(
        'hierarchical'      => false,
        'labels'            => array(
            'name'          => _x( 'Dificuldades', 'Taxonomy General Name', 'ufoturismo-core' ),
            'singular_name' => _x( 'Dificuldade', 'Taxonomy Singular Name', 'ufoturismo-core' ),
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
    ));
}
add_action( 'init', 'ufoturismo_register_post_types_and_taxonomies', 0 );

/**
 * Flush rewrite rules on activation to prevent 404 errors for new CPTs.
 */
function ufoturismo_core_activate() {
    ufoturismo_register_post_types_and_taxonomies();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'ufoturismo_core_activate' );
