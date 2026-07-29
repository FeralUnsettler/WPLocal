<?php
/**
 * Template de Página Única (Single) para Eventos (RNF-UI-001)
 *
 * @package UFOTurismo_Child
 */

get_header();
?>

<div class="ufo-container ufo-single-container" style="max-width: 1200px; margin: 40px auto; padding: 0 30px;">
    <?php while ( have_posts() ) : the_post();
        $data_ev     = get_post_meta( get_the_ID(), '_ufoturismo_evento_data_hora', true ) ?: 'A Confirmar';
        $organizador = get_post_meta( get_the_ID(), '_ufoturismo_evento_organizador', true ) ?: 'Equipe Portal UFOTurismo';
        $contato     = get_post_meta( get_the_ID(), '_ufoturismo_evento_contato', true ) ?: 'https://wa.me/5511999999999';
        $site_ev     = get_post_meta( get_the_ID(), '_ufoturismo_evento_site', true ) ?: '';
        $ingresso    = get_post_meta( get_the_ID(), '_ufoturismo_evento_ingresso', true ) ?: 'Entrada Aberta / Consulte';
        $mapa_url    = get_post_meta( get_the_ID(), '_ufoturismo_evento_mapa_url', true ) ?: '';
    ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('ufo-single-article'); ?>>
            <header class="ufo-article-header" style="border-bottom: 1px solid var(--ufo-border); padding-bottom: 30px; margin-bottom: 40px;">
                <div style="display: flex; gap: 15px; flex-wrap: wrap; margin-bottom: 15px;">
                    <span style="background: var(--ufo-accent-vip, #00e676); color: #000; font-weight: 800; font-size: 13px; padding: 6px 16px; border-radius: 20px;">🗓️ <?php echo esc_html( $data_ev ); ?></span>
                    <span style="background: rgba(0, 229, 255, 0.15); color: var(--ufo-accent-primary); border: 1px solid var(--ufo-accent-primary); font-weight: 700; font-size: 13px; padding: 6px 16px; border-radius: 20px;">🎟️ <?php echo esc_html( $ingresso ); ?></span>
                </div>
                <h1 style="font-family: var(--ufo-font-heading); font-size: 42px; color: #fff; margin: 0 0 15px; line-height: 1.2;"><?php the_title(); ?></h1>
                <p style="color: var(--ufo-text-muted); font-size: 16px; margin: 0;">Organização: <strong style="color: #fff;"><?php echo esc_html( $organizador ); ?></strong></p>
            </header>

            <?php if ( has_post_thumbnail() ) : ?>
                <div style="margin-bottom: 40px; border-radius: 12px; overflow: hidden; border: 1px solid var(--ufo-border); max-height: 480px;">
                    <?php the_post_thumbnail( 'full', array( 'style' => 'width: 100%; height: 480px; object-fit: cover; display: block;' ) ); ?>
                </div>
            <?php endif; ?>

            <!-- Monetização Meio do Artigo -->
            <div style="margin: 40px 0;">
                <?php echo do_shortcode('[ufo_adsense placement="mid_bottom"]'); ?>
            </div>

            <div class="ufo-article-content" style="font-size: 18px; line-height: 1.8; color: var(--ufo-text-main); margin-bottom: 50px;">
                <?php the_content(); ?>
            </div>

            <!-- Box de Ação & Inscrição no Evento -->
            <div style="background: linear-gradient(135deg, var(--ufo-surface) 0%, rgba(0, 230, 118, 0.15) 100%); border: 1px solid #00e676; border-radius: 12px; padding: 40px; text-align: center; margin-bottom: 50px;">
                <h2 style="color: #fff; font-size: 28px; margin: 0 0 15px;">Garanta Seu Lugar Neste Encontro</h2>
                <p style="color: var(--ufo-text-main); font-size: 16px; max-width: 600px; margin: 0 auto 25px;">As vagas para encontros presenciais em reservas ecológicas e auditórios são limitadas para preservação e segurança de todos.</p>
                <a href="<?php echo esc_url( $contato ?: 'https://wa.me/5511999999999' ); ?>" target="_blank" class="ufo-btn ufo-btn-primary" style="font-weight: 800; font-size: 16px; padding: 15px 40px; background: var(--ufo-accent-vip, #00e676); border-color: #00e676; color: #000; box-shadow: 0 0 20px rgba(0,230,118,0.5);">💬 Solicitar Inscrição via WhatsApp / Contato</a>
                <?php if ( ! empty( $site_ev ) ) : ?>
                    <div style="margin-top: 15px;">
                        <a href="<?php echo esc_url( $site_ev ); ?>" target="_blank" style="color: var(--ufo-accent-primary); text-decoration: underline; font-size: 14px;">Acessar Site Oficial do Evento &rarr;</a>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ( ! empty( $mapa_url ) ) : ?>
                <div style="margin-bottom: 50px;">
                    <h3 style="color: var(--ufo-accent-primary); font-size: 20px; margin-bottom: 15px;">📍 Localização do Evento (Google Maps)</h3>
                    <div style="border-radius: 12px; overflow: hidden; border: 1px solid var(--ufo-border);">
                        <iframe src="<?php echo esc_url( $mapa_url ); ?>" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            <?php endif; ?>

            <div style="margin-top: 50px;">
                <?php echo do_shortcode('[ufo_adsense placement="home_bottom"]'); ?>
            </div>

        </article>
    <?php endwhile; ?>
</div>

<?php
get_footer();
