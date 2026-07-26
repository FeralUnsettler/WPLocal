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
    // 1. OBRIGATÓRIO: Executa o Loop Principal do WordPress para renderização incondicional do Elementor PRO e Flexbox Containers
    while ( have_posts() ) : the_post(); ?>
        <div class="ufo-elementor-flexbox-wrapper" style="width: 100%; position: relative; z-index: 5;">
            <?php the_content(); ?>
        </div>
    <?php endwhile;

    // 2. Se o usuário estiver utilizando a estrutura padrão (ou ainda montando no Elementor), exibe a sequência modular Flexbox!
    // Nota: No painel do Elementor, você encontrará na barra lateral a categoria "🛰️ UFOTurismo PRO (Módulos Flexbox)" com todos os widgets individuais para arrastar e reorganizar!
    $is_elementor_custom_built = class_exists( '\Elementor\Plugin' ) && \Elementor\Plugin::$instance->db->is_built_with_elementor( get_the_ID() ) && ! empty( trim( strip_tags( get_the_content() ) ) );

    if ( ! $is_elementor_custom_built ) :
    ?>
        <!-- BLOCO FLEXBOX 1: Jumbotron Hero de 4 Slides (5s/600ms) -->
        <?php echo function_exists( 'ufo_render_section_jumbotron' ) ? ufo_render_section_jumbotron() : ''; ?>

        <!-- Módulos Seguintes Com Estrutura 1440px e 200px de Margem Lateral -->
        <div class="ufo-container ufo-home-container" style="padding-top: 15px; margin-top: 0;">
            
            <!-- BLOCO FLEXBOX 2: Vitrine Netflix de Vídeos com Preview On-Hover em PT-BR -->
            <?php echo function_exists( 'ufo_render_section_videos' ) ? ufo_render_section_videos() : ''; ?>

            <!-- BLOCO FLEXBOX 3: Vitrine Netflix de Notícias & Documentos Desclassificados -->
            <?php echo function_exists( 'ufo_render_section_noticias' ) ? ufo_render_section_noticias() : ''; ?>

            <!-- BLOCO FLEXBOX 4: Zona de Monetização AdSense (Estratégicamente Entre Notícias e Expedições) -->
            <?php echo function_exists( 'ufo_render_section_adsense' ) ? ufo_render_section_adsense( array( 'placement' => 'between_news_exp' ) ) : ''; ?>

            <!-- BLOCO FLEXBOX 5: Galeria 12 Expedições Científicas no Brasil (70% Escala Netflix) -->
            <?php echo function_exists( 'ufo_render_section_expedicoes' ) ? ufo_render_section_expedicoes() : ''; ?>

            <!-- BLOCO FLEXBOX 6: Zona de Monetização Meio-Inferior Ad Manager -->
            <?php echo function_exists( 'ufo_render_section_adsense' ) ? ufo_render_section_adsense( array( 'placement' => 'mid_bottom' ) ) : ''; ?>

            <!-- BLOCO FLEXBOX 7: Agenda de Congressos e Encontros Presenciais -->
            <?php echo function_exists( 'ufo_render_section_eventos' ) ? ufo_render_section_eventos() : ''; ?>

            <!-- BLOCO FLEXBOX 8: Banner CTA Fórum & WhatsApp Grupo VIP -->
            <?php echo function_exists( 'ufo_render_section_cta' ) ? ufo_render_section_cta() : ''; ?>

            <!-- BLOCO FLEXBOX 9: Zona de Publicidade de Rodapé Monetizado -->
            <?php echo function_exists( 'ufo_render_section_adsense' ) ? ufo_render_section_adsense( array( 'placement' => 'home_bottom' ) ) : ''; ?>

        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
