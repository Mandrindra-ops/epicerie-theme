<?php get_header(); ?>

<section class="page-shell not-found-page">
    <header class="page-hero">
        <div>
            <p class="eyebrow">Page introuvable</p>
            <h1>Cette page n’est plus en rayon.</h1>
            <p>Le lien demandé ne mène à aucune page disponible. Vous pouvez revenir à l’accueil, parcourir les produits ou lancer une recherche.</p>
        </div>
        <form role="search" method="get" class="search-panel" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <label for="not-found-search">Rechercher sur le site</label>
            <div class="search-panel__row">
                <input id="not-found-search" type="search" name="s" placeholder="Ex : fruits, contact, avis">
                <button type="submit">Rechercher</button>
            </div>
        </form>
    </header>

    <div class="not-found-actions">
        <a class="button button-primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">Retour à l’accueil</a>
        <a class="button button-secondary" href="<?php echo esc_url( home_url( '/offre-produits/' ) ); ?>">Voir les produits</a>
        <a class="button button-secondary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Nous contacter</a>
    </div>
</section>

<?php get_footer(); ?>
