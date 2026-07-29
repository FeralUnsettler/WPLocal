<?php
/**
 * Template de Página de Resultados de Pesquisa (RNF-UI-001)
 *
 * @package UFOTurismo_Child
 */

get_header();
?>

<div class="ufo-container ufo-page-container" style="max-width: 1440px; margin: 40px auto; padding: 0 40px;">
    
    <!-- Hero Header da Busca -->
    <header class="ufo-archive-header" style="text-align: center; margin-bottom: 45px; padding: 40px 20px; background: linear-gradient(135deg, var(--ufo-surface) 0%, rgba(0, 229, 255, 0.12) 100%); border-radius: 12px; border: 1px solid var(--ufo-border); box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
        <span style="color: var(--ufo-accent-primary); font-size: 14px; font-weight: 800; text-transform: uppercase; letter-spacing: 2px; display: block; margin-bottom: 10px;">🔍 Central de Radar & Busca</span>
        <h1 style="font-family: var(--ufo-font-heading); font-size: 38px; color: #fff; margin: 0 0 15px;">
            Resultados de Pesquisa para: <span style="color: var(--ufo-accent-primary);">"<?php echo get_search_query(); ?>"</span>
        </h1>
        <p style="color: var(--ufo-text-muted); font-size: 16px; margin: 0;">Exibindo resultados combinados de Notícias, Roteiros Turísticos, Eventos, Vídeos, Relatos e Enciclopédia UAP.</p>
    </header>

    <!-- AdManager Top -->
    <div style="margin-bottom: 40px;">
        <?php echo do_shortcode('[ufo_adsense placement="between_news_exp"]'); ?>
    </div>

    <!-- Resultados da Busca -->
    <div class="ufo-grid-3" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 25px; margin-bottom: 60px;">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); 
                $post_type_obj = get_post_type_object( get_post_type() );
                $type_name     = $post_type_obj ? $post_type_obj->labels->singular_name : 'Artigo';
                $thumb_url     = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) ?: 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=600&auto=format&fit=crop';
            ?>
                <article class="ufo-card" style="background: var(--ufo-surface); border: 1px solid var(--ufo-border); border-radius: 12px; overflow: hidden; display: flex; flex-direction: column; justify-content: space-between; transition: 0.3s all; box-shadow: 0 4px 12px rgba(0,0,0,0.4);">
                    <div style="height: 180px; background-image: url('<?php echo esc_url($thumb_url); ?>'); background-size: cover; background-position: center; position: relative;">
                        <span style="position: absolute; top: 12px; left: 12px; background: var(--ufo-accent-primary); color: #000; font-weight: 800; font-size: 11px; padding: 4px 10px; border-radius: 4px; text-transform: uppercase;">📌 <?php echo esc_html($type_name); ?></span>
                    </div>
                    <div style="padding: 22px; flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                        <div>
                            <h2 style="font-size: 20px; margin: 0 0 12px;"><a href="<?php the_permalink(); ?>" style="color: #fff; text-decoration: none;"><?php the_title(); ?></a></h2>
                            <p style="color: var(--ufo-text-muted); font-size: 14px; line-height: 1.5; margin-bottom: 20px;"><?php echo wp_trim_words( get_the_excerpt() ?: get_the_content(), 18 ); ?></p>
                        </div>
                        <a href="<?php the_permalink(); ?>" style="color: var(--ufo-accent-primary); font-weight: 700; font-size: 14px; text-decoration: none;">Acessar Publicação &rarr;</a>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <div class="ufo-card" style="padding: 60px 30px; border: 1px dashed var(--ufo-border); border-radius: 12px; grid-column: 1 / -1; text-align: center; background: var(--ufo-surface);">
                <span style="font-size: 50px; display: block; margin-bottom: 20px;">📡</span>
                <h2 style="font-size: 28px; color: #fff; margin: 0 0 15px;">Nenhum Sinal Detectado No Radar</h2>
                <p style="color: var(--ufo-text-muted); font-size: 16px; max-width: 600px; margin: 0 auto 30px;">Não encontramos nenhum artigo ou roteiro com os termos de busca informados. Verifique a ortografia ou experimente procurar por termos genéricos como "FLIR", "Colares", "Expedição" ou "Peruíbe".</p>
                <div style="max-width: 500px; margin: 0 auto;">
                    <?php get_search_form(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Paginação Nativa -->
    <div style="text-align: center; margin-bottom: 50px;">
        <?php the_posts_pagination( array(
            'prev_text' => '&lsaquo; Anterior',
            'next_text' => 'Próxima &rsaquo;',
        ) ); ?>
    </div>

    <!-- Banner CTA -->
    <?php echo do_shortcode('[ufo_cta_vip]'); ?>

</div>

<?php
get_footer();
