<?php
/**
 * O template modular da Página Inicial (Landing Page Flexbox & Editável no Elementor PRO)
 * Separa cada sessão da Home em blocos modulares flexbox editáveis para possibilitar rearranjo livre da ordem no Elementor.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); ?>

<main id="primary" class="ufo-site-main" style="padding: 0; margin: 0; background: var(--ufo-bg);">
    <?php
    while ( have_posts() ) : the_post();
        $page_id = get_the_ID();
        $elementor_data = get_post_meta( $page_id, '_elementor_data', true );
        
        // Verifica se a página está no editor visual do Elementor OU se tem estrutura construída/sincronizada do Elementor
        $is_elementor_active = class_exists( '\Elementor\Plugin' ) && (
            \Elementor\Plugin::$instance->editor->is_edit_mode() ||
            \Elementor\Plugin::$instance->db->is_built_with_elementor( $page_id ) ||
            ( ! empty( $elementor_data ) && $elementor_data !== '[]' )
        );

        if ( $is_elementor_active ) {
            // No modo Elementor, CADA BLOCO DA PÁGINA é um widget nativo 100% arrastável, rearranjável e editável individualmente!
            echo '<div class="ufo-elementor-native-canvas" style="width: 100%; position: relative; z-index: 5;">';
            the_content();
            echo '</div>';
        } else {
            // Modo de fallback (caso o plugin Elementor esteja desativado)
            echo function_exists( 'ufo_render_section_jumbotron' ) ? ufo_render_section_jumbotron() : '';
            echo '<div class="ufo-container ufo-home-container" style="padding-top: 15px; margin-top: 0;">';
            echo function_exists( 'ufo_render_section_videos' ) ? ufo_render_section_videos() : '';
            echo function_exists( 'ufo_render_section_noticias' ) ? ufo_render_section_noticias() : '';
            echo function_exists( 'ufo_render_section_adsense' ) ? ufo_render_section_adsense( array( 'placement' => 'between_news_exp' ) ) : '';
            echo function_exists( 'ufo_render_section_expedicoes' ) ? ufo_render_section_expedicoes() : '';
            echo function_exists( 'ufo_render_section_adsense' ) ? ufo_render_section_adsense( array( 'placement' => 'mid_bottom' ) ) : '';
            echo function_exists( 'ufo_render_section_eventos' ) ? ufo_render_section_eventos() : '';
            echo function_exists( 'ufo_render_section_cta' ) ? ufo_render_section_cta() : '';
            echo function_exists( 'ufo_render_section_adsense' ) ? ufo_render_section_adsense( array( 'placement' => 'home_bottom' ) ) : '';
            echo '</div>';
        }
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
