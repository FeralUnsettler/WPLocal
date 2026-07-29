<?php
/**
 * Template de Arquivo para Relatos e Avistamentos UAP da Comunidade (RNF-UI-001)
 *
 * @package UFOTurismo_Child
 */

get_header();
?>

<div class="ufo-container ufo-page-container" style="max-width: 1440px; margin: 40px auto; padding: 0 40px;">
    
    <!-- Hero Header dos Relatos -->
    <header class="ufo-archive-header" style="text-align: center; margin-bottom: 45px; padding: 45px 20px; background: linear-gradient(135deg, var(--ufo-surface) 0%, rgba(0, 229, 255, 0.1) 100%); border-radius: 12px; border: 1px solid var(--ufo-border); box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
        <span style="color: var(--ufo-accent-vip, #00e676); font-size: 14px; font-weight: 800; text-transform: uppercase; letter-spacing: 2px; display: block; margin-bottom: 10px;">🖖 Acervo Civil & Militar Abóbice</span>
        <h1 style="font-family: var(--ufo-font-heading); font-size: 42px; color: #fff; margin: 0 0 15px;">Relatos de Avistamentos & Fenômenos Anômalos</h1>
        <p style="color: var(--ufo-text-main); font-size: 18px; max-width: 820px; margin: 0 auto 25px; line-height: 1.6;">
            Explore testemunhos catalogados de encontros imediatos, avistamentos diurnos e noturnos no território brasileiro, auditados sob metodologia científica.
        </p>
        <a href="#enviar-relato" class="ufo-btn ufo-btn-primary" style="font-weight: 800; font-size: 16px; padding: 14px 35px; border-radius: 50px; box-shadow: 0 0 20px rgba(0,229,255,0.4);">🚀 Submeter Seu Relato de Avistamento &rarr;</a>
    </header>

    <!-- Zona de Monetização no Acervo de Relatos -->
    <div style="margin-bottom: 40px;">
        <?php echo do_shortcode('[ufo_adsense placement="between_news_exp"]'); ?>
    </div>

    <!-- Grid de Relatos -->
    <div class="ufo-grid-3" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px; margin-bottom: 60px;">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) ?: 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=800&auto=format&fit=crop';
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('ufo-card'); ?> style="background: var(--ufo-surface); border: 1px solid var(--ufo-border); border-radius: 12px; overflow: hidden; display: flex; flex-direction: column; transition: 0.3s all; box-shadow: 0 4px 15px rgba(0,0,0,0.4);">
                <div style="height: 220px; background-image: url('<?php echo esc_url($thumb_url); ?>'); background-size: cover; background-position: center; position: relative;">
                    <span style="position: absolute; top: 15px; left: 15px; background: rgba(11,14,20,0.85); backdrop-filter: blur(4px); border: 1px solid var(--ufo-accent-primary); color: #fff; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 700;">🛸 Avistamento Auditado</span>
                    <span style="position: absolute; bottom: 15px; right: 15px; background: rgba(0,0,0,0.7); color: #fff; padding: 4px 10px; border-radius: 4px; font-size: 12px;">📅 <?php echo get_the_date('d/m/Y'); ?></span>
                </div>
                <div style="padding: 25px; flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <span style="color: var(--ufo-accent-sci); font-size: 12px; font-weight: 800; text-transform: uppercase;">📍 Litoral & Serra Brasileira</span>
                        <h2 style="font-size: 22px; margin: 10px 0 15px;"><a href="<?php the_permalink(); ?>" style="color: #fff; text-decoration: none;"><?php the_title(); ?></a></h2>
                        <p style="color: var(--ufo-text-muted); font-size: 14px; line-height: 1.6; margin-bottom: 20px;"><?php echo wp_trim_words( get_the_excerpt() ?: get_the_content(), 22 ); ?></p>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="ufo-btn ufo-btn-secondary" style="text-align: center; font-weight: 700; font-size: 14px; border-color: var(--ufo-accent-primary);">Ler Relato Completo & Discussão 💬</a>
                </div>
            </article>
        <?php
            endwhile;
        else :
        ?>
            <div class="ufo-card" style="padding: 40px; border: 1px dashed var(--ufo-border); border-radius: 12px; grid-column: 1 / -1; text-align: center;">
                <p style="color: var(--ufo-text-muted); font-size: 18px;">Nenhum relato catalogado na base de dados no momento. Seja o primeiro a relatar sua experiência abóbice em nosso portal!</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Seção do Formulário de Submissão de Relato -->
    <section id="enviar-relato" style="background: var(--ufo-surface); border: 1px solid var(--ufo-border); border-radius: 12px; padding: 45px 35px; max-width: 900px; margin: 0 auto 50px;">
        <div style="text-align: center; margin-bottom: 30px;">
            <span style="color: var(--ufo-accent-vip, #00e676); font-size: 14px; font-weight: 800; text-transform: uppercase;">📝 Colabore com o Acervo Científico</span>
            <h2 style="font-size: 32px; color: #fff; margin: 10px 0;">Submeta Seu Relato para Investigação</h2>
            <p style="color: var(--ufo-text-muted); font-size: 15px;">Os dados informados serão verificados por nossos consultores ufólogos antes da publicação oficial na vitrine.</p>
        </div>
        <?php echo do_shortcode('[ufoturismo_relatos_form]'); ?>
    </section>

    <!-- Banner CTA -->
    <?php echo do_shortcode('[ufo_cta_vip]'); ?>

</div>

<?php
get_footer();
