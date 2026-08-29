<?php get_header(); ?>

<section class="hero">
    <div class="hero__media">
        <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/hero-produits-frais.png' ); ?>" alt="Fruits et légumes frais présentés en cagettes">
    </div>
    <div class="hero__content">
        <span class="leaf leaf-one" aria-hidden="true"></span>
        <span class="leaf leaf-two" aria-hidden="true"></span>
        <p class="eyebrow">Épicerie locale à Antananarivo</p>
        <h1>Des produits simples, frais et proches du quartier.</h1>
        <p>Chaque jour, nous préparons une sélection de produits utiles, de fruits et légumes de saison et de petites trouvailles locales pour faciliter les courses du quartier.</p>
        <div class="hero__actions">
            <a class="button button-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 15a4 4 0 0 1-4 4H8l-5 3V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4Z"></path></svg>
                Nous contacter
            </a>
            <a class="button button-secondary" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 4h11a3 3 0 0 1 3 3v13H8a3 3 0 0 1-3-3Z"></path><path d="M8 8h7M8 12h6"></path></svg>
                Lire le blog
            </a>
        </div>
    </div>
</section>

<section class="section">
    <div class="section__heading">
        <p class="eyebrow">Pratique</p>
        <h2>Tout trouver rapidement</h2>
    </div>
    <div class="feature-grid">
        <a class="feature-card" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">
            <span class="feature-card__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24"><path d="M6 6h15l-2 8H8L6 6Z"></path><path d="M6 6 5 3H2"></path><circle cx="9" cy="20" r="1.5"></circle><circle cx="18" cy="20" r="1.5"></circle></svg>
            </span>
            <span class="feature-card__number">01</span>
            <h3>Conseils d’achat</h3>
            <p>Des repères clairs pour acheter local, choisir de bons produits et éviter le gaspillage.</p>
            <span class="feature-card__arrow">-></span>
        </a>
        <a class="feature-card" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
            <span class="feature-card__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24"><path d="M20 11.5a8 8 0 0 1-11.8 7L4 20l1.5-4.1A8 8 0 1 1 20 11.5Z"></path><path d="M9 9h.01M12 9h.01M15 9h.01"></path></svg>
            </span>
            <span class="feature-card__number">02</span>
            <h3>Contact direct</h3>
            <p>Une question, une commande ou un produit à réserver : toutes les informations sont au même endroit.</p>
            <span class="feature-card__arrow">-></span>
        </a>
        <a class="feature-card" href="<?php echo esc_url( home_url( '/avis-et-e-reputation/' ) ); ?>">
            <span class="feature-card__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24"><path d="M16 11a4 4 0 1 0-8 0"></path><path d="M4 21a8 8 0 0 1 16 0"></path><path d="M17 5h4M19 3v4"></path></svg>
            </span>
            <span class="feature-card__number">03</span>
            <h3>Avis clients</h3>
            <p>Les retours clients aident l’épicerie à garder un service sérieux, simple et proche des habitants.</p>
            <span class="feature-card__arrow">-></span>
        </a>
    </div>
</section>

<section class="section section-muted">
    <div class="section__heading section__heading-row">
        <div>
            <p class="eyebrow">Blog</p>
            <h2>Articles récents</h2>
        </div>
        <a class="button button-small" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Voir tous les articles -></a>
    </div>
    <div class="post-grid">
        <?php
        $latest_posts = new WP_Query(
            array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'post__not_in'   => array( 1 ),
            )
        );

        if ( $latest_posts->have_posts() ) :
            while ( $latest_posts->have_posts() ) :
                $latest_posts->the_post();
                get_template_part( 'template-parts/card', 'post' );
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
</section>

<?php get_footer(); ?>
