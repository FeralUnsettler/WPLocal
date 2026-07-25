<?php
/**
 * UFO Home Customizer Metabox (Sem ACF)
 * Interface de Administração UX/UI para Clientes editarem a Home Page e Canais do YouTube/RSS
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// 1. Enfileirar Scripts do Media Uploader e Estilos Admin UI
function ufo_home_admin_enqueue( $hook ) {
    global $post;
    if ( ! $post || ( $post->ID != get_option( 'page_on_front' ) && $post->post_name !== 'home' && $post->post_name !== 'portal-ufoturismo-inicio' ) ) {
        return;
    }
    wp_enqueue_media();

    $custom_admin_css = "
        #ufo_home_custom_fields {
            background: #0B0E14;
            color: #E2E8F0;
            border: 1px solid #F2A900;
            border-radius: 8px;
        }
        #ufo_home_custom_fields .hndle, #ufo_home_custom_fields .handlediv {
            background: #151A22 !important;
            color: #F2A900 !important;
            font-size: 16px;
            padding: 15px !important;
            border-bottom: 1px solid #2A313C;
        }
        #ufo_home_custom_fields .inside {
            padding: 20px !important;
            margin: 0 !important;
        }
        .ufo-admin-section {
            background: #151A22;
            border: 1px solid #2A313C;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
        }
        .ufo-admin-section h3 {
            color: #00E5FF;
            font-size: 18px;
            margin-top: 0;
            margin-bottom: 15px;
            border-bottom: 1px solid #2A313C;
            padding-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .ufo-field-group {
            margin-bottom: 18px;
        }
        .ufo-field-group label {
            display: block;
            font-weight: 600;
            color: #F2A900;
            margin-bottom: 6px;
            font-size: 14px;
        }
        .ufo-field-group p.description {
            color: #94A3B8;
            font-size: 12px;
            margin-top: 4px;
            margin-bottom: 8px;
        }
        .ufo-field-group input[type='text'],
        .ufo-field-group input[type='url'],
        .ufo-field-group textarea {
            width: 100%;
            padding: 10px;
            background: #0B0E14;
            border: 1px solid #475569;
            color: #E2E8F0;
            border-radius: 4px;
            font-size: 14px;
        }
        .ufo-field-group input[type='text']:focus,
        .ufo-field-group textarea:focus {
            border-color: #00E5FF;
            outline: none;
            box-shadow: 0 0 5px rgba(0,229,255,0.5);
        }
        .ufo-media-wrapper {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        .ufo-admin-btn {
            background: #F2A900 !important;
            color: #000 !important;
            border: none !important;
            font-weight: 700 !important;
            padding: 8px 16px !important;
            border-radius: 4px !important;
            cursor: pointer;
            transition: all 0.2s;
        }
        .ufo-admin-btn:hover {
            background: #00E5FF !important;
            box-shadow: 0 0 10px rgba(0,229,255,0.4);
        }
    ";
    wp_add_inline_style( 'common', $custom_admin_css );
}
add_action( 'admin_enqueue_scripts', 'ufo_home_admin_enqueue' );

// 2. Registrar o Metabox no Post de Página
function ufo_add_home_metabox() {
    global $post;
    if ( ! $post ) return;
    
    $front_id = get_option( 'page_on_front' );
    if ( $post->ID == $front_id || $post->post_name === 'home' || $post->post_name === 'portal-ufoturismo-inicio' ) {
        add_meta_box(
            'ufo_home_custom_fields',
            '🛸 UFO Turismo Studio & Central de Feeds Parallax',
            'ufo_render_home_metabox',
            'page',
            'normal',
            'high'
        );
    }
}
add_action( 'add_meta_boxes', 'ufo_add_home_metabox' );

// 3. Renderizar Formulário com UX de Primeira Linha
function ufo_render_home_metabox( $post ) {
    wp_nonce_field( 'ufo_home_save_meta', 'ufo_home_meta_nonce' );

    $title         = get_post_meta( $post->ID, '_ufo_hero_title', true ) ?: 'A Verdade Está Lá Fora. E Nós Levamos Você Até Ela.';
    $subtitle      = get_post_meta( $post->ID, '_ufo_hero_subtitle', true ) ?: 'O maior portal brasileiro focado em Turismo Ufológico, Pesquisa de Fenômenos Anômalos e Divulgação Científica.';
    $bg_img        = get_post_meta( $post->ID, '_ufo_hero_bg_img', true ) ?: 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=2072&auto=format&fit=crop';
    
    $btn_1_text    = get_post_meta( $post->ID, '_ufo_hero_btn_text_1', true ) ?: 'Ver Expedições';
    $btn_1_url     = get_post_meta( $post->ID, '_ufo_hero_btn_url_1', true ) ?: '#roteiros';
    $btn_2_text    = get_post_meta( $post->ID, '_ufo_hero_btn_text_2', true ) ?: 'Últimas Notícias';
    $btn_2_url     = get_post_meta( $post->ID, '_ufo_hero_btn_url_2', true ) ?: '#noticias';

    $sec_roteiros  = get_post_meta( $post->ID, '_ufo_sec_roteiros_title', true ) ?: 'Próximas Expedições e Roteiros';
    $sec_news      = get_post_meta( $post->ID, '_ufo_sec_news_title', true ) ?: 'Últimas Notícias e Relatos';

    // Canais do YouTube & RSS para Galeria Parallax
    $yt_channels   = get_post_meta( $post->ID, '_ufo_yt_channels', true ) ?: "https://www.youtube.com/@jessemichelsclips\nhttps://www.youtube.com/feeds/videos.xml?channel_id=UC8ZKTXN9trt5dhixz6b6l6w";
    $yt_posts_feed = get_post_meta( $post->ID, '_ufo_yt_posts_feed', true ) ?: 'https://www.youtube.com/channel/UC8ZKTXN9trt5dhixz6b6l6w/posts';

    $cta_title     = get_post_meta( $post->ID, '_ufo_cta_title', true ) ?: 'Pronto Para Viver o Desconhecido?';
    $cta_desc      = get_post_meta( $post->ID, '_ufo_cta_desc', true ) ?: 'Participe de nossos roteiros noturnos com especialistas, equipamentos de visão noturna e guias credenciados.';
    $cta_btn       = get_post_meta( $post->ID, '_ufo_cta_btn_text', true ) ?: 'Agendar Agora pelo WhatsApp';
    $cta_url       = get_post_meta( $post->ID, '_ufo_cta_url', true ) ?: 'https://wa.me/5511999999999';
    ?>
    
    <div class="ufo-admin-studio">
        <!-- Seção 1: Canais do YouTube & Feeds RSS (Parallax) -->
        <div class="ufo-admin-section" style="border: 2px solid #00E5FF; box-shadow: 0 0 15px rgba(0,229,255,0.2);">
            <h3>📺 Galeria Parallax de Vídeos & Posts (YouTube + Feeds RSS)</h3>
            <p class="description" style="color: #E2E8F0; font-size: 14px;">Insira abaixo as URLs de canais do YouTube ou Feeds RSS. Os vídeos aparecem com <b>Efeito Parallax Randômico e Preview ao passar o mouse</b> na página inicial e na central de notícias!</p>
            
            <div class="ufo-field-group">
                <label>URLs de Canais do YouTube e Feeds RSS (Uma URL por linha)</label>
                <textarea name="ufo_yt_channels" rows="4"><?php echo esc_textarea( $yt_channels ); ?></textarea>
                <p class="description">Padrão pré-configurado: <code>https://www.youtube.com/@jessemichelsclips</code> (Pode inserir tanto handles @canal quanto links XML de feeds RSS).</p>
            </div>

            <div class="ufo-field-group">
                <label>URL Standard para Galeria Parallax Horizontal de Posts / Comunidade</label>
                <input type="text" name="ufo_yt_posts_feed" value="<?php echo esc_attr( $yt_posts_feed ); ?>" />
                <p class="description">Alimenta o carrossel/ticker horizontal de publicações institucionais. Padrão: <code>https://www.youtube.com/channel/UC8ZKTXN9trt5dhixz6b6l6w/posts</code>.</p>
            </div>
        </div>

        <!-- Seção 2: Hero Banner -->
        <div class="ufo-admin-section">
            <h3>🛸 Hero Banner Principal (Topo do Portal)</h3>
            <div class="ufo-field-group">
                <label>Título de Impacto (H1 Principal)</label>
                <input type="text" name="ufo_hero_title" value="<?php echo esc_attr( $title ); ?>" />
                <p class="description">Esta é a frase de maior destaque da sua Landing Page. Essencial para SEO Editorial.</p>
            </div>

            <div class="ufo-field-group">
                <label>Subtítulo de Credibility (Resumo Institucional)</label>
                <textarea name="ufo_hero_subtitle" rows="2"><?php echo esc_textarea( $subtitle ); ?></textarea>
                <p class="description">Explicação curta sobre a missão do portal. Sugestão: 1 a 2 frases no estilo Discovery / NatGeo.</p>
            </div>

            <div class="ufo-field-group">
                <label>Imagem de Fundo (Background Cinematográfico)</label>
                <div class="ufo-media-wrapper">
                    <input type="url" id="ufo_hero_bg_img" name="ufo_hero_bg_img" value="<?php echo esc_url( $bg_img ); ?>" />
                    <button type="button" class="ufo-admin-btn" id="btn_upload_bg">📷 Selecionar na Biblioteca</button>
                </div>
                <p class="description">Recomendado: Imagens em resolução 1920x1080 com tema espacial, noturno ou de montanhas escuras.</p>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                <div class="ufo-field-group">
                    <label>Botão 1 (Texto) - Ação Principal</label>
                    <input type="text" name="ufo_hero_btn_text_1" value="<?php echo esc_attr( $btn_1_text ); ?>" />
                </div>
                <div class="ufo-field-group">
                    <label>Botão 1 (URL/Link)</label>
                    <input type="text" name="ufo_hero_btn_url_1" value="<?php echo esc_attr( $btn_1_url ); ?>" />
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                <div class="ufo-field-group">
                    <label>Botão 2 (Texto) - Ação Secundária</label>
                    <input type="text" name="ufo_hero_btn_text_2" value="<?php echo esc_attr( $btn_2_text ); ?>" />
                </div>
                <div class="ufo-field-group">
                    <label>Botão 2 (URL/Link)</label>
                    <input type="text" name="ufo_hero_btn_url_2" value="<?php echo esc_attr( $btn_2_url ); ?>" />
                </div>
            </div>
        </div>

        <!-- Seção 3: Títulos das Seções Monetizadas -->
        <div class="ufo-admin-section">
            <h3>📰 Seções de Acervo & Vitrine de Roteiros</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                <div class="ufo-field-group">
                    <label>Título da Seção de Roteiros</label>
                    <input type="text" name="ufo_sec_roteiros_title" value="<?php echo esc_attr( $sec_roteiros ); ?>" />
                </div>
                <div class="ufo-field-group">
                    <label>Título da Seção de Notícias / Artigos</label>
                    <input type="text" name="ufo_sec_news_title" value="<?php echo esc_attr( $sec_news ); ?>" />
                </div>
            </div>
        </div>

        <!-- Seção 4: CTA Final de Conversão -->
        <div class="ufo-admin-section">
            <h3>🔥 Box de Conversão & Fechamento de Vendas / Comunidade</h3>
            <p class="description" style="color: #00E5FF; font-size: 13px;">Este bloco aparece logo antes do rodapé para capturar usuários interessados em pacotes turísticos ou em entrar na comunidade.</p>
            <div class="ufo-field-group">
                <label>Título da Chamada de Fechamento</label>
                <input type="text" name="ufo_cta_title" value="<?php echo esc_attr( $cta_title ); ?>" />
            </div>
            <div class="ufo-field-group">
                <label>Descrição Persuasiva do CTA</label>
                <textarea name="ufo_cta_desc" rows="2"><?php echo esc_textarea( $cta_desc ); ?></textarea>
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                <div class="ufo-field-group">
                    <label>Texto do Botão (Ex: WhatsApp / Reserva)</label>
                    <input type="text" name="ufo_cta_btn_text" value="<?php echo esc_attr( $cta_btn ); ?>" />
                </div>
                <div class="ufo-field-group">
                    <label>Link de Destino (Link do WhatsApp / Checkout)</label>
                    <input type="text" name="ufo_cta_url" value="<?php echo esc_attr( $cta_url ); ?>" />
                </div>
            </div>
        </div>
    </div>

    <script>
    jQuery(document).ready(function($){
        var custom_uploader;
        $('#btn_upload_bg').click(function(e) {
            e.preventDefault();
            if (custom_uploader) {
                custom_uploader.open();
                return;
            }
            custom_uploader = wp.media.frames.file_frame = wp.media({
                title: 'Selecione uma imagem de fundo para o Hero',
                button: { text: 'Usar esta imagem' },
                multiple: false
            });
            custom_uploader.on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('#ufo_hero_bg_img').val(attachment.url);
            });
            custom_uploader.open();
        });
    });
    </script>
    <?php
}

// 4. Lógica Segura de Salvamento
function ufo_save_home_metabox( $post_id ) {
    if ( ! isset( $_POST['ufo_home_meta_nonce'] ) || ! wp_verify_nonce( $_POST['ufo_home_meta_nonce'], 'ufo_home_save_meta' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_page', $post_id ) ) return;

    $fields = array(
        'ufo_yt_channels'       => '_ufo_yt_channels',
        'ufo_yt_posts_feed'     => '_ufo_yt_posts_feed',
        'ufo_hero_title'        => '_ufo_hero_title',
        'ufo_hero_subtitle'     => '_ufo_hero_subtitle',
        'ufo_hero_bg_img'       => '_ufo_hero_bg_img',
        'ufo_hero_btn_text_1'   => '_ufo_hero_btn_text_1',
        'ufo_hero_btn_url_1'    => '_ufo_hero_btn_url_1',
        'ufo_hero_btn_text_2'   => '_ufo_hero_btn_text_2',
        'ufo_hero_btn_url_2'    => '_ufo_hero_btn_url_2',
        'ufo_sec_roteiros_title'=> '_ufo_sec_roteiros_title',
        'ufo_sec_news_title'    => '_ufo_sec_news_title',
        'ufo_cta_title'         => '_ufo_cta_title',
        'ufo_cta_desc'          => '_ufo_cta_desc',
        'ufo_cta_btn_text'      => '_ufo_cta_btn_text',
        'ufo_cta_url'           => '_ufo_cta_url',
    );

    foreach ( $fields as $post_key => $meta_key ) {
        if ( isset( $_POST[ $post_key ] ) ) {
            update_post_meta( $post_id, $meta_key, sanitize_textarea_field( $_POST[ $post_key ] ) );
        }
    }
}
add_action( 'save_post', 'ufo_save_home_metabox' );
