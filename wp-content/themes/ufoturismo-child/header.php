<?php
/**
 * The template for displaying the header
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
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

<header class="ufo-site-header">
    <div class="ufo-header-container">
        <div class="ufo-site-branding">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ufo-logo">
                <span class="ufo-logo-icon">🛸</span>
                <span class="ufo-logo-text">UFO<span class="ufo-logo-highlight">Turismo</span></span>
            </a>
        </div>

        <nav class="ufo-main-navigation" role="navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'fallback_cb'    => false,
            ) );
            ?>
        </nav>

        <div class="ufo-header-actions">
            <a href="#eventos" class="ufo-btn ufo-btn-primary">Próximos Eventos</a>
        </div>
    </div>
</header>

<main id="content" class="site-main" role="main">
