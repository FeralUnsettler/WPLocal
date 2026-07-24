<?php
/**
 * O template para exibir todas as postagens únicas (Notícias/Blog)
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<main id="primary" class="ufo-site-main">
    <div class="ufo-container ufo-single-container">
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'ufo-single-article' ); ?>>
                
                <header class="ufo-article-header">
                    <div class="ufo-article-meta-cats">
                        <?php the_category( ' ' ); ?>
                    </div>
                    <h1 class="ufo-article-title"><?php the_title(); ?></h1>
                    
                    <div class="ufo-article-meta">
                        <span class="ufo-meta-author">Por <?php the_author_posts_link(); ?></span>
                        <span class="ufo-meta-date"><?php echo get_the_date(); ?></span>
                        <span class="ufo-meta-reading-time">
                            <?php 
                                $word_count = str_word_count( strip_tags( get_post_field( 'post_content', get_the_ID() ) ) );
                                $reading_time = ceil($word_count / 200);
                                echo 'Leitura: ' . $reading_time . ' min';
                            ?>
                        </span>
                    </div>
                </header>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="ufo-article-thumbnail">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                <?php endif; ?>

                <!-- Ad Placement: In-Article Top -->
                <div class="ufo-ad-placement ufo-ad-in-article">
                    <?php 
                        $ad_in_top = get_option('ufo_ad_in_article_top');
                        if ( ! empty($ad_in_top) ) {
                            echo $ad_in_top;
                        } else {
                            echo '<!-- UFO AdManager: Ad In-Article Top vazio -->';
                        }
                    ?>
                </div>

                <div class="ufo-article-content">
                    <?php the_content(); ?>
                </div>

                <footer class="ufo-article-footer">
                    <div class="ufo-article-tags">
                        <?php the_tags( '', ' ', '' ); ?>
                    </div>
                    
                    <!-- Ad Placement: In-Article Bottom -->
                    <div class="ufo-ad-placement ufo-ad-bottom">
                        <?php 
                            $ad_in_bottom = get_option('ufo_ad_in_article_bottom');
                            if ( ! empty($ad_in_bottom) ) {
                                echo $ad_in_bottom;
                            } else {
                                echo '<!-- UFO AdManager: Ad In-Article Bottom vazio -->';
                            }
                        ?>
                    </div>

                    <!-- Compartilhamento (Opcional nativo) -->
                    <div class="ufo-share-box">
                        <a href="https://api.whatsapp.com/send?text=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="ufo-btn ufo-btn-whatsapp">Compartilhar no WhatsApp</a>
                    </div>
                </footer>
                
            </article>
            
            <!-- Comentários -->
            <?php
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            ?>

        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
