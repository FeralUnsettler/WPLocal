<?php
/**
 * O template de fallback geral do tema filho UFOTurismo PRO
 * Garante que o construtor Elementor e o WordPress Loop original chamem the_content() para qualquer postagem ou página
 * Otimizado no padrão 1440px com margem lateral de 200px em cada extremidade da página
 */

get_header(); ?>

<main id="main" class="site-main ufo-index-main" role="main" style="position: relative; z-index: 2; padding-top: 100px; padding-bottom: 70px; min-height: 85vh;">
    <div class="ufo-container">
        <?php if ( have_posts() ) : 
            while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'ufo-index-article' ); ?> style="margin-bottom: 45px; width: 100%;">
                    <?php if ( ! is_single() && ! is_page() && ! empty( get_the_title() ) ) : ?>
                        <header class="entry-header" style="margin-bottom: 20px;">
                            <h2 class="entry-title" style="font-size: 28px; font-family: var(--ufo-font-heading);">
                                <a href="<?php the_permalink(); ?>" style="color: var(--ufo-text-main); text-decoration: none;"><?php the_title(); ?></a>
                            </h2>
                        </header>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; 
        else : ?>
            <div class="no-results not-found" style="text-align: center; padding: 60px 0;">
                <h1 style="color: #fff; font-family: var(--ufo-font-heading);">Conteúdo não localizado</h1>
                <p style="color: var(--ufo-text-muted);">Parece que nada foi encontrado neste endereço. Tente explorar nosso acervo central na Home.</p>
                <a href="<?php echo home_url('/'); ?>" class="ufo-hero-btn ufo-hero-btn-primary" style="margin-top: 20px; display: inline-block;">&lsaquo; Voltar Para Home</a>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
