<?php
/**
 * Template de Página de Erro 404 (RNF-UI-001) - Experiência Ufológica
 *
 * @package UFOTurismo_Child
 */

get_header();
?>

<div class="ufo-container ufo-404-container" style="max-width: 1000px; margin: 60px auto 80px; padding: 0 30px; text-align: center;">
    
    <div style="background: linear-gradient(135deg, var(--ufo-surface) 0%, rgba(0, 229, 255, 0.12) 100%); border: 1px solid var(--ufo-border); border-radius: 16px; padding: 70px 40px; box-shadow: 0 15px 45px rgba(0,0,0,0.6);">
        
        <div style="font-size: 80px; line-height: 1; margin-bottom: 25px; animation: float 3s ease-in-out infinite;">
            🛸👽
        </div>

        <span style="color: var(--ufo-accent-primary); font-size: 15px; font-weight: 800; text-transform: uppercase; letter-spacing: 2.5px; display: block; margin-bottom: 15px;">ERRO 404 • SINAL PERDIDO NO ESPAÇO</span>

        <h1 style="font-family: var(--ufo-font-heading); font-size: 46px; color: #fff; margin: 0 0 20px; font-weight: 800; text-shadow: 0 2px 10px rgba(0,0,0,0.8);">
            Abduzido! Esta Página Não Está Mais na Terra.
        </h1>

        <p style="color: var(--ufo-text-main); font-size: 19px; max-width: 720px; margin: 0 auto 35px; line-height: 1.6;">
            O endereço que você procurou pode ter sido movido por forças anômalas, ter tido seu status de classificação alterado pelo Pentágono ou nunca ter existido em nossa linha do tempo.
        </p>

        <!-- Barra de Busca de Resgaste -->
        <div style="max-width: 500px; margin: 0 auto 45px; background: rgba(11,14,20,0.8); border: 1px solid var(--ufo-border); border-radius: 50px; padding: 8px 15px;">
            <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" style="display: flex; gap: 10px;">
                <input type="search" class="search-field" placeholder="Pesquisar roteiros, notícias ou relatos..." value="<?php echo get_search_query(); ?>" name="s" style="flex: 1; background: transparent; border: none; color: #fff; font-size: 15px; padding: 8px 15px; outline: none;" />
                <button type="submit" class="ufo-btn ufo-btn-primary" style="padding: 10px 25px; border-radius: 50px; font-weight: 700; font-size: 14px;">🔍 Buscar</button>
            </form>
        </div>

        <!-- Botões de Ação Rápida -->
        <div style="display: flex; justify-content: center; align-items: center; gap: 20px; flex-wrap: wrap;">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ufo-btn ufo-btn-primary" style="font-weight: 800; font-size: 16px; padding: 15px 35px; border-radius: 50px; box-shadow: 0 0 25px rgba(0,229,255,0.5);">🏠 Voltar Para o Início (Home)</a>
            <a href="<?php echo get_post_type_archive_link('roteiros') ?: home_url('/roteiros/'); ?>" class="ufo-btn ufo-btn-secondary" style="border: 1px solid var(--ufo-text-main); color: var(--ufo-text-main); font-weight: 700; font-size: 16px; padding: 15px 35px; border-radius: 50px; background: rgba(11,14,20,0.65);">⛺ Conhecer Expedições</a>
        </div>

    </div>

    <!-- Banner Monetizado no Rodapé -->
    <div style="margin-top: 50px;">
        <?php echo do_shortcode('[ufo_adsense placement="home_bottom"]'); ?>
    </div>

</div>

<style>
@keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-12px); }
    100% { transform: translateY(0px); }
}
</style>

<?php
get_footer();
