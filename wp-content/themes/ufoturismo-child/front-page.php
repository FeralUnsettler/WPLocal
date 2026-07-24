<?php
/**
 * O template para exibir a Página Inicial (Front Page)
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

<main id="primary" class="ufo-site-main">

    <!-- Hero Section -->
    <section class="ufo-home-hero">
        <div class="ufo-hero-overlay">
            <div class="ufo-container ufo-hero-content">
                <h1 class="ufo-hero-title">A Verdade Está Lá Fora. E Nós Levamos Você Até Ela.</h1>
                <p class="ufo-hero-subtitle">O maior portal brasileiro focado em Turismo Ufológico, Pesquisa de Fenômenos Anômalos e Divulgação Científica.</p>
                <div class="ufo-hero-actions">
                    <a href="#roteiros" class="ufo-btn ufo-btn-primary">Ver Expedições</a>
                    <a href="#noticias" class="ufo-btn ufo-btn-secondary" style="border: 1px solid var(--ufo-text-main); color: var(--ufo-text-main); margin-left: 15px; background: transparent;">Últimas Notícias</a>
                </div>
            </div>
        </div>
    </section>

    <div class="ufo-container ufo-home-container">
        
        <!-- Elementor / Page Content -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="ufo-page-content">
                <?php the_content(); ?>
            </div>
        <?php endwhile; endif; ?>

        <!-- Ad Placement: Home Top -->
        <div class="ufo-ad-placement ufo-ad-home-top" style="margin-top: 40px;">
            <?php 
                $ad_home_top = get_option('ufo_ad_home_top');
                if ( ! empty($ad_home_top) ) {
                    echo $ad_home_top;
                } else {
                    echo '<!-- UFO AdManager: Ad Home Top vazio -->';
                }
            ?>
        </div>

        <!-- Roteiros em Destaque -->
        <section id="roteiros" class="ufo-home-section">
            <div class="ufo-section-header">
                <h2>Próximas Expedições e Roteiros</h2>
                <a href="<?php echo get_post_type_archive_link('roteiros'); ?>" class="ufo-view-all">Ver Todos &rarr;</a>
            </div>
            
            <div class="ufo-grid-3">
                <?php
                $roteiros_query = new WP_Query( array(
                    'post_type'      => 'roteiros',
                    'posts_per_page' => 3,
                ) );

                if ( $roteiros_query->have_posts() ) :
                    while ( $roteiros_query->have_posts() ) : $roteiros_query->the_post(); 
                        $valor = get_post_meta( get_the_ID(), '_ufoturismo_roteiro_valor', true );
                        $duracao = get_post_meta( get_the_ID(), '_ufoturismo_roteiro_duracao', true );
                ?>
                        <article class="ufo-card">
                            <div class="ufo-card-img" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); ?>');"></div>
                            <div class="ufo-card-body">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="ufo-card-meta">
                                    <?php if($duracao) echo '<span>⏱️ ' . esc_html($duracao) . '</span>'; ?>
                                    <?php if($valor) echo '<span class="ufo-card-price">' . esc_html($valor) . '</span>'; ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="ufo-btn ufo-btn-primary" style="margin-top: 15px; display: block; text-align: center;">Detalhes do Pacote</a>
                            </div>
                        </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>Nenhum roteiro agendado no momento.</p>';
                endif;
                ?>
            </div>
        </section>

        <!-- Últimas Notícias -->
        <section id="noticias" class="ufo-home-section">
            <div class="ufo-section-header">
                <h2>Últimas Notícias e Relatos</h2>
                <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="ufo-view-all">Acessar Portal &rarr;</a>
            </div>
            
            <div class="ufo-grid-3">
                <?php
                $news_query = new WP_Query( array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                ) );

                if ( $news_query->have_posts() ) :
                    while ( $news_query->have_posts() ) : $news_query->the_post(); 
                ?>
                        <article class="ufo-card ufo-news-card">
                            <div class="ufo-card-img" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>');"></div>
                            <div class="ufo-card-body">
                                <span class="ufo-news-date"><?php echo get_the_date(); ?></span>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
                            </div>
                        </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>Nenhuma notícia publicada ainda.</p>';
                endif;
                ?>
            </div>
        </section>

        <!-- Próximos Eventos -->
        <section id="eventos" class="ufo-home-section">
            <div class="ufo-section-header">
                <h2>Agenda de Congressos e Eventos</h2>
            </div>
            
            <div class="ufo-grid-2">
                <?php
                $eventos_query = new WP_Query( array(
                    'post_type'      => 'eventos',
                    'posts_per_page' => 2,
                ) );

                if ( $eventos_query->have_posts() ) :
                    while ( $eventos_query->have_posts() ) : $eventos_query->the_post(); 
                        $data_hora = get_post_meta( get_the_ID(), '_ufoturismo_evento_data_hora', true );
                ?>
                        <article class="ufo-card ufo-event-card" style="display: flex; flex-direction: row; align-items: center; background: var(--ufo-surface-hover);">
                            <div class="ufo-event-date" style="padding: 20px; background: var(--ufo-accent-primary); color: #000; font-weight: bold; text-align: center; border-radius: 4px;">
                                📅<br><?php echo esc_html($data_hora ? substr($data_hora, 0, 10) : 'Em breve'); ?>
                            </div>
                            <div class="ufo-card-body" style="flex: 1;">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <a href="<?php the_permalink(); ?>" class="ufo-btn ufo-btn-primary" style="margin-top:10px;">Ver Ingressos</a>
                            </div>
                        </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </section>

    </div>
</main>

<?php get_footer(); ?>
