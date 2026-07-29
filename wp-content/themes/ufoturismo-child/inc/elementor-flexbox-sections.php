<?php
/**
 * Módulo de Flexbox Editáveis do Elementor & Shortcodes Modulares (UFOTurismo PRO)
 * Cumprimento Integral da Diretriz RNF-UI-001 (antigravity.md) - Arquitetura de Componentes & Widgets Nativos
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/* ==========================================================================
   1. FUNÇÕES DE RENDERIZAÇÃO MODULAR DOS 8 COMPONENTES PRINCIPAIS
   ========================================================================== */

/**
 * Módulo 1: Jumbotron Hero de 4 Slides (Repeater Dinâmico no Elementor)
 */
function ufo_render_section_jumbotron( $settings = array() ) {
    $page_id       = get_option( 'page_on_front' ) ?: ( get_the_ID() ?: 0 );
    $hero_title    = ! empty( $settings['default_title'] ) ? $settings['default_title'] : ( get_post_meta( $page_id, '_ufo_hero_title', true ) ?: 'A Verdade Está Lá Fora. E Nós Levamos Você Até Ela.' );
    $hero_subtitle = ! empty( $settings['default_subtitle'] ) ? $settings['default_subtitle'] : ( get_post_meta( $page_id, '_ufo_hero_subtitle', true ) ?: 'O maior portal brasileiro focado em Turismo Ufológico, Pesquisa de Fenômenos Anômalos e Divulgação Científica.' );
    $btn_1_text    = get_post_meta( $page_id, '_ufo_hero_btn_text_1', true ) ?: 'Ver Expedições';
    $btn_1_url     = get_post_meta( $page_id, '_ufo_hero_btn_url_1', true ) ?: '#roteiros';
    $btn_2_text    = get_post_meta( $page_id, '_ufo_hero_btn_text_2', true ) ?: 'Últimas Notícias';
    $btn_2_url     = get_post_meta( $page_id, '_ufo_hero_btn_url_2', true ) ?: '#noticias';

    ob_start();
    ?>
    <section class="ufo-jumbotron ufo-elementor-flexbox-block ufo-jumbotron-dynamic" id="ufoJumbotronSlider" data-autoplay="5000" data-speed="600" style="position: relative; width: 100%; overflow: hidden; background: var(--ufo-bg);">
        <div class="ufo-jumbotron-track" id="ufoJumbotronTrack" style="display: flex; transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1);">
            <!-- Slide 1: Proposta de Valor Principal -->
            <div class="ufo-jumbotron-slide" style="flex: 0 0 100%; width: 100%; background-image: url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=2072&auto=format&fit=crop'); background-size: cover; background-position: center; min-height: 600px; display: flex; align-items: center;">
                <div class="ufo-hero-overlay" style="width: 100%; height: 100%; background: linear-gradient(180deg, rgba(11,14,20,0.5) 0%, rgba(11,14,20,0.85) 100%); padding: 80px 0;">
                    <div class="ufo-container ufo-hero-content ufo-centered-content" style="max-width: 1100px; margin: 0 auto; text-align: center; padding: 0 20px;">
                        <h1 class="ufo-hero-title" style="font-family: var(--ufo-font-heading); font-size: 48px; color: #fff; font-weight: 800; margin-bottom: 20px; text-shadow: 0 2px 10px rgba(0,0,0,0.8); line-height: 1.2;"><?php echo esc_html( $hero_title ); ?></h1>
                        <p class="ufo-hero-subtitle" style="font-size: 20px; color: var(--ufo-text-main); max-width: 820px; margin: 0 auto 35px; line-height: 1.6; text-shadow: 0 1px 5px rgba(0,0,0,0.8);"><?php echo esc_html( $hero_subtitle ); ?></p>
                        <div class="ufo-hero-actions ufo-actions-centered" style="display: flex; justify-content: center; align-items: center; flex-wrap: wrap; gap: 15px;">
                            <a href="<?php echo esc_attr( $btn_1_url ); ?>" class="ufo-btn ufo-btn-primary" style="font-weight: 800; font-size: 16px; padding: 14px 32px; border-radius: 50px; text-decoration: none; transition: 0.3s all; background: var(--ufo-accent-primary); border: 1px solid var(--ufo-accent-primary); color: #000; box-shadow: 0 0 25px rgba(0, 229, 255, 0.5);"><?php echo esc_html( $btn_1_text ); ?></a>
                            <a href="<?php echo esc_attr( $btn_2_url ); ?>" class="ufo-btn ufo-btn-secondary" style="border: 1px solid var(--ufo-text-main); color: var(--ufo-text-main); background: rgba(11,14,20,0.65); backdrop-filter: blur(8px); font-weight: 700; font-size: 16px; padding: 14px 32px; border-radius: 50px; text-decoration: none; transition: 0.3s all;"><?php echo esc_html( $btn_2_text ); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 2: Expedições de Campo & Visão Noturna FLIR -->
            <div class="ufo-jumbotron-slide" style="flex: 0 0 100%; width: 100%; background-image: url('https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=2000&auto=format&fit=crop'); background-size: cover; background-position: center; min-height: 600px; display: flex; align-items: center;">
                <div class="ufo-hero-overlay" style="width: 100%; height: 100%; background: linear-gradient(180deg, rgba(11,14,20,0.5) 0%, rgba(11,14,20,0.85) 100%); padding: 80px 0;">
                    <div class="ufo-container ufo-hero-content ufo-centered-content" style="max-width: 1100px; margin: 0 auto; text-align: center; padding: 0 20px;">
                        <h2 class="ufo-hero-title" style="font-family: var(--ufo-font-heading); font-size: 48px; color: #fff; font-weight: 800; margin-bottom: 20px; text-shadow: 0 2px 10px rgba(0,0,0,0.8); line-height: 1.2;">Expedições Noturnas Com Tecnologia FLIR e Radar Passivo</h2>
                        <p class="ufo-hero-subtitle" style="font-size: 20px; color: var(--ufo-text-main); max-width: 820px; margin: 0 auto 35px; line-height: 1.6; text-shadow: 0 1px 5px rgba(0,0,0,0.8);">Investigue avistamentos de campo com especialistas credenciados, equipamentos ópticos infravermelhos e sensores de gravidade nos roteiros do Brasil.</p>
                        <div class="ufo-hero-actions ufo-actions-centered" style="display: flex; justify-content: center; align-items: center; flex-wrap: wrap; gap: 15px;">
                            <a href="#roteiros" class="ufo-btn ufo-btn-primary" style="font-weight: 800; font-size: 16px; padding: 14px 32px; border-radius: 50px; text-decoration: none; transition: 0.3s all; background: var(--ufo-accent-primary); border: 1px solid var(--ufo-accent-primary); color: #000; box-shadow: 0 0 25px rgba(0, 229, 255, 0.5);">Conhecer Expedições</a>
                            <a href="https://wa.me/5511999999999" target="_blank" class="ufo-btn ufo-btn-secondary" style="border: 1px solid var(--ufo-text-main); color: var(--ufo-text-main); background: rgba(11,14,20,0.65); backdrop-filter: blur(8px); font-weight: 700; font-size: 16px; padding: 14px 32px; border-radius: 50px; text-decoration: none; transition: 0.3s all;">Falar com Guia</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 3: Acervo AARO & Desclassificação Científica -->
            <div class="ufo-jumbotron-slide" style="flex: 0 0 100%; width: 100%; background-image: url('https://images.unsplash.com/photo-1506703719100-a0f3a48c0f86?q=80&w=2000&auto=format&fit=crop'); background-size: cover; background-position: center; min-height: 600px; display: flex; align-items: center;">
                <div class="ufo-hero-overlay" style="width: 100%; height: 100%; background: linear-gradient(180deg, rgba(11,14,20,0.5) 0%, rgba(11,14,20,0.85) 100%); padding: 80px 0;">
                    <div class="ufo-container ufo-hero-content ufo-centered-content" style="max-width: 1100px; margin: 0 auto; text-align: center; padding: 0 20px;">
                        <h2 class="ufo-hero-title" style="font-family: var(--ufo-font-heading); font-size: 48px; color: #fff; font-weight: 800; margin-bottom: 20px; text-shadow: 0 2px 10px rgba(0,0,0,0.8); line-height: 1.2;">Acervo Oficial: Documentos Militares & Pesquisa UAP</h2>
                        <p class="ufo-hero-subtitle" style="font-size: 20px; color: var(--ufo-text-main); max-width: 820px; margin: 0 auto 35px; line-height: 1.6; text-shadow: 0 1px 5px rgba(0,0,0,0.8);">Relatórios desclassificados pelo Pentágono, auditações do Senado Americano e investigações científicas traduzidos com precisão na íntegra para o Português.</p>
                        <div class="ufo-hero-actions ufo-actions-centered" style="display: flex; justify-content: center; align-items: center; flex-wrap: wrap; gap: 15px;">
                            <a href="#noticias" class="ufo-btn ufo-btn-primary" style="font-weight: 800; font-size: 16px; padding: 14px 32px; border-radius: 50px; text-decoration: none; transition: 0.3s all; background: var(--ufo-accent-primary); border: 1px solid var(--ufo-accent-primary); color: #000; box-shadow: 0 0 25px rgba(0, 229, 255, 0.5);">Explorar Acervo Central</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 4: Turismo Ufológico & Experiência de Campo -->
            <div class="ufo-jumbotron-slide" style="flex: 0 0 100%; width: 100%; background-image: url('https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=2072&auto=format&fit=crop'); background-size: cover; background-position: center; min-height: 600px; display: flex; align-items: center;">
                <div class="ufo-hero-overlay" style="width: 100%; height: 100%; background: linear-gradient(180deg, rgba(11,14,20,0.5) 0%, rgba(11,14,20,0.85) 100%); padding: 80px 0;">
                    <div class="ufo-container ufo-hero-content ufo-centered-content" style="max-width: 1100px; margin: 0 auto; text-align: center; padding: 0 20px;">
                        <h2 class="ufo-hero-title" style="font-family: var(--ufo-font-heading); font-size: 48px; color: #fff; font-weight: 800; margin-bottom: 20px; text-shadow: 0 2px 10px rgba(0,0,0,0.8); line-height: 1.2;">Imersão Completa nos Pontos Quentes da Ufologia no Brasil</h2>
                        <p class="ufo-hero-subtitle" style="font-size: 20px; color: var(--ufo-text-main); max-width: 820px; margin: 0 auto 35px; line-height: 1.6; text-shadow: 0 1px 5px rgba(0,0,0,0.8);">Vivencie uma jornada astronômica inesquecível aliando ciência aeronáutica, turismo responsável e contato com os mistérios mais fascinantes do universo.</p>
                        <div class="ufo-hero-actions ufo-actions-centered" style="display: flex; justify-content: center; align-items: center; flex-wrap: wrap; gap: 15px;">
                            <a href="https://wa.me/5511999999999" target="_blank" class="ufo-btn ufo-btn-primary" style="font-weight: 800; font-size: 16px; padding: 14px 32px; border-radius: 50px; text-decoration: none; transition: 0.3s all; background: var(--ufo-accent-vip, #00e676); border: 1px solid #00e676; color: #000; box-shadow: 0 0 20px rgba(0, 230, 118, 0.4);">💬 Acessar Fórum & WhatsApp VIP</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ufo-jumbotron-dots" style="position: absolute; bottom: 25px; left: 0; width: 100%; display: flex; justify-content: center; gap: 10px; z-index: 10;">
            <button type="button" class="ufo-dot active" data-slide="0" aria-label="Slide 1" style="width: 12px; height: 12px; border-radius: 50%; border: 2px solid var(--ufo-accent-primary, #00e5ff); background: var(--ufo-accent-primary, #00e5ff); cursor: pointer; transition: 0.3s all; box-shadow: 0 0 8px rgba(0,229,255,0.5);"></button>
            <button type="button" class="ufo-dot" data-slide="1" aria-label="Slide 2" style="width: 12px; height: 12px; border-radius: 50%; border: 2px solid var(--ufo-accent-primary, #00e5ff); background: transparent; cursor: pointer; transition: 0.3s all; box-shadow: 0 0 8px rgba(0,229,255,0.5);"></button>
            <button type="button" class="ufo-dot" data-slide="2" aria-label="Slide 3" style="width: 12px; height: 12px; border-radius: 50%; border: 2px solid var(--ufo-accent-primary, #00e5ff); background: transparent; cursor: pointer; transition: 0.3s all; box-shadow: 0 0 8px rgba(0,229,255,0.5);"></button>
            <button type="button" class="ufo-dot" data-slide="3" aria-label="Slide 4" style="width: 12px; height: 12px; border-radius: 50%; border: 2px solid var(--ufo-accent-primary, #00e5ff); background: transparent; cursor: pointer; transition: 0.3s all; box-shadow: 0 0 8px rgba(0,229,255,0.5);"></button>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Módulo 2: Vitrine Netflix de Vídeos com Preview On-Hover em PT-BR
 */
function ufo_render_section_videos( $settings = array() ) {
    $title       = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Destaques em Vídeo: Pesquisa & Investigação Anômala';
    $subtitle    = ! empty( $settings['section_subtitle'] ) ? $settings['section_subtitle'] : 'Passe o mouse sobre os cards para pré-visualização instantânea do vídeo. Use as setas para rolar horizontalmente o acervo em PT-BR.';
    $max_items   = ! empty( $settings['max_videos'] ) ? (int) $settings['max_videos'] : 12;
    $page_id     = get_option( 'page_on_front' ) ?: ( get_the_ID() ?: 0 );
    $yt_channels_input = get_post_meta( $page_id, '_ufo_yt_channels', true ) ?: "https://www.youtube.com/@jessemichelsclips\nhttps://www.youtube.com/feeds/videos.xml?channel_id=UC8ZKTXN9trt5dhixz6b6l6w";
    $yt_videos   = function_exists('ufo_fetch_channel_videos') ? ufo_fetch_channel_videos($yt_channels_input, $max_items) : array();

    ob_start();
    ?>
    <div class="ufo-container ufo-home-container" style="padding-top: 15px; margin-top: 0; max-width: 1440px; margin: 0 auto; padding: 0 200px;">
        <section class="ufo-home-section ufo-carousel-wrapper ufo-elementor-flexbox-block" style="position: relative; margin-top: 20px; width: 100%;">
            <div class="ufo-section-header">
                <div>
                    <span style="color: var(--ufo-accent-sci); font-size: 12px; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; display: block; margin-bottom: 5px;">📡 Coletâneas Especiais de Canais</span>
                    <h2><?php echo esc_html( $title ); ?></h2>
                </div>
                <a href="<?php echo get_permalink( get_option('page_for_posts') ) ?: '#'; ?>" class="ufo-view-all">Ver Acervo Central no Portal &rarr;</a>
            </div>
            <p style="color: var(--ufo-text-muted); font-size: 14px; margin-top: -15px; margin-bottom: 20px;">
                <?php echo esc_html( $subtitle ); ?>
            </p>
            <div class="ufo-slider-viewport">
                <button type="button" class="ufo-arrow-btn ufo-arrow-left" id="btnSlideLeft" aria-label="Rolar para esquerda">&lsaquo;</button>
                <div class="ufo-compact-carousel" id="ufoVideoCarousel">
                    <?php 
                    if ( ! empty($yt_videos) ) :
                        foreach ( $yt_videos as $vid ) :
                            $hub_url = get_permalink( get_option('page_for_posts') ) ?: home_url('/noticias/');
                            $titulo_ptbr = function_exists('ufo_auto_translate_ptbr') ? ufo_auto_translate_ptbr($vid['title']) : $vid['title'];
                    ?>
                        <div class="ufo-compact-card-wrapper">
                            <a href="<?php echo esc_url($hub_url); ?>" class="ufo-compact-video-card" data-videoid="<?php echo esc_attr($vid['video_id']); ?>">
                                <div class="ufo-compact-media-box">
                                    <div class="ufo-hover-thumb" style="background-image: url('<?php echo esc_url($vid['thumb']); ?>');"></div>
                                    <div class="ufo-hover-iframe-container"></div>
                                    <span class="ufo-compact-badge">🎬 PREVIEW</span>
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
                        echo '<p style="color: var(--ufo-text-muted);">Nenhum feed de vídeo disponível no momento.</p>';
                    endif;
                    ?>
                </div>
                <button type="button" class="ufo-arrow-btn ufo-arrow-right" id="btnSlideRight" aria-label="Rolar para direita">&rsaquo;</button>
            </div>
        </section>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * Módulo 3: Vitrine Netflix de Notícias e Divulgação Científica
 */
function ufo_render_section_noticias( $settings = array() ) {
    $page_id = get_option( 'page_on_front' ) ?: ( get_the_ID() ?: 0 );
    $title   = ! empty( $settings['section_title'] ) ? $settings['section_title'] : ( get_post_meta( $page_id, '_ufo_sec_news_title', true ) ?: 'Últimas Notícias e Relatos' );
    $subtitle = ! empty( $settings['section_subtitle'] ) ? $settings['section_subtitle'] : 'Explore nossa redação independente de pesquisa UAP e artigos de desclassificação. Deslize pela linha do tempo em formato de vitrine.';
    $limit   = ! empty( $settings['max_posts'] ) ? (int) $settings['max_posts'] : 8;
    $yt_posts_input = get_post_meta( $page_id, '_ufo_yt_posts_feed', true ) ?: 'https://www.youtube.com/channel/UC8ZKTXN9trt5dhixz6b6l6w/posts';
    $yt_posts = function_exists('ufo_fetch_community_posts_feed') ? ufo_fetch_community_posts_feed($yt_posts_input, $limit) : array();

    ob_start();
    ?>
    <div class="ufo-container ufo-home-container" style="max-width: 1440px; margin: 0 auto; padding: 0 200px;">
        <section id="noticias" class="ufo-home-section ufo-carousel-wrapper ufo-elementor-flexbox-block" style="position: relative; margin-top: 45px; width: 100%;">
            <div class="ufo-section-header">
                <div>
                    <span style="color: var(--ufo-accent-primary); font-size: 13px; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; display: block; margin-bottom: 5px;">📰 Divulgação Científica & Jornalismo</span>
                    <h2><?php echo esc_html( $title ); ?></h2>
                </div>
                <a href="<?php echo get_permalink( get_option('page_for_posts') ) ?: '#'; ?>" class="ufo-view-all">Acessar Portal Jornalístico &rarr;</a>
            </div>
            <p style="color: var(--ufo-text-muted); font-size: 14px; margin-top: -15px; margin-bottom: 20px;">
                <?php echo esc_html( $subtitle ); ?>
            </p>
            <div class="ufo-slider-viewport">
                <button type="button" class="ufo-arrow-btn ufo-arrow-left" id="btnNewsLeft" aria-label="Rolar notícias para esquerda">&lsaquo;</button>
                <div class="ufo-compact-carousel" id="ufoNewsCarousel">
                    <?php
                    $all_news_items = array();
                    $news_query = new WP_Query( array(
                        'post_type'      => 'post',
                        'posts_per_page' => $limit,
                        'post_status'    => 'publish'
                    ) );
                    if ( $news_query->have_posts() ) {
                        while ( $news_query->have_posts() ) {
                            $news_query->the_post();
                            $all_news_items[] = array(
                                'title'  => function_exists('ufo_auto_translate_ptbr') ? ufo_auto_translate_ptbr(get_the_title()) : get_the_title(),
                                'url'    => get_permalink(),
                                'thumb'  => get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) ?: 'https://images.unsplash.com/photo-1534447677768-be436bb09401?q=80&w=600&auto=format&fit=crop',
                                'date'   => get_the_date('d M, Y'),
                                'source' => 'Redação UFOTurismo'
                            );
                        }
                        wp_reset_postdata();
                    }
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
    </div>
    <?php
    return ob_get_clean();
}

/**
 * Módulo 4: Galeria das 12 Expedições Científicas de Turismo Ufológico no Brasil
 */
function ufo_render_section_expedicoes( $settings = array() ) {
    $page_id = get_option( 'page_on_front' ) ?: ( get_the_ID() ?: 0 );
    $title   = ! empty( $settings['section_title'] ) ? $settings['section_title'] : ( get_post_meta( $page_id, '_ufo_sec_roteiros_title', true ) ?: 'Próximas Expedições e Roteiros' );
    $subtitle = ! empty( $settings['section_subtitle'] ) ? $settings['section_subtitle'] : 'Deslize pela galeria imersiva para escolher seu próximo destino de investigação anômala. Equipamentos de visão noturna e guias especialistas incluídos.';
    $limit   = ! empty( $settings['max_expeditions'] ) ? (int) $settings['max_expeditions'] : 12;

    ob_start();
    ?>
    <div class="ufo-container ufo-home-container" style="max-width: 1440px; margin: 0 auto; padding: 0 200px;">
        <section id="roteiros" class="ufo-home-section ufo-carousel-wrapper ufo-elementor-flexbox-block" style="position: relative; margin-top: 35px; width: 100%;">
            <div class="ufo-section-header">
                <div>
                    <span style="color: var(--ufo-accent-sci); font-size: 13px; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; display: block; margin-bottom: 5px;">🛸 Expedições de Campo & Turismo Científico</span>
                    <h2><?php echo esc_html( $title ); ?></h2>
                </div>
                <a href="<?php echo get_post_type_archive_link('roteiros') ?: '#'; ?>" class="ufo-view-all">Ver Todos os Roteiros &rarr;</a>
            </div>
            <p style="color: var(--ufo-text-muted); font-size: 14px; margin-top: -15px; margin-bottom: 20px;">
                <?php echo esc_html( $subtitle ); ?>
            </p>
            <div class="ufo-slider-viewport">
                <button type="button" class="ufo-arrow-btn ufo-arrow-left" id="btnRoteirosLeft" aria-label="Rolar expedições para esquerda">&lsaquo;</button>
                <div class="ufo-compact-carousel" id="ufoRoteirosCarousel">
                    <?php
                    $roteiros_items = array();
                    $roteiros_query = new WP_Query( array(
                        'post_type'      => 'roteiros',
                        'posts_per_page' => $limit,
                        'post_status'    => 'publish'
                    ) );
                    if ( $roteiros_query->have_posts() ) {
                        while ( $roteiros_query->have_posts() ) {
                            $roteiros_query->the_post();
                            $roteiros_items[] = array(
                                'title'   => get_the_title(),
                                'url'     => get_permalink(),
                                'thumb'   => get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) ?: 'https://images.unsplash.com/photo-1506703719100-a0f3a48c0f86?q=80&w=600&auto=format&fit=crop',
                                'duracao' => get_post_meta( get_the_ID(), '_ufoturismo_roteiro_duracao', true ) ?: (get_post_meta( get_the_ID(), '_ufo_duracao', true ) ?: '2 Dias'),
                                'preco'   => get_post_meta( get_the_ID(), '_ufoturismo_roteiro_valor', true ) ?: (get_post_meta( get_the_ID(), '_ufo_preco', true ) ?: 'Consulte'),
                                'resumo'  => wp_trim_words( get_the_excerpt() ?: get_the_content(), 12 ),
                                'local'   => 'Peruíbe / SP'
                            );
                        }
                        wp_reset_postdata();
                    }
                    $default_roteiros = array(
                        array('title' => 'Vigília Ufológica: Pedra da Macaca (Serra da Juréia)', 'local' => 'Peruíbe / SP', 'duracao' => '1 Dia', 'preco' => 'Consulte', 'resumo' => 'Participe de tradicional vigília em reserva ecológica com observação noturna por sensores.', 'thumb' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=600&auto=format&fit=crop', 'url' => get_post_type_archive_link('roteiros') ?: '#'),
                        array('title' => 'Expedição Serra do Itatins: O Portal de Peruíbe', 'local' => 'Peruíbe / SP', 'duracao' => '2 Dias', 'preco' => 'Consulte', 'resumo' => 'Mergulhe fundo nos mistérios de Peruíbe, considerada a capital ufológica do Brasil.', 'thumb' => 'https://images.unsplash.com/photo-1506703719100-a0f3a48c0f86?q=80&w=600&auto=format&fit=crop', 'url' => get_post_type_archive_link('roteiros') ?: '#'),
                        array('title' => 'Operação Prato Memorial: Vigília na Baía de Colares', 'local' => 'Colares / PA', 'duracao' => '3 Dias', 'preco' => 'Consulte', 'resumo' => 'Rota de campo nos pontos exatos investigados pelo Capitão Hollanda na Amazônia.', 'thumb' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=600&auto=format&fit=crop', 'url' => get_post_type_archive_link('roteiros') ?: '#'),
                        array('title' => 'Observação FLIR no Chapadão dos Veadeiros', 'local' => 'Alto Paraíso / GO', 'duracao' => '3 Dias', 'preco' => 'Consulte', 'resumo' => 'Expedição astronômica sobre o Paralelo 14 com telescópicos e câmeras térmicas de alta precisão.', 'thumb' => 'https://images.unsplash.com/photo-1534447677768-be436bb09401?q=80&w=600&auto=format&fit=crop', 'url' => get_post_type_archive_link('roteiros') ?: '#'),
                        array('title' => 'Acampamento Astronômico em São Thomé das Letras', 'local' => 'S. Thomé / MG', 'duracao' => '2 Dias', 'preco' => 'Consulte', 'resumo' => 'Vigília na Casa da Pirâmide e investigação de fendas geomagnéticas na serra mineira.', 'thumb' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop', 'url' => get_post_type_archive_link('roteiros') ?: '#'),
                        array('title' => 'Roteiro Noturno do Morro do Vintém & Serra da Mantiqueira', 'local' => 'Itatiaia / RJ', 'duracao' => '1 Dia', 'preco' => 'Consulte', 'resumo' => 'Monitoramento aeroespacial nas cadeias montanhosas históricas de avistamentos no Sudeste.', 'thumb' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=600&auto=format&fit=crop', 'url' => get_post_type_archive_link('roteiros') ?: '#'),
                        array('title' => 'Investigação Eletromagnética no Rincão do Inferno', 'local' => 'Bagé / RS', 'duracao' => '2 Dias', 'preco' => 'Consulte', 'resumo' => 'Roteiro exploratório nos cânions do Rio Grande do Sul em busca de fenômenos luminosos.', 'thumb' => 'https://images.unsplash.com/photo-1506703719100-a0f3a48c0f86?q=80&w=600&auto=format&fit=crop', 'url' => get_post_type_archive_link('roteiros') ?: '#'),
                        array('title' => 'Expedição Portal de Quixadá & Serra do Estêvão', 'local' => 'Quixadá / CE', 'duracao' => '3 Dias', 'preco' => 'Consulte', 'resumo' => 'Imersão nos cenários mais intrigantes de abdução e contatos de imediato no Nordeste.', 'thumb' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=600&auto=format&fit=crop', 'url' => get_post_type_archive_link('roteiros') ?: '#'),
                        array('title' => 'Vigília na Chapada Diamantina: O Morro do Pai Inácio', 'local' => 'Lençóis / BA', 'duracao' => '3 Dias', 'preco' => 'Consulte', 'resumo' => 'Experiência imersiva sob céus escuros certificados com guias exopolíticos especializados.', 'thumb' => 'https://images.unsplash.com/photo-1534447677768-be436bb09401?q=80&w=600&auto=format&fit=crop', 'url' => get_post_type_archive_link('roteiros') ?: '#'),
                        array('title' => 'Roteiro Científico do Pico do Marins', 'local' => 'Piquete / SP', 'duracao' => '2 Dias', 'preco' => 'Consulte', 'resumo' => 'Trilha de alta altitude orientada para detecção de luzes intra-atmosféricas anômalas.', 'thumb' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop', 'url' => get_post_type_archive_link('roteiros') ?: '#'),
                        array('title' => 'Expedição Ilha do Mel & Litoral Paranaense', 'local' => 'Ilha do Mel / PR', 'duracao' => '2 Dias', 'preco' => 'Consulte', 'resumo' => 'Vigília costeira focada em objetos transmidiáticos emergindo do Oceano Atlântico.', 'thumb' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=600&auto=format&fit=crop', 'url' => get_post_type_archive_link('roteiros') ?: '#'),
                        array('title' => 'Monitoramento Aeroespacial na Serra dos Órgãos', 'local' => 'Teresópolis / RJ', 'duracao' => '1 Dia', 'preco' => 'Consulte', 'resumo' => 'Roteiro técnico com uso de espectrômetros portáteis e câmeras de visão noturna militar.', 'thumb' => 'https://images.unsplash.com/photo-1506703719100-a0f3a48c0f86?q=80&w=600&auto=format&fit=crop', 'url' => get_post_type_archive_link('roteiros') ?: '#')
                    );
                    foreach ( $default_roteiros as $d_rot ) {
                        if ( count($roteiros_items) < $limit ) {
                            $existe = false;
                            foreach ($roteiros_items as $existente) {
                                if (stripos($existente['title'], substr($d_rot['title'], 0, 15)) !== false) {
                                    $existe = true; break;
                                }
                            }
                            if ( !$existe ) {
                                $roteiros_items[] = $d_rot;
                            }
                        }
                    }
                    $roteiros_items = array_slice($roteiros_items, 0, $limit);
                    if ( ! empty($roteiros_items) ) :
                        foreach ( $roteiros_items as $rot ) :
                    ?>
                        <div class="ufo-expedition-compact-wrapper">
                            <div class="ufo-expedition-card-70">
                                <div class="ufo-exp-img-box" style="background-image: url('<?php echo esc_url($rot['thumb']); ?>');">
                                    <span class="ufo-exp-badge">🕒 <?php echo esc_html($rot['duracao']); ?></span>
                                    <span class="ufo-exp-price"><?php echo esc_html($rot['preco']); ?></span>
                                </div>
                                <div class="ufo-exp-card-body">
                                    <span class="ufo-exp-local">📍 <?php echo esc_html($rot['local'] ?? 'Peruíbe / SP'); ?></span>
                                    <h3 class="ufo-exp-title"><a href="<?php echo esc_url($rot['url']); ?>"><?php echo esc_html($rot['title']); ?></a></h3>
                                    <p class="ufo-exp-desc"><?php echo esc_html($rot['resumo']); ?></p>
                                    <a href="<?php echo esc_url($rot['url']); ?>" class="ufo-btn ufo-btn-primary ufo-exp-btn">Detalhes da Expedição &rarr;</a>
                                </div>
                            </div>
                        </div>
                    <?php
                        endforeach;
                    else :
                        echo '<p style="color: var(--ufo-text-muted);">Nenhuma expedição disponível no momento.</p>';
                    endif;
                    ?>
                </div>
                <button type="button" class="ufo-arrow-btn ufo-arrow-right" id="btnRoteirosRight" aria-label="Rolar expedições para direita">&rsaquo;</button>
            </div>
        </section>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * Módulo 5: Agenda de Congressos e Eventos Ufológicos
 */
function ufo_render_section_eventos( $settings = array() ) {
    $title       = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Agenda de Congressos e Eventos';
    $subtitle    = ! empty( $settings['section_subtitle'] ) ? $settings['section_subtitle'] : 'Participação presencial com palestras científicas e simpósios nacionais.';
    $limit       = ! empty( $settings['max_events'] ) ? (int) $settings['max_events'] : 2;

    ob_start();
    ?>
    <div class="ufo-container ufo-home-container" style="max-width: 1440px; margin: 0 auto; padding: 0 200px;">
        <section id="eventos" class="ufo-home-section ufo-elementor-flexbox-block" style="margin-top: 45px; width: 100%;">
            <div class="ufo-section-header">
                <div>
                    <span style="color: var(--ufo-accent-sci); font-size: 13px; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; display: block; margin-bottom: 5px;">🗓️ Encontros Presenciais</span>
                    <h2><?php echo esc_html( $title ); ?></h2>
                </div>
                <a href="<?php echo get_post_type_archive_link('eventos') ?: '#'; ?>" class="ufo-view-all">Ver Toda a Agenda &rarr;</a>
            </div>
            <div class="ufo-grid-2" style="margin-top: 20px;">
                <?php
                $eventos_query = new WP_Query( array(
                    'post_type'      => 'eventos',
                    'posts_per_page' => $limit,
                    'post_status'    => 'publish'
                ) );
                if ( $eventos_query->have_posts() ) :
                    while ( $eventos_query->have_posts() ) : $eventos_query->the_post();
                        $data_ev = get_post_meta( get_the_ID(), '_ufoturismo_evento_data_hora', true ) ?: (get_post_meta( get_the_ID(), '_ufo_evento_data', true ) ?: 'Em breve');
                        $local   = get_post_meta( get_the_ID(), '_ufoturismo_evento_organizador', true ) ?: (get_post_meta( get_the_ID(), '_ufo_evento_local', true ) ?: 'Peruíbe / SP');
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
                    echo '<p style="color: var(--ufo-text-muted);">Nenhum evento agendado no momento. Fique de olho na programação!</p>';
                endif;
                ?>
            </div>
        </section>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * Módulo 6: Banner CTA Fórum e Comunidade VIP WhatsApp
 */
function ufo_render_section_cta( $settings = array() ) {
    $page_id      = get_option( 'page_on_front' ) ?: ( get_the_ID() ?: 0 );
    $cta_title    = ! empty( $settings['cta_title'] ) ? $settings['cta_title'] : ( get_post_meta( $page_id, '_ufo_cta_title', true ) ?: 'Pronto Para Viver o Desconhecido?' );
    $cta_desc     = ! empty( $settings['cta_desc'] ) ? $settings['cta_desc'] : ( get_post_meta( $page_id, '_ufo_cta_desc', true ) ?: 'Participe de nossos roteiros noturnos com especialistas, equipamentos de visão noturna e guias credenciados.' );
    $cta_btn_text = ! empty( $settings['btn_text'] ) ? $settings['btn_text'] : ( get_post_meta( $page_id, '_ufo_cta_btn_text', true ) ?: 'Agendar Agora pelo WhatsApp' );
    $cta_url      = ! empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : ( get_post_meta( $page_id, '_ufo_cta_url', true ) ?: 'https://wa.me/5511999999999' );

    ob_start();
    ?>
    <div class="ufo-container ufo-home-container" style="max-width: 1440px; margin: 0 auto; padding: 0 200px;">
        <section id="cta" class="ufo-cta-section ufo-elementor-flexbox-block" style="margin-top: 55px; background: linear-gradient(135deg, var(--ufo-surface) 0%, rgba(0, 229, 255, 0.12) 100%); border: 1px solid var(--ufo-border); border-radius: 12px; padding: 55px 35px; text-align: center; box-shadow: 0 10px 35px rgba(0,0,0,0.6); width: 100%;">
            <h2 style="font-size: 36px; color: var(--ufo-accent-primary); margin-bottom: 15px; font-family: var(--ufo-font-heading);"><?php echo esc_html( $cta_title ); ?></h2>
            <p style="max-width: 700px; margin: 0 auto 32px; font-size: 18px; color: var(--ufo-text-main); line-height: 1.6;"><?php echo esc_html( $cta_desc ); ?></p>
            <a href="<?php echo esc_url( $cta_url ); ?>" target="_blank" class="ufo-btn ufo-btn-primary" style="font-size: 16px; padding: 15px 35px; border-radius: 50px; box-shadow: 0 0 25px rgba(0, 229, 255, 0.5); font-weight: 800;">
                💬 <?php echo esc_html( $cta_btn_text ); ?>
            </a>
        </section>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * Módulo 7: Zona de Publicidade Monetizada Ad Manager / AdSense
 */
function ufo_render_section_adsense( $settings = array(), $atts = array() ) {
    $placement = ! empty( $settings['placement'] ) ? $settings['placement'] : 'between_news_exp';
    if ( ! empty( $atts['placement'] ) ) {
        $placement = $atts['placement'];
    }

    ob_start();
    ?>
    <div class="ufo-container ufo-home-container" style="max-width: 1440px; margin: 0 auto; padding: 0 200px;">
        <div class="ufo-ad-placement ufo-elementor-flexbox-block" style="margin: 45px auto; text-align: center; width: 100%;">
            <span class="ufo-ad-label">Patrocinado</span>
            <div class="ufo-ad-box-centered">
                <?php 
                $ad_code = ! empty( $settings['custom_ad_code'] ) ? $settings['custom_ad_code'] : '';
                $placeholder = '📢 Google AdSense / Ad Manager • High CTR Monetization Placement';
                if ( empty( $ad_code ) ) {
                    if ( $placement === 'mid_bottom' ) {
                        $ad_code = get_option('ufo_ad_in_article_mid');
                        $placeholder = '📢 Google Ad Manager • Mid-Page Conversions & Sponsor Placement';
                    } elseif ( $placement === 'home_bottom' ) {
                        $ad_code = get_option('ufo_ad_in_article_bottom');
                        $placeholder = '📢 Google AdSense / Ad Manager • Rodapé Monetizado • High Completion RPM';
                    } else {
                        $ad_code = get_option('ufo_ad_in_article_top') ?: get_option('ufo_ad_home_top');
                        $placeholder = '📢 Google AdSense / Ad Manager • Between News & Expeditions (High CTR Placement • 728x90 / 300x250)';
                    }
                }
                
                if ( ! empty($ad_code) ) {
                    echo $ad_code;
                } else {
                    echo '<div class="ufo-ad-placeholder">' . esc_html($placeholder) . '</div>';
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * Módulo 8 (NOVO): Vitrine de Relatos & Avistamentos UAP (RNF-UI-001)
 */
function ufo_render_section_relatos( $settings = array() ) {
    $title    = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Acervo Aberto: Relatos & Avistamentos da Comunidade';
    $subtitle = ! empty( $settings['section_subtitle'] ) ? $settings['section_subtitle'] : 'Documentação colaborativa de avistamentos civis e relatos militares. Todo material é submetido à análise preliminar de guias credenciados.';
    $limit    = ! empty( $settings['max_relatos'] ) ? (int) $settings['max_relatos'] : 3;

    ob_start();
    ?>
    <div class="ufo-container ufo-home-container" style="max-width: 1440px; margin: 0 auto; padding: 0 200px;">
        <section id="relatos" class="ufo-home-section ufo-elementor-flexbox-block" style="margin-top: 45px; width: 100%;">
            <div class="ufo-section-header">
                <div>
                    <span style="color: var(--ufo-accent-vip, #00e676); font-size: 13px; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; display: block; margin-bottom: 5px;">🖖 Observação de Campo & Relatos Civis</span>
                    <h2><?php echo esc_html( $title ); ?></h2>
                </div>
                <a href="<?php echo get_post_type_archive_link('relatos') ?: '#'; ?>" class="ufo-view-all">Ver Acervo de Relatos &rarr;</a>
            </div>
            <p style="color: var(--ufo-text-muted); font-size: 14px; margin-top: -15px; margin-bottom: 20px;">
                <?php echo esc_html( $subtitle ); ?>
            </p>
            <div class="ufo-grid-3" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px; margin-top: 20px;">
                <?php
                $relatos_query = new WP_Query( array(
                    'post_type'      => 'relatos',
                    'posts_per_page' => $limit,
                    'post_status'    => 'publish'
                ) );
                if ( $relatos_query->have_posts() ) :
                    while ( $relatos_query->have_posts() ) : $relatos_query->the_post();
                        $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) ?: 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=600&auto=format&fit=crop';
                ?>
                    <div class="ufo-card" style="background: var(--ufo-surface); border: 1px solid var(--ufo-border); border-radius: 12px; overflow: hidden; display: flex; flex-direction: column; transition: 0.3s all;">
                        <div style="height: 180px; background-image: url('<?php echo esc_url($thumb_url); ?>'); background-size: cover; background-position: center;"></div>
                        <div style="padding: 20px; flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                            <div>
                                <span style="font-size: 11px; font-weight: 800; color: var(--ufo-accent-sci); text-transform: uppercase;">🛸 Avistamento Registrado</span>
                                <h3 style="font-size: 18px; margin: 10px 0;"><a href="<?php the_permalink(); ?>" style="color: #fff; text-decoration: none;"><?php the_title(); ?></a></h3>
                                <p style="font-size: 13px; color: var(--ufo-text-muted); line-height: 1.5;"><?php echo wp_trim_words( get_the_excerpt() ?: get_the_content(), 15 ); ?></p>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="ufo-btn ufo-btn-secondary" style="margin-top: 15px; font-size: 13px; text-align: center; border-color: var(--ufo-accent-primary);">Ler Relato & Discussão 💬</a>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else:
                ?>
                    <div class="ufo-card" style="padding: 30px; border: 1px dashed var(--ufo-border); border-radius: 12px; grid-column: 1 / -1; text-align: center;">
                        <p style="color: var(--ufo-text-muted);">Nenhum relato publicado no momento. Faça seu registro em nossa central!</p>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * Módulo 9 (NOVO): Vitrine de Vocabulário & Verbetes da Enciclopédia Ufológica (RNF-UI-001)
 */
function ufo_render_section_enciclopedia( $settings = array() ) {
    $title       = ! empty( $settings['section_title'] ) ? $settings['section_title'] : 'Enciclopédia & Vocabulário Científico UAP';
    $subtitle    = ! empty( $settings['section_subtitle'] ) ? $settings['section_subtitle'] : 'Conceitos aeronáuticos, tecnologias de radar térmico FLIR e terminologia oficial militar desclassificada.';
    $limit       = ! empty( $settings['max_terms'] ) ? (int) $settings['max_terms'] : 4;

    ob_start();
    ?>
    <div class="ufo-container ufo-home-container" style="max-width: 1440px; margin: 0 auto; padding: 0 200px;">
        <section id="enciclopedia" class="ufo-home-section ufo-elementor-flexbox-block" style="margin-top: 45px; width: 100%;">
            <div class="ufo-section-header">
                <div>
                    <span style="color: var(--ufo-accent-primary); font-size: 13px; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; display: block; margin-bottom: 5px;">📖 Base do Conhecimento Científico</span>
                    <h2><?php echo esc_html( $title ); ?></h2>
                </div>
                <a href="<?php echo get_post_type_archive_link('enciclopedia') ?: '#'; ?>" class="ufo-view-all">Acessar Enciclopédia &rarr;</a>
            </div>
            <p style="color: var(--ufo-text-muted); font-size: 14px; margin-top: -15px; margin-bottom: 20px;">
                <?php echo esc_html( $subtitle ); ?>
            </p>
            <div class="ufo-grid-4" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px; margin-top: 20px;">
                <?php
                $terms_query = new WP_Query( array(
                    'post_type'      => 'enciclopedia',
                    'posts_per_page' => $limit,
                    'post_status'    => 'publish',
                    'orderby'        => 'title',
                    'order'          => 'ASC'
                ) );
                if ( $terms_query->have_posts() ) :
                    while ( $terms_query->have_posts() ) : $terms_query->the_post();
                ?>
                    <div class="ufo-card" style="background: rgba(11, 14, 20, 0.7); border: 1px solid var(--ufo-border); border-left: 4px solid var(--ufo-accent-sci); border-radius: 8px; padding: 20px;">
                        <h3 style="font-size: 17px; color: var(--ufo-accent-primary); margin-top: 0;"><a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;"><?php the_title(); ?></a></h3>
                        <p style="font-size: 13px; color: var(--ufo-text-muted); margin: 10px 0 0; line-height: 1.4;"><?php echo wp_trim_words( get_the_excerpt() ?: get_the_content(), 12 ); ?></p>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else:
                    $default_terms = array(
                        array('title' => 'FLIR (Infrared Imaging)', 'desc' => 'Sensor térmico infravermelho prospectado em avistamentos no litoral e serra.'),
                        array('title' => 'UAP / Fenômenos Anômalos', 'desc' => 'Terminologia científica militar para substituir a sigla popular OVNI/UFO.'),
                        array('title' => 'Paralelo 14', 'desc' => 'Linha geográfica associada a altas energias geomagnéticas em Alto Paraíso.'),
                        array('title' => 'Radar Passivo de Fótons', 'desc' => 'Equipamento não-emissor utilizado em acampamentos para detecção de luzes de alta frequência.')
                    );
                    foreach ( $default_terms as $d_term ) :
                ?>
                    <div class="ufo-card" style="background: rgba(11, 14, 20, 0.7); border: 1px solid var(--ufo-border); border-left: 4px solid var(--ufo-accent-sci); border-radius: 8px; padding: 20px;">
                        <h3 style="font-size: 17px; color: var(--ufo-accent-primary); margin-top: 0;"><?php echo esc_html( $d_term['title'] ); ?></h3>
                        <p style="font-size: 13px; color: var(--ufo-text-muted); margin: 10px 0 0; line-height: 1.4;"><?php echo esc_html( $d_term['desc'] ); ?></p>
                    </div>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
        </section>
    </div>
    <?php
    return ob_get_clean();
}

/* ==========================================================================
   2. REGISTRO OFICIAL DOS SHORTCODES WORDPRESS PARA O ELEMENTOR
   ========================================================================== */
add_shortcode( 'ufo_jumbotron', 'ufo_render_section_jumbotron' );
add_shortcode( 'ufo_videos_carousel', 'ufo_render_section_videos' );
add_shortcode( 'ufo_noticias_carousel', 'ufo_render_section_noticias' );
add_shortcode( 'ufo_expedicoes_gallery', 'ufo_render_section_expedicoes' );
add_shortcode( 'ufo_eventos_agenda', 'ufo_render_section_eventos' );
add_shortcode( 'ufo_cta_vip', 'ufo_render_section_cta' );
add_shortcode( 'ufo_adsense', function($atts) { return ufo_render_section_adsense(array(), $atts); } );
add_shortcode( 'ufo_relatos_grid', 'ufo_render_section_relatos' );
add_shortcode( 'ufo_enciclopedia_grid', 'ufo_render_section_enciclopedia' );

/* ==========================================================================
   3. REGISTRO WIDGETS NATIVOS ELEMENTOR PRO (CONTROLES COMPLETOS RNF-UI-001)
   ========================================================================== */
add_action( 'elementor/init', function() {
    if ( ! class_exists( '\Elementor\Widget_Base' ) ) {
        return;
    }

    add_action( 'elementor/elements/categories_registered', function( $elements_manager ) {
        $elements_manager->add_category(
            'ufoturismo-pro',
            [
                'title' => __( '🛰️ UFOTurismo PRO (Módulos Flexbox)', 'ufoturismo-child' ),
                'icon'  => 'fa fa-user-astronaut',
            ]
        );
    });

    add_action( 'elementor/widgets/register', function( $widgets_manager ) {
        if ( ! class_exists( '\Elementor\Widget_Base' ) ) {
            return;
        }

        // 1. WIDGET CARROSSEL JUMBOTRON HERO COM REPEATER
        if ( ! class_exists( 'UFOTurismo_Elementor_Jumbotron_Widget' ) ) {
            class UFOTurismo_Elementor_Jumbotron_Widget extends \Elementor\Widget_Base {
                public function get_name() { return 'ufo_jumbotron_widget'; }
                public function get_title() { return '🚀 UFO Carrossel Hero (4 Slides Editáveis)'; }
                public function get_icon() { return 'eicon-slider-push'; }
                public function get_categories() { return [ 'ufoturismo-pro' ]; }

                protected function register_controls() {
                    $this->start_controls_section(
                        'section_slides',
                        [
                            'label' => __( 'Slides do Carrossel (Jumbotron)', 'ufoturismo-child' ),
                            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                        ]
                    );
                    $repeater = new \Elementor\Repeater();
                    $repeater->add_control( 'slide_title', [ 'label' => __( 'Título do Slide', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => __( 'A Verdade Está Lá Fora. E Nós Levamos Você Até Ela.', 'ufoturismo-child' ), 'label_block' => true ] );
                    $repeater->add_control( 'slide_subtitle', [ 'label' => __( 'Subtítulo / Descrição', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => __( 'O maior portal brasileiro focado em Turismo Ufológico, Pesquisa de Fenômenos Anômalos e Divulgação Científica.', 'ufoturismo-child' ), 'label_block' => true ] );
                    $repeater->add_control( 'slide_image', [ 'label' => __( 'Imagem de Fundo', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::MEDIA, 'default' => [ 'url' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=2072&auto=format&fit=crop' ] ] );
                    $repeater->add_control( 'btn_1_text', [ 'label' => __( 'Texto Botão 1', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => __( 'Ver Expedições', 'ufoturismo-child' ) ] );
                    $repeater->add_control( 'btn_1_url', [ 'label' => __( 'Link Botão 1', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => [ 'url' => '#roteiros' ] ] );
                    $repeater->add_control( 'btn_2_text', [ 'label' => __( 'Texto Botão 2 (Opcional)', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => __( 'Últimas Notícias', 'ufoturismo-child' ) ] );
                    $repeater->add_control( 'btn_2_url', [ 'label' => __( 'Link Botão 2', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => [ 'url' => '#noticias' ] ] );
                    $repeater->add_control( 'btn_style', [ 'label' => __( 'Estilo Botão 1', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::SELECT, 'default' => 'primary', 'options' => [ 'primary' => __( 'Azul Elétrico Ciano', 'ufoturismo-child' ), 'vip' => __( 'Verde VIP WhatsApp', 'ufoturismo-child' ) ] ] );

                    $this->add_control( 'slides', [ 'label' => __( 'Lista de Slides', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $repeater->get_controls(), 'title_field' => '{{{ slide_title }}}', 'default' => [
                        [ 'slide_title' => 'A Verdade Está Lá Fora. E Nós Levamos Você Até Ela.', 'slide_subtitle' => 'O maior portal brasileiro focado em Turismo Ufológico, Pesquisa de Fenômenos Anômalos e Divulgação Científica.', 'slide_image' => [ 'url' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=2072&auto=format&fit=crop' ], 'btn_1_text' => 'Ver Expedições', 'btn_1_url' => [ 'url' => '#roteiros' ], 'btn_2_text' => 'Últimas Notícias', 'btn_2_url' => [ 'url' => '#noticias' ], 'btn_style' => 'primary' ],
                        [ 'slide_title' => 'Expedições Noturnas Com Tecnologia FLIR e Radar Passivo', 'slide_subtitle' => 'Investigue avistamentos de campo com especialistas credenciados, equipamentos ópticos infravermelhos e sensores de gravidade nos roteiros do Brasil.', 'slide_image' => [ 'url' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=2000&auto=format&fit=crop' ], 'btn_1_text' => 'Conhecer Expedições', 'btn_1_url' => [ 'url' => '#roteiros' ], 'btn_2_text' => 'Falar com Guia', 'btn_2_url' => [ 'url' => 'https://wa.me/5511999999999', 'is_external' => true ], 'btn_style' => 'primary' ],
                        [ 'slide_title' => 'Acervo Oficial: Documentos Militares & Pesquisa UAP', 'slide_subtitle' => 'Relatórios desclassificados pelo Pentágono, auditações do Senado Americano e investigações científicas traduzidos com precisão na íntegra para o Português.', 'slide_image' => [ 'url' => 'https://images.unsplash.com/photo-1506703719100-a0f3a48c0f86?q=80&w=2000&auto=format&fit=crop' ], 'btn_1_text' => 'Explorar Acervo Central', 'btn_1_url' => [ 'url' => '#noticias' ], 'btn_2_text' => '', 'btn_2_url' => [ 'url' => '' ], 'btn_style' => 'primary' ],
                        [ 'slide_title' => 'Imersão Completa nos Pontos Quentes da Ufologia no Brasil', 'slide_subtitle' => 'Vivencie uma jornada astronômica inesquecível aliando ciência aeronáutica, turismo responsável e contato com os mistérios mais fascinantes do universo.', 'slide_image' => [ 'url' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=2072&auto=format&fit=crop' ], 'btn_1_text' => '💬 Acessar Fórum & WhatsApp VIP', 'btn_1_url' => [ 'url' => 'https://wa.me/5511999999999', 'is_external' => true ], 'btn_2_text' => '', 'btn_2_url' => [ 'url' => '' ], 'btn_style' => 'vip' ]
                    ] ] );
                    $this->end_controls_section();

                    $this->start_controls_section( 'section_slider_settings', [ 'label' => __( 'Configurações de Rotação', 'ufoturismo-child' ), 'tab' => \Elementor\Controls_Manager::TAB_SETTINGS ] );
                    $this->add_control( 'autoplay_speed', [ 'label' => __( 'Intervalo (ms)', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::NUMBER, 'default' => 5000, 'min' => 1000, 'max' => 30000, 'step' => 500 ] );
                    $this->add_control( 'transition_speed', [ 'label' => __( 'Animação (ms)', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::NUMBER, 'default' => 600 ] );
                    $this->end_controls_section();
                }

                protected function render() {
                    $settings = $this->get_settings_for_display();
                    $slides   = ! empty( $settings['slides'] ) ? $settings['slides'] : array();
                    $autoplay = ! empty( $settings['autoplay_speed'] ) ? (int) $settings['autoplay_speed'] : 5000;
                    $speed    = ! empty( $settings['transition_speed'] ) ? (int) $settings['transition_speed'] : 600;
                    if ( empty( $slides ) ) { echo ufo_render_section_jumbotron(); return; }
                    $total_slides = count( $slides );
                    $unique_id    = 'ufo_jumb_' . uniqid();
                    ?>
                    <section class="ufo-jumbotron ufo-elementor-flexbox-block ufo-jumbotron-dynamic" id="<?php echo esc_attr($unique_id); ?>" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-speed="<?php echo esc_attr($speed); ?>" style="position: relative; width: 100%; overflow: hidden; background: var(--ufo-bg);">
                        <div class="ufo-jumbotron-track" id="<?php echo esc_attr($unique_id); ?>_track" style="display: flex; transition: transform <?php echo (float) ($speed / 1000); ?>s cubic-bezier(0.25, 1, 0.5, 1);">
                            <?php foreach ( $slides as $slide ) : 
                                $bg_url = ! empty( $slide['slide_image']['url'] ) ? $slide['slide_image']['url'] : 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=2072&auto=format&fit=crop';
                            ?>
                                <div class="ufo-jumbotron-slide" style="flex: 0 0 100%; width: 100%; background-image: url('<?php echo esc_url($bg_url); ?>'); background-size: cover; background-position: center; min-height: 600px; display: flex; align-items: center;">
                                    <div class="ufo-hero-overlay" style="width: 100%; height: 100%; background: linear-gradient(180deg, rgba(11,14,20,0.5) 0%, rgba(11,14,20,0.85) 100%); padding: 80px 0;">
                                        <div class="ufo-container ufo-hero-content ufo-centered-content" style="max-width: 1100px; margin: 0 auto; text-align: center; padding: 0 20px;">
                                            <h1 class="ufo-hero-title" style="font-family: var(--ufo-font-heading); font-size: 48px; color: #fff; font-weight: 800; margin-bottom: 20px; text-shadow: 0 2px 10px rgba(0,0,0,0.8); line-height: 1.2;"><?php echo wp_kses_post( $slide['slide_title'] ); ?></h1>
                                            <p class="ufo-hero-subtitle" style="font-size: 20px; color: var(--ufo-text-main); max-width: 820px; margin: 0 auto 35px; line-height: 1.6; text-shadow: 0 1px 5px rgba(0,0,0,0.8);"><?php echo wp_kses_post( $slide['slide_subtitle'] ); ?></p>
                                            <div class="ufo-hero-actions ufo-actions-centered" style="display: flex; justify-content: center; align-items: center; flex-wrap: wrap; gap: 15px;">
                                                <?php if ( ! empty( $slide['btn_1_text'] ) && ! empty( $slide['btn_1_url']['url'] ) ) : 
                                                    $target = ! empty( $slide['btn_1_url']['is_external'] ) ? ' target="_blank" rel="noopener"' : '';
                                                    $style_css = ($slide['btn_style'] === 'vip') ? 'background: var(--ufo-accent-vip, #00e676); border-color: #00e676; color: #000; box-shadow: 0 0 20px rgba(0, 230, 118, 0.4);' : 'background: var(--ufo-accent-primary); border-color: var(--ufo-accent-primary); color: #000; box-shadow: 0 0 25px rgba(0, 229, 255, 0.5);';
                                                ?>
                                                    <a href="<?php echo esc_url( $slide['btn_1_url']['url'] ); ?>"<?php echo $target; ?> class="ufo-btn ufo-btn-primary" style="font-weight: 800; font-size: 16px; padding: 14px 32px; border-radius: 50px; text-decoration: none; transition: 0.3s all; <?php echo $style_css; ?>"><?php echo esc_html( $slide['btn_1_text'] ); ?></a>
                                                <?php endif; ?>
                                                <?php if ( ! empty( $slide['btn_2_text'] ) && ! empty( $slide['btn_2_url']['url'] ) ) : 
                                                    $target2 = ! empty( $slide['btn_2_url']['is_external'] ) ? ' target="_blank" rel="noopener"' : '';
                                                ?>
                                                    <a href="<?php echo esc_url( $slide['btn_2_url']['url'] ); ?>"<?php echo $target2; ?> class="ufo-btn ufo-btn-secondary" style="border: 1px solid var(--ufo-text-main); color: var(--ufo-text-main); background: rgba(11,14,20,0.65); backdrop-filter: blur(8px); font-weight: 700; font-size: 16px; padding: 14px 32px; border-radius: 50px; text-decoration: none; transition: 0.3s all;"><?php echo esc_html( $slide['btn_2_text'] ); ?></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php if ( $total_slides > 1 ) : ?>
                            <div class="ufo-jumbotron-dots" id="<?php echo esc_attr($unique_id); ?>_dots" style="position: absolute; bottom: 25px; left: 0; width: 100%; display: flex; justify-content: center; gap: 10px; z-index: 10;">
                                <?php for ( $i = 0; $i < $total_slides; $i++ ) : ?>
                                    <button type="button" class="ufo-dot <?php echo ( $i === 0 ) ? 'active' : ''; ?>" data-slide="<?php echo esc_attr( $i ); ?>" aria-label="Slide <?php echo ( $i + 1 ); ?>" style="width: 12px; height: 12px; border-radius: 50%; border: 2px solid var(--ufo-accent-primary, #00e5ff); background: <?php echo ($i === 0) ? 'var(--ufo-accent-primary, #00e5ff)' : 'transparent'; ?>; cursor: pointer; transition: 0.3s all; box-shadow: 0 0 8px rgba(0,229,255,0.5);"></button>
                                <?php endfor; ?>
                            </div>
                        <?php endif; ?>
                    </section>
                    <?php
                }
            }
        }

        // 2. WIDGET VÍDEOS NETFLIX COM PREVIEW ON-HOVER
        if ( ! class_exists( 'UFOTurismo_Elementor_Videos_Widget' ) ) {
            class UFOTurismo_Elementor_Videos_Widget extends \Elementor\Widget_Base {
                public function get_name() { return 'ufo_videos_widget'; }
                public function get_title() { return '🎬 UFO Vitrine Vídeos Netflix (PT-BR)'; }
                public function get_icon() { return 'eicon-video-playlist'; }
                public function get_categories() { return [ 'ufoturismo-pro' ]; }
                protected function register_controls() {
                    $this->start_controls_section( 'section_videos', [ 'label' => __( 'Conteúdo da Vitrine', 'ufoturismo-child' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
                    $this->add_control( 'section_title', [ 'label' => __( 'Título da Seção', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Destaques em Vídeo: Pesquisa & Investigação Anômala' ] );
                    $this->add_control( 'section_subtitle', [ 'label' => __( 'Subtítulo', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Passe o mouse sobre os cards para pré-visualização instantânea do vídeo. Use as setas para rolar horizontalmente o acervo em PT-BR.' ] );
                    $this->add_control( 'max_videos', [ 'label' => __( 'Quantidade Máxima de Vídeos', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::NUMBER, 'default' => 12, 'min' => 4, 'max' => 24 ] );
                    $this->end_controls_section();
                }
                protected function render() { echo ufo_render_section_videos( $this->get_settings_for_display() ); }
            }
        }

        // 3. WIDGET NOTÍCIAS & RELATOS
        if ( ! class_exists( 'UFOTurismo_Elementor_Noticias_Widget' ) ) {
            class UFOTurismo_Elementor_Noticias_Widget extends \Elementor\Widget_Base {
                public function get_name() { return 'ufo_noticias_widget'; }
                public function get_title() { return '📰 UFO Vitrine Notícias & Divulgação'; }
                public function get_icon() { return 'eicon-post-slider'; }
                public function get_categories() { return [ 'ufoturismo-pro' ]; }
                protected function register_controls() {
                    $this->start_controls_section( 'section_noticias', [ 'label' => __( 'Conteúdo de Notícias', 'ufoturismo-child' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
                    $this->add_control( 'section_title', [ 'label' => __( 'Título', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Últimas Notícias e Relatos' ] );
                    $this->add_control( 'section_subtitle', [ 'label' => __( 'Subtítulo', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Explore nossa redação independente de pesquisa UAP e artigos de desclassificação.' ] );
                    $this->add_control( 'max_posts', [ 'label' => __( 'Quantidade Máxima de Artigos', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::NUMBER, 'default' => 8, 'min' => 2, 'max' => 24 ] );
                    $this->end_controls_section();
                }
                protected function render() { echo ufo_render_section_noticias( $this->get_settings_for_display() ); }
            }
        }

        // 4. WIDGET GALERIA DE 12 EXPEDIÇÕES
        if ( ! class_exists( 'UFOTurismo_Elementor_Expedition_Widget' ) ) {
            class UFOTurismo_Elementor_Expedition_Widget extends \Elementor\Widget_Base {
                public function get_name() { return 'ufo_expedicoes_widget'; }
                public function get_title() { return '⛺ UFO Galeria 12 Expedições (70% Netflix)'; }
                public function get_icon() { return 'eicon-global-settings'; }
                public function get_categories() { return [ 'ufoturismo-pro' ]; }
                protected function register_controls() {
                    $this->start_controls_section( 'section_expedicoes', [ 'label' => __( 'Conteúdo de Expedições', 'ufoturismo-child' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
                    $this->add_control( 'section_title', [ 'label' => __( 'Título', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Próximas Expedições e Roteiros' ] );
                    $this->add_control( 'section_subtitle', [ 'label' => __( 'Subtítulo', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Deslize pela galeria imersiva para escolher seu próximo destino de investigação anômala. Equipamentos de visão noturna incluídos.' ] );
                    $this->add_control( 'max_expeditions', [ 'label' => __( 'Quantidade de Roteiros', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::NUMBER, 'default' => 12, 'min' => 4, 'max' => 24 ] );
                    $this->end_controls_section();
                }
                protected function render() { echo ufo_render_section_expedicoes( $this->get_settings_for_display() ); }
            }
        }

        // 5. WIDGET AGENDA DE EVENTOS
        if ( ! class_exists( 'UFOTurismo_Elementor_Eventos_Widget' ) ) {
            class UFOTurismo_Elementor_Eventos_Widget extends \Elementor\Widget_Base {
                public function get_name() { return 'ufo_eventos_widget'; }
                public function get_title() { return '🗓️ UFO Agenda Congressos & Encontros'; }
                public function get_icon() { return 'eicon-calendar'; }
                public function get_categories() { return [ 'ufoturismo-pro' ]; }
                protected function register_controls() {
                    $this->start_controls_section( 'section_eventos', [ 'label' => __( 'Conteúdo de Eventos', 'ufoturismo-child' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
                    $this->add_control( 'section_title', [ 'label' => __( 'Título', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Agenda de Congressos e Eventos' ] );
                    $this->add_control( 'max_events', [ 'label' => __( 'Quantidade de Eventos Exibidos', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::NUMBER, 'default' => 2, 'min' => 2, 'max' => 12 ] );
                    $this->end_controls_section();
                }
                protected function render() { echo ufo_render_section_eventos( $this->get_settings_for_display() ); }
            }
        }

        // 6. WIDGET BANNER CTA WHATSAPP VIP
        if ( ! class_exists( 'UFOTurismo_Elementor_CTA_Widget' ) ) {
            class UFOTurismo_Elementor_CTA_Widget extends \Elementor\Widget_Base {
                public function get_name() { return 'ufo_cta_widget'; }
                public function get_title() { return '💬 UFO Banner CTA Grupo VIP WhatsApp'; }
                public function get_icon() { return 'eicon-button'; }
                public function get_categories() { return [ 'ufoturismo-pro' ]; }
                protected function register_controls() {
                    $this->start_controls_section( 'section_cta', [ 'label' => __( 'Conteúdo do CTA', 'ufoturismo-child' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
                    $this->add_control( 'cta_title', [ 'label' => __( 'Título', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Pronto Para Viver o Desconhecido?' ] );
                    $this->add_control( 'cta_desc', [ 'label' => __( 'Descrição', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Participe de nossos roteiros noturnos com especialistas, equipamentos de visão noturna e guias credenciados.' ] );
                    $this->add_control( 'btn_text', [ 'label' => __( 'Texto do Botão', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Agendar Agora pelo WhatsApp' ] );
                    $this->add_control( 'btn_url', [ 'label' => __( 'Link do Botão (WhatsApp/URL)', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => [ 'url' => 'https://wa.me/5511999999999', 'is_external' => true ] ] );
                    $this->end_controls_section();
                }
                protected function render() { echo ufo_render_section_cta( $this->get_settings_for_display() ); }
            }
        }

        // 7. WIDGET PUBLICIDADE ADSENSE / AD MANAGER
        if ( ! class_exists( 'UFOTurismo_Elementor_AdSense_Widget' ) ) {
            class UFOTurismo_Elementor_AdSense_Widget extends \Elementor\Widget_Base {
                public function get_name() { return 'ufo_adsense_widget'; }
                public function get_title() { return '💰 UFO Zona Ad Manager / AdSense'; }
                public function get_icon() { return 'eicon-ad'; }
                public function get_categories() { return [ 'ufoturismo-pro' ]; }
                protected function register_controls() {
                    $this->start_controls_section( 'section_ads', [ 'label' => __( 'Configurações do Anúncio', 'ufoturismo-child' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
                    $this->add_control( 'placement', [ 'label' => __( 'Posição Monetizada', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::SELECT, 'default' => 'between_news_exp', 'options' => [
                        'between_news_exp' => __( 'Entre Notícias e Expedições (High CTR)', 'ufoturismo-child' ),
                        'mid_bottom'       => __( 'Meio / Abaixo do Acervo (Sponsor Banner)', 'ufoturismo-child' ),
                        'home_bottom'      => __( 'Rodapé Monetizado (High Completion RPM)', 'ufoturismo-child' )
                    ] ] );
                    $this->add_control( 'custom_ad_code', [ 'label' => __( 'Código Ad Customizado (Override opcional)', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::CODE, 'language' => 'html' ] );
                    $this->end_controls_section();
                }
                protected function render() { echo ufo_render_section_adsense( $this->get_settings_for_display() ); }
            }
        }

        // 8. (NOVO) WIDGET ACERVO DE RELATOS & AVISTAMENTOS
        if ( ! class_exists( 'UFOTurismo_Elementor_Relatos_Widget' ) ) {
            class UFOTurismo_Elementor_Relatos_Widget extends \Elementor\Widget_Base {
                public function get_name() { return 'ufo_relatos_widget'; }
                public function get_title() { return '🖖 UFO Acervo de Relatos & Avistamentos'; }
                public function get_icon() { return 'eicon-testimonial'; }
                public function get_categories() { return [ 'ufoturismo-pro' ]; }
                protected function register_controls() {
                    $this->start_controls_section( 'section_relatos', [ 'label' => __( 'Conteúdo dos Relatos', 'ufoturismo-child' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
                    $this->add_control( 'section_title', [ 'label' => __( 'Título', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Acervo Aberto: Relatos & Avistamentos da Comunidade' ] );
                    $this->add_control( 'section_subtitle', [ 'label' => __( 'Subtítulo', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Documentação colaborativa de avistamentos civis e relatos militares. Submetido à análise de guias credenciados.' ] );
                    $this->add_control( 'max_relatos', [ 'label' => __( 'Quantidade Exibida', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::NUMBER, 'default' => 3, 'min' => 3, 'max' => 12 ] );
                    $this->end_controls_section();
                }
                protected function render() { echo ufo_render_section_relatos( $this->get_settings_for_display() ); }
            }
        }

        // 9. (NOVO) WIDGET ENCICLOPÉDIA & VOCABULÁRIO CIENTÍFICO UAP
        if ( ! class_exists( 'UFOTurismo_Elementor_Enciclopedia_Widget' ) ) {
            class UFOTurismo_Elementor_Enciclopedia_Widget extends \Elementor\Widget_Base {
                public function get_name() { return 'ufo_enciclopedia_widget'; }
                public function get_title() { return '📖 UFO Enciclopédia & Vocabulário UAP'; }
                public function get_icon() { return 'eicon-book'; }
                public function get_categories() { return [ 'ufoturismo-pro' ]; }
                protected function register_controls() {
                    $this->start_controls_section( 'section_enciclopedia', [ 'label' => __( 'Conteúdo da Enciclopédia', 'ufoturismo-child' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
                    $this->add_control( 'section_title', [ 'label' => __( 'Título', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Enciclopédia & Vocabulário Científico UAP' ] );
                    $this->add_control( 'section_subtitle', [ 'label' => __( 'Subtítulo', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Conceitos aeronáuticos, tecnologias de radar térmico FLIR e terminologia oficial militar desclassificada.' ] );
                    $this->add_control( 'max_terms', [ 'label' => __( 'Quantidade Exibida', 'ufoturismo-child' ), 'type' => \Elementor\Controls_Manager::NUMBER, 'default' => 4, 'min' => 2, 'max' => 12 ] );
                    $this->end_controls_section();
                }
                protected function render() { echo ufo_render_section_enciclopedia( $this->get_settings_for_display() ); }
            }
        }

        $widgets_manager->register( new \UFOTurismo_Elementor_Jumbotron_Widget() );
        $widgets_manager->register( new \UFOTurismo_Elementor_Videos_Widget() );
        $widgets_manager->register( new \UFOTurismo_Elementor_Noticias_Widget() );
        $widgets_manager->register( new \UFOTurismo_Elementor_Expedition_Widget() );
        $widgets_manager->register( new \UFOTurismo_Elementor_Eventos_Widget() );
        $widgets_manager->register( new \UFOTurismo_Elementor_CTA_Widget() );
        $widgets_manager->register( new \UFOTurismo_Elementor_AdSense_Widget() );
        $widgets_manager->register( new \UFOTurismo_Elementor_Relatos_Widget() );
        $widgets_manager->register( new \UFOTurismo_Elementor_Enciclopedia_Widget() );
    });
});

/* ==========================================================================
   4. AUTO-POPULAÇÃO DOS BLOCOS NATIVOS NA PÁGINA INICIAL PARA ARRASTAR NO ELEMENTOR
   ========================================================================== */
add_action( 'init', 'ufo_auto_populate_elementor_front_page', 20 );
function ufo_auto_populate_elementor_front_page() {
    if ( ( defined( 'DOING_AJAX' ) && DOING_AJAX ) || ( defined( 'DOING_CRON' ) && DOING_CRON ) ) {
        return;
    }

    $page_ids = array();
    $front_id = get_option( 'page_on_front' );
    if ( $front_id ) {
        $page_ids[] = (int) $front_id;
    }
    if ( ! in_array( 57, $page_ids ) ) {
        $page_ids[] = 57;
    }
    
    $pages_query = get_posts( array(
        'post_type'      => 'page',
        'title'          => 'Home',
        'posts_per_page' => 1,
        'post_status'    => 'publish',
        'fields'         => 'ids',
    ) );
    if ( ! empty( $pages_query ) && ! in_array( (int) $pages_query[0], $page_ids ) ) {
        $page_ids[] = (int) $pages_query[0];
    }

    foreach ( $page_ids as $p_id ) {
        $post = get_post( $p_id );
        if ( ! $post || $post->post_type !== 'page' ) {
            continue;
        }

        $synced = get_post_meta( $p_id, '_ufo_blocks_flex_synced_v6', true );
        $current_data = get_post_meta( $p_id, '_elementor_data', true );

        if ( ! $synced || empty( $current_data ) || strpos( $current_data, 'w100001' ) === false ) {
            $elementor_blocks = array(
                array(
                    'id' => 'e100001',
                    'elType' => 'section',
                    'settings' => array( 'layout' => 'full_width', 'stretch_section' => 'section-stretched' ),
                    'elements' => array(
                        array(
                            'id' => 'c100001',
                            'elType' => 'column',
                            'settings' => array( '_column_size' => 100 ),
                            'elements' => array(
                                array(
                                    'id' => 'w100001',
                                    'elType' => 'widget',
                                    'widgetType' => 'ufo_jumbotron_widget',
                                    'settings' => array()
                                )
                            )
                        )
                    )
                ),
                array(
                    'id' => 'e100002',
                    'elType' => 'section',
                    'settings' => array(),
                    'elements' => array(
                        array(
                            'id' => 'c100002',
                            'elType' => 'column',
                            'settings' => array( '_column_size' => 100 ),
                            'elements' => array(
                                array(
                                    'id' => 'w100002',
                                    'elType' => 'widget',
                                    'widgetType' => 'ufo_videos_widget',
                                    'settings' => array()
                                )
                            )
                        )
                    )
                ),
                array(
                    'id' => 'e100003',
                    'elType' => 'section',
                    'settings' => array(),
                    'elements' => array(
                        array(
                            'id' => 'c100003',
                            'elType' => 'column',
                            'settings' => array( '_column_size' => 100 ),
                            'elements' => array(
                                array(
                                    'id' => 'w100003',
                                    'elType' => 'widget',
                                    'widgetType' => 'ufo_noticias_widget',
                                    'settings' => array()
                                )
                            )
                        )
                    )
                ),
                array(
                    'id' => 'e100004',
                    'elType' => 'section',
                    'settings' => array(),
                    'elements' => array(
                        array(
                            'id' => 'c100004',
                            'elType' => 'column',
                            'settings' => array( '_column_size' => 100 ),
                            'elements' => array(
                                array(
                                    'id' => 'w100004',
                                    'elType' => 'widget',
                                    'widgetType' => 'ufo_adsense_widget',
                                    'settings' => array( 'placement' => 'between_news_exp' )
                                )
                            )
                        )
                    )
                ),
                array(
                    'id' => 'e100005',
                    'elType' => 'section',
                    'settings' => array(),
                    'elements' => array(
                        array(
                            'id' => 'c100005',
                            'elType' => 'column',
                            'settings' => array( '_column_size' => 100 ),
                            'elements' => array(
                                array(
                                    'id' => 'w100005',
                                    'elType' => 'widget',
                                    'widgetType' => 'ufo_expedicoes_widget',
                                    'settings' => array()
                                )
                            )
                        )
                    )
                ),
                array(
                    'id' => 'e100006',
                    'elType' => 'section',
                    'settings' => array(),
                    'elements' => array(
                        array(
                            'id' => 'c100006',
                            'elType' => 'column',
                            'settings' => array( '_column_size' => 100 ),
                            'elements' => array(
                                array(
                                    'id' => 'w100006',
                                    'elType' => 'widget',
                                    'widgetType' => 'ufo_adsense_widget',
                                    'settings' => array( 'placement' => 'mid_bottom' )
                                )
                            )
                        )
                    )
                ),
                array(
                    'id' => 'e100007',
                    'elType' => 'section',
                    'settings' => array(),
                    'elements' => array(
                        array(
                            'id' => 'c100007',
                            'elType' => 'column',
                            'settings' => array( '_column_size' => 100 ),
                            'elements' => array(
                                array(
                                    'id' => 'w100007',
                                    'elType' => 'widget',
                                    'widgetType' => 'ufo_eventos_widget',
                                    'settings' => array()
                                )
                            )
                        )
                    )
                ),
                array(
                    'id' => 'e100008',
                    'elType' => 'section',
                    'settings' => array(),
                    'elements' => array(
                        array(
                            'id' => 'c100008',
                            'elType' => 'column',
                            'settings' => array( '_column_size' => 100 ),
                            'elements' => array(
                                array(
                                    'id' => 'w100008',
                                    'elType' => 'widget',
                                    'widgetType' => 'ufo_cta_widget',
                                    'settings' => array()
                                )
                            )
                        )
                    )
                ),
                array(
                    'id' => 'e100009',
                    'elType' => 'section',
                    'settings' => array(),
                    'elements' => array(
                        array(
                            'id' => 'c100009',
                            'elType' => 'column',
                            'settings' => array( '_column_size' => 100 ),
                            'elements' => array(
                                array(
                                    'id' => 'w100009',
                                    'elType' => 'widget',
                                    'widgetType' => 'ufo_adsense_widget',
                                    'settings' => array( 'placement' => 'home_bottom' )
                                )
                            )
                        )
                    )
                )
            );

            update_post_meta( $p_id, '_elementor_data', wp_slash( wp_json_encode( $elementor_blocks ) ) );
            update_post_meta( $p_id, '_elementor_edit_mode', 'builder' );
            update_post_meta( $p_id, '_elementor_template_type', 'wp-page' );
            update_post_meta( $p_id, '_elementor_version', '3.20.0' );
            update_post_meta( $p_id, '_ufo_blocks_flex_synced_v6', 'yes' );
        }
    }
}

/* ==========================================================================
   5. INJEÇÃO DOS SCRIPTS JAVASCRIPT ANIMADOS DE ROLAGEM, SLIDE E PREVIEW
   ========================================================================== */
add_action( 'wp_footer', function() {
    if ( is_front_page() || ( class_exists( '\Elementor\Plugin' ) && \Elementor\Plugin::$instance->editor->is_edit_mode() ) || is_page() || is_archive() ) :
    ?>
    <!-- Vanilla JS: Flexbox Módulos Motor (Slider Jumbotron Universal & Hover Previews) -->
    <script>
    function initUFOSlidersAndCarousels() {
        var sliders = document.querySelectorAll('.ufo-jumbotron-dynamic, #ufoJumbotronSlider');
        sliders.forEach(function(slider) {
            if (slider.getAttribute('data-slider-initialized') === 'true') return;
            slider.setAttribute('data-slider-initialized', 'true');

            var track = slider.querySelector('.ufo-jumbotron-track');
            var dots = slider.querySelectorAll('.ufo-jumbotron-dots .ufo-dot');
            if (!track || !dots || dots.length <= 1) return;

            var currentSlide = 0;
            var totalSlides = dots.length;
            var slideInterval;
            var autoplaySpeed = parseInt(slider.getAttribute('data-autoplay') || 5000, 10);
            var transSpeed = parseInt(slider.getAttribute('data-speed') || 600, 10);

            if (transSpeed) {
                track.style.transition = 'transform ' + (transSpeed / 1000) + 's cubic-bezier(0.25, 1, 0.5, 1)';
            }

            function goToSlide(index) {
                currentSlide = (index + totalSlides) % totalSlides;
                track.style.transform = 'translateX(-' + (currentSlide * 100) + '%)';
                dots.forEach(function(dot, i) {
                    if (i === currentSlide) {
                        dot.classList.add('active');
                        dot.style.background = 'var(--ufo-accent-primary, #00e5ff)';
                        dot.style.boxShadow = '0 0 12px rgba(0, 229, 255, 0.8)';
                    } else {
                        dot.classList.remove('active');
                        dot.style.background = 'transparent';
                        dot.style.boxShadow = '0 0 6px rgba(255, 255, 255, 0.3)';
                    }
                });
            }

            function startSlideShow() {
                clearInterval(slideInterval);
                if (autoplaySpeed > 0 && totalSlides > 1) {
                    slideInterval = setInterval(function() {
                        goToSlide(currentSlide + 1);
                    }, autoplaySpeed);
                }
            }

            dots.forEach(function(dot) {
                dot.addEventListener('click', function(e) {
                    e.preventDefault();
                    var idx = parseInt(this.getAttribute('data-slide'), 10);
                    goToSlide(idx);
                    startSlideShow();
                });
            });

            slider.addEventListener('mouseenter', function() {
                clearInterval(slideInterval);
            });
            slider.addEventListener('mouseleave', function() {
                startSlideShow();
            });

            startSlideShow();
        });

        var videoCarousel = document.getElementById('ufoVideoCarousel');
        var btnLeft  = document.getElementById('btnSlideLeft');
        var btnRight = document.getElementById('btnSlideRight');
        if (videoCarousel && btnLeft && btnRight && !btnLeft.hasAttribute('data-bound')) {
            btnLeft.setAttribute('data-bound', 'true');
            btnLeft.addEventListener('click', function() { videoCarousel.scrollBy({ left: (window.innerWidth > 768 ? -750 : -280), behavior: 'smooth' }); });
            btnRight.addEventListener('click', function() { videoCarousel.scrollBy({ left: (window.innerWidth > 768 ? 750 : 280), behavior: 'smooth' }); });
        }

        var newsCarousel = document.getElementById('ufoNewsCarousel');
        var btnNewsLeft  = document.getElementById('btnNewsLeft');
        var btnNewsRight = document.getElementById('btnNewsRight');
        if (newsCarousel && btnNewsLeft && btnNewsRight && !btnNewsLeft.hasAttribute('data-bound')) {
            btnNewsLeft.setAttribute('data-bound', 'true');
            btnNewsLeft.addEventListener('click', function() { newsCarousel.scrollBy({ left: (window.innerWidth > 768 ? -750 : -280), behavior: 'smooth' }); });
            btnNewsRight.addEventListener('click', function() { newsCarousel.scrollBy({ left: (window.innerWidth > 768 ? 750 : 280), behavior: 'smooth' }); });
        }

        var rotCarousel = document.getElementById('ufoRoteirosCarousel');
        var btnRotLeft  = document.getElementById('btnRoteirosLeft');
        var btnRotRight = document.getElementById('btnRoteirosRight');
        if (rotCarousel && btnRotLeft && btnRotRight && !btnRotLeft.hasAttribute('data-bound')) {
            btnRotLeft.setAttribute('data-bound', 'true');
            btnRotLeft.addEventListener('click', function() { rotCarousel.scrollBy({ left: (window.innerWidth > 768 ? -720 : -290), behavior: 'smooth' }); });
            btnRotRight.addEventListener('click', function() { rotCarousel.scrollBy({ left: (window.innerWidth > 768 ? 720 : 290), behavior: 'smooth' }); });
        }

        var compactCards = document.querySelectorAll('.ufo-compact-video-card[data-videoid]:not([data-hover-bound])');
        compactCards.forEach(function(card) {
            card.setAttribute('data-hover-bound', 'true');
            var videoId = card.getAttribute('data-videoid');
            var container = card.querySelector('.ufo-hover-iframe-container');
            var hoverTimeout;

            card.addEventListener('mouseenter', function() {
                hoverTimeout = setTimeout(function() {
                    if (container && videoId && !container.hasChildNodes()) {
                        var iframe = document.createElement('iframe');
                        iframe.setAttribute('src', 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&mute=1&controls=0&loop=1&playlist=' + videoId + '&playsinline=1&modestbranding=1&rel=0');
                        iframe.setAttribute('class', 'ufo-hover-iframe');
                        iframe.setAttribute('allow', 'autoplay; encrypted-media; gyroscope; picture-in-picture');
                        container.appendChild(iframe);
                    }
                }, 80);
            });

            card.addEventListener('mouseleave', function() {
                clearTimeout(hoverTimeout);
                if (container) {
                    container.innerHTML = '';
                }
            });
        });
    }

    document.addEventListener('DOMContentLoaded', initUFOSlidersAndCarousels);
    window.addEventListener('elementor/frontend/init', function() {
        if (window.elementorFrontend) {
            elementorFrontend.hooks.addAction('frontend/element_ready/ufo_jumbotron_widget.default', function($scope) {
                initUFOSlidersAndCarousels();
            });
        }
    });
    </script>
    <?php
    endif;
}, 30 );
