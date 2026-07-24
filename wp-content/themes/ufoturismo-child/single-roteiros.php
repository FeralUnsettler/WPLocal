<?php
/**
 * O template para exibir Roteiros Turísticos Únicos
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

<main id="primary" class="ufo-site-main">
    <div class="ufo-container ufo-roteiro-container">
        <?php while ( have_posts() ) : the_post(); 
            // Recupera os meta dados
            $duracao = get_post_meta( get_the_ID(), '_ufoturismo_roteiro_duracao', true );
            $itens = get_post_meta( get_the_ID(), '_ufoturismo_roteiro_itens_inclusos', true );
            $valor = get_post_meta( get_the_ID(), '_ufoturismo_roteiro_valor', true );
            $datas = get_post_meta( get_the_ID(), '_ufoturismo_roteiro_datas', true );
            $whatsapp = get_post_meta( get_the_ID(), '_ufoturismo_roteiro_whatsapp', true );
            $mapa_url = get_post_meta( get_the_ID(), '_ufoturismo_roteiro_mapa_url', true );
            $video_url = get_post_meta( get_the_ID(), '_ufoturismo_roteiro_video_url', true );
        ?>
            
            <!-- Hero do Roteiro -->
            <header class="ufo-roteiro-hero" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');">
                <div class="ufo-hero-overlay">
                    <h1 class="ufo-hero-title"><?php the_title(); ?></h1>
                    <?php if ( ! empty( $duracao ) ) : ?>
                        <span class="ufo-hero-meta">⏱️ Duração: <?php echo esc_html( $duracao ); ?></span>
                    <?php endif; ?>
                </div>
            </header>

            <div class="ufo-roteiro-grid">
                <!-- Coluna Principal -->
                <article class="ufo-roteiro-content">
                    <h2>Sobre a Expedição</h2>
                    <?php the_content(); ?>

                    <?php if ( ! empty( $video_url ) ) : ?>
                        <div class="ufo-roteiro-video">
                            <h3>Trailer / Vídeo</h3>
                            <!-- Embed iframe básico do youtube (assumindo URL de embed) -->
                            <iframe width="100%" height="400" src="<?php echo esc_url($video_url); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    <?php endif; ?>

                    <?php if ( ! empty( $mapa_url ) ) : ?>
                        <div class="ufo-roteiro-mapa">
                            <h3>Localização</h3>
                            <iframe src="<?php echo esc_url($mapa_url); ?>" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    <?php endif; ?>
                </article>

                <!-- Sidebar de Informações -->
                <aside class="ufo-roteiro-sidebar">
                    <div class="ufo-sidebar-box">
                        <h3>Detalhes do Pacote</h3>
                        
                        <?php if ( ! empty( $valor ) ) : ?>
                            <div class="ufo-detail-item ufo-price">
                                <strong>Valor:</strong> <?php echo esc_html( $valor ); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ( ! empty( $datas ) ) : ?>
                            <div class="ufo-detail-item">
                                <strong>Datas:</strong> <?php echo esc_html( $datas ); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ( ! empty( $itens ) ) : ?>
                            <div class="ufo-detail-item">
                                <strong>Itens Inclusos:</strong>
                                <ul>
                                    <?php 
                                    $itens_array = explode("\n", $itens);
                                    foreach ( $itens_array as $item ) {
                                        if ( trim($item) ) {
                                            echo '<li>' . esc_html( $item ) . '</li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <?php if ( ! empty( $whatsapp ) ) : ?>
                            <a href="https://api.whatsapp.com/send?phone=<?php echo esc_attr( preg_replace('/[^0-9]/', '', $whatsapp) ); ?>&text=Ol%C3%A1!%20Tenho%20interesse%20no%20roteiro:%20<?php echo urlencode(get_the_title()); ?>" target="_blank" class="ufo-btn ufo-btn-whatsapp ufo-btn-full">Agendar via WhatsApp</a>
                        <?php else: ?>
                            <a href="#contato" class="ufo-btn ufo-btn-primary ufo-btn-full">Entrar em Contato</a>
                        <?php endif; ?>
                    </div>
                </aside>
            </div>

        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
