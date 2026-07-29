<?php
/**
 * Template de Arquivo para Eventos Ufológicos e Congressos Presenciais (RNF-UI-001)
 *
 * @package UFOTurismo_Child
 */

get_header();
?>

<div class="ufo-container ufo-page-container" style="max-width: 1440px; margin: 40px auto; padding: 0 40px;">
    
    <!-- Hero Header da Agenda de Eventos -->
    <header class="ufo-archive-header" style="text-align: center; margin-bottom: 45px; padding: 40px 20px; background: linear-gradient(135deg, var(--ufo-surface) 0%, rgba(0, 230, 118, 0.08) 100%); border-radius: 12px; border: 1px solid var(--ufo-border); box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
        <span style="color: var(--ufo-accent-vip, #00e676); font-size: 14px; font-weight: 800; text-transform: uppercase; letter-spacing: 2px; display: block; margin-bottom: 10px;">🗓️ Encontros & Simpósios Nacionais</span>
        <h1 style="font-family: var(--ufo-font-heading); font-size: 42px; color: #fff; margin: 0 0 15px;">Agenda de Congressos Ufológicos</h1>
        <p style="color: var(--ufo-text-main); font-size: 18px; max-width: 780px; margin: 0 auto; line-height: 1.6;">
            Acompanhe as datas e locais de congressos regionais, encontros presenciais em Peruíbe e palestras e palestras com especialistas da área aeroespacial.
        </p>
    </header>

    <!-- Zona Monetizada Topo -->
    <div style="margin-bottom: 40px;">
        <?php echo do_shortcode('[ufo_adsense placement="between_news_exp"]'); ?>
    </div>

    <!-- Lista de Eventos -->
    <div class="ufo-grid-2" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(380px, 1fr)); gap: 30px; margin-bottom: 50px;">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                $data_ev     = get_post_meta( get_the_ID(), '_ufoturismo_evento_data_hora', true ) ?: 'Data a definir';
                $organizador = get_post_meta( get_the_ID(), '_ufoturismo_evento_organizador', true ) ?: 'Peruíbe / SP';
                $contato     = get_post_meta( get_the_ID(), '_ufoturismo_evento_contato', true ) ?: '';
                $thumb_url   = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) ?: 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=800&auto=format&fit=crop';
        ?>
            <article class="ufo-card" style="background: var(--ufo-surface); border: 1px solid var(--ufo-border); border-radius: 12px; overflow: hidden; display: flex; flex-direction: column; box-shadow: 0 4px 15px rgba(0,0,0,0.4);">
                <div style="height: 200px; background-image: url('<?php echo esc_url($thumb_url); ?>'); background-size: cover; background-position: center; position: relative;">
                    <span style="position: absolute; top: 15px; right: 15px; background: var(--ufo-accent-vip, #00e676); color: #000; font-weight: 800; font-size: 13px; padding: 6px 14px; border-radius: 20px;">🗓️ <?php echo esc_html( $data_ev ); ?></span>
                </div>
                <div style="padding: 30px; flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <span style="color: var(--ufo-accent-primary); font-weight: 800; font-size: 14px; text-transform: uppercase;">📍 <?php echo esc_html( $organizador ); ?></span>
                        <h2 style="font-size: 24px; margin: 12px 0 15px;"><a href="<?php the_permalink(); ?>" style="color: #fff; text-decoration: none;"><?php the_title(); ?></a></h2>
                        <p style="color: var(--ufo-text-muted); font-size: 15px; line-height: 1.6; margin-bottom: 25px;"><?php echo wp_trim_words( get_the_excerpt() ?: get_the_content(), 25 ); ?></p>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="ufo-btn ufo-btn-primary" style="text-align: center; font-weight: 800; padding: 14px;">Informações e Inscrição &rarr;</a>
                </div>
            </article>
        <?php
            endwhile;
        else :
        ?>
            <!-- Evento Exemplo Exibido Quando Não Houver Post Cadastrado -->
            <article class="ufo-card" style="background: var(--ufo-surface); border: 1px solid var(--ufo-border); border-radius: 12px; padding: 30px; grid-column: 1 / -1; text-align: center;">
                <span style="color: var(--ufo-accent-sci); font-weight: 800; font-size: 14px;">📍 PERUÍBE / SP • CENTENÁRIO DA UFOLOGIA</span>
                <h2 style="color: #fff; font-size: 28px; margin: 15px 0;">VII Simpósio Brasileiro de Ufologia & Turismo Científico</h2>
                <p style="color: var(--ufo-text-muted); font-size: 16px; max-width: 700px; margin: 0 auto 25px;">O maior evento ufológico do litoral paulista com conferencistas, biólogos, exopolíticos e lançamentos de relatórios desclassificados.</p>
                <a href="https://wa.me/5511999999999" target="_blank" class="ufo-btn ufo-btn-primary" style="font-weight: 800; font-size: 15px; padding: 14px 35px;">💬 Reservar Presença via WhatsApp</a>
            </article>
        <?php endif; ?>
    </div>

    <!-- Banner CTA -->
    <?php echo do_shortcode('[ufo_cta_vip]'); ?>

</div>

<?php
get_footer();
