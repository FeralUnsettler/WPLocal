<?php
/**
 * O template principal para o Portal Jornalístico (Página de Notícias & Central de Canais)
 * Exibe as notícias do portal e agrega todos os canais do YouTube/RSS utilizados atualmente na plataforma
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); 

// Obtém as configurações de canais vindas da página inicial (UFO Studio)
$front_id      = get_option( 'page_on_front' );
$yt_channels   = get_post_meta( $front_id, '_ufo_yt_channels', true ) ?: "https://www.youtube.com/@jessemichelsclips\nhttps://www.youtube.com/feeds/videos.xml?channel_id=UC8ZKTXN9trt5dhixz6b6l6w";
$yt_posts_feed = get_post_meta( $front_id, '_ufo_yt_posts_feed', true ) ?: 'https://www.youtube.com/channel/UC8ZKTXN9trt5dhixz6b6l6w/posts';

$yt_videos     = function_exists('ufo_fetch_channel_videos') ? ufo_fetch_channel_videos($yt_channels, 9) : array();
$yt_posts      = function_exists('ufo_fetch_community_posts_feed') ? ufo_fetch_community_posts_feed($yt_posts_feed, 6) : array();
?>

<main id="primary" class="ufo-site-main">

    <!-- Hero do Portal Jornalístico -->
    <section class="ufo-home-hero" style="background-image: url('https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=2072&auto=format&fit=crop'); min-height: 400px;">
        <div class="ufo-hero-overlay" style="min-height: 400px;">
            <div class="ufo-container ufo-hero-content" style="text-align: center; max-width: 900px;">
                <span class="ufo-badge-playlist">📰 CENTRAL JORNALÍSTICA & MÍDIA INDEPENDENTE</span>
                <h1 class="ufo-hero-title" style="font-size: 46px;">Portal de Notícias & Investigação Anômala</h1>
                <p class="ufo-hero-subtitle">Acervo completo de reportagens, documentos desclassificados efeeds em tempo real de pesquisadores internacionais (Jesse Michels, AARO, Colares & Exopolítica).</p>
            </div>
        </div>
    </section>

    <div class="ufo-container ufo-home-container">

        <!-- Ad Placement: Topo de Notícias -->
        <div class="ufo-ad-placement ufo-ad-home-top" style="margin-bottom: 50px;">
            <?php 
                $ad_top = get_option('ufo_ad_in_article_top');
                if ( ! empty($ad_top) ) {
                    echo $ad_top;
                } else {
                    echo '<!-- UFO AdManager: Topo da Central de Notícias -->';
                }
            ?>
        </div>

        <!-- Seção: Todos os Canais e Vídeos em Destaque na Plataforma -->
        <section class="ufo-home-section">
            <div class="ufo-section-header">
                <div>
                    <span style="color: var(--ufo-accent-sci); font-size: 13px; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; display: block; margin-bottom: 5px;">📡 Monitoramento em Mídia</span>
                    <h2>Canais Atuais e Coletâneas Em Destaque</h2>
                </div>
                <a href="<?php echo home_url('/videos/'); ?>" class="ufo-view-all">Acessar Cinema Mode &rarr;</a>
            </div>
            
            <p style="color: var(--ufo-text-muted); font-size: 15px; margin-top: -15px; margin-bottom: 35px; line-height: 1.6;">
                Nossa redação monitora e agrega continuamente os conteúdos mais rigorosos e reveladores da comunidade global de pesquisa de UAPs. Abaixo estão todos os feeds e vídeos incorporados ativamente ao ecossistema UFOTurismo:
            </p>

            <div class="ufo-grid-3">
                <?php 
                if ( ! empty($yt_videos) ) :
                    foreach ( $yt_videos as $v ) :
                ?>
                    <div class="ufo-card" style="display: flex; flex-direction: column; justify-content: space-between;">
                        <div class="ufo-card-img" style="background-image: url('<?php echo esc_url($v['thumb']); ?>'); height: 190px; position: relative;">
                            <a href="<?php echo esc_url($v['link']); ?>" target="_blank" class="ufo-play-overlay" style="text-decoration: none;">►</a>
                        </div>
                        <div class="ufo-card-body">
                            <span style="color: var(--ufo-accent-primary); font-size: 12px; font-weight: 700; display: block; margin-bottom: 8px;">🎞️ Canal: <?php echo esc_html($v['channel']); ?></span>
                            <h3 style="font-size: 19px; line-height: 1.3;"><a href="<?php echo esc_url($v['link']); ?>" target="_blank"><?php echo esc_html($v['title']); ?></a></h3>
                        </div>
                    </div>
                <?php 
                    endforeach;
                else :
                    echo '<p>Nenhum vídeo carregado no momento.</p>';
                endif;
                ?>
            </div>
        </section>

        <!-- Seção: Posts Especiais e Comunidade -->
        <section class="ufo-home-section" style="margin-top: 60px;">
            <div class="ufo-section-header">
                <div>
                    <span style="color: var(--ufo-accent-primary); font-size: 13px; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; display: block; margin-bottom: 5px;">💬 Feed Comunitário</span>
                    <h2>Destaques do Fórum & Discussões de Canais</h2>
                </div>
            </div>

            <div class="ufo-grid-3">
                <?php 
                if ( ! empty($yt_posts) ) :
                    foreach ( $yt_posts as $post_item ) :
                ?>
                    <article class="ufo-card ufo-news-card" style="background: rgba(21, 26, 34, 0.7); border-color: #2A313C;">
                        <div class="ufo-card-body">
                            <span class="ufo-news-date"><?php echo esc_html($post_item['date']); ?> &nbsp;|&nbsp; 👑 <?php echo esc_html($post_item['author']); ?></span>
                            <h3 style="margin: 10px 0;"><a href="<?php echo esc_url($post_item['url']); ?>"><?php echo esc_html($post_item['title']); ?></a></h3>
                            <p style="color: var(--ufo-text-muted); font-size: 14px; line-height: 1.5;"><?php echo esc_html($post_item['excerpt']); ?></p>
                            <a href="<?php echo esc_url($post_item['url']); ?>" style="color: var(--ufo-accent-sci); text-decoration: none; font-size: 13px; font-weight: 700; display: inline-block; margin-top: 15px;">Ler na íntegra &rarr;</a>
                        </div>
                    </article>
                <?php 
                    endforeach;
                endif;
                ?>
            </div>
        </section>

        <!-- Seção: Artigos Regulares Nativos do Blog WordPress -->
        <section class="ufo-home-section" style="margin-top: 70px; border-top: 1px solid var(--ufo-border); padding-top: 50px;">
            <div class="ufo-section-header">
                <h2>🖋️ Redação UFOTurismo: Reportagens e Relatos Nativos</h2>
            </div>

            <div class="ufo-grid-3">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        $thumb_bg = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) ?: 'https://images.unsplash.com/photo-1506703719100-a0f3a48c0f86?q=80&w=600&auto=format&fit=crop';
                ?>
                    <div class="ufo-card">
                        <div class="ufo-card-img" style="background-image: url('<?php echo esc_url( $thumb_bg ); ?>');"></div>
                        <div class="ufo-card-body">
                            <span style="color: var(--ufo-text-muted); font-size: 12px; display: block; margin-bottom: 8px;"><?php echo get_the_date(); ?> • Por <?php echo get_the_author(); ?></span>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p style="color: var(--ufo-text-muted); font-size: 14px;"><?php echo wp_trim_words( get_the_excerpt() ?: get_the_content(), 16 ); ?></p>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p style="color: var(--ufo-text-muted);">Em breve nossa redação publicará novos artigos inéditos aqui.</p>';
                endif;
                ?>
            </div>

            <!-- Paginação -->
            <div style="margin-top: 40px; text-align: center;">
                <?php 
                    echo paginate_links(array(
                        'prev_text' => '&laquo; Anterior',
                        'next_text' => 'Próximo &raquo;'
                    ));
                ?>
            </div>
        </section>

        <!-- Ad Placement: Rodapé de Notícias -->
        <div class="ufo-ad-placement ufo-ad-home-bottom" style="margin-top: 50px;">
            <?php 
                $ad_bottom = get_option('ufo_ad_in_article_bottom');
                if ( ! empty($ad_bottom) ) {
                    echo $ad_bottom;
                }
            ?>
        </div>

    </div>

</main>

<?php get_footer(); ?>
