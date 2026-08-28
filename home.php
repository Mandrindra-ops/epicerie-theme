<?php get_header(); ?>

<section class="hero">
    <div class="hero__media">
        <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/imageAccueil.jpeg' ); ?>" alt="Rayons de l épicerie avec des produits du quotidien">
    </div>
    <div class="hero__content">
        <p class="eyebrow">Épicerie locale à Antananarivo</p>
        <h1>Des produits simples, frais et proches du quartier.</h1>
        <p>Épicerie du Quartier réunit les courses utiles du quotidien, des fruits et légumes de saison, et un accueil facile pour les familles, étudiants et voisins.</p>
        <div class="hero__actions">
            <a class="button button-primary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Nous contacter</a>
            <a class="button button-secondary" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Lire le blog</a>
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
            <span>01</span>
            <h3>Conseils d achat</h3>
            <p>Des articles simples pour acheter local et mieux choisir les produits frais.</p>
        </a>
        <a class="feature-card" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
            <span>02</span>
            <h3>Contact direct</h3>
            <p>Adresse, téléphone, WhatsApp et formulaire pour les demandes rapides.</p>
        </a>
        <a class="feature-card" href="<?php echo esc_url( home_url( '/avis-et-e-reputation/' ) ); ?>">
            <span>03</span>
            <h3>Avis clients</h3>
            <p>Preuve sociale, réponses préparées et présence sur les réseaux sociaux.</p>
        </a>
    </div>
</section>

<section class="section section-muted">
    <div class="section__heading">
        <p class="eyebrow">Blog</p>
        <h2>Articles récents</h2>
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
