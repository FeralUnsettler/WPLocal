<?php
/**
 * O template principal para todas as Páginas e Edição no Elementor
 * Compatibilidade nativa com construtores de páginas (Elementor, Gutenberg, PRO)
 * Aplica automaticamente a reestilização arquitetônica de 1440px de largura máxima com margem lateral de 200px em cada lado
 */

get_header(); ?>

<main id="main" class="site-main ufo-page-main" role="main" style="position: relative; z-index: 2; padding-top: 100px; padding-bottom: 70px; min-height: 85vh;">
    <div class="ufo-container">
        <?php 
        while ( have_posts() ) : the_post(); 
            // Se não estiver dentro do editor visual do Elementor e não for a home, exibe cabeçalho elegante de página
            if ( ( ! class_exists( '\Elementor\Plugin' ) || ! \Elementor\Plugin::$instance->editor->is_edit_mode() ) && ! is_front_page() && ! is_home() && ! empty( get_the_title() ) ) : ?>
                <header class="ufo-page-header" style="margin-bottom: 35px; border-bottom: 1px solid var(--ufo-border); padding-bottom: 20px;">
                    <h1 class="ufo-page-title" style="font-size: 38px; font-family: var(--ufo-font-heading); color: #fff; margin: 0;">
                        <?php the_title(); ?>
                    </h1>
                </header>
            <?php endif; ?>

            <div class="ufo-page-content entry-content" style="width: 100%;">
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
