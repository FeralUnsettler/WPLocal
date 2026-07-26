<?php
/**
 * Plugin Name: UFOTurismo - LAN & Multi-Host Synchronizer (MU-Plugin)
 * Description: Sincronização Dinâmica de URLs para que a aplicação e o painel /wp-admin funcionem sem erros no localhost e para toda a equipe dev na rede interna (ex: 192.168.15.3:8000).
 * Author: UFOTurismo PRO Eng Team
 * Version: 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'UFOTurismo_LAN_Sync' ) ) {
    class UFOTurismo_LAN_Sync {
        private static $instance = null;
        private $current_host = '';
        private $current_url  = '';
        private $base_hosts   = array( 'localhost:8000', '127.0.0.1:8000' );

        public static function get_instance() {
            if ( null === self::$instance ) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        private function __construct() {
            if ( empty( $_SERVER['HTTP_HOST'] ) ) {
                return;
            }

            $this->current_host = sanitize_text_field( wp_unslash( $_SERVER['HTTP_HOST'] ) );
            $scheme = ( ! empty( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] !== 'off' ) ? 'https://' : 'http://';
            $this->current_url = $scheme . $this->current_host;

            // Registrar filtros prioritários de URLs do WordPress e Painel Administrativo
            add_filter( 'option_siteurl', array( $this, 'filter_url' ), 1 );
            add_filter( 'option_home', array( $this, 'filter_url' ), 1 );
            add_filter( 'url_to_postid', array( $this, 'filter_url' ), 1 );
            add_filter( 'upload_dir', array( $this, 'filter_upload_dir' ), 1 );
            add_filter( 'rest_url', array( $this, 'filter_url' ), 1 );

            // Filtros para carregamento sem erros de CORS ou quebra de estilos
            add_filter( 'style_loader_src', array( $this, 'replace_localhost_in_url' ), 99 );
            add_filter( 'script_loader_src', array( $this, 'replace_localhost_in_url' ), 99 );
            add_filter( 'wp_get_attachment_url', array( $this, 'replace_localhost_in_url' ), 99 );
            add_filter( 'the_content', array( $this, 'replace_localhost_in_url' ), 99 );

            // Sincronizar estruturas JSON e Módulos Flexbox no Elementor PRO via LAN
            add_filter( 'elementor/frontend/builder_content_data', array( $this, 'filter_elementor_data' ), 99, 2 );

            // Buffer de Saída para interceptar respostas HTML e AJAX na LAN com perfeição
            if ( ! in_array( $this->current_host, $this->base_hosts, true ) ) {
                add_action( 'init', array( $this, 'start_output_buffer' ), 1 );
                add_action( 'shutdown', array( $this, 'end_output_buffer' ), 999 );
            }
        }

        public function filter_url( $url ) {
            if ( empty( $url ) || empty( $this->current_host ) ) {
                return $url;
            }
            return $this->replace_localhost_in_url( $url );
        }

        public function filter_upload_dir( $uploads ) {
            if ( is_array( $uploads ) && ! empty( $uploads['url'] ) ) {
                $uploads['url']     = $this->replace_localhost_in_url( $uploads['url'] );
                $uploads['baseurl'] = $this->replace_localhost_in_url( $uploads['baseurl'] );
            }
            return $uploads;
        }

        public function replace_localhost_in_url( $content ) {
            if ( empty( $content ) || ! is_string( $content ) || in_array( $this->current_host, $this->base_hosts, true ) ) {
                return $content;
            }
            foreach ( $this->base_hosts as $local_host ) {
                $content = str_replace( 'http://' . $local_host, $this->current_url, $content );
                $content = str_replace( 'https://' . $local_host, $this->current_url, $content );
                $content = str_replace( '//' . $local_host, '//' . $this->current_host, $content );
            }
            return $content;
        }

        public function filter_elementor_data( $data, $post_id ) {
            if ( is_array( $data ) && ! in_array( $this->current_host, $this->base_hosts, true ) ) {
                $json_data = wp_json_encode( $data );
                $json_data = $this->replace_localhost_in_url( $json_data );
                $decoded   = json_decode( $json_data, true );
                if ( json_last_error() === JSON_ERROR_NONE ) {
                    return $decoded;
                }
            }
            return $data;
        }

        public function start_output_buffer() {
            if ( ! ob_get_level() ) {
                ob_start( array( $this, 'replace_localhost_in_url' ) );
            }
        }

        public function end_output_buffer() {
            if ( ob_get_level() && ob_get_length() > 0 ) {
                @ob_end_flush();
            }
        }
    }

    // Inicializar o sincronizador de rede interna (LAN)
    UFOTurismo_LAN_Sync::get_instance();
}
