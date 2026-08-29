<?php get_header(); ?>

<section class="page-shell blog-archive">
    <header class="page-hero">
        <div>
            <p class="eyebrow">Blog</p>
            <h1>Articles récents</h1>
            <p>Conseils pratiques, achat local et coulisses de l’Épicerie du Quartier pour mieux choisir au quotidien.</p>
        </div>
        <form role="search" method="get" class="search-panel search-panel--compact" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <label for="blog-search">Rechercher un article</label>
            <div class="search-panel__row">
                <input id="blog-search" type="search" name="s" placeholder="Ex : fruits, local, contact" value="<?php echo esc_attr( get_search_query() ); ?>">
                <button type="submit">Rechercher</button>
            </div>
        </form>
    </header>

    <ul class="quick-filter" aria-label="Catégories du blog">
        <?php
        wp_list_categories(
            array(
                'title_li' => '',
                'style'    => 'list',
            )
        );
        ?>
    </ul>

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
            <p class="empty-state">Aucun article disponible pour le moment.</p>
            <?php
        endif;
        ?>
    </div>
</section>

<?php get_footer(); ?>
