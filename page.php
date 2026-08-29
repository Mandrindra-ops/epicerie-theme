<?php get_header(); ?>

<?php
while ( have_posts() ) :
    the_post();
    $page_slug = get_post_field( 'post_name', get_the_ID() );

    if ( 'builder' === get_post_meta( get_the_ID(), '_elementor_edit_mode', true ) ) :
        ?>
        <article class="elementor-page-shell elementor-page-shell--<?php echo esc_attr( $page_slug ); ?>">
            <?php epicerie_render_builder_content( get_the_ID() ); ?>
        </article>
        <?php
        continue;
    endif;
    ?>
    <article class="page-shell page-shell--<?php echo esc_attr( $page_slug ); ?>">
        <header class="page-hero">
            <div>
                <p class="eyebrow">Épicerie du Quartier</p>
                <h1><?php the_title(); ?></h1>
                <?php if ( has_excerpt() ) : ?>
                    <p><?php echo esc_html( get_the_excerpt() ); ?></p>
                <?php endif; ?>
            </div>
            <aside class="page-hero__aside" aria-label="Informations rapides">
                <span>Ouvert lundi - samedi</span>
                <strong>7h30 - 19h00</strong>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Nous contacter</a>
            </aside>
        </header>
        <div class="content-wrap">
            <?php the_content(); ?>
        </div>
    </article>
<?php endwhile; ?>

<?php get_footer(); ?>
