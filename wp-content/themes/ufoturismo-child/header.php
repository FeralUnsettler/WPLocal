<?php
/**
 * The template for displaying the fixed header with centered platform area buttons
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="ufo-site-header ufo-fixed-header">
    <div class="ufo-header-container">
        <!-- Logotipo Oficial GuaraUFO Turismo no Cabeçalho -->
        <div class="ufo-site-branding">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ufo-logo" title="GuaraUFO Turismo" style="display: flex; align-items: center;">
                <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/guaraufo-logo.png' ); ?>" alt="GuaraUFO Turismo" class="ufo-brand-logo" style="height: 52px; width: auto; max-width: 210px; object-fit: contain; border-radius: 6px; filter: drop-shadow(0 0 10px rgba(255, 0, 127, 0.7)) drop-shadow(0 0 4px rgba(0, 229, 255, 0.5)); transition: transform 0.3s ease;" />
            </a>
        </div>

        <!-- Menu com Botões das Áreas da Plataforma Centralizados para Desktop -->
        <nav class="ufo-platform-nav" role="navigation" aria-label="Menu Principal da Plataforma">
            <ul class="ufo-nav-buttons">
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ufo-nav-pill">🌌 Início</a></li>
                <li><a href="<?php echo esc_url( home_url( '/videos/' ) ); ?>" class="ufo-nav-pill">🎬 Cinema & Vídeos</a></li>
                <li><a href="<?php echo esc_url( home_url( '/#roteiros' ) ); ?>" class="ufo-nav-pill">🛸 Expedições</a></li>
                <li><a href="<?php echo esc_url( get_permalink( get_option('page_for_posts') ) ?: home_url( '/noticias/' ) ); ?>" class="ufo-nav-pill">📰 Portal Notícias</a></li>
                <li><a href="<?php echo esc_url( home_url( '/#eventos' ) ); ?>" class="ufo-nav-pill">🗓️ Agenda</a></li>
            </ul>
        </nav>

        <!-- Ação VIP / Comunidade no Canto Direito -->
        <div class="ufo-header-actions">
            <a href="https://wa.me/5511999999999" target="_blank" class="ufo-btn ufo-btn-vip">💬 VIP & Fórum</a>
        </div>
    </div>
</header>

<main id="content" class="site-main" role="main">
