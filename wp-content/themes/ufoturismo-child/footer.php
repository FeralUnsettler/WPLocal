<?php
/**
 * The template for displaying the footer.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
</main><!-- #content -->

<footer class="ufo-site-footer">
    <div class="ufo-footer-container">
        <div class="ufo-footer-about">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="display: inline-block; margin-bottom: 15px; text-decoration: none;">
                <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/guaraufo-logo.png' ); ?>" alt="GuaraUFO Turismo" style="height: 80px !important; width: auto !important; max-width: 320px !important; object-fit: contain; filter: drop-shadow(0 0 16px rgba(255, 0, 127, 0.75)) drop-shadow(0 0 6px rgba(0, 229, 255, 0.55));" />
            </a>
            <p><strong>GuaraUFO Turismo & Pesquisa</strong> &bull; O Maior Portal Brasileiro sobre Ufologia, Fenômenos Anômalos e Expedições Científicas de Turismo Ufológico. Explorando o desconhecido com credibilidade, segurança e rigor técnico.</p>
        </div>
        
        <div class="ufo-footer-nav">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'footer',
                'menu_id'        => 'footer-menu',
                'fallback_cb'    => false,
            ) );
            ?>
        </div>
    </div>
    <div class="ufo-footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> GuaraUFO Turismo. Todos os direitos reservados. Plataforma otimizada para monetização de alta conversão.</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
