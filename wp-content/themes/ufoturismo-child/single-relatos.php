<?php
/**
 * Template de Página Única (Single) para Relatos UAP e Avistamentos (RNF-UI-001)
 *
 * @package UFOTurismo_Child
 */

get_header();
?>

<div class="ufo-container ufo-single-container" style="max-width: 1050px; margin: 40px auto; padding: 0 30px;">
    <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('ufo-single-article'); ?>>
            
            <header class="ufo-article-header" style="border-bottom: 1px solid var(--ufo-border); padding-bottom: 30px; margin-bottom: 40px;">
                <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                    <span style="background: var(--ufo-accent-sci, #7000ff); color: #fff; font-weight: 800; font-size: 13px; padding: 5px 14px; border-radius: 20px;">🛸 Relatório de Avistamento</span>
                    <span style="color: var(--ufo-text-muted); font-size: 14px;">📅 Registrado em: <?php echo get_the_date('d de F de Y'); ?></span>
                </div>
                <h1 style="font-family: var(--ufo-font-heading); font-size: 40px; color: #fff; margin: 0 0 15px; line-height: 1.25;"><?php the_title(); ?></h1>
                <p style="color: var(--ufo-accent-primary); font-size: 15px; margin: 0; font-weight: 600;">Status da Investigação: <span style="color: #fff;">Catalogado no Acervo UFOTurismo</span></p>
            </header>

            <?php if ( has_post_thumbnail() ) : ?>
                <div style="margin-bottom: 40px; border-radius: 12px; overflow: hidden; border: 1px solid var(--ufo-border);">
                    <?php the_post_thumbnail( 'full', array( 'style' => 'width: 100%; max-height: 500px; object-fit: cover; display: block;' ) ); ?>
                </div>
            <?php endif; ?>

            <!-- Ad Manager / AdSense Top -->
            <div style="margin: 35px 0;">
                <?php echo do_shortcode('[ufo_adsense placement="between_news_exp"]'); ?>
            </div>

            <!-- Corpo Técnico do Relato -->
            <div class="ufo-article-content" style="font-size: 18px; line-height: 1.85; color: var(--ufo-text-main); margin-bottom: 50px; background: var(--ufo-surface); padding: 35px; border-radius: 12px; border: 1px solid var(--ufo-border);">
                <?php the_content(); ?>
            </div>

            <!-- Box Compartilhar / Comunidade -->
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px; background: rgba(11,14,20,0.8); border: 1px solid var(--ufo-border); border-radius: 8px; padding: 25px; margin-bottom: 50px;">
                <div>
                    <h3 style="color: #fff; font-size: 20px; margin: 0 0 5px;">Teve Uma Experiência Similar na Região?</h3>
                    <p style="color: var(--ufo-text-muted); font-size: 14px; margin: 0;">Junte-se às nossas vigílias com guias em Peruíbe e Serra da Juréia para observação em tempo real.</p>
                </div>
                <a href="<?php echo get_post_type_archive_link('roteiros') ?: '#'; ?>" class="ufo-btn ufo-btn-primary" style="font-weight: 800; padding: 12px 28px;">Ver Expedições Científicas &rarr;</a>
            </div>

            <div style="margin: 40px 0;">
                <?php echo do_shortcode('[ufo_adsense placement="mid_bottom"]'); ?>
            </div>

            <!-- Discussão Aberta & Comentários -->
            <section class="ufo-relatos-comments" style="margin-top: 50px; border-top: 1px solid var(--ufo-border); padding-top: 40px;">
                <h3 style="color: var(--ufo-accent-primary); font-size: 26px; margin-bottom: 25px;">💬 Discussão Com a Comunidade</h3>
                <?php
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                else:
                    echo '<p style="color: var(--ufo-text-muted);">Os comentários estão encerrados para este registro.</p>';
                endif;
                ?>
            </section>

        </article>
    <?php endwhile; ?>
</div>

<?php
get_footer();
