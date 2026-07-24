<?php
/**
 * UFO Ad Manager - Gerenciamento de Anúncios (AdSense / Ad Manager)
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Registra as configurações e campos
 */
function ufoturismo_register_ad_settings() {
    register_setting( 'ufoturismo_ad_options', 'ufo_adsense_client_id' );
    register_setting( 'ufoturismo_ad_options', 'ufo_ad_home_top' );
    register_setting( 'ufoturismo_ad_options', 'ufo_ad_in_article_top' );
    register_setting( 'ufoturismo_ad_options', 'ufo_ad_in_article_bottom' );
}
add_action( 'admin_init', 'ufoturismo_register_ad_settings' );

/**
 * Adiciona a página no menu administrativo
 */
function ufoturismo_add_ad_menu_page() {
    add_menu_page(
        'UFO Ad Manager',
        'Anúncios (AdSense)',
        'manage_options',
        'ufo-ad-manager',
        'ufoturismo_ad_manager_page_html',
        'dashicons-chart-line',
        30
    );
}
add_action( 'admin_menu', 'ufoturismo_add_ad_menu_page' );

/**
 * Renderiza a página de configurações
 */
function ufoturismo_ad_manager_page_html() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    ?>
    <div class="wrap">
        <h1>UFO Ad Manager (Monetização)</h1>
        <p>Cole abaixo os códigos dos blocos de anúncios do Google AdSense ou Google Ad Manager. Eles serão injetados automaticamente nas áreas de alta conversão do portal para manter a performance extrema.</p>
        
        <form action="options.php" method="post">
            <?php
            settings_fields( 'ufoturismo_ad_options' );
            do_settings_sections( 'ufoturismo_ad_options' );
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Google AdSense Publisher ID <br><small>(Ex: ca-pub-123456789)</small></th>
                    <td>
                        <input type="text" name="ufo_adsense_client_id" value="<?php echo esc_attr( get_option('ufo_adsense_client_id') ); ?>" style="width: 100%; max-width: 400px;" />
                        <p class="description">Se preenchido, o script principal do AdSense será carregado de forma otimizada no cabeçalho do site.</p>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Bloco: Home Page (Topo) <br><small>(Recomendado: Banner Horizontal / Leaderboard)</small></th>
                    <td>
                        <textarea name="ufo_ad_home_top" rows="5" style="width: 100%; max-width: 600px; font-family: monospace;"><?php echo esc_textarea( get_option('ufo_ad_home_top') ); ?></textarea>
                        <p class="description">Cole o código do bloco `<ins ...></ins>` do AdSense. Ele aparecerá logo abaixo do Hero Banner na Home.</p>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Bloco: Artigos (Topo) <br><small>(Recomendado: Display Ad Retangular)</small></th>
                    <td>
                        <textarea name="ufo_ad_in_article_top" rows="5" style="width: 100%; max-width: 600px; font-family: monospace;"><?php echo esc_textarea( get_option('ufo_ad_in_article_top') ); ?></textarea>
                        <p class="description">Aparecerá antes do primeiro parágrafo nas Notícias e Relatos.</p>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Bloco: Artigos (Fim) <br><small>(Recomendado: Multiplex ou Conteúdo Correspondente)</small></th>
                    <td>
                        <textarea name="ufo_ad_in_article_bottom" rows="5" style="width: 100%; max-width: 600px; font-family: monospace;"><?php echo esc_textarea( get_option('ufo_ad_in_article_bottom') ); ?></textarea>
                        <p class="description">Aparecerá no final das Notícias, excelente área para sugerir novas leituras em forma de anúncios.</p>
                    </td>
                </tr>
            </table>
            <?php submit_button( 'Salvar Configurações de Anúncios' ); ?>
        </form>
    </div>
    <?php
}

/**
 * Injeta o Script do AdSense no cabeçalho (wp_head)
 */
function ufoturismo_inject_adsense_script() {
    $client_id = get_option( 'ufo_adsense_client_id' );
    if ( ! empty( $client_id ) ) {
        // Usa async para não bloquear o rendering (Core Web Vitals)
        echo '<!-- UFO AdManager: Google AdSense Script -->';
        echo '<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=' . esc_attr( $client_id ) . '" crossorigin="anonymous"></script>';
    }
}
add_action( 'wp_head', 'ufoturismo_inject_adsense_script', 99 );
