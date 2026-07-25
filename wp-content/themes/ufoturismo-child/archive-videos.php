<?php
/**
 * Template Name: Central de Vídeos & Cinema Mode
 * Otimizado para Monetização com Player em Cinema Mode
 * Template para o acervo de Vídeos e Playlists do YouTube
 */
get_header();

// Puxa anúncios do UFO Ad Manager se configurados
$ad_top = get_option('ufo_ad_home_top'); 
$ad_bottom = get_option('ufo_ad_in_article_bottom');
?>

<!-- Cinema Overlay (Para obscurecer o site no modo cinema) -->
<div id="ufo-cinema-backdrop" class="ufo-cinema-backdrop" onclick="ufoToggleCinemaMode()"></div>

<div class="ufo-videos-portal-container">
    
    <!-- Hero Header -->
    <header class="ufo-videos-header">
        <div class="ufo-section-header" style="margin-bottom: 20px;">
            <div>
                <h1 class="ufo-hero-title" style="font-size: 40px; margin-bottom: 10px;">🛸 Central Multimídia & Playlists</h1>
                <p style="color: var(--ufo-text-muted); font-size: 18px;">Assista às documentações científicas, relatos em vídeo e expedições em modo cinema.</p>
            </div>
            <button class="ufo-btn ufo-btn-primary" id="btn-cinema-toggle" onclick="ufoToggleCinemaMode()">
                🎬 Ativar Modo Cinema
            </button>
        </div>
    </header>

    <!-- Ad Placement Top (Otimizado para alto RPM acima do fold do player) -->
    <div class="ufo-ad-placement" style="margin-bottom: 30px;">
        <?php echo !empty($ad_top) ? $ad_top : '<!-- UFO Ad Manager: Espaço Reservado para Anúncio Superior (Leaderboard / Vídeo Ads) -->'; ?>
    </div>

    <!-- MAIN CINEMA PLAYER -->
    <section id="ufo-cinema-station" class="ufo-cinema-station">
        <div class="ufo-player-wrapper">
            <iframe id="ufo-main-iframe" 
                    src="https://www.youtube.com/embed/videoseries?list=PLdxIk4TWVBzFOnxREFf_XGN9mksdgSvHs&rel=0&modestbranding=1" 
                    title="UFO Turismo Cinema Player" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    allowfullscreen>
            </iframe>
        </div>
        
        <!-- Info do vídeo ativo no player -->
        <div class="ufo-active-video-meta" id="ufo-active-meta">
            <span class="ufo-badge-playlist">PLAYLIST OFICIAL ATIVA</span>
            <h2 id="ufo-player-title">Playlist: UFO Turismo & Avistamentos Anômalos</h2>
            <p id="ufo-player-desc">Você está assistindo à lista contínua de reprodução selecionada pela equipe curadora do UFOTurismo. Selecione outros vídeos ou playlists abaixo para alternar de forma interativa sem recarregar a página.</p>
        </div>
    </section>

    <!-- Playlist & Vídeo Hub -->
    <section class="ufo-videos-catalog" style="margin-top: 50px;">
        <div class="ufo-section-header">
            <h2>Acervo Interativo & Outras Playlists</h2>
            <span style="color: var(--ufo-text-muted);">Clique em um card para reproduzir na tela principal</span>
        </div>

        <div class="ufo-grid-3">
            
            <!-- Card 1: Playlist Solicitada (Ativo por Padrão) -->
            <article class="ufo-card ufo-video-card active-card" onclick="ufoPlayItem('https://www.youtube.com/embed/videoseries?list=PLdxIk4TWVBzFOnxREFf_XGN9mksdgSvHs&rel=0&autoplay=1', 'Playlist: UFO Turismo & Avistamentos Anômalos', 'Assista à seleção oficial de vídeos sobre turismo ufológico e pesquisas de campo.', this)">
                <div class="ufo-card-img" style="background-image: url('https://images.unsplash.com/photo-1506703719100-a0f3a48c0f86?q=80&w=600&auto=format&fit=crop'); position: relative;">
                    <div class="ufo-play-overlay">▶</div>
                    <span class="ufo-card-badge">PLAYLIST YOUTUBE</span>
                </div>
                <div class="ufo-card-body">
                    <h3><a href="javascript:void(0);">Playlist Oficial UFOTurismo</a></h3>
                    <p style="color: var(--ufo-text-muted); font-size: 14px;">Lista oficial de vídeos do canal integrada em tempo real com o YouTube.</p>
                </div>
            </article>

            <!-- Card 2: Exemplo Documentário Exopolítica -->
            <article class="ufo-card ufo-video-card" onclick="ufoPlayItem('https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1&modestbranding=1', 'Documentário: Exopolítica e os Arquivos Secretos', 'Análise das desclassificações governamentais de documentos ufológicos na América do Sul.', this)">
                <div class="ufo-card-img" style="background-image: url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=600&auto=format&fit=crop'); position: relative;">
                    <div class="ufo-play-overlay">▶</div>
                    <span class="ufo-card-badge" style="background: var(--ufo-accent-sci); color: #000;">VÍDEO DESTAQUE</span>
                </div>
                <div class="ufo-card-body">
                    <h3><a href="javascript:void(0);">Exopolítica & Arquivos Secretos</a></h3>
                    <p style="color: var(--ufo-text-muted); font-size: 14px;">Análise das recentes desclassificações e testemunhos militares no Congresso.</p>
                </div>
            </article>

            <!-- Card 3: Exemplo Expedições no Litoral -->
            <article class="ufo-card ufo-video-card" onclick="ufoPlayItem('https://www.youtube.com/embed/videoseries?list=PLdxIk4TWVBzFOnxREFf_XGN9mksdgSvHs&index=2&autoplay=1', 'Expedições Noturnas: Vigílias em Peruíbe', 'Registros reais com equipamentos de visão noturna durante as expedições de campo.', this)">
                <div class="ufo-card-img" style="background-image: url('https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=600&auto=format&fit=crop'); position: relative;">
                    <div class="ufo-play-overlay">▶</div>
                    <span class="ufo-card-badge">EXPEDIÇÃO REAL</span>
                </div>
                <div class="ufo-card-body">
                    <h3><a href="javascript:void(0);">Vigílias Noturnas em Peruíbe</a></h3>
                    <p style="color: var(--ufo-text-muted); font-size: 14px;">Confira os relatos filmados durante nossos roteiros ufológicos no litoral.</p>
                </div>
            </article>

            <?php
            // Loop Dinâmico de Vídeos Cadastrados no Banco de Dados (CPT 'videos')
            $videos_query = new WP_Query(array(
                'post_type' => 'videos',
                'posts_per_page' => 6,
                'post_status' => 'publish'
            ));

            if ( $videos_query->have_posts() ) :
                while ( $videos_query->have_posts() ) : $videos_query->the_post();
                    $video_url = get_post_meta( get_the_ID(), '_ufo_video_url', true );
                    // Se não tiver meta de URL, faz um fallback elegante
                    $embed_url = !empty($video_url) ? $video_url : 'https://www.youtube.com/embed/videoseries?list=PLdxIk4TWVBzFOnxREFf_XGN9mksdgSvHs&autoplay=1';
                    $thumb = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                    if ( !$thumb ) $thumb = 'https://images.unsplash.com/photo-1534447677768-be436bb09401?q=80&w=600&auto=format&fit=crop';
            ?>
            <article class="ufo-card ufo-video-card" onclick="ufoPlayItem('<?php echo esc_url($embed_url); ?>', '<?php echo esc_js(get_the_title()); ?>', '<?php echo esc_js(get_the_excerpt()); ?>', this)">
                <div class="ufo-card-img" style="background-image: url('<?php echo esc_url($thumb); ?>'); position: relative;">
                    <div class="ufo-play-overlay">▶</div>
                    <span class="ufo-card-badge" style="background: var(--ufo-accent-primary); color: #000;">ACERVO CPT</span>
                </div>
                <div class="ufo-card-body">
                    <h3><a href="javascript:void(0);"><?php the_title(); ?></a></h3>
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

    <!-- Ad Placement Bottom (Monetização Fim da Sessão de Vídeos) -->
    <div class="ufo-ad-placement" style="margin-top: 60px;">
        <?php echo !empty($ad_bottom) ? $ad_bottom : '<!-- UFO Ad Manager: Espaço Reservado no Acervo Multimídia -->'; ?>
    </div>

</div>

<!-- Vanilla JS Cinema Controller -->
<script>
function ufoPlayItem(url, title, desc, cardElement) {
    // Atualiza o player iframe
    const iframe = document.getElementById('ufo-main-iframe');
    iframe.src = url;

    // Atualiza metadados na tela
    document.getElementById('ufo-player-title').innerText = title;
    document.getElementById('ufo-player-desc').innerText = desc || 'Reproduzindo conteúdo de vídeo em alta performance.';

    // Atualiza visual do card ativo
    document.querySelectorAll('.ufo-video-card').forEach(el => el.classList.remove('active-card'));
    if(cardElement) {
        cardElement.classList.add('active-card');
    }

    // Rola suavemente de volta pro player
    document.getElementById('ufo-cinema-station').scrollIntoView({ behavior: 'smooth', block: 'center' });
}

let cinemaActive = false;
function ufoToggleCinemaMode() {
    const backdrop = document.getElementById('ufo-cinema-backdrop');
    const station = document.getElementById('ufo-cinema-station');
    const btn = document.getElementById('btn-cinema-toggle');

    cinemaActive = !cinemaActive;

    if (cinemaActive) {
        backdrop.classList.add('active');
        station.classList.add('cinema-focus');
        btn.innerText = '✕ Sair do Modo Cinema';
        btn.style.background = 'var(--ufo-accent-primary)';
    } else {
        backdrop.classList.remove('active');
        station.classList.remove('cinema-focus');
        btn.innerText = '🎬 Ativar Modo Cinema';
        btn.style.background = 'var(--ufo-accent-sci)';
    }
}
</script>

<?php get_footer(); ?>
