<?php
/**
 * Template de Página Única (Single) para Verbetes da Enciclopédia (RNF-UI-001)
 *
 * @package UFOTurismo_Child
 */

get_header();
?>

<div class="ufo-container ufo-single-container" style="max-width: 1050px; margin: 40px auto; padding: 0 30px;">
    <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('ufo-single-article'); ?>>
            
            <header class="ufo-article-header" style="border-bottom: 1px solid var(--ufo-border); padding-bottom: 25px; margin-bottom: 35px;">
                <div style="margin-bottom: 12px;">
                    <span style="background: rgba(0, 229, 255, 0.15); border: 1px solid var(--ufo-accent-primary); color: var(--ufo-accent-primary); font-weight: 800; font-size: 12px; padding: 5px 14px; border-radius: 20px; text-transform: uppercase;">📖 Dicionário UAP & Aeroespaço</span>
                </div>
                <h1 style="font-family: var(--ufo-font-heading); font-size: 38px; color: #fff; margin: 0 0 15px; line-height: 1.25;"><?php the_title(); ?></h1>
                <p style="color: var(--ufo-text-muted); font-size: 15px; margin: 0;">Classificação Científica: <strong style="color: #fff;">Acervo Central do Portal UFOTurismo</strong></p>
            </header>

            <?php if ( has_post_thumbnail() ) : ?>
                <div style="margin-bottom: 35px; border-radius: 12px; overflow: hidden; border: 1px solid var(--ufo-border);">
                    <?php the_post_thumbnail( 'full', array( 'style' => 'width: 100%; max-height: 450px; object-fit: cover; display: block;' ) ); ?>
                </div>
            <?php endif; ?>

            <!-- Ad Manager Top -->
            <div style="margin: 30px 0;">
                <?php echo do_shortcode('[ufo_adsense placement="between_news_exp"]'); ?>
            </div>

            <!-- Conteúdo do Verbete -->
            <div class="ufo-article-content" style="font-size: 18px; line-height: 1.8; color: var(--ufo-text-main); margin-bottom: 45px; background: var(--ufo-surface); padding: 35px; border-radius: 12px; border: 1px solid var(--ufo-border); border-left: 6px solid var(--ufo-accent-primary);">
                <?php the_content(); ?>
            </div>

            <div style="margin: 40px 0;">
                <?php echo do_shortcode('[ufo_adsense placement="mid_bottom"]'); ?>
            </div>

            <!-- Botões de Navegação & Retorno -->
            <div style="display: flex; justify-content: space-between; align-items: center; background: rgba(11,14,20,0.7); border: 1px solid var(--ufo-border); border-radius: 8px; padding: 20px; margin-bottom: 40px;">
                <a href="<?php echo get_post_type_archive_link('enciclopedia') ?: '#'; ?>" style="color: var(--ufo-accent-primary); text-decoration: none; font-weight: 700; font-size: 15px;">&lsaquo;&lsaquo; Voltar ao Dicionário & Enciclopédia UAP</a>
                <a href="<?php echo get_post_type_archive_link('roteiros') ?: '#'; ?>" class="ufo-btn ufo-btn-primary" style="font-size: 14px; font-weight: 800; padding: 10px 24px;">Conhecer Roteiros & Expedições &rarr;</a>
            </div>

        </article>
    <?php endwhile; ?>
</div>

<?php
get_footer();
