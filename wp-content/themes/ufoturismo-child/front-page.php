<?php
/**
 * O template para exibir a Página Inicial (Landing Page Monetizada)
 * Consome os campos customizados editados no WordPress Admin (UFO Turismo Studio)
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); 

// Obtém ID da página inicial estática
$page_id = get_option( 'page_on_front' ) ?: get_the_ID();

// Puxa as customizações da Home ou aplica valores por padrão
$hero_title       = get_post_meta( $page_id, '_ufo_hero_title', true ) ?: 'A Verdade Está Lá Fora. E Nós Levamos Você Até Ela.';
$hero_subtitle    = get_post_meta( $page_id, '_ufo_hero_subtitle', true ) ?: 'O maior portal brasileiro focado em Turismo Ufológico, Pesquisa de Fenômenos Anômalos e Divulgação Científica.';
$hero_bg          = get_post_meta( $page_id, '_ufo_hero_bg_img', true ) ?: 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=2072&auto=format&fit=crop';
$btn_1_text       = get_post_meta( $page_id, '_ufo_hero_btn_text_1', true ) ?: 'Ver Expedições';
$btn_1_url        = get_post_meta( $page_id, '_ufo_hero_btn_url_1', true ) ?: '#roteiros';
$btn_2_text       = get_post_meta( $page_id, '_ufo_hero_btn_text_2', true ) ?: 'Últimas Notícias';
$btn_2_url        = get_post_meta( $page_id, '_ufo_hero_btn_url_2', true ) ?: '#noticias';

$sec_roteiros_lbl = get_post_meta( $page_id, '_ufo_sec_roteiros_title', true ) ?: 'Próximas Expedições e Roteiros';
$sec_news_lbl     = get_post_meta( $page_id, '_ufo_sec_news_title', true ) ?: 'Últimas Notícias e Relatos';

$cta_title        = get_post_meta( $page_id, '_ufo_cta_title', true ) ?: 'Pronto Para Viver o Desconhecido?';
$cta_desc         = get_post_meta( $page_id, '_ufo_cta_desc', true ) ?: 'Participe de nossos roteiros noturnos com especialistas, equipamentos de visão noturna e guias credenciados.';
$cta_btn_text     = get_post_meta( $page_id, '_ufo_cta_btn_text', true ) ?: 'Agendar Agora pelo WhatsApp';
$cta_url          = get_post_meta( $page_id, '_ufo_cta_url', true ) ?: 'https://wa.me/5511999999999';
?>

<main id="primary" class="ufo-site-main">

    <!-- Hero Section Customizável -->
    <section class="ufo-home-hero" style="background-image: url('<?php echo esc_url( $hero_bg ); ?>');">
        <div class="ufo-hero-overlay">
            <div class="ufo-container ufo-hero-content">
                <h1 class="ufo-hero-title"><?php echo esc_html( $hero_title ); ?></h1>
                <p class="ufo-hero-subtitle"><?php echo esc_html( $hero_subtitle ); ?></p>
                <div class="ufo-hero-actions">
                    <a href="<?php echo esc_attr( $btn_1_url ); ?>" class="ufo-btn ufo-btn-primary"><?php echo esc_html( $btn_1_text ); ?></a>
                    <?php if(!empty($btn_2_text)): ?>
                        <a href="<?php echo esc_attr( $btn_2_url ); ?>" class="ufo-btn ufo-btn-secondary" style="border: 1px solid var(--ufo-text-main); color: var(--ufo-text-main); margin-left: 15px; background: rgba(11,14,20,0.6); backdrop-filter: blur(5px);"><?php echo esc_html( $btn_2_text ); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <div class="ufo-container ufo-home-container">
        
        <!-- Conteúdo Estático adicional da página (Se criado via Gutenberg ou Elementor) -->
        <?php if ( have_posts() && get_the_content() ) : while ( have_posts() ) : the_post(); ?>
            <div class="ufo-page-content" style="margin-bottom: 40px;">
                <?php the_content(); ?>
            </div>
        <?php endwhile; endif; ?>

        <!-- Ad Placement: Topo da Home (Otimizado AdSense / Google Ad Manager) -->
        <div class="ufo-ad-placement ufo-ad-home-top" style="margin: 20px 0 50px;">
            <?php 
                $ad_home_top = get_option('ufo_ad_home_top');
                if ( ! empty($ad_home_top) ) {
                    echo $ad_home_top;
                } else {
                    echo '<!-- UFO AdManager: Bloco Superior Reservado Para High-RPM Ads -->';
                }
            ?>
        </div>

        <!-- Seção 1: Roteiros em Destaque (Turismo Ufológico) -->
        <section id="roteiros" class="ufo-home-section">
            <div class="ufo-section-header">
                <h2><?php echo esc_html( $sec_roteiros_lbl ); ?></h2>
                <a href="<?php echo get_post_type_archive_link('roteiros') ?: '#'; ?>" class="ufo-view-all">Ver Todos os Roteiros &rarr;</a>
            </div>
            
            <div class="ufo-grid-3">
                <?php
                $roteiros_query = new WP_Query( array(
                    'post_type'      => 'roteiros',
                    'posts_per_page' => 3,
                    'post_status'    => 'publish'
                ) );

                if ( $roteiros_query->have_posts() ) :
                    while ( $roteiros_query->have_posts() ) : $roteiros_query->the_post();
                        $duracao = get_post_meta( get_the_ID(), '_ufo_duracao', true );
                        $preco   = get_post_meta( get_the_ID(), '_ufo_preco', true );
                        $thumb   = get_the_post_thumbnail_url( get_the_ID(), 'large' ) ?: 'https://images.unsplash.com/photo-1506703719100-a0f3a48c0f86?q=80&w=600&auto=format&fit=crop';
                ?>
                    <div class="ufo-card">
                        <div class="ufo-card-img" style="background-image: url('<?php echo esc_url( $thumb ); ?>');"></div>
                        <div class="ufo-card-body">
                            <div class="ufo-card-meta">
                                <span>🕒 <?php echo esc_html( $duracao ?: '1 Dia' ); ?></span>
                                <span class="ufo-card-price"><?php echo esc_html( $preco ?: 'Consulte' ); ?></span>
                            </div>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p style="color: var(--ufo-text-muted); font-size: 14px;"><?php echo wp_trim_words( get_the_excerpt() ?: get_the_content(), 18 ); ?></p>
                            <a href="<?php the_permalink(); ?>" class="ufo-btn ufo-btn-primary" style="margin-top: 15px; padding: 8px 18px; font-size: 12px; display: inline-block;">Detalhes da Expedição</a>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p style="color: var(--ufo-text-muted);">Nenhuma expedição disponível no momento.</p>';
                endif;
                ?>
            </div>
        </section>

        <!-- Seção 2: Últimas Notícias (Portal Jornalístico) -->
        <section id="noticias" class="ufo-home-section" style="margin-top: 60px;">
            <div class="ufo-section-header">
                <h2><?php echo esc_html( $sec_news_lbl ); ?></h2>
                <a href="<?php echo get_permalink( get_option('page_for_posts') ) ?: '#'; ?>" class="ufo-view-all">Acessar Portal Jornalístico &rarr;</a>
            </div>

            <div class="ufo-grid-3">
                <?php
                $news_query = new WP_Query( array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'post_status'    => 'publish'
                ) );

                if ( $news_query->have_posts() ) :
                    while ( $news_query->have_posts() ) : $news_query->the_post();
                        $thumb = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) ?: 'https://images.unsplash.com/photo-1534447677768-be436bb09401?q=80&w=600&auto=format&fit=crop';
                ?>
                    <article class="ufo-card ufo-news-card">
                        <div class="ufo-card-img" style="background-image: url('<?php echo esc_url( $thumb ); ?>'); height: 180px;"></div>
                        <div class="ufo-card-body">
                            <span class="ufo-news-date"><?php echo get_the_date(); ?></span>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p style="color: var(--ufo-text-muted); font-size: 14px;"><?php echo wp_trim_words( get_the_excerpt() ?: get_the_content(), 15 ); ?></p>
                        </div>
                    </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </section>

        <!-- Seção 3: Agenda de Congressos e Eventos -->
        <section id="eventos" class="ufo-home-section" style="margin-top: 60px;">
            <div class="ufo-section-header">
                <h2>🗓️ Agenda de Congressos e Eventos</h2>
                <a href="<?php echo get_post_type_archive_link('eventos') ?: '#'; ?>" class="ufo-view-all">Ver Toda a Agenda &rarr;</a>
            </div>
            
            <div class="ufo-grid-2">
                <?php
                $eventos_query = new WP_Query( array(
                    'post_type'      => 'eventos',
                    'posts_per_page' => 2,
                    'post_status'    => 'publish'
                ) );

                if ( $eventos_query->have_posts() ) :
                    while ( $eventos_query->have_posts() ) : $eventos_query->the_post();
                        $data_ev = get_post_meta( get_the_ID(), '_ufo_evento_data', true ) ?: 'Em breve';
                        $local   = get_post_meta( get_the_ID(), '_ufo_evento_local', true ) ?: 'Peruíbe / SP';
                ?>
                    <div class="ufo-card" style="display: flex; flex-direction: column; justify-content: space-between;">
                        <div class="ufo-card-body">
                            <span style="color: var(--ufo-accent-sci); font-weight: 700; text-transform: uppercase; font-size: 12px;">📍 <?php echo esc_html( $local ); ?> &nbsp;|&nbsp; 🗓️ <?php echo esc_html( $data_ev ); ?></span>
                            <h3 style="margin-top: 10px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p style="color: var(--ufo-text-muted); font-size: 14px;"><?php echo wp_trim_words( get_the_content(), 22 ); ?></p>
                        </div>
                        <div style="padding: 0 25px 25px;">
                            <a href="<?php the_permalink(); ?>" class="ufo-btn ufo-btn-secondary" style="border: 1px solid var(--ufo-border); color: #fff; text-decoration: none; font-size: 12px; padding: 8px 16px;">Inscrever-se &rarr;</a>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else:
                    echo '<p style="color: var(--ufo-text-muted);">Nenhum evento agendado no momento. Fique de olho!</p>';
                endif;
                ?>
            </div>
        </section>

        <!-- Banner CTA Final Otimizado Para Conversão -->
        <section class="ufo-cta-section" style="margin-top: 80px; background: linear-gradient(135deg, var(--ufo-surface) 0%, rgba(0, 229, 255, 0.1) 100%); border: 1px solid var(--ufo-border); border-radius: 12px; padding: 50px 30px; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
            <h2 style="font-size: 36px; color: var(--ufo-accent-primary); margin-bottom: 15px;"><?php echo esc_html( $cta_title ); ?></h2>
            <p style="max-width: 700px; margin: 0 auto 30px; font-size: 18px; color: var(--ufo-text-main); line-height: 1.6;"><?php echo esc_html( $cta_desc ); ?></p>
            <a href="<?php echo esc_url( $cta_url ); ?>" target="_blank" class="ufo-btn ufo-btn-primary" style="font-size: 16px; padding: 14px 32px; border-radius: 50px; box-shadow: 0 0 25px rgba(0, 229, 255, 0.5);">
                💬 <?php echo esc_html( $cta_btn_text ); ?>
            </a>
        </section>

        <!-- Ad Placement: Rodapé (Monetização Fim de Página) -->
        <div class="ufo-ad-placement ufo-ad-home-bottom" style="margin-top: 50px;">
            <?php 
                $ad_bottom = get_option('ufo_ad_in_article_bottom');
                if ( ! empty($ad_bottom) ) {
                    echo $ad_bottom;
                } else {
                    echo '<!-- UFO AdManager: Rodapé Monetizado -->';
                }
            ?>
        </div>

    </div>

</main>

<?php get_footer(); ?>
