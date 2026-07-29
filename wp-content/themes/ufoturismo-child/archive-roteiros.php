<?php
/**
 * O template de Arquivo dos Roteiros de Turismo e Expedições Ufológicas (RNF-UI-001)
 *
 * @package UFOTurismo_Child
 */

get_header();
?>

<div class="ufo-container ufo-page-container" style="max-width: 1440px; margin: 40px auto; padding: 0 40px;">
    
    <!-- Hero Header da Galeria de Roteiros -->
    <header class="ufo-archive-header" style="text-align: center; margin-bottom: 50px; padding: 40px 20px; background: linear-gradient(135deg, var(--ufo-surface) 0%, rgba(0,229,255,0.08) 100%); border-radius: 12px; border: 1px solid var(--ufo-border); box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
        <span style="color: var(--ufo-accent-primary); font-size: 14px; font-weight: 800; text-transform: uppercase; letter-spacing: 2px; display: block; margin-bottom: 10px;">🛸 Turismo Científico & Investigação</span>
        <h1 style="font-family: var(--ufo-font-heading); font-size: 42px; color: #fff; margin: 0 0 15px;">Expedições e Roteiros de Campo</h1>
        <p style="color: var(--ufo-text-main); font-size: 18px; max-width: 800px; margin: 0 auto; line-height: 1.6;">
            Acompanhe guias especializados e pesquisadores civis aos maiores focos geomagnéticos e ufológicos do Brasil com equipamentos ópticos de visão noturna e sensores térmicos.
        </p>
    </header>

    <!-- Ad Manager / AdSense: Banners de Alta Conversão no Acervo -->
    <div style="margin-bottom: 40px;">
        <?php echo do_shortcode('[ufo_adsense placement="between_news_exp"]'); ?>
    </div>

    <!-- Grid Flexbox de Roteiros -->
    <div class="ufo-grid-3" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px; margin-bottom: 60px;">
        <?php
        $have_custom_roteiros = false;
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                $have_custom_roteiros = true;
                $duracao = get_post_meta( get_the_ID(), '_ufoturismo_roteiro_duracao', true ) ?: (get_post_meta( get_the_ID(), '_ufo_duracao', true ) ?: '2 Dias');
                $preco   = get_post_meta( get_the_ID(), '_ufoturismo_roteiro_valor', true ) ?: (get_post_meta( get_the_ID(), '_ufo_preco', true ) ?: 'Sob Consulta');
                $thumb   = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) ?: 'https://images.unsplash.com/photo-1506703719100-a0f3a48c0f86?q=80&w=600&auto=format&fit=crop';
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('ufo-card'); ?> style="background: var(--ufo-surface); border: 1px solid var(--ufo-border); border-radius: 12px; overflow: hidden; display: flex; flex-direction: column; transition: 0.3s all; box-shadow: 0 4px 15px rgba(0,0,0,0.4);">
                <div class="ufo-exp-img-box" style="height: 220px; background-image: url('<?php echo esc_url($thumb); ?>'); background-size: cover; background-position: center; position: relative;">
                    <span style="position: absolute; top: 15px; left: 15px; background: rgba(11, 14, 20, 0.85); backdrop-filter: blur(4px); border: 1px solid var(--ufo-accent-primary); color: #fff; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 700;">🕒 <?php echo esc_html( $duracao ); ?></span>
                    <span style="position: absolute; bottom: 15px; right: 15px; background: var(--ufo-accent-vip, #00e676); color: #000; padding: 5px 14px; border-radius: 6px; font-size: 14px; font-weight: 800;">💰 <?php echo esc_html( $preco ); ?></span>
                </div>
                <div style="padding: 25px; flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <span style="color: var(--ufo-accent-sci); font-size: 13px; font-weight: 800; text-transform: uppercase;">📍 Peruíbe / SP • Litoral Paulista</span>
                        <h2 style="font-size: 22px; margin: 10px 0 15px;"><a href="<?php the_permalink(); ?>" style="color: #fff; text-decoration: none;"><?php the_title(); ?></a></h2>
                        <p style="color: var(--ufo-text-muted); font-size: 14px; line-height: 1.6; margin-bottom: 20px;"><?php echo wp_trim_words( get_the_excerpt() ?: get_the_content(), 20 ); ?></p>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="ufo-btn ufo-btn-primary" style="text-align: center; font-weight: 800; font-size: 14px; padding: 12px;">Ver Detalhes do Roteiro &rarr;</a>
                </div>
            </article>
        <?php
            endwhile;
        endif;

        // Fallback para exibir as 12 Expedições se o acervo local estiver em processo de cadastro inicial
        if ( ! $have_custom_roteiros ) :
            $default_roteiros = array(
                array('title' => 'Vigília Ufológica: Pedra da Macaca (Serra da Juréia)', 'local' => 'Peruíbe / SP', 'duracao' => '1 Dia', 'preco' => 'Consulte', 'resumo' => 'Participe de tradicional vigília em reserva ecológica com observação noturna por sensores.', 'thumb' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=600&auto=format&fit=crop'),
                array('title' => 'Expedição Serra do Itatins: O Portal de Peruíbe', 'local' => 'Peruíbe / SP', 'duracao' => '2 Dias', 'preco' => 'Consulte', 'resumo' => 'Mergulhe fundo nos mistérios de Peruíbe, considerada a capital ufológica do Brasil.', 'thumb' => 'https://images.unsplash.com/photo-1506703719100-a0f3a48c0f86?q=80&w=600&auto=format&fit=crop'),
                array('title' => 'Operação Prato Memorial: Vigília na Baía de Colares', 'local' => 'Colares / PA', 'duracao' => '3 Dias', 'preco' => 'Consulte', 'resumo' => 'Rota de campo nos pontos exatos investigados pelo Capitão Hollanda na Amazônia.', 'thumb' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=600&auto=format&fit=crop'),
                array('title' => 'Observação FLIR no Chapadão dos Veadeiros', 'local' => 'Alto Paraíso / GO', 'duracao' => '3 Dias', 'preco' => 'Consulte', 'resumo' => 'Expedição astronômica sobre o Paralelo 14 com telescópicos e câmeras térmicas de alta precisão.', 'thumb' => 'https://images.unsplash.com/photo-1534447677768-be436bb09401?q=80&w=600&auto=format&fit=crop'),
                array('title' => 'Acampamento Astronômico em São Thomé das Letras', 'local' => 'S. Thomé / MG', 'duracao' => '2 Dias', 'preco' => 'Consulte', 'resumo' => 'Vigília na Casa da Pirâmide e investigação de fendas geomagnéticas na serra mineira.', 'thumb' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop'),
                array('title' => 'Roteiro Noturno do Morro do Vintém & Serra da Mantiqueira', 'local' => 'Itatiaia / RJ', 'duracao' => '1 Dia', 'preco' => 'Consulte', 'resumo' => 'Monitoramento aeroespacial nas cadeias montanhosas históricas de avistamentos no Sudeste.', 'thumb' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=600&auto=format&fit=crop'),
                array('title' => 'Investigação Eletromagnética no Rincão do Inferno', 'local' => 'Bagé / RS', 'duracao' => '2 Dias', 'preco' => 'Consulte', 'resumo' => 'Roteiro exploratório nos cânions do Rio Grande do Sul em busca de fenômenos luminosos.', 'thumb' => 'https://images.unsplash.com/photo-1506703719100-a0f3a48c0f86?q=80&w=600&auto=format&fit=crop'),
                array('title' => 'Expedição Portal de Quixadá & Serra do Estêvão', 'local' => 'Quixadá / CE', 'duracao' => '3 Dias', 'preco' => 'Consulte', 'resumo' => 'Imersão nos cenários mais intrigantes de abdução e contatos de imediato no Nordeste.', 'thumb' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=600&auto=format&fit=crop'),
                array('title' => 'Vigília na Chapada Diamantina: O Morro do Pai Inácio', 'local' => 'Lençóis / BA', 'duracao' => '3 Dias', 'preco' => 'Consulte', 'resumo' => 'Experiência imersiva sob céus escuros certificados com guias exopolíticos especializados.', 'thumb' => 'https://images.unsplash.com/photo-1534447677768-be436bb09401?q=80&w=600&auto=format&fit=crop'),
                array('title' => 'Roteiro Científico do Pico do Marins', 'local' => 'Piquete / SP', 'duracao' => '2 Dias', 'preco' => 'Consulte', 'resumo' => 'Trilha de alta altitude orientada para detecção de luzes intra-atmosféricas anômalas.', 'thumb' => 'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=600&auto=format&fit=crop'),
                array('title' => 'Expedição Ilha do Mel & Litoral Paranaense', 'local' => 'Ilha do Mel / PR', 'duracao' => '2 Dias', 'preco' => 'Consulte', 'resumo' => 'Vigília costeira focada em objetos transmidiáticos emergindo do Oceano Atlântico.', 'thumb' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=600&auto=format&fit=crop'),
                array('title' => 'Monitoramento Aeroespacial na Serra dos Órgãos', 'local' => 'Teresópolis / RJ', 'duracao' => '1 Dia', 'preco' => 'Consulte', 'resumo' => 'Roteiro técnico com uso de espectrômetros portáteis e câmeras de visão noturna militar.', 'thumb' => 'https://images.unsplash.com/photo-1506703719100-a0f3a48c0f86?q=80&w=600&auto=format&fit=crop')
            );
            foreach ( $default_roteiros as $idx => $def ) :
        ?>
            <article class="ufo-card" style="background: var(--ufo-surface); border: 1px solid var(--ufo-border); border-radius: 12px; overflow: hidden; display: flex; flex-direction: column; transition: 0.3s all; box-shadow: 0 4px 15px rgba(0,0,0,0.4);">
                <div class="ufo-exp-img-box" style="height: 220px; background-image: url('<?php echo esc_url($def['thumb']); ?>'); background-size: cover; background-position: center; position: relative;">
                    <span style="position: absolute; top: 15px; left: 15px; background: rgba(11, 14, 20, 0.85); backdrop-filter: blur(4px); border: 1px solid var(--ufo-accent-primary); color: #fff; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 700;">🕒 <?php echo esc_html( $def['duracao'] ); ?></span>
                    <span style="position: absolute; bottom: 15px; right: 15px; background: var(--ufo-accent-vip, #00e676); color: #000; padding: 5px 14px; border-radius: 6px; font-size: 14px; font-weight: 800;">💰 <?php echo esc_html( $def['preco'] ); ?></span>
                </div>
                <div style="padding: 25px; flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <span style="color: var(--ufo-accent-sci); font-size: 13px; font-weight: 800; text-transform: uppercase;">📍 <?php echo esc_html( $def['local'] ); ?></span>
                        <h2 style="font-size: 22px; margin: 10px 0 15px; color: #fff;"><?php echo esc_html( $def['title'] ); ?></h2>
                        <p style="color: var(--ufo-text-muted); font-size: 14px; line-height: 1.6; margin-bottom: 20px;"><?php echo esc_html( $def['resumo'] ); ?></p>
                    </div>
                    <a href="https://wa.me/5511999999999" target="_blank" class="ufo-btn ufo-btn-primary" style="text-align: center; font-weight: 800; font-size: 14px; padding: 12px;">💬 Falar com Guia via WhatsApp &rarr;</a>
                </div>
            </article>
        <?php
            endforeach;
        endif;
        ?>
    </div>

    <!-- Banner CTA WhatsApp VIP no Rodapé do Arquivo -->
    <?php echo do_shortcode('[ufo_cta_vip]'); ?>

</div>

<?php
get_footer();
