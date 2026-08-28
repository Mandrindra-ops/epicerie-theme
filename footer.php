</main>
<footer class="site-footer">
    <div class="site-footer__inner">
        <div>
            <strong><?php bloginfo( 'name' ); ?></strong>
            <p><?php bloginfo( 'description' ); ?></p>
        </div>
        <div class="site-footer__links">
            <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Blog</a>
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a>
            <a href="<?php echo esc_url( home_url( '/avis-et-e-reputation/' ) ); ?>">Avis</a>
        </div>
        <div class="site-footer__social">
            <a href="https://www.facebook.com/epicerieduquartier">Facebook</a>
            <a href="https://www.instagram.com/epicerieduquartier">Instagram</a>
            <a href="https://wa.me/261341234567">WhatsApp</a>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
