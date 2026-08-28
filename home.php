<?php get_header(); ?>

<section class="page-shell blog-archive">
    <header class="page-hero">
        <p class="eyebrow">Blog</p>
        <h1>Articles récents</h1>
        <p>Conseils, actualités et coulisses de l Épicerie du Quartier.</p>
    </header>

    <div class="post-grid blog-archive__grid">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();

                if ( 1 === (int) get_the_ID() ) {
                    continue;
                }

                get_template_part( 'template-parts/card', 'post' );
            endwhile;
        else :
            ?>
            <p>Aucun article disponible pour le moment.</p>
            <?php
        endif;
        ?>
    </div>
</section>

<?php get_footer(); ?>
