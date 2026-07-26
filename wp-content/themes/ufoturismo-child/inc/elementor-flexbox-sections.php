<?php
/**
 * Módulo de Flexbox Editáveis do Elementor & Shortcodes Modulares (UFOTurismo PRO)
 * Permite que cada seção da Home seja arrastada, editada e rearranjada livremente no Elementor.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/* ==========================================================================
   1. FUNÇÕES DE RENDERIZAÇÃO MODULAR (CADA BLOCO INDEPENDENTE)
   ========================================================================== */

/**
 * Módulo 1: Jumbotron Hero de 4 Slides (5 em 5s / 600ms)
 */
function ufo_render_section_jumbotron() {
    $page_id = get_option( 'page_on_front' ) ?: ( get_the_ID() ?: 0 );
    $hero_title    = get_post_meta( $page_id, '_ufo_hero_title', true ) ?: 'A Verdade Está Lá Fora. E Nós Levamos Você Até Ela.';
    $hero_subtitle = get_post_meta( $page_id, '_ufo_hero_subtitle', true ) ?: 'O maior portal brasileiro focado em Turismo Ufológico, Pesquisa de Fenômenos Anômalos e Divulgação Científica.';
    $btn_1_text    = get_post_meta( $page_id, '_ufo_hero_btn_text_1', true ) ?: 'Ver Expedições';
    $btn_1_url     = get_post_meta( $page_id, '_ufo_hero_btn_url_1', true ) ?: '#roteiros';
    $btn_2_text    = get_post_meta( $page_id, '_ufo_hero_btn_text_2', true ) ?: 'Últimas Notícias';
    $btn_2_url     = get_post_meta( $page_id, '_ufo_hero_btn_url_2', true ) ?: '#noticias';

    ob_start();
    ?>
    <!-- Bloco Flexbox Elementor: Jumbotron de 4 Slides -->
    <section class="ufo-jumbotron ufo-elementor-flexbox-block" id="ufoJumbotronSlider" style="position: relative; width: 100%; overflow: hidden; background: var(--ufo-bg);">
        <div class="ufo-jumbotron-track" id="ufoJumbotronTrack">
            <!-- Slide 1: Proposta de Valor Principal -->
            <div class="ufo-jumbotron-slide" style="background-image: url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=2072&auto=format&fit=crop');">
                <div class="ufo-hero-overlay">
                    <div class="ufo-container ufo-hero-content ufo-centered-content">
                        <h1 class="ufo-hero-title"><?php echo esc_html( $hero_title ); ?></h1>
                        <p class="ufo-hero-subtitle"><?php echo esc_html( $hero_subtitle ); ?></p>
                        <div class="ufo-hero-actions ufo-actions-centered">
                            <a href="<?php echo esc_attr( $btn_1_url ); ?>" class="ufo-btn ufo-btn-primary"><?php echo esc_html( $btn_1_text ); ?></a>
                            <a href="<?php echo esc_attr( $btn_2_url ); ?>" class="ufo-btn ufo-btn-secondary" style="border: 1px solid var(--ufo-text-main); color: var(--ufo-text-main); margin-left: 15px; background: rgba(11,14,20,0.65); backdrop-filter: blur(8px);"><?php echo esc_html( $btn_2_text ); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 2: Expedições de Campo & Visão Noturna FLIR -->
            <div class="ufo-jumbotron-slide" style="background-image: url('https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=2000&auto=format&fit=crop');">
                <div class="ufo-hero-overlay">
                    <div class="ufo-container ufo-hero-content ufo-centered-content">
                        <h2 class="ufo-hero-title">Expedições Noturnas Com Tecnologia FLIR e Radar Passivo</h2>
                        <p class="ufo-hero-subtitle">Investigue avistamentos de campo com especialistas credenciados, equipamentos ópticos infravermelhos e sensores de gravidade nos roteiros do Brasil.</p>
                        <div class="ufo-hero-actions ufo-actions-centered">
                            <a href="#roteiros" class="ufo-btn ufo-btn-primary">Conhecer Expedições</a>
                            <a href="https://wa.me/5511999999999" target="_blank" class="ufo-btn ufo-btn-secondary" style="border: 1px solid var(--ufo-text-main); color: var(--ufo-text-main); margin-left: 15px; background: rgba(11,14,20,0.65);">Falar com Guia</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 3: Acervo AARO & Desclassificação Científica -->
            <div class="ufo-jumbotron-slide" style="background-image: url('https://images.unsplash.com/photo-1506703719100-a0f3a48c0f86?q=80&w=2000&auto=format&fit=crop');">
                <div class="ufo-hero-overlay">
                    <div class="ufo-container ufo-hero-content ufo-centered-content">
                        <h2 class="ufo-hero-title">Acervo Oficial: Documentos Militares & Pesquisa UAP</h2>
                        <p class="ufo-hero-subtitle">Relatórios desclassificados pelo Pentágono, auditações do Senado Americano e investigações científicas traduzidos com precisão na íntegra para o Português.</p>
                        <div class="ufo-hero-actions ufo-actions-centered">
                            <a href="#noticias" class="ufo-btn ufo-btn-primary">Explorar Acervo Central</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 4: Turismo Ufológico & Experiência de Campo -->
            <div class="ufo-jumbotron-slide" style="background-image: url('https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=2072&auto=format&fit=crop');">
                <div class="ufo-hero-overlay">
                    <div class="ufo-container ufo-hero-content ufo-centered-content">
                        <h2 class="ufo-hero-title">Imersão Completa nos Pontos Quentes da Ufologia no Brasil</h2>
                        <p class="ufo-hero-subtitle">Vivencie uma jornada astronômica inesquecível aliando ciência aeronáutica, turismo responsável e contato com os mistérios mais fascinantes do universo.</p>
                        <div class="ufo-hero-actions ufo-actions-centered">
                            <a href="https://wa.me/5511999999999" target="_blank" class="ufo-btn ufo-btn-primary" style="background: var(--ufo-accent-vip); border-color: var(--ufo-accent-vip); color: #000;">💬 Acessar Fórum & WhatsApp VIP</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ufo-jumbotron-dots">
            <button class="ufo-dot active" data-slide="0" aria-label="Slide 1"></button>
            <button class="ufo-dot" data-slide="1" aria-label="Slide 2"></button>
            <button class="ufo-dot" data-slide="2" aria-label="Slide 3"></button>
            <button class="ufo-dot" data-slide="3" aria-label="Slide 4"></button>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Módulo 2: Vitrine Netflix de Vídeos com Preview On-Hover em PT-BR
 */
function ufo_render_section_videos() {
    $page_id = get_option( 'page_on_front' ) ?: ( get_the_ID() ?: 0 );
    $yt_channels_input = get_post_meta( $page_id, '_ufo_yt_channels', true ) ?: "https://www.youtube.com/@jessemichelsclips\nhttps://www.youtube.com/feeds/videos.xml?channel_id=UC8ZKTXN9trt5dhixz6b6l6w";
    $yt_videos = function_exists('ufo_fetch_channel_videos') ? ufo_fetch_channel_videos($yt_channels_input, 12) : array();

    ob_start();
    ?>
    <!-- Bloco Flexbox Elementor: Vitrine de Vídeos Netflix -->
    <div class="ufo-container ufo-home-container" style="padding-top: 15px; margin-top: 0; max-width: 1440px; margin: 0 auto; padding: 0 200px;">
        <section class="ufo-home-section ufo-carousel-wrapper ufo-elementor-flexbox-block" style="position: relative; margin-top: 20px; width: 100%;">
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
 * Módulo 3: Vitrine Netflix de Notícias e Relatos
 */
function ufo_render_section_noticias() {
    $page_id = get_option( 'page_on_front' ) ?: ( get_the_ID() ?: 0 );
    $sec_news_lbl = get_post_meta( $page_id, '_ufo_sec_news_title', true ) ?: 'Últimas Notícias e Relatos';
    $yt_posts_input = get_post_meta( $page_id, '_ufo_yt_posts_feed', true ) ?: 'https://www.youtube.com/channel/UC8ZKTXN9trt5dhixz6b6l6w/posts';
    $yt_posts = function_exists('ufo_fetch_community_posts_feed') ? ufo_fetch_community_posts_feed($yt_posts_input, 8) : array();

    ob_start();
    ?>
    <!-- Bloco Flexbox Elementor: Vitrine de Notícias -->
    <div class="ufo-container ufo-home-container" style="max-width: 1440px; margin: 0 auto; padding: 0 200px;">
        <section id="noticias" class="ufo-home-section ufo-carousel-wrapper ufo-elementor-flexbox-block" style="position: relative; margin-top: 45px; width: 100%;">
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
            <div class="ufo-slider-viewport">
                <button type="button" class="ufo-arrow-btn ufo-arrow-left" id="btnNewsLeft" aria-label="Rolar notícias para esquerda">&lsaquo;</button>
                <div class="ufo-compact-carousel" id="ufoNewsCarousel">
                    <?php
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
 * Módulo 4: Galeria das 12 Expedições Científicas de Turismo Ufológico no Brasil (Escala 70% Netflix)
 */
function ufo_render_section_expedicoes() {
    $page_id = get_option( 'page_on_front' ) ?: ( get_the_ID() ?: 0 );
    $sec_roteiros_lbl = get_post_meta( $page_id, '_ufo_sec_roteiros_title', true ) ?: 'Próximas Expedições e Roteiros';

    ob_start();
    ?>
    <!-- Bloco Flexbox Elementor: Galeria 12 Expedições (70% Netflix) -->
    <div class="ufo-container ufo-home-container" style="max-width: 1440px; margin: 0 auto; padding: 0 200px;">
        <section id="roteiros" class="ufo-home-section ufo-carousel-wrapper ufo-elementor-flexbox-block" style="position: relative; margin-top: 35px; width: 100%;">
            <div class="ufo-section-header">
                <div>
                    <span style="color: var(--ufo-accent-sci); font-size: 13px; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; display: block; margin-bottom: 5px;">🛸 Expedições de Campo & Turismo Científico</span>
                    <h2><?php echo esc_html( $sec_roteiros_lbl ); ?></h2>
                </div>
                <a href="<?php echo get_post_type_archive_link('roteiros') ?: '#'; ?>" class="ufo-view-all">Ver Todos os Roteiros &rarr;</a>
            </div>
            <p style="color: var(--ufo-text-muted); font-size: 14px; margin-top: -15px; margin-bottom: 20px;">
                Deslize pela galeria imersiva para escolher seu próximo destino de investigação anômala. Equipamentos de visão noturna e guias especialistas incluídos.
            </p>
            <div class="ufo-slider-viewport">
                <button type="button" class="ufo-arrow-btn ufo-arrow-left" id="btnRoteirosLeft" aria-label="Rolar expedições para esquerda">&lsaquo;</button>
                <div class="ufo-compact-carousel" id="ufoRoteirosCarousel">
                    <?php
                    $roteiros_items = array();
                    $roteiros_query = new WP_Query( array(
                        'post_type'      => 'roteiros',
                        'posts_per_page' => 12,
                        'post_status'    => 'publish'
                    ) );
                    if ( $roteiros_query->have_posts() ) {
                        while ( $roteiros_query->have_posts() ) {
                            $roteiros_query->the_post();
                            $roteiros_items[] = array(
                                'title'   => get_the_title(),
                                'url'     => get_permalink(),
                                'thumb'   => get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) ?: 'https://images.unsplash.com/photo-1506703719100-a0f3a48c0f86?q=80&w=600&auto=format&fit=crop',
                                'duracao' => get_post_meta( get_the_ID(), '_ufo_duracao', true ) ?: '1 Dia',
                                'preco'   => get_post_meta( get_the_ID(), '_ufo_preco', true ) ?: 'Consulte',
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
                        if ( count($roteiros_items) < 12 ) {
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
                    $roteiros_items = array_slice($roteiros_items, 0, 12);
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
function ufo_render_section_eventos() {
    ob_start();
    ?>
    <!-- Bloco Flexbox Elementor: Agenda de Congressos -->
    <div class="ufo-container ufo-home-container" style="max-width: 1440px; margin: 0 auto; padding: 0 200px;">
        <section id="eventos" class="ufo-home-section ufo-elementor-flexbox-block" style="margin-top: 45px; width: 100%;">
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
    </div>
    <?php
    return ob_get_clean();
}

/**
 * Módulo 6: Banner CTA Fórum e Comunidade VIP WhatsApp
 */
function ufo_render_section_cta() {
    $page_id = get_option( 'page_on_front' ) ?: ( get_the_ID() ?: 0 );
    $cta_title    = get_post_meta( $page_id, '_ufo_cta_title', true ) ?: 'Pronto Para Viver o Desconhecido?';
    $cta_desc     = get_post_meta( $page_id, '_ufo_cta_desc', true ) ?: 'Participe de nossos roteiros noturnos com especialistas, equipamentos de visão noturna e guias credenciados.';
    $cta_btn_text = get_post_meta( $page_id, '_ufo_cta_btn_text', true ) ?: 'Agendar Agora pelo WhatsApp';
    $cta_url      = get_post_meta( $page_id, '_ufo_cta_url', true ) ?: 'https://wa.me/5511999999999';

    ob_start();
    ?>
    <!-- Bloco Flexbox Elementor: Banner CTA VIP -->
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
 * Módulo 7: Zona de Publicidade Monetizada Ad Manager
 */
function ufo_render_section_adsense( $atts = array() ) {
    $atts = shortcode_atts( array(
        'placement' => 'between_news_exp'
    ), $atts );

    ob_start();
    ?>
    <div class="ufo-container ufo-home-container" style="max-width: 1440px; margin: 0 auto; padding: 0 200px;">
        <div class="ufo-ad-placement ufo-elementor-flexbox-block" style="margin: 45px auto; text-align: center; width: 100%;">
            <span class="ufo-ad-label">Patrocinado</span>
            <div class="ufo-ad-box-centered">
                <?php 
                $ad_code = '';
                $placeholder = '📢 Google AdSense / Ad Manager • High CTR Monetization Placement';
                if ( $atts['placement'] === 'mid_bottom' ) {
                    $ad_code = get_option('ufo_ad_in_article_mid');
                    $placeholder = '📢 Google Ad Manager • Mid-Page Conversions & Sponsor Placement';
                } elseif ( $atts['placement'] === 'home_bottom' ) {
                    $ad_code = get_option('ufo_ad_in_article_bottom');
                    $placeholder = '📢 Google AdSense / Ad Manager • Rodapé Monetizado • High Completion RPM';
                } else {
                    $ad_code = get_option('ufo_ad_in_article_top') ?: get_option('ufo_ad_home_top');
                    $placeholder = '📢 Google AdSense / Ad Manager • Between News & Expeditions (High CTR Placement • 728x90 / 300x250)';
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

/* ==========================================================================
   2. REGISTRO OFICIAL DOS SHORTCODES WORDPRESS PARA O ELEMENTOR
   ========================================================================== */
add_shortcode( 'ufo_jumbotron', 'ufo_render_section_jumbotron' );
add_shortcode( 'ufo_videos_carousel', 'ufo_render_section_videos' );
add_shortcode( 'ufo_noticias_carousel', 'ufo_render_section_noticias' );
add_shortcode( 'ufo_expedicoes_gallery', 'ufo_render_section_expedicoes' );
add_shortcode( 'ufo_eventos_agenda', 'ufo_render_section_eventos' );
add_shortcode( 'ufo_cta_vip', 'ufo_render_section_cta' );
add_shortcode( 'ufo_adsense', 'ufo_render_section_adsense' );

/* ==========================================================================
   3. INTEGRANDO WIDGETS NATIVOS PARA O CONSTRUTOR ELEMENTOR PRO (FLEXBOX)
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

        if ( ! class_exists( 'UFOTurismo_Elementor_Jumbotron_Widget' ) ) {
            class UFOTurismo_Elementor_Jumbotron_Widget extends \Elementor\Widget_Base {
                public function get_name() { return 'ufo_jumbotron_widget'; }
                public function get_title() { return '🚀 UFO Jumbotron Hero (4 Slides)'; }
                public function get_icon() { return 'eicon-slider-push'; }
                public function get_categories() { return [ 'ufoturismo-pro' ]; }
                protected function render() { echo ufo_render_section_jumbotron(); }
            }
        }

        if ( ! class_exists( 'UFOTurismo_Elementor_Videos_Widget' ) ) {
            class UFOTurismo_Elementor_Videos_Widget extends \Elementor\Widget_Base {
                public function get_name() { return 'ufo_videos_widget'; }
                public function get_title() { return '🎬 UFO Vitrine Vídeos Netflix (PT-BR)'; }
                public function get_icon() { return 'eicon-video-playlist'; }
                public function get_categories() { return [ 'ufoturismo-pro' ]; }
                protected function render() { echo ufo_render_section_videos(); }
            }
        }

        if ( ! class_exists( 'UFOTurismo_Elementor_Noticias_Widget' ) ) {
            class UFOTurismo_Elementor_Noticias_Widget extends \Elementor\Widget_Base {
                public function get_name() { return 'ufo_noticias_widget'; }
                public function get_title() { return '📰 UFO Vitrine Notícias & Relatos'; }
                public function get_icon() { return 'eicon-post-slider'; }
                public function get_categories() { return [ 'ufoturismo-pro' ]; }
                protected function render() { echo ufo_render_section_noticias(); }
            }
        }

        if ( ! class_exists( 'UFOTurismo_Elementor_Expedition_Widget' ) ) {
            class UFOTurismo_Elementor_Expedition_Widget extends \Elementor\Widget_Base {
                public function get_name() { return 'ufo_expedicoes_widget'; }
                public function get_title() { return '⛺ UFO Galeria 12 Expedições (70% Netflix)'; }
                public function get_icon() { return 'eicon-global-settings'; }
                public function get_categories() { return [ 'ufoturismo-pro' ]; }
                protected function render() { echo ufo_render_section_expedicoes(); }
            }
        }

        if ( ! class_exists( 'UFOTurismo_Elementor_Eventos_Widget' ) ) {
            class UFOTurismo_Elementor_Eventos_Widget extends \Elementor\Widget_Base {
                public function get_name() { return 'ufo_eventos_widget'; }
                public function get_title() { return '🗓️ UFO Agenda Congressos & Encontros'; }
                public function get_icon() { return 'eicon-calendar'; }
                public function get_categories() { return [ 'ufoturismo-pro' ]; }
                protected function render() { echo ufo_render_section_eventos(); }
            }
        }

        if ( ! class_exists( 'UFOTurismo_Elementor_CTA_Widget' ) ) {
            class UFOTurismo_Elementor_CTA_Widget extends \Elementor\Widget_Base {
                public function get_name() { return 'ufo_cta_widget'; }
                public function get_title() { return '💬 UFO Banner CTA Grupo VIP WhatsApp'; }
                public function get_icon() { return 'eicon-button'; }
                public function get_categories() { return [ 'ufoturismo-pro' ]; }
                protected function render() { echo ufo_render_section_cta(); }
            }
        }

        if ( ! class_exists( 'UFOTurismo_Elementor_AdSense_Widget' ) ) {
            class UFOTurismo_Elementor_AdSense_Widget extends \Elementor\Widget_Base {
                public function get_name() { return 'ufo_adsense_widget'; }
                public function get_title() { return '💰 UFO Zona Ad Manager / AdSense'; }
                public function get_icon() { return 'eicon-ad'; }
                public function get_categories() { return [ 'ufoturismo-pro' ]; }
                protected function render() { echo ufo_render_section_adsense(); }
            }
        }

        $widgets_manager->register( new \UFOTurismo_Elementor_Jumbotron_Widget() );
        $widgets_manager->register( new \UFOTurismo_Elementor_Videos_Widget() );
        $widgets_manager->register( new \UFOTurismo_Elementor_Noticias_Widget() );
        $widgets_manager->register( new \UFOTurismo_Elementor_Expedition_Widget() );
        $widgets_manager->register( new \UFOTurismo_Elementor_Eventos_Widget() );
        $widgets_manager->register( new \UFOTurismo_Elementor_CTA_Widget() );
        $widgets_manager->register( new \UFOTurismo_Elementor_AdSense_Widget() );
    });
});

/* ==========================================================================
   4. AUTO-POPULAÇÃO DOS BLOCOS NATIVOS NA PÁGINA INICIAL PARA ARRASTAR NO ELEMENTOR
   ========================================================================== */
add_action( 'init', 'ufo_auto_populate_elementor_front_page', 20 );
function ufo_auto_populate_elementor_front_page() {
    // Evita rodar durante chamadas AJAX do Elementor ou salvar automáticos do editor
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
    
    // SUBSTITUIÇÃO COMPATÍVEL COM WP 6.2+ (Evita o erro deprecated get_page_by_title)
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

        $synced = get_post_meta( $p_id, '_ufo_blocks_flex_synced_v5', true );
        $current_data = get_post_meta( $p_id, '_elementor_data', true );

        // Sincroniza e corrige o banco com estrutura 100% válida e IDs alfanuméricos puros
        if ( ! $synced || empty( $current_data ) || strpos( $current_data, 'w100001' ) === false ) {

            $elementor_blocks = array(
                // Bloco 1: Jumbotron Hero
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
                // Bloco 2: Vídeos Netflix
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
                // Bloco 3: Notícias e Relatos
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
                // Bloco 4: Monetização AdSense Topo
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
                // Bloco 5: Galeria 12 Expedições
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
                // Bloco 6: Monetização Ad Manager Meio
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
                // Bloco 7: Agenda de Congressos
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
                // Bloco 8: Banner CTA VIP WhatsApp
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
                // Bloco 9: Monetização Rodapé
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
            update_post_meta( $p_id, '_ufo_blocks_flex_synced_v5', 'yes' );
        }
    }
}

/* ==========================================================================
   5. INJEÇÃO DOS SCRIPTS JAVASCRIPT ANIMADOS DE ROLAGEM, SLIDE E PREVIEW
   ========================================================================== */
add_action( 'wp_footer', function() {
    if ( is_front_page() || ( class_exists( '\Elementor\Plugin' ) && \Elementor\Plugin::$instance->editor->is_edit_mode() ) || is_page() ) :
    ?>
    <!-- Vanilla JS: Flexbox Módulos Motor (Slider Jumbotron 5s/600ms, Setas Rolagem & Hover Previews) -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // 1. Motor do Jumbotron Slider (Troca de 5 em 5 segundos, animação suave de 600ms)
        var track = document.getElementById('ufoJumbotronTrack');
        var dots = document.querySelectorAll('.ufo-jumbotron-dots .ufo-dot');
        var currentSlide = 0;
        var totalSlides = dots ? dots.length : 0;
        var slideInterval;

        function goToSlide(index) {
            if (totalSlides <= 0) return;
            currentSlide = (index + totalSlides) % totalSlides;
            if (track) {
                track.style.transform = 'translateX(-' + (currentSlide * 25) + '%)';
            }
            dots.forEach(function(dot, i) {
                if (i === currentSlide) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });
        }

        function startSlideShow() {
            if (!track || totalSlides <= 1) return;
            clearInterval(slideInterval);
            slideInterval = setInterval(function() {
                goToSlide(currentSlide + 1);
            }, 5000);
        }

        if (dots) {
            dots.forEach(function(dot) {
                dot.addEventListener('click', function() {
                    var idx = parseInt(this.getAttribute('data-slide'), 10);
                    goToSlide(idx);
                    startSlideShow();
                });
            });
        }

        if (track && totalSlides > 0) {
            startSlideShow();
        }

        // 2. Rolagem Horizontal Animada Para a Galeria Compacta de Vídeos
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

        // 3. Rolagem Horizontal Animada Para a Seção de Notícias
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

        // 4. Rolagem Horizontal Animada Para o Carrossel de Próximas Expedições
        var rotCarousel = document.getElementById('ufoRoteirosCarousel');
        var btnRotLeft  = document.getElementById('btnRoteirosLeft');
        var btnRotRight = document.getElementById('btnRoteirosRight');

        if (rotCarousel && btnRotLeft && btnRotRight) {
            btnRotLeft.addEventListener('click', function() {
                var scrollAmount = window.innerWidth > 768 ? -720 : -290;
                rotCarousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            });
            btnRotRight.addEventListener('click', function() {
                var scrollAmount = window.innerWidth > 768 ? 720 : 290;
                rotCarousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            });
        }

        // 5. Preview de Vídeo On-Hover (Injeta Iframe sem bloqueio no mouseenter)
        var compactCards = document.querySelectorAll('.ufo-compact-video-card[data-videoid]');
        compactCards.forEach(function(card) {
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
    });
    </script>
    <?php
    endif;
}, 30 );
