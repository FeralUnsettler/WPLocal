<?php
/**
 * Módulo Interno do Tema: Sincronização Dinâmica de Rede Interna (LAN / Dev Team)
 * Garante que a aplicação funcione em simultâneo tanto em localhost:8000 quanto no IP local (ex: 192.168.15.3:8000).
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'UFOTurismo_LAN_Theme_Sync' ) && ! class_exists( 'UFOTurismo_LAN_Sync' ) ) {
    class UFOTurismo_LAN_Theme_Sync {
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

            add_filter( 'option_siteurl', array( $this, 'filter_url' ), 1 );
            add_filter( 'option_home', array( $this, 'filter_url' ), 1 );
            add_filter( 'upload_dir', array( $this, 'filter_upload_dir' ), 1 );
            add_filter( 'style_loader_src', array( $this, 'replace_localhost_in_url' ), 99 );
            add_filter( 'script_loader_src', array( $this, 'replace_localhost_in_url' ), 99 );
            add_filter( 'wp_get_attachment_url', array( $this, 'replace_localhost_in_url' ), 99 );
            add_filter( 'the_content', array( $this, 'replace_localhost_in_url' ), 99 );
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
    }
    UFOTurismo_LAN_Theme_Sync::get_instance();
}
