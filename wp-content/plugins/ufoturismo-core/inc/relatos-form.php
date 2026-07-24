<?php
/**
 * Sistema de Submissão de Relatos pelo Frontend
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Registra o Shortcode e Processa o Formulário
 */
function ufoturismo_process_relato_submission() {
    // Variável para mensagens de feedback
    $mensagem = '';

    // Verifica se o formulário foi submetido
    if ( isset( $_POST['ufoturismo_submit_relato'] ) ) {
        
        // Verifica o Nonce de segurança
        if ( ! isset( $_POST['ufoturismo_relato_nonce'] ) || ! wp_verify_nonce( $_POST['ufoturismo_relato_nonce'], 'ufoturismo_enviar_relato' ) ) {
            $mensagem = '<div class="ufo-alert ufo-alert-error">Erro de segurança. Tente novamente.</div>';
        } else {
            // Coleta e higieniza os dados
            $titulo = sanitize_text_field( $_POST['relato_titulo'] );
            $descricao = sanitize_textarea_field( $_POST['relato_descricao'] );
            $local = sanitize_text_field( $_POST['relato_local'] );
            $data_avistamento = sanitize_text_field( $_POST['relato_data'] );
            $nome_autor = sanitize_text_field( $_POST['relato_nome'] );
            $email_autor = sanitize_email( $_POST['relato_email'] );

            // Validação básica
            if ( empty( $titulo ) || empty( $descricao ) || empty( $email_autor ) ) {
                $mensagem = '<div class="ufo-alert ufo-alert-error">Por favor, preencha todos os campos obrigatórios.</div>';
            } else {
                // Prepara os dados para inserir o post
                $post_data = array(
                    'post_title'    => $titulo,
                    'post_content'  => $descricao,
                    'post_status'   => 'pending', // Fica pendente para aprovação do admin
                    'post_type'     => 'relatos',
                    'post_author'   => 1, // Associa ao admin ou ao usuário logado futuramente
                );

                // Insere o post
                $post_id = wp_insert_post( $post_data );

                if ( ! is_wp_error( $post_id ) && $post_id > 0 ) {
                    
                    // Salva as Meta Boxes personalizadas (Você precisará criar os campos na edição do admin depois, ou eles só ficarão no banco)
                    update_post_meta( $post_id, '_relato_local', $local );
                    update_post_meta( $post_id, '_relato_data', $data_avistamento );
                    update_post_meta( $post_id, '_relato_autor_nome', $nome_autor );
                    update_post_meta( $post_id, '_relato_autor_email', $email_autor );

                    // Processa Upload de Imagem (Anexo/Evidência)
                    if ( ! empty( $_FILES['relato_evidencia']['name'] ) ) {
                        require_once( ABSPATH . 'wp-admin/includes/image.php' );
                        require_once( ABSPATH . 'wp-admin/includes/file.php' );
                        require_once( ABSPATH . 'wp-admin/includes/media.php' );

                        $attachment_id = media_handle_upload( 'relato_evidencia', $post_id );
                        
                        if ( ! is_wp_error( $attachment_id ) ) {
                            set_post_thumbnail( $post_id, $attachment_id );
                        }
                    }

                    $mensagem = '<div class="ufo-alert ufo-alert-success">Relato enviado com sucesso! Ele será analisado por nossa equipe antes de ser publicado. A verdade agradece.</div>';
                } else {
                    $mensagem = '<div class="ufo-alert ufo-alert-error">Houve um erro ao enviar seu relato. Tente novamente mais tarde.</div>';
                }
            }
        }
    }

    // Renderiza o formulário HTML
    ob_start();
    ?>
    <div class="ufo-relato-form-container">
        <?php echo $mensagem; ?>
        
        <?php if ( strpos($mensagem, 'sucesso') === false ) : ?>
            <form id="ufoturismo-relato-form" action="" method="POST" enctype="multipart/form-data" class="ufo-form">
                <?php wp_nonce_field( 'ufoturismo_enviar_relato', 'ufoturismo_relato_nonce' ); ?>
                
                <div class="ufo-form-group">
                    <label for="relato_titulo">Título do Avistamento / Relato *</label>
                    <input type="text" id="relato_titulo" name="relato_titulo" required placeholder="Ex: Luzes estranhas sobre a serra">
                </div>

                <div class="ufo-form-row">
                    <div class="ufo-form-group">
                        <label for="relato_local">Local (Cidade/Estado)</label>
                        <input type="text" id="relato_local" name="relato_local" placeholder="Ex: Peruíbe, SP">
                    </div>
                    
                    <div class="ufo-form-group">
                        <label for="relato_data">Data do Ocorrido</label>
                        <input type="date" id="relato_data" name="relato_data">
                    </div>
                </div>

                <div class="ufo-form-group">
                    <label for="relato_descricao">Descreva em detalhes o que você viu *</label>
                    <textarea id="relato_descricao" name="relato_descricao" rows="6" required placeholder="Descreva os formatos, luzes, movimentos..."></textarea>
                </div>

                <div class="ufo-form-group">
                    <label for="relato_evidencia">Enviar Evidência (Foto ou Vídeo Curto - Máx 5MB)</label>
                    <input type="file" id="relato_evidencia" name="relato_evidencia" accept="image/*,video/mp4">
                    <small style="color:var(--ufo-text-muted);">Sua identidade será preservada caso solicite.</small>
                </div>

                <hr style="border-color: var(--ufo-border); margin: 30px 0;">
                <h4>Seus Dados (Para contato da pesquisa)</h4>

                <div class="ufo-form-row">
                    <div class="ufo-form-group">
                        <label for="relato_nome">Seu Nome ou Pseudônimo</label>
                        <input type="text" id="relato_nome" name="relato_nome">
                    </div>
                    
                    <div class="ufo-form-group">
                        <label for="relato_email">Seu E-mail *</label>
                        <input type="email" id="relato_email" name="relato_email" required>
                    </div>
                </div>

                <button type="submit" name="ufoturismo_submit_relato" class="ufo-btn ufo-btn-primary ufo-btn-full" style="margin-top: 20px; font-size: 18px; padding: 15px;">Enviar Relato para Análise</button>
            </form>
        <?php endif; ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'ufoturismo_relato_form', 'ufoturismo_process_relato_submission' );
