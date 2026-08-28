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
                <div class="article-meta">
                    <span><?php echo esc_html( get_the_date() ); ?></span>
                    <span><?php echo esc_html( epicerie_author_display_name() ); ?></span>
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
        </div>
    </article>
<?php endwhile; ?>

<?php get_footer(); ?>
