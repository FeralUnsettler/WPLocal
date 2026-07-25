<?php
/**
 * O template para exibir a Página Inicial (Landing Page Monetizada & Responsiva)
 * Hero com 50% da altura inicial sem textos extras, Vitrine de Vídeos e Seção de Notícias em estilo Netflix 50% compacto em PT-BR
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); 

// Obtém ID da página inicial estática
$page_id = get_option( 'page_on_front' ) ?: get_the_ID();

// Puxa as customizações da Home ou aplica valores por padrão (Tudo rigorosamente em Português do Brasil - PT-BR)
$hero_title       = get_post_meta( $page_id, '_ufo_hero_title', true ) ?: 'A Verdade Está Lá Fora. E Nós Levamos Você Até Ela.';
$hero_subtitle    = get_post_meta( $page_id, '_ufo_hero_subtitle', true ) ?: 'O maior portal brasileiro focado em Turismo Ufológico, Pesquisa de Fenômenos Anômalos e Divulgação Científica.';
$hero_bg          = get_post_meta( $page_id, '_ufo_hero_bg_img', true ) ?: 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=2072&auto=format&fit=crop';
$btn_1_text       = get_post_meta( $page_id, '_ufo_hero_btn_text_1', true ) ?: 'Ver Expedições';
$btn_1_url        = get_post_meta( $page_id, '_ufo_hero_btn_url_1', true ) ?: '#roteiros';
$btn_2_text       = get_post_meta( $page_id, '_ufo_hero_btn_text_2', true ) ?: 'Últimas Notícias';
$btn_2_url        = get_post_meta( $page_id, '_ufo_hero_btn_url_2', true ) ?: '#noticias';

$sec_roteiros_lbl = get_post_meta( $page_id, '_ufo_sec_roteiros_title', true ) ?: 'Próximas Expedições e Roteiros';
$sec_news_lbl     = get_post_meta( $page_id, '_ufo_sec_news_title', true ) ?: 'Últimas Notícias e Relatos';

// Feeds Parallax Customizados
$yt_channels_input = get_post_meta( $page_id, '_ufo_yt_channels', true ) ?: "https://www.youtube.com/@jessemichelsclips\nhttps://www.youtube.com/feeds/videos.xml?channel_id=UC8ZKTXN9trt5dhixz6b6l6w";
$yt_posts_input    = get_post_meta( $page_id, '_ufo_yt_posts_feed', true ) ?: 'https://www.youtube.com/channel/UC8ZKTXN9trt5dhixz6b6l6w/posts';

$cta_title        = get_post_meta( $page_id, '_ufo_cta_title', true ) ?: 'Pronto Para Viver o Desconhecido?';
$cta_desc         = get_post_meta( $page_id, '_ufo_cta_desc', true ) ?: 'Participe de nossos roteiros noturnos com especialistas, equipamentos de visão noturna e guias credenciados.';
$cta_btn_text     = get_post_meta( $page_id, '_ufo_cta_btn_text', true ) ?: 'Agendar Agora pelo WhatsApp';
$cta_url          = get_post_meta( $page_id, '_ufo_cta_url', true ) ?: 'https://wa.me/5511999999999';

// Busca artigos e clips traduzidos para PT-BR para os carrosséis em estilo Netflix
$yt_videos = function_exists('ufo_fetch_channel_videos') ? ufo_fetch_channel_videos($yt_channels_input, 12) : array();
$yt_posts  = function_exists('ufo_fetch_community_posts_feed') ? ufo_fetch_community_posts_feed($yt_posts_input, 8) : array();
?>

<main id="primary" class="ufo-site-main">

    <!-- Hero Section Centralizado Direto com 50% da Altura Inicial (Sem textos supérfluos de boas-vindas) -->
    <section class="ufo-home-hero ufo-hero-half" style="background-image: url('<?php echo esc_url( $hero_bg ); ?>');">
        <div class="ufo-hero-overlay">
            <div class="ufo-container ufo-hero-content ufo-centered-content">
                <h1 class="ufo-hero-title"><?php echo esc_html( $hero_title ); ?></h1>
                <p class="ufo-hero-subtitle"><?php echo esc_html( $hero_subtitle ); ?></p>
                <div class="ufo-hero-actions ufo-actions-centered">
                    <a href="<?php echo esc_attr( $btn_1_url ); ?>" class="ufo-btn ufo-btn-primary"><?php echo esc_html( $btn_1_text ); ?></a>
                    <?php if(!empty($btn_2_text)): ?>
                        <a href="<?php echo esc_attr( $btn_2_url ); ?>" class="ufo-btn ufo-btn-secondary" style="border: 1px solid var(--ufo-text-main); color: var(--ufo-text-main); margin-left: 15px; background: rgba(11,14,20,0.65); backdrop-filter: blur(8px);"><?php echo esc_html( $btn_2_text ); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <div class="ufo-container ufo-home-container" style="padding-top: 35px;">

        <!-- ZONA DE MONETIZAÇÃO 1: Topo da Home (Above The Fold Centralizado) -->
        <div class="ufo-ad-placement ufo-ad-home-top">
            <span class="ufo-ad-label">Patrocinado</span>
            <div class="ufo-ad-box-centered">
                <?php 
                    $ad_top = get_option('ufo_ad_home_top');
                    if ( ! empty($ad_top) ) {
                        echo $ad_top;
                    } else {
                        echo '<div class="ufo-ad-placeholder">📢 Google AdSense / Ad Manager • Top Leaderboard (728x90) • High RPM Placement</div>';
                    }
                ?>
            </div>
        </div>

        <!-- Seção: Destaques de Canais em Estilo Netflix Compacto (1/4 do volume, traduzido para PT-BR com Preview On-Hover) -->
        <section class="ufo-home-section ufo-carousel-wrapper" style="position: relative; margin-top: 35px;">
            <div class="ufo-section-header">
                <div>
                    <span style="color: var(--ufo-accent-sci); font-size: 12px; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; display: block; margin-bottom: 5px;">📡 Coletâneas Especiais de Canais</span>
                    <h2>Destaques em Vídeo: Pesquisa & Investigação Anômala</h2>
                </div>
                <a href="<?php echo get_permalink( get_option('page_for_posts') ) ?: '#'; ?>" class="ufo-view-all">Ver Acervo Central no Portal &rarr;</a>
            </div>

            <p style="color: var(--ufo-text-muted); font-size: 14px; margin-top: -15px; margin-bottom: 20px;">
                Passe o mouse sobre os cards para pré-visualização instantânea do vídeo. Use as setas para rolar horizontalmente o acervo em PT-BR.
            </p>

            <!-- Viewport Relativa com Botões de Rolagem Animados -->
            <div class="ufo-slider-viewport">
                <button type="button" class="ufo-arrow-btn ufo-arrow-left" id="btnSlideLeft" aria-label="Rolar para esquerda">&lsaquo;</button>
                
                <div class="ufo-compact-carousel" id="ufoVideoCarousel">
                    <?php 
                    if ( ! empty($yt_videos) ) :
                        foreach ( $yt_videos as $vid ) :
                            $hub_url = get_permalink( get_option('page_for_posts') ) ?: home_url('/noticias/');
                            // Garante título traduzido no template caso de fallback exterior
                            $titulo_ptbr = function_exists('ufo_auto_translate_ptbr') ? ufo_auto_translate_ptbr($vid['title']) : $vid['title'];
                    ?>
                        <div class="ufo-compact-card-wrapper">
                            <a href="<?php echo esc_url($hub_url); ?>" class="ufo-compact-video-card" data-videoid="<?php echo esc_attr($vid['video_id']); ?>">
                                <div class="ufo-compact-media-box">
                                    <div class="ufo-hover-thumb" style="background-image: url('<?php echo esc_url($vid['thumb']); ?>');"></div>
                                    <div class="ufo-hover-iframe-container"></div>
                                    <span class="ufo-compact-badge">🎬 Preview</span>
                                </div>
                                <div class="ufo-compact-card-info">
                                    <span class="ufo-compact-channel">▶️ <?php echo esc_html($vid['channel']); ?></span>
                                    <h3 class="ufo-compact-title"><?php echo esc_html(wp_trim_words($titulo_ptbr, 9)); ?></h3>
                                    <span class="ufo-compact-link">Assistir em Português &rarr;</span>
                                </div>
                            </a>
                        </div>
                    <?php 
                        endforeach;
                    else :
                        echo '<p style="color: var(--ufo-text-muted);">Nenhum feed disponível no momento.</p>';
                    endif;
                    ?>
                </div>

                <button type="button" class="ufo-arrow-btn ufo-arrow-right" id="btnSlideRight" aria-label="Rolar para direita">&rsaquo;</button>
            </div>
        </section>

        <!-- ZONA DE MONETIZAÇÃO 2: Meio de Página / Entre-Galerias -->
        <div class="ufo-ad-placement ufo-ad-in-feed">
            <span class="ufo-ad-label">Publicidade</span>
            <div class="ufo-ad-box-centered">
                <?php 
                    $ad_feed = get_option('ufo_ad_in_article_top');
                    if ( ! empty($ad_feed) ) {
                        echo $ad_feed;
                    } else {
                        echo '<div class="ufo-ad-placeholder">📢 Google Ad Manager • In-Feed Native Placement (Otimizado Para CTR)</div>';
                    }
                ?>
            </div>
        </div>

        <!-- Seção: Últimas Notícias (Agora no Estilo Netflix Compacto com 50% de dimensão e Rolagem Direcional Animada) -->
        <section id="noticias" class="ufo-home-section ufo-carousel-wrapper" style="position: relative; margin-top: 45px;">
            <div class="ufo-section-header">
                <div>
                    <span style="color: var(--ufo-accent-primary); font-size: 13px; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; display: block; margin-bottom: 5px;">📰 Divulgação Científica & Jornalismo</span>
                    <h2><?php echo esc_html( $sec_news_lbl ); ?></h2>
                </div>
                <a href="<?php echo get_permalink( get_option('page_for_posts') ) ?: '#'; ?>" class="ufo-view-all">Acessar Portal Jornalístico &rarr;</a>
            </div>

            <p style="color: var(--ufo-text-muted); font-size: 14px; margin-top: -15px; margin-bottom: 20px;">
                Explore nossa redação independente de pesquisa UAP e artigos de desclassificação. Deslize pela linha do tempo em formato de vitrine de streaming.
            </p>

            <!-- Viewport Relativa para Carrossel de Notícias Estilo Netflix -->
            <div class="ufo-slider-viewport">
                <button type="button" class="ufo-arrow-btn ufo-arrow-left" id="btnNewsLeft" aria-label="Rolar notícias para esquerda">&lsaquo;</button>
                
                <div class="ufo-compact-carousel" id="ufoNewsCarousel">
                    <?php
                    // Integra notícias nativas com o feed da comunidade Jesse Michels em PT-BR para uma experiência de streaming rica
                    $all_news_items = array();
                    
                    $news_query = new WP_Query( array(
                        'post_type'      => 'post',
                        'posts_per_page' => 8,
                        'post_status'    => 'publish'
                    ) );

                    if ( $news_query->have_posts() ) {
                        while ( $news_query->have_posts() ) {
                            $news_query->the_post();
                            $all_news_items[] = array(
                                'title'   => function_exists('ufo_auto_translate_ptbr') ? ufo_auto_translate_ptbr(get_the_title()) : get_the_title(),
                                'url'     => get_permalink(),
                                'thumb'   => get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) ?: 'https://images.unsplash.com/photo-1534447677768-be436bb09401?q=80&w=600&auto=format&fit=crop',
                                'date'    => get_the_date('d M, Y'),
                                'source'  => 'Redação UFOTurismo'
                            );
                        }
                        wp_reset_postdata();
                    }

                    // Preenche com posts da comunidade e relatórios exopolíticos do sistema
                    if ( ! empty($yt_posts) ) {
                        foreach ( $yt_posts as $yp ) {
                            $all_news_items[] = array(
                                'title'  => $yp['title'],
                                'url'    => $yp['url'],
                                'thumb'  => $yp['thumb'],
                                'date'   => $yp['date'],
                                'source' => $yp['author']
                            );
                        }
                    }

                    if ( ! empty($all_news_items) ) :
                        foreach ( $all_news_items as $n_item ) :
                    ?>
                        <div class="ufo-compact-card-wrapper">
                            <a href="<?php echo esc_url($n_item['url']); ?>" class="ufo-compact-video-card ufo-compact-news-item">
                                <div class="ufo-compact-media-box" style="height: 135px; background-image: url('<?php echo esc_url($n_item['thumb']); ?>'); background-size: cover; background-position: center;">
                                    <span class="ufo-compact-badge" style="background: var(--ufo-accent-primary); color: #fff;">📰 <?php echo esc_html($n_item['date']); ?></span>
                                </div>
                                <div class="ufo-compact-card-info">
                                    <span class="ufo-compact-channel">📌 <?php echo esc_html($n_item['source']); ?></span>
                                    <h3 class="ufo-compact-title"><?php echo esc_html(wp_trim_words($n_item['title'], 9)); ?></h3>
                                    <span class="ufo-compact-link">Ler na íntegra &rarr;</span>
                                </div>
                            </a>
                        </div>
                    <?php
                        endforeach;
                    else:
                        echo '<p style="color: var(--ufo-text-muted);">Nenhuma notícia publicada ainda no portal.</p>';
                    endif;
                    ?>
                </div>

                <button type="button" class="ufo-arrow-btn ufo-arrow-right" id="btnNewsRight" aria-label="Rolar notícias para direita">&rsaquo;</button>
            </div>
        </section>

        <!-- Seção: Roteiros em Destaque (Turismo Ufológico) -->
        <section id="roteiros" class="ufo-home-section" style="margin-top: 55px;">
            <div class="ufo-section-header">
                <div>
                    <span style="color: var(--ufo-accent-sci); font-size: 13px; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; display: block; margin-bottom: 5px;">🛸 Expedições de Campo</span>
                    <h2><?php echo esc_html( $sec_roteiros_lbl ); ?></h2>
                </div>
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
                            <a href="<?php the_permalink(); ?>" class="ufo-btn ufo-btn-primary" style="margin-top: 15px; padding: 10px 20px; font-size: 13px; display: inline-block;">Detalhes da Expedição</a>
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

        <!-- ZONA DE MONETIZAÇÃO 3: Meio Inferior -->
        <div class="ufo-ad-placement ufo-ad-mid-bottom">
            <span class="ufo-ad-label">Publicidade</span>
            <div class="ufo-ad-box-centered">
                <?php 
                    $ad_mid = get_option('ufo_ad_in_article_mid');
                    if ( ! empty($ad_mid) ) {
                        echo $ad_mid;
                    } else {
                        echo '<div class="ufo-ad-placeholder">📢 Google Ad Manager • Mid-Page Conversions & Sponsor Placement</div>';
                    }
                ?>
            </div>
        </div>

        <!-- Seção: Agenda de Congressos e Eventos -->
        <section id="eventos" class="ufo-home-section" style="margin-top: 55px;">
            <div class="ufo-section-header">
                <div>
                    <span style="color: var(--ufo-accent-sci); font-size: 13px; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; display: block; margin-bottom: 5px;">🗓️ Encontros Presenciais</span>
                    <h2>Agenda de Congressos e Eventos</h2>
                </div>
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
        <section id="cta" class="ufo-cta-section" style="margin-top: 70px; background: linear-gradient(135deg, var(--ufo-surface) 0%, rgba(0, 229, 255, 0.12) 100%); border: 1px solid var(--ufo-border); border-radius: 12px; padding: 55px 35px; text-align: center; box-shadow: 0 10px 35px rgba(0,0,0,0.6);">
            <h2 style="font-size: 36px; color: var(--ufo-accent-primary); margin-bottom: 15px; font-family: var(--ufo-font-heading);"><?php echo esc_html( $cta_title ); ?></h2>
            <p style="max-width: 700px; margin: 0 auto 32px; font-size: 18px; color: var(--ufo-text-main); line-height: 1.6;"><?php echo esc_html( $cta_desc ); ?></p>
            <a href="<?php echo esc_url( $cta_url ); ?>" target="_blank" class="ufo-btn ufo-btn-primary" style="font-size: 16px; padding: 15px 35px; border-radius: 50px; box-shadow: 0 0 25px rgba(0, 229, 255, 0.5); font-weight: 800;">
                💬 <?php echo esc_html( $cta_btn_text ); ?>
            </a>
        </section>

        <!-- ZONA DE MONETIZAÇÃO 4: Rodapé de Encerramento (Monetização Final) -->
        <div class="ufo-ad-placement ufo-ad-home-bottom" style="margin-top: 60px;">
            <span class="ufo-ad-label">Patrocinado</span>
            <div class="ufo-ad-box-centered">
                <?php 
                    $ad_bottom = get_option('ufo_ad_in_article_bottom');
                    if ( ! empty($ad_bottom) ) {
                        echo $ad_bottom;
                    } else {
                        echo '<div class="ufo-ad-placeholder">📢 Google AdSense / Ad Manager • Rodapé Monetizado • High Completion RPM</div>';
                    }
                ?>
            </div>
        </div>

    </div>

</main>

<!-- Vanilla JS Carousel (Vídeos & Notícias) & Hover Preview Engine -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 1. Controle de Rolagem Horizontal Animada Para a Galeria Compacta de Vídeos
    var videoCarousel = document.getElementById('ufoVideoCarousel');
    var btnLeft  = document.getElementById('btnSlideLeft');
    var btnRight = document.getElementById('btnSlideRight');

    if (videoCarousel && btnLeft && btnRight) {
        btnLeft.addEventListener('click', function() {
            var scrollAmount = window.innerWidth > 768 ? -750 : -280;
            videoCarousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        });
        btnRight.addEventListener('click', function() {
            var scrollAmount = window.innerWidth > 768 ? 750 : 280;
            videoCarousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        });
    }

    // 2. Controle de Rolagem Horizontal Animada Para a Seção de Notícias (Estilo Netflix Compacta)
    var newsCarousel = document.getElementById('ufoNewsCarousel');
    var btnNewsLeft  = document.getElementById('btnNewsLeft');
    var btnNewsRight = document.getElementById('btnNewsRight');

    if (newsCarousel && btnNewsLeft && btnNewsRight) {
        btnNewsLeft.addEventListener('click', function() {
            var scrollAmount = window.innerWidth > 768 ? -750 : -280;
            newsCarousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        });
        btnNewsRight.addEventListener('click', function() {
            var scrollAmount = window.innerWidth > 768 ? 750 : 280;
            newsCarousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        });
    }

    // 3. Preview de Vídeo On-Hover e On-Touch (Injeta Iframe mudo no mouseenter)
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
