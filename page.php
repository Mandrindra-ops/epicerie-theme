<?php get_header(); ?>

<?php
while ( have_posts() ) :
    the_post();
    ?>
    <article class="page-shell">
        <header class="page-hero">
            <p class="eyebrow">Épicerie du Quartier</p>
            <h1><?php the_title(); ?></h1>
            <?php if ( has_excerpt() ) : ?>
                <p><?php echo esc_html( get_the_excerpt() ); ?></p>
            <?php endif; ?>
        </header>
        <div class="content-wrap">
            <?php the_content(); ?>
        </div>
    </article>
<?php endwhile; ?>

<?php get_footer(); ?>
