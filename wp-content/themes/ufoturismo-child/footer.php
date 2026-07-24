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
            <span class="ufo-logo-text">UFO<span class="ufo-logo-highlight">Turismo</span></span>
            <p>O Maior Portal Brasileiro sobre Ufologia, Fenômenos Anômalos e Turismo Ufológico. Explorando o desconhecido com credibilidade.</p>
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
        <p>&copy; <?php echo date('Y'); ?> UFOTurismo. Todos os direitos reservados.</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
