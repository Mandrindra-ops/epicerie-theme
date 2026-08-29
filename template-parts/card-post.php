<article class="post-card">
    <a class="post-card__image" href="<?php the_permalink(); ?>">
        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'medium_large', array( 'loading' => 'eager', 'decoding' => 'sync' ) ); ?>
        <?php else : ?>
            <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/fruitetlegum.jpeg' ); ?>" alt="">
        <?php endif; ?>
    </a>
    <div class="post-card__body">
        <div class="post-card__meta">
            <span><?php echo esc_html( epicerie_author_display_name() ); ?></span>
            <span><?php echo esc_html( wp_strip_all_tags( get_the_category_list( ', ' ) ) ); ?></span>
        </div>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 24 ) ); ?></p>
        <a class="post-card__link" href="<?php the_permalink(); ?>">Lire l’article</a>
    </div>
</article>
