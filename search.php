<?php get_header(); ?>

<section class="page-shell search-page">
    <header class="page-hero">
        <div>
            <p class="eyebrow">Recherche</p>
            <h1>
                <?php if ( get_search_query() ) : ?>
                    Résultats pour « <?php echo esc_html( get_search_query() ); ?> »
                <?php else : ?>
                    Trouver une information
                <?php endif; ?>
            </h1>
            <p>Recherchez un article, une page pratique, un conseil d’achat ou une information de contact.</p>
        </div>
        <form role="search" method="get" class="search-panel" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <label for="site-search">Que cherchez-vous ?</label>
            <div class="search-panel__row">
                <input id="site-search" type="search" name="s" placeholder="Ex : fruits, horaires, avis" value="<?php echo esc_attr( get_search_query() ); ?>">
                <button type="submit">Rechercher</button>
            </div>
        </form>
    </header>

    <?php if ( have_posts() ) : ?>
        <div class="search-page__results">
            <?php
            while ( have_posts() ) :
                the_post();
                ?>
                <article class="search-result-card">
                    <span><?php echo esc_html( get_post_type_object( get_post_type() )->labels->singular_name ); ?></span>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 28 ) ); ?></p>
                    <a href="<?php the_permalink(); ?>">Ouvrir</a>
                </article>
                <?php
            endwhile;
            ?>
        </div>
    <?php else : ?>
        <div class="empty-state empty-state--search">
            <h2>Aucun résultat trouvé</h2>
            <p>Essayez avec un mot plus simple comme « fruits », « local », « contact » ou « avis ».</p>
            <a class="button button-primary" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Voir le blog</a>
        </div>
    <?php endif; ?>
</section>

<?php get_footer(); ?>
