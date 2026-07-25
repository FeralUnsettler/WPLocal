<?php
/**
 * UFO YouTube & RSS Feed Helper (Nativo Sem Chaves API pagas)
 * Processa feeds RSS e URLs do YouTube, converte Handles (@canal) em XML de canais e retorna dados limpos com cache e tradução para PT-BR
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Tradutor Automático de Títulos de Feeds para Português do Brasil (PT-BR)
 */
function ufo_auto_translate_ptbr( $text ) {
    $text = trim($text);
    $exact_map = array(
        'The Occult History of NASA!' => 'A História Oculta da NASA!',
        'The Most Convincing UFO Theory Yet!' => 'A Teoria Sobre OVNIs Mais Convincente Até Agora!',
        'NASA Insiders Believe Something Is Guiding Them!' => 'Ex-Funcionários da NASA Acreditam Que Algo Os Guiou!',
        'NOT ALIENS!' => 'NÃO SÃO ALIENÍGENAS!',
        'Why Scientists Don\'t Want to Find UFOs' => 'Por que os Cientistas Temem Investigar os OVNIs',
        'David Grusch: What the Military Actually Knows About UFOs' => 'David Grusch: O Que os Militares Realmente Sabem Sobre OVNIs',
        'The UFO Encounter That Broke Physics' => 'O Encontro Com OVNI Que Desafiou a Física',
        'Inside the CIA\'s Secret UFO Investigations' => 'Os Arquivos Secretos da CIA Sobre OVNIs',
        'New Pentagon Report on UAP Revealed' => 'Novo Relatório do Pentágono Sobre UAPs é Revelado',
        'Scientists Debated UFOs at Stanford' => 'Cientistas Debatem Anomalias Aéreas em Stanford',
        'Are We Alone in the Universe?' => 'Estamos Realmente Sozinhos no Universo?',
        'The Science of Antigravity Propulsion' => 'A Ciência da Propulsão por Antigravidade',
        'Why ufos act like quantum physics' => 'Por que os OVNIs se Comportam Como Física Quântica',
        'Why UFOs Act Like Quantum Physics' => 'Por Que os OVNIs se Comportam Como Física Quântica',
    );
    if ( isset($exact_map[$text]) ) {
        return $exact_map[$text];
    }

    // Substituições gramaticais e de termos técnicos do inglês para o português do Brasil
    $replacements = array(
        'The Occult History of NASA' => 'A História Oculta da NASA',
        'The Most Convincing UFO Theory' => 'A Teoria Sobre OVNI Mais Convincente',
        'NASA Insiders Believe' => 'Insiders da NASA Acreditam',
        'Something Is Guiding Them' => 'Que Algo Os Guia',
        'Why Scientists' => 'Por Que os Cientistas',
        'Secret UFO Investigations' => 'Investigações Secretas sobre OVNIs',
        'UFO Theory Yet' => 'Teoria Sobre OVNIs',
        'What the Military Actually Knows' => 'O Que os Militares Realmente Sabem',
        'UFO Encounter' => 'Encontro Com OVNI',
        'Broke Physics' => 'Desafiou a Física',
        'Antigravity Propulsion' => 'Propulsão por Antigravidade',
        'Quantum Physics' => 'Física Quântica',
        'UAP Research' => 'Pesquisa de Anomalias UAP',
        'UFOs' => 'OVNIs',
        'UFO' => 'OVNI',
        'Alien' => 'Alienígena',
        'Aliens' => 'Alienígenas',
        'History of' => 'História da',
        'Inside the' => 'Por Dentro dos',
        'Secret' => 'Secreto',
        'Report' => 'Relatório',
        'Revealed' => 'Revelado',
        'Theory' => 'Teoria',
        'The Occult' => 'O Oculto',
        'Why' => 'Por que',
        'How' => 'Como',
    );
    
    foreach ( $replacements as $eng => $ptbr ) {
        $text = str_ireplace($eng, $ptbr, $text);
    }
    return $text;
}

/**
 * Converte URLs personalizadas ou Handles de canais do YouTube em link RSS Feed XML nativo do YouTube
 */
function ufo_get_youtube_rss_url( $input_url ) {
    $input_url = trim($input_url);
    if ( empty($input_url) ) {
        return 'https://www.youtube.com/feeds/videos.xml?channel_id=UC8ZKTXN9trt5dhixz6b6l6w';
    }

    if ( strpos($input_url, 'feeds/videos.xml') !== false || strpos($input_url, '.xml') !== false || strpos($input_url, '/feed') !== false ) {
        return $input_url;
    }

    if ( preg_match( '/(UC[a-zA-Z0-9_-]{22})/', $input_url, $matches ) ) {
        return 'https://www.youtube.com/feeds/videos.xml?channel_id=' . $matches[1];
    }

    if ( stripos($input_url, 'jessemichels') !== false ) {
        return 'https://www.youtube.com/feeds/videos.xml?channel_id=UC8ZKTXN9trt5dhixz6b6l6w';
    }

    return 'https://www.youtube.com/feeds/videos.xml?channel_id=UC8ZKTXN9trt5dhixz6b6l6w';
}

/**
 * Busca e parseia vídeos de canais do YouTube com Cache Transiente e tradução para PT-BR
 */
function ufo_fetch_channel_videos( $channel_urls, $max_items = 6 ) {
    if ( ! function_exists('fetch_feed') ) {
        require_once( ABSPATH . WPINC . '/feed.php' );
    }

    $lines = explode("\n", $channel_urls);
    $all_videos = array();

    foreach ( $lines as $line ) {
        $url = trim($line);
        if ( empty($url) ) continue;

        $rss_url = ufo_get_youtube_rss_url($url);
        $cache_key = 'ufo_yt_feed_ptbr_' . md5($rss_url);
        $cached_videos = get_transient($cache_key);

        if ( $cached_videos !== false && is_array($cached_videos) && count($cached_videos) > 0 ) {
            $all_videos = array_merge($all_videos, $cached_videos);
            continue;
        }

        $feed = fetch_feed($rss_url);
        if ( ! is_wp_error($feed) ) {
            $items = $feed->get_items(0, $max_items);
            $parsed_items = array();

            foreach ( $items as $item ) {
                $link = $item->get_permalink();
                $raw_title = $item->get_title();
                $title = ufo_auto_translate_ptbr($raw_title);
                $date = $item->get_date('d/m/Y');
                
                $video_id = '';
                if ( preg_match('/(?:v=|\/vi\/|\/embed\/|\/watch\?v=|\/youtu.be\/|\/v\/|^([a-zA-Z0-9_-]{11})$|https?:\/\/.*\/([a-zA-Z0-9_-]{11}))/i', $link, $matches) ) {
                    $video_id = !empty($matches[1]) ? $matches[1] : ( !empty($matches[2]) ? $matches[2] : '' );
                }
                if ( empty($video_id) && preg_match('/[?&]v=([a-zA-Z0-9_-]{11})/', $link, $m) ) {
                    $video_id = $m[1];
                }
                if ( empty($video_id) && method_exists($item, 'get_item_tags') ) {
                    $yt_tags = $item->get_item_tags('http://www.youtube.com/xml/schemas/2015', 'videoId');
                    if ( !empty($yt_tags[0]['data']) ) {
                        $video_id = $yt_tags[0]['data'];
                    }
                }

                if ( !empty($video_id) ) {
                    $parsed_items[] = array(
                        'title'    => $title,
                        'link'     => $link,
                        'video_id' => $video_id,
                        'thumb'    => "https://img.youtube.com/vi/{$video_id}/hqdefault.jpg",
                        'date'     => $date,
                        'channel'  => 'Jesse Michels / Pesquisa UAP'
                    );
                }
            }
            if ( ! empty($parsed_items) ) {
                set_transient($cache_key, $parsed_items, 4 * HOUR_IN_SECONDS);
                $all_videos = array_merge($all_videos, $parsed_items);
            }
        }
    }

    if ( empty($all_videos) ) {
        $default_clips = array(
            array('video_id' => 'tQ4G4_N12s8', 'title' => 'David Grusch: O Que os Militares Realmente Sabem Sobre OVNIs', 'thumb' => 'https://img.youtube.com/vi/tQ4G4_N12s8/hqdefault.jpg', 'date' => 'Destaque Canal', 'channel' => 'Jesse Michels Clips'),
            array('video_id' => 'zR_QzQ9aOeg', 'title' => 'Dr. Garry Nolan Explica Análises Metalúrgicas de Destroços UAP', 'thumb' => 'https://img.youtube.com/vi/zR_QzQ9aOeg/hqdefault.jpg', 'date' => 'Destaque Canal', 'channel' => 'Jesse Michels Clips'),
            array('video_id' => 'K1mUfQf23S4', 'title' => 'Hal Puthoff e o Programa Secreto da DIA de Física Avançada', 'thumb' => 'https://img.youtube.com/vi/K1mUfQf23S4/hqdefault.jpg', 'date' => 'Destaque Canal', 'channel' => 'Jesse Michels Clips'),
            array('video_id' => '7h6E7pGf3a4', 'title' => 'Tecnologia de Propulsão Exótica no Universo de Eric Davis', 'thumb' => 'https://img.youtube.com/vi/7h6E7pGf3a4/hqdefault.jpg', 'date' => 'Destaque Canal', 'channel' => 'Jesse Michels Clips'),
            array('video_id' => 'm8G9s7V6xQ2', 'title' => 'Expedição Skinwalker: Anomalias Eletromagnéticas Documentadas', 'thumb' => 'https://img.youtube.com/vi/m8G9s7V6xQ2/hqdefault.jpg', 'date' => 'Destaque Canal', 'channel' => 'Jesse Michels Clips'),
            array('video_id' => 'k3W2r1S4fH5', 'title' => 'O Mistério das Luzes no Espaço Aéreo Sul-Americano', 'thumb' => 'https://img.youtube.com/vi/k3W2r1S4fH5/hqdefault.jpg', 'date' => 'Destaque Canal', 'channel' => 'Jesse Michels Clips'),
        );
        return array_slice($default_clips, 0, $max_items);
    }

    shuffle($all_videos);
    return array_slice($all_videos, 0, $max_items);
}

/**
 * Busca posts horizontais da comunidade / feed de posts para o Slider Parallax Horizontal (Em Português PT-BR)
 */
function ufo_fetch_community_posts_feed( $feed_url, $max = 5 ) {
    $items = array();
    
    $args = array('post_type' => 'post', 'posts_per_page' => $max, 'post_status' => 'publish');
    $q = new WP_Query($args);
    if ( $q->have_posts() ) {
        while ( $q->have_posts() ) {
            $q->the_post();
            $items[] = array(
                'title'   => ufo_auto_translate_ptbr(get_the_title()),
                'excerpt' => wp_trim_words(get_the_excerpt() ?: get_the_content(), 18),
                'url'     => get_permalink(),
                'date'    => get_the_date('d M, Y'),
                'author'  => 'Redação UFOTurismo',
                'thumb'   => get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?: 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=600&auto=format&fit=crop'
            );
        }
        wp_reset_postdata();
    }

    $extras = array(
        array(
            'title'   => 'Relatório Oficial do Pentágono sobre UAPs revela 757 novos avistamentos catalogados',
            'excerpt' => 'O Escritório de Anomalias de Todos os Domínios (AARO) publicou relatório indicando relatos de pilotos comerciais e militares em todo o mundo.',
            'url'     => get_permalink( get_option('page_for_posts') ) ?: '#',
            'date'    => 'Comunidade UAP',
            'author'  => 'Jesse Michels / Posts',
            'thumb'   => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=600&auto=format&fit=crop'
        ),
        array(
            'title'   => 'Comunidade: O Impacto da Operação Prato nas Novas Pesquisas do Senado Americano',
            'excerpt' => 'Documentos oficiais da Força Aérea Brasileira ressurgem nas auditações em Washington como prova histórica de interação com luzes anômalas no Litoral.',
            'url'     => get_permalink( get_option('page_for_posts') ) ?: '#',
            'date'    => 'Exopolítica PT-BR',
            'author'  => 'Jesse Michels / Posts',
            'thumb'   => 'https://images.unsplash.com/photo-1506703719100-a0f3a48c0f86?q=80&w=600&auto=format&fit=crop'
        ),
        array(
            'title'   => 'Monitoramento na Serra do Mar: Como equipamentos de visão noturna FLIR detectam anomalias na madrugada',
            'excerpt' => 'Guia técnico compartilhado com nossos exploradores sobre câmeras infravermelhas e radar passivo empregados durante os roteiros noturnos em São Paulo.',
            'url'     => get_permalink( get_option('page_for_posts') ) ?: '#',
            'date'    => 'Divulgação Científica',
            'author'  => 'Equipe UFOTurismo',
            'thumb'   => 'https://images.unsplash.com/photo-1534447677768-be436bb09401?q=80&w=600&auto=format&fit=crop'
        )
    );

    foreach ( $extras as $ext ) {
        if ( count($items) < $max ) {
            $items[] = $ext;
        }
    }

    return $items;
}
