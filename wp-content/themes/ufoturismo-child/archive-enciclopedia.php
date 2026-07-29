<?php
/**
 * Template de Arquivo para Enciclopédia & Vocabulário UAP (RNF-UI-001)
 *
 * @package UFOTurismo_Child
 */

get_header();
?>

<div class="ufo-container ufo-page-container" style="max-width: 1440px; margin: 40px auto; padding: 0 40px;">
    
    <!-- Hero Header da Enciclopédia -->
    <header class="ufo-archive-header" style="text-align: center; margin-bottom: 45px; padding: 45px 20px; background: linear-gradient(135deg, var(--ufo-surface) 0%, rgba(0,229,255,0.08) 100%); border-radius: 12px; border: 1px solid var(--ufo-border); box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
        <span style="color: var(--ufo-accent-primary); font-size: 14px; font-weight: 800; text-transform: uppercase; letter-spacing: 2px; display: block; margin-bottom: 10px;">📖 Dicionário Ufológico & Tecnológico</span>
        <h1 style="font-family: var(--ufo-font-heading); font-size: 42px; color: #fff; margin: 0 0 15px;">Enciclopédia de Pesquisa UAP & Aeroespaço</h1>
        <p style="color: var(--ufo-text-main); font-size: 18px; max-width: 800px; margin: 0 auto; line-height: 1.6;">
            Compreenda os conceitos científicos, siglas militares do Pentágono/AARO, equipamentos de radar térmico FLIR e a terminologia oficial adotada pela pesquisa moderna.
        </p>
    </header>

    <!-- Zona Monetizada -->
    <div style="margin-bottom: 40px;">
        <?php echo do_shortcode('[ufo_adsense placement="between_news_exp"]'); ?>
    </div>

    <!-- Grid de Verbetes -->
    <div class="ufo-grid-4" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px; margin-bottom: 60px;">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
        ?>
            <article class="ufo-card" style="background: rgba(11, 14, 20, 0.75); border: 1px solid var(--ufo-border); border-left: 4px solid var(--ufo-accent-sci, #7000ff); border-radius: 8px; padding: 25px; display: flex; flex-direction: column; justify-content: space-between; transition: 0.3s all; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
                <div>
                    <span style="color: var(--ufo-accent-primary); font-size: 11px; font-weight: 800; text-transform: uppercase;">Termo Técnico</span>
                    <h2 style="font-size: 20px; margin: 10px 0 12px;"><a href="<?php the_permalink(); ?>" style="color: #fff; text-decoration: none;"><?php the_title(); ?></a></h2>
                    <p style="color: var(--ufo-text-muted); font-size: 14px; line-height: 1.5; margin-bottom: 20px;"><?php echo wp_trim_words( get_the_excerpt() ?: get_the_content(), 20 ); ?></p>
                </div>
                <a href="<?php the_permalink(); ?>" style="color: var(--ufo-accent-primary); font-weight: 700; font-size: 13px; text-decoration: none;">Ler Verbete na Íntegra &rarr;</a>
            </article>
        <?php
            endwhile;
        else :
            $default_terms = array(
                array('title' => 'FLIR (Forward-Looking Infrared)', 'desc' => 'Câmeras termográficas de infravermelho prospectivas que detectam assinaturas de calor em tempo real, usadas pelo exército na captação do caso Nimitz.'),
                array('title' => 'UAP (Unidentified Anomalous Phenomena)', 'desc' => 'Termo técnico atual que substituiu OVNI/UFO por determinação da NASA e Departamento de Defesa para abranger objetos transmídia.'),
                array('title' => 'Assinatura Observável Transmídia', 'desc' => 'Capacidade de um objeto mergulhar na água (USO/OSNI) e decolar no ar em altas velocidades sem comprometer sua estrutura cética.'),
                array('title' => 'Paralelo 14 S & Fendas Geomagnéticas', 'desc' => 'Faixa planetária que cruza a Chapada dos Veadeiros, famosa por registrar anomalias eletromagnéticas no solo e no firmamento.'),
                array('title' => 'AARO (All-domain Anomaly Resolution Office)', 'desc' => 'Escritório especial criado no Pentágono focado na consolidação, investigação e catalogação de relatórios sobre objetos não identificados.'),
                array('title' => 'Operação Prato (FAB 1977)', 'desc' => 'A maior investigação oficial e militar do mundo realizada pela Força Aérea Brasileira sob comando do Cap. Hollanda no Pará e Colares.')
            );
            foreach ( $default_terms as $d_term ) :
        ?>
            <article class="ufo-card" style="background: rgba(11, 14, 20, 0.75); border: 1px solid var(--ufo-border); border-left: 4px solid var(--ufo-accent-sci, #7000ff); border-radius: 8px; padding: 25px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
                <div>
                    <span style="color: var(--ufo-accent-primary); font-size: 11px; font-weight: 800; text-transform: uppercase;">Conceito Catalogado</span>
                    <h2 style="font-size: 20px; color: #fff; margin: 10px 0 12px;"><?php echo esc_html( $d_term['title'] ); ?></h2>
                    <p style="color: var(--ufo-text-muted); font-size: 14px; line-height: 1.5; margin-bottom: 20px;"><?php echo esc_html( $d_term['desc'] ); ?></p>
                </div>
                <span style="color: var(--ufo-text-muted); font-size: 12px; font-style: italic;">Acervo Enciclopédico Central</span>
            </article>
        <?php
            endforeach;
        endif;
        ?>
    </div>

    <!-- Banner CTA no Rodapé -->
    <?php echo do_shortcode('[ufo_cta_vip]'); ?>

</div>

<?php
get_footer();
