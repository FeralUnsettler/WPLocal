<?php
/**
 * Meta Boxes para Custom Post Types
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Registra as Meta Boxes
 */
function ufoturismo_add_meta_boxes() {
    // Meta box para Roteiros (Turismo)
    add_meta_box(
        'ufoturismo_roteiro_meta',
        __( 'Detalhes do Roteiro Turístico', 'ufoturismo-core' ),
        'ufoturismo_roteiro_meta_callback',
        'roteiros',
        'normal',
        'normal',
        'high'
    );

    // Meta box para Eventos
    add_meta_box(
        'ufoturismo_evento_meta',
        __( 'Detalhes do Evento', 'ufoturismo-core' ),
        'ufoturismo_evento_meta_callback',
        'eventos',
        'normal',
        'high'
    );

    // Meta box para Enciclopédia
    add_meta_box(
        'ufoturismo_enciclopedia_meta',
        __( 'Dados do Verbete', 'ufoturismo-core' ),
        'ufoturismo_enciclopedia_meta_callback',
        'enciclopedia',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'ufoturismo_add_meta_boxes' );

/**
 * Renderiza o HTML das Meta Boxes de Roteiros
 */
function ufoturismo_roteiro_meta_callback( $post ) {
    // Nonce field para validação de segurança
    wp_nonce_field( 'ufoturismo_roteiro_save_meta', 'ufoturismo_roteiro_meta_nonce' );

    // Recupera valores existentes (se houver)
    $duracao = get_post_meta( $post->ID, '_ufoturismo_roteiro_duracao', true );
    $itens_inclusos = get_post_meta( $post->ID, '_ufoturismo_roteiro_itens_inclusos', true );
    $valor = get_post_meta( $post->ID, '_ufoturismo_roteiro_valor', true );
    $datas = get_post_meta( $post->ID, '_ufoturismo_roteiro_datas', true );
    $mapa_url = get_post_meta( $post->ID, '_ufoturismo_roteiro_mapa_url', true );
    $video_url = get_post_meta( $post->ID, '_ufoturismo_roteiro_video_url', true );
    $whatsapp = get_post_meta( $post->ID, '_ufoturismo_roteiro_whatsapp', true );

    echo '<style>
        .ufoturismo-meta-row { margin-bottom: 15px; }
        .ufoturismo-meta-row label { display: block; font-weight: bold; margin-bottom: 5px; }
        .ufoturismo-meta-row input[type="text"], .ufoturismo-meta-row textarea { width: 100%; max-width: 100%; }
    </style>';

    echo '<div class="ufoturismo-meta-row">';
    echo '<label for="ufoturismo_roteiro_duracao">' . esc_html__( 'Tempo de Duração (Ex: 4 horas, 2 dias)', 'ufoturismo-core' ) . '</label>';
    echo '<input type="text" id="ufoturismo_roteiro_duracao" name="ufoturismo_roteiro_duracao" value="' . esc_attr( $duracao ) . '" />';
    echo '</div>';

    echo '<div class="ufoturismo-meta-row">';
    echo '<label for="ufoturismo_roteiro_itens_inclusos">' . esc_html__( 'Itens Inclusos (Um por linha)', 'ufoturismo-core' ) . '</label>';
    echo '<textarea id="ufoturismo_roteiro_itens_inclusos" name="ufoturismo_roteiro_itens_inclusos" rows="4">' . esc_textarea( $itens_inclusos ) . '</textarea>';
    echo '</div>';

    echo '<div class="ufoturismo-meta-row">';
    echo '<label for="ufoturismo_roteiro_valor">' . esc_html__( 'Valor (Ex: R$ 150,00 ou Sob Consulta)', 'ufoturismo-core' ) . '</label>';
    echo '<input type="text" id="ufoturismo_roteiro_valor" name="ufoturismo_roteiro_valor" value="' . esc_attr( $valor ) . '" />';
    echo '</div>';

    echo '<div class="ufoturismo-meta-row">';
    echo '<label for="ufoturismo_roteiro_datas">' . esc_html__( 'Datas Disponíveis (Ex: Todos os finais de semana, 15 de Novembro)', 'ufoturismo-core' ) . '</label>';
    echo '<input type="text" id="ufoturismo_roteiro_datas" name="ufoturismo_roteiro_datas" value="' . esc_attr( $datas ) . '" />';
    echo '</div>';

    echo '<div class="ufoturismo-meta-row">';
    echo '<label for="ufoturismo_roteiro_whatsapp">' . esc_html__( 'Número WhatsApp para Agendamento (Apenas números, com DDI. Ex: 5511999999999)', 'ufoturismo-core' ) . '</label>';
    echo '<input type="text" id="ufoturismo_roteiro_whatsapp" name="ufoturismo_roteiro_whatsapp" value="' . esc_attr( $whatsapp ) . '" />';
    echo '</div>';

    echo '<div class="ufoturismo-meta-row">';
    echo '<label for="ufoturismo_roteiro_mapa_url">' . esc_html__( 'URL do Google Maps (Embed src URL)', 'ufoturismo-core' ) . '</label>';
    echo '<input type="text" id="ufoturismo_roteiro_mapa_url" name="ufoturismo_roteiro_mapa_url" value="' . esc_attr( $mapa_url ) . '" />';
    echo '</div>';

    echo '<div class="ufoturismo-meta-row">';
    echo '<label for="ufoturismo_roteiro_video_url">' . esc_html__( 'URL do Vídeo (YouTube)', 'ufoturismo-core' ) . '</label>';
    echo '<input type="text" id="ufoturismo_roteiro_video_url" name="ufoturismo_roteiro_video_url" value="' . esc_attr( $video_url ) . '" />';
    echo '</div>';
}

/**
 * Salva os dados das Meta Boxes
 */
function ufoturismo_save_roteiro_meta( $post_id ) {
    // Verifica se o nonce está setado e é válido
    if ( ! isset( $_POST['ufoturismo_roteiro_meta_nonce'] ) || ! wp_verify_nonce( $_POST['ufoturismo_roteiro_meta_nonce'], 'ufoturismo_roteiro_save_meta' ) ) {
        return;
    }

    // Se for autosave, não fazemos nada
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Verifica permissões
    if ( isset( $_POST['post_type'] ) && 'roteiros' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

    // Salva Duração
    if ( isset( $_POST['ufoturismo_roteiro_duracao'] ) ) {
        update_post_meta( $post_id, '_ufoturismo_roteiro_duracao', sanitize_text_field( $_POST['ufoturismo_roteiro_duracao'] ) );
    }

    // Salva Itens Inclusos (textarea = sanitize_textarea_field)
    if ( isset( $_POST['ufoturismo_roteiro_itens_inclusos'] ) ) {
        update_post_meta( $post_id, '_ufoturismo_roteiro_itens_inclusos', sanitize_textarea_field( $_POST['ufoturismo_roteiro_itens_inclusos'] ) );
    }

    // Salva Valor
    if ( isset( $_POST['ufoturismo_roteiro_valor'] ) ) {
        update_post_meta( $post_id, '_ufoturismo_roteiro_valor', sanitize_text_field( $_POST['ufoturismo_roteiro_valor'] ) );
    }

    // Salva Datas
    if ( isset( $_POST['ufoturismo_roteiro_datas'] ) ) {
        update_post_meta( $post_id, '_ufoturismo_roteiro_datas', sanitize_text_field( $_POST['ufoturismo_roteiro_datas'] ) );
    }

    // Salva WhatsApp
    if ( isset( $_POST['ufoturismo_roteiro_whatsapp'] ) ) {
        update_post_meta( $post_id, '_ufoturismo_roteiro_whatsapp', sanitize_text_field( $_POST['ufoturismo_roteiro_whatsapp'] ) );
    }

    // Salva Mapa URL (usa esc_url_raw para higienizar URLs)
    if ( isset( $_POST['ufoturismo_roteiro_mapa_url'] ) ) {
        update_post_meta( $post_id, '_ufoturismo_roteiro_mapa_url', esc_url_raw( $_POST['ufoturismo_roteiro_mapa_url'] ) );
    }

    // Salva Vídeo URL
    if ( isset( $_POST['ufoturismo_roteiro_video_url'] ) ) {
        update_post_meta( $post_id, '_ufoturismo_roteiro_video_url', esc_url_raw( $_POST['ufoturismo_roteiro_video_url'] ) );
    }
}
add_action( 'save_post', 'ufoturismo_save_roteiro_meta' );

/**
 * Renderiza o HTML das Meta Boxes de Eventos
 */
function ufoturismo_evento_meta_callback( $post ) {
    wp_nonce_field( 'ufoturismo_evento_save_meta', 'ufoturismo_evento_meta_nonce' );

    $data_hora = get_post_meta( $post->ID, '_ufoturismo_evento_data_hora', true );
    $organizador = get_post_meta( $post->ID, '_ufoturismo_evento_organizador', true );
    $contato = get_post_meta( $post->ID, '_ufoturismo_evento_contato', true );
    $site = get_post_meta( $post->ID, '_ufoturismo_evento_site', true );
    $ingresso = get_post_meta( $post->ID, '_ufoturismo_evento_ingresso', true );
    $mapa_url = get_post_meta( $post->ID, '_ufoturismo_evento_mapa_url', true );

    echo '<div class="ufoturismo-meta-row">';
    echo '<label>' . esc_html__( 'Data e Hora (Ex: 15 de Outubro de 2026, 19:00)', 'ufoturismo-core' ) . '</label>';
    echo '<input type="text" name="ufoturismo_evento_data_hora" value="' . esc_attr( $data_hora ) . '" />';
    echo '</div>';

    echo '<div class="ufoturismo-meta-row">';
    echo '<label>' . esc_html__( 'Organizador / Entidade', 'ufoturismo-core' ) . '</label>';
    echo '<input type="text" name="ufoturismo_evento_organizador" value="' . esc_attr( $organizador ) . '" />';
    echo '</div>';

    echo '<div class="ufoturismo-meta-row">';
    echo '<label>' . esc_html__( 'Contato (WhatsApp ou Email)', 'ufoturismo-core' ) . '</label>';
    echo '<input type="text" name="ufoturismo_evento_contato" value="' . esc_attr( $contato ) . '" />';
    echo '</div>';

    echo '<div class="ufoturismo-meta-row">';
    echo '<label>' . esc_html__( 'Site Oficial do Evento', 'ufoturismo-core' ) . '</label>';
    echo '<input type="text" name="ufoturismo_evento_site" value="' . esc_attr( $site ) . '" />';
    echo '</div>';

    echo '<div class="ufoturismo-meta-row">';
    echo '<label>' . esc_html__( 'Link para Compra de Ingresso', 'ufoturismo-core' ) . '</label>';
    echo '<input type="text" name="ufoturismo_evento_ingresso" value="' . esc_attr( $ingresso ) . '" />';
    echo '</div>';

    echo '<div class="ufoturismo-meta-row">';
    echo '<label>' . esc_html__( 'URL do Mapa do Local (Embed src)', 'ufoturismo-core' ) . '</label>';
    echo '<input type="text" name="ufoturismo_evento_mapa_url" value="' . esc_attr( $mapa_url ) . '" />';
    echo '</div>';
}

function ufoturismo_save_evento_meta( $post_id ) {
    if ( ! isset( $_POST['ufoturismo_evento_meta_nonce'] ) || ! wp_verify_nonce( $_POST['ufoturismo_evento_meta_nonce'], 'ufoturismo_evento_save_meta' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( isset( $_POST['post_type'] ) && 'eventos' == $_POST['post_type'] && ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['ufoturismo_evento_data_hora'] ) ) update_post_meta( $post_id, '_ufoturismo_evento_data_hora', sanitize_text_field( $_POST['ufoturismo_evento_data_hora'] ) );
    if ( isset( $_POST['ufoturismo_evento_organizador'] ) ) update_post_meta( $post_id, '_ufoturismo_evento_organizador', sanitize_text_field( $_POST['ufoturismo_evento_organizador'] ) );
    if ( isset( $_POST['ufoturismo_evento_contato'] ) ) update_post_meta( $post_id, '_ufoturismo_evento_contato', sanitize_text_field( $_POST['ufoturismo_evento_contato'] ) );
    if ( isset( $_POST['ufoturismo_evento_site'] ) ) update_post_meta( $post_id, '_ufoturismo_evento_site', esc_url_raw( $_POST['ufoturismo_evento_site'] ) );
    if ( isset( $_POST['ufoturismo_evento_ingresso'] ) ) update_post_meta( $post_id, '_ufoturismo_evento_ingresso', esc_url_raw( $_POST['ufoturismo_evento_ingresso'] ) );
    if ( isset( $_POST['ufoturismo_evento_mapa_url'] ) ) update_post_meta( $post_id, '_ufoturismo_evento_mapa_url', esc_url_raw( $_POST['ufoturismo_evento_mapa_url'] ) );
}
add_action( 'save_post', 'ufoturismo_save_evento_meta' );

/**
 * Renderiza o HTML das Meta Boxes de Enciclopédia
 */
function ufoturismo_enciclopedia_meta_callback( $post ) {
    wp_nonce_field( 'ufoturismo_enciclopedia_save_meta', 'ufoturismo_enciclopedia_meta_nonce' );

    $data_caso = get_post_meta( $post->ID, '_ufoturismo_enciclopedia_data_caso', true );
    $local_caso = get_post_meta( $post->ID, '_ufoturismo_enciclopedia_local_caso', true );
    $classificacao = get_post_meta( $post->ID, '_ufoturismo_enciclopedia_classificacao', true );
    $fontes = get_post_meta( $post->ID, '_ufoturismo_enciclopedia_fontes', true );

    echo '<div class="ufoturismo-meta-row">';
    echo '<label>' . esc_html__( 'Data do Avistamento/Caso (Se aplicável)', 'ufoturismo-core' ) . '</label>';
    echo '<input type="text" name="ufoturismo_enciclopedia_data_caso" value="' . esc_attr( $data_caso ) . '" />';
    echo '</div>';

    echo '<div class="ufoturismo-meta-row">';
    echo '<label>' . esc_html__( 'Local do Caso', 'ufoturismo-core' ) . '</label>';
    echo '<input type="text" name="ufoturismo_enciclopedia_local_caso" value="' . esc_attr( $local_caso ) . '" />';
    echo '</div>';

    echo '<div class="ufoturismo-meta-row">';
    echo '<label>' . esc_html__( 'Classificação Hynek (Ex: CE1, CE2, CE3, Grau 1 a 5)', 'ufoturismo-core' ) . '</label>';
    echo '<input type="text" name="ufoturismo_enciclopedia_classificacao" value="' . esc_attr( $classificacao ) . '" />';
    echo '</div>';

    echo '<div class="ufoturismo-meta-row">';
    echo '<label>' . esc_html__( 'Fontes e Referências', 'ufoturismo-core' ) . '</label>';
    echo '<textarea name="ufoturismo_enciclopedia_fontes" rows="4">' . esc_textarea( $fontes ) . '</textarea>';
    echo '</div>';
}

function ufoturismo_save_enciclopedia_meta( $post_id ) {
    if ( ! isset( $_POST['ufoturismo_enciclopedia_meta_nonce'] ) || ! wp_verify_nonce( $_POST['ufoturismo_enciclopedia_meta_nonce'], 'ufoturismo_enciclopedia_save_meta' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( isset( $_POST['post_type'] ) && 'enciclopedia' == $_POST['post_type'] && ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['ufoturismo_enciclopedia_data_caso'] ) ) update_post_meta( $post_id, '_ufoturismo_enciclopedia_data_caso', sanitize_text_field( $_POST['ufoturismo_enciclopedia_data_caso'] ) );
    if ( isset( $_POST['ufoturismo_enciclopedia_local_caso'] ) ) update_post_meta( $post_id, '_ufoturismo_enciclopedia_local_caso', sanitize_text_field( $_POST['ufoturismo_enciclopedia_local_caso'] ) );
    if ( isset( $_POST['ufoturismo_enciclopedia_classificacao'] ) ) update_post_meta( $post_id, '_ufoturismo_enciclopedia_classificacao', sanitize_text_field( $_POST['ufoturismo_enciclopedia_classificacao'] ) );
    if ( isset( $_POST['ufoturismo_enciclopedia_fontes'] ) ) update_post_meta( $post_id, '_ufoturismo_enciclopedia_fontes', sanitize_textarea_field( $_POST['ufoturismo_enciclopedia_fontes'] ) );
}
add_action( 'save_post', 'ufoturismo_save_enciclopedia_meta' );
