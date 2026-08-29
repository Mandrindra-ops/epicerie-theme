<?php get_header(); ?>

<?php
while ( have_posts() ) :
    the_post();
    ?>
    <article class="article-shell">
        <header class="article-hero">
            <div>
                <a class="back-link" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Retour au blog</a>
                <h1><?php the_title(); ?></h1>
                <?php if ( has_excerpt() ) : ?>
                    <p class="article-hero__excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
                <?php endif; ?>
                <div class="article-meta">
                    <span><?php echo esc_html( wp_strip_all_tags( get_the_category_list( ', ' ) ) ); ?></span>
                </div>
            </div>
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="article-hero__image">
                    <?php the_post_thumbnail( 'large' ); ?>
                </div>
            <?php endif; ?>
        </header>
        <div class="article-content">
            <?php the_content(); ?>
            <div class="article-tags">
                <?php the_tags( '<span>Tags : </span>', ' ', '' ); ?>
            </div>
            <nav class="article-next" aria-label="Navigation article">
                <?php previous_post_link( '%link', 'Article précédent' ); ?>
                <?php next_post_link( '%link', 'Article suivant' ); ?>
            </nav>
        </div>
    </article>
<?php endwhile; ?>

<?php get_footer(); ?>
