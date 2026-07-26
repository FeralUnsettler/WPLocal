<?php
/**
 * O template principal para o Portal Jornalístico (Página de Notícias & Central de Canais em PT-BR)
 * Exibe as notícias e vídeos traduzidos no formato compacto com Zonas Centrais de Publicidade Ad Manager
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header(); 

$front_id      = get_option( 'page_on_front' );
$yt_channels   = get_post_meta( $front_id, '_ufo_yt_channels', true ) ?: "https://www.youtube.com/@jessemichelsclips\nhttps://www.youtube.com/feeds/videos.xml?channel_id=UC8ZKTXN9trt5dhixz6b6l6w";
$yt_posts_feed = get_post_meta( $front_id, '_ufo_yt_posts_feed', true ) ?: 'https://www.youtube.com/channel/UC8ZKTXN9trt5dhixz6b6l6w/posts';

$yt_videos     = function_exists('ufo_fetch_channel_videos') ? ufo_fetch_channel_videos($yt_channels, 12) : array();
$yt_posts      = function_exists('ufo_fetch_community_posts_feed') ? ufo_fetch_community_posts_feed($yt_posts_feed, 8) : array();
?>

<main id="primary" class="ufo-site-main">

    <!-- Hero do Portal Jornalístico (50% de Altura Compactada) -->
    <section class="ufo-home-hero ufo-hero-half" style="background-image: url('https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=2072&auto=format&fit=crop');">
        <div class="ufo-hero-overlay">
            <div class="ufo-container ufo-hero-content ufo-centered-content">
                <span class="ufo-badge-playlist">📰 CENTRAL JORNALÍSTICA & MÍDIA INDEPENDENTE</span>
                <h1 class="ufo-hero-title" style="font-size: 40px;">Portal de Notícias & Investigação Anômala</h1>
                <p class="ufo-hero-subtitle" style="font-size: 16px;">Acervo completo de reportagens, documentos desclassificados e feeds de pesquisadores internacionais (Jesse Michels, AARO & Exopolítica), em Português (PT-BR).</p>
            </div>
        </div>
    </section>

    <div class="ufo-container ufo-home-container" style="padding-top: 35px;">
        <?php
        // ==== SUPORTE OBRIGATÓRIO E INCONDICIONAL AO CONSTRUTOR ELEMENTOR PRO ====
        while ( have_posts() ) : the_post(); ?>
            <div class="ufo-elementor-content-box" style="position: relative; z-index: 5; width: 100%;">
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>

        <!-- ZONA DE MONETIZAÇÃO 1: Topo da Central de Notícias (Centralizada) -->
        <div class="ufo-ad-placement ufo-ad-home-top" style="margin-bottom: 45px;">
            <span class="ufo-ad-label">Patrocinado</span>
            <div class="ufo-ad-box-centered">
                <?php 
                    $ad_top = get_option('ufo_ad_in_article_top');
                    if ( ! empty($ad_top) ) {
                        echo $ad_top;
                    } else {
                        echo '<div class="ufo-ad-placeholder">📢 Google AdSense / Ad Manager • Topo Central de Notícias • High RPM Placement</div>';
                    }
                ?>
            </div>
        </div>

        <!-- Seção: Canais Atuais Em Destaque (Traduzidos em PT-BR com Preview On-Hover) -->
        <section class="ufo-home-section ufo-carousel-wrapper" style="position: relative;">
            <div class="ufo-section-header">
                <div>
                    <span style="color: var(--ufo-accent-sci); font-size: 13px; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; display: block; margin-bottom: 5px;">📡 Monitoramento em Mídia PT-BR</span>
                    <h2>Canais Atuais e Coletâneas Em Destaque</h2>
                </div>
                <a href="<?php echo home_url('/videos/'); ?>" class="ufo-view-all">Acessar Cinema Mode &rarr;</a>
            </div>
            
            <p style="color: var(--ufo-text-muted); font-size: 14px; margin-top: -15px; margin-bottom: 25px;">
                Nossa redação monitora e converte para o Português do Brasil os conteúdos mais reveladores da pesquisa de UAPs e Exopolítica mundial.
            </p>

            <div class="ufo-slider-viewport">
                <button type="button" class="ufo-arrow-btn ufo-arrow-left" id="btnHubLeft" aria-label="Rolar para esquerda">&lsaquo;</button>
                
                <div class="ufo-compact-carousel" id="ufoHubCarousel">
                    <?php 
                    if ( ! empty($yt_videos) ) :
                        foreach ( $yt_videos as $v ) :
                            $v_titulo = function_exists('ufo_auto_translate_ptbr') ? ufo_auto_translate_ptbr($v['title']) : $v['title'];
                    ?>
                        <div class="ufo-compact-card-wrapper">
                            <a href="<?php echo esc_url($v['link']); ?>" target="_blank" class="ufo-compact-video-card" data-videoid="<?php echo esc_attr($v['video_id']); ?>">
                                <div class="ufo-compact-media-box">
                                    <div class="ufo-hover-thumb" style="background-image: url('<?php echo esc_url($v['thumb']); ?>');"></div>
                                    <div class="ufo-hover-iframe-container"></div>
                                    <span class="ufo-compact-badge">🎬 PT-BR</span>
                                </div>
                                <div class="ufo-compact-card-info">
                                    <span class="ufo-compact-channel">🎞️ <?php echo esc_html($v['channel']); ?></span>
                                    <h3 class="ufo-compact-title"><?php echo esc_html(wp_trim_words($v_titulo, 9)); ?></h3>
                                    <span class="ufo-compact-link">Assistir no Canal &rarr;</span>
                                </div>
                            </a>
                        </div>
                    <?php 
                        endforeach;
                    else :
                        echo '<p>Nenhum vídeo carregado no momento.</p>';
                    endif;
                    ?>
                </div>

                <button type="button" class="ufo-arrow-btn ufo-arrow-right" id="btnHubRight" aria-label="Rolar para direita">&rsaquo;</button>
            </div>
        </section>

        <!-- ZONA DE MONETIZAÇÃO 2: Meio do Portal Jornalístico -->
        <div class="ufo-ad-placement ufo-ad-in-feed" style="margin: 55px auto;">
            <span class="ufo-ad-label">Publicidade</span>
            <div class="ufo-ad-box-centered">
                <?php 
                    $ad_mid = get_option('ufo_ad_in_article_mid');
                    if ( ! empty($ad_mid) ) {
                        echo $ad_mid;
                    } else {
                        echo '<div class="ufo-ad-placeholder">📢 Google Ad Manager • Meio da Central Jornalística (Otimizado Para Leitura)</div>';
                    }
                ?>
            </div>
        </div>

        <!-- Seção: Artigos Regulares Nativos da Redação UFOTurismo -->
        <section class="ufo-home-section" style="margin-top: 50px;">
            <div class="ufo-section-header">
                <h2>🖋️ Redação UFOTurismo: Reportagens e Relatos em PT-BR</h2>
            </div>

            <div class="ufo-grid-3">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        $thumb_bg = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) ?: 'https://images.unsplash.com/photo-1506703719100-a0f3a48c0f86?q=80&w=600&auto=format&fit=crop';
                        $t_pt = function_exists('ufo_auto_translate_ptbr') ? ufo_auto_translate_ptbr(get_the_title()) : get_the_title();
                ?>
                    <div class="ufo-card">
                        <div class="ufo-card-img" style="background-image: url('<?php echo esc_url( $thumb_bg ); ?>'); height: 170px;"></div>
                        <div class="ufo-card-body">
                            <span style="color: var(--ufo-text-muted); font-size: 12px; display: block; margin-bottom: 8px;"><?php echo get_the_date(); ?> • Redação UFOTurismo</span>
                            <h3><a href="<?php the_permalink(); ?>"><?php echo esc_html($t_pt); ?></a></h3>
                            <p style="color: var(--ufo-text-muted); font-size: 14px;"><?php echo wp_trim_words( get_the_excerpt() ?: get_the_content(), 15 ); ?></p>
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

            <div style="margin-top: 40px; text-align: center;">
                <?php 
                    echo paginate_links(array(
                        'prev_text' => '&laquo; Anterior',
                        'next_text' => 'Próximo &raquo;'
                    ));
                ?>
            </div>
        </section>

        <!-- ZONA DE MONETIZAÇÃO 3: Rodapé do Portal de Notícias -->
        <div class="ufo-ad-placement ufo-ad-home-bottom" style="margin-top: 60px;">
            <span class="ufo-ad-label">Patrocinado</span>
            <div class="ufo-ad-box-centered">
                <?php 
                    $ad_bottom = get_option('ufo_ad_in_article_bottom');
                    if ( ! empty($ad_bottom) ) {
                        echo $ad_bottom;
                    } else {
                        echo '<div class="ufo-ad-placeholder">📢 Google AdSense / Ad Manager • Rodapé do Portal Jornalístico</div>';
                    }
                ?>
            </div>
        </div>

    </div>

</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var hubCarousel = document.getElementById('ufoHubCarousel');
    var btnLeft = document.getElementById('btnHubLeft');
    var btnRight = document.getElementById('btnHubRight');

    if (hubCarousel && btnLeft && btnRight) {
        btnLeft.addEventListener('click', function() {
            hubCarousel.scrollBy({ left: -700, behavior: 'smooth' });
        });
        btnRight.addEventListener('click', function() {
            hubCarousel.scrollBy({ left: 700, behavior: 'smooth' });
        });
    }

    var compactCards = document.querySelectorAll('.ufo-compact-video-card[data-videoid]');
    compactCards.forEach(function(card) {
        var videoId = card.getAttribute('data-videoid');
        var container = card.querySelector('.ufo-hover-iframe-container');
        var hoverTimeout;

        card.addEventListener('mouseenter', function() {
            hoverTimeout = setTimeout(function() {
                if (container && videoId && !container.hasChildNodes()) {
                    var iframe = document.createElement('iframe');
                    iframe.setAttribute('src', 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&mute=1&controls=0&loop=1&playlist=' + videoId);
                    iframe.setAttribute('class', 'ufo-hover-iframe');
                    iframe.setAttribute('allow', 'autoplay; encrypted-media');
                    container.appendChild(iframe);
                }
            }, 150); 
        });

        card.addEventListener('mouseleave', function() {
            clearTimeout(hoverTimeout);
            if (container) {
                container.innerHTML = '';
            }
        });
    });
});
</script>

<?php get_footer(); ?>
