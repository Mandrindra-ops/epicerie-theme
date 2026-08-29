</main>
<footer class="site-footer">
    <div class="site-footer__inner">
        <div class="footer-brand">
            <a class="site-brand site-brand--footer" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <span class="site-brand__mark" aria-hidden="true">
                    <svg viewBox="0 0 64 64" focusable="false">
                        <path d="M12 27h40l-5 22H17L12 27Z" />
                        <path d="M22 27c1-10 19-10 20 0" />
                        <path d="M21 35h22M24 42h16" />
                        <path class="site-brand__leaf" d="M24 19c-2-7 4-12 11-12 0 8-5 12-11 12Zm14 2c1-7 8-10 13-6-3 6-8 8-13 6Z" />
                        <path class="site-brand__carrot" d="M18 24c1-7 8-10 12-5l-8 10-4-5Z" />
                    </svg>
                </span>
                <span>
                    <span class="site-brand__name"><?php bloginfo( 'name' ); ?></span>
                    <span class="site-brand__tagline"><?php bloginfo( 'description' ); ?></span>
                </span>
            </a>
            <p>Votre épicerie locale à Antananarivo. Des produits simples, frais et proches du quartier.</p>
        </div>
        <div>
            <h2>Liens rapides</h2>
            <div class="site-footer__links">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Accueil</a>
                <a href="<?php echo esc_url( home_url( '/a-propos/' ) ); ?>">À propos</a>
                <a href="<?php echo esc_url( home_url( '/offre-produits/' ) ); ?>">Produits</a>
                <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">Blog</a>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a>
                <a href="<?php echo esc_url( home_url( '/avis-et-e-reputation/' ) ); ?>">Avis et réputation</a>
            </div>
        </div>
        <div>
            <h2>Contact</h2>
            <ul class="footer-contact">
                <li>+261 32 30 356 67</li>
                <li>+261 34 12 345 67</li>
                <li>Antananarivo, Madagascar</li>
                <li>contact@epicerieduquartier.mg</li>
            </ul>
        </div>
        <div>
            <h2>Nos produits</h2>
            <div class="site-footer__links">
                <a href="<?php echo esc_url( home_url( '/offre-produits/' ) ); ?>">Fruits et légumes</a>
                <a href="<?php echo esc_url( home_url( '/offre-produits/' ) ); ?>">Épicerie salée</a>
                <a href="<?php echo esc_url( home_url( '/offre-produits/' ) ); ?>">Boissons</a>
                <a href="<?php echo esc_url( home_url( '/offre-produits/' ) ); ?>">Produits d’entretien</a>
            </div>
        </div>
        <div>
            <h2>Suivez-nous</h2>
            <div class="site-footer__social">
                <a href="https://www.facebook.com/epicerieduquartier" aria-label="Facebook">f</a>
                <a href="https://www.instagram.com/epicerieduquartier" aria-label="Instagram">ig</a>
                <a href="https://wa.me/261341234567" aria-label="WhatsApp">wa</a>
            </div>
            <h2>Paiements acceptés</h2>
            <div class="payment-row" aria-label="Paiements acceptés">
                <span>MVola</span>
                <span>VISA</span>
                <span>MC</span>
            </div>
        </div>
    </div>
    <div class="site-footer__bar">
        <span>© Épicerie du Quartier. Tous droits réservés.</span>
        <span>
            <a href="<?php echo esc_url( home_url( '/mentions-legales/' ) ); ?>">Mentions légales</a>
            <a href="<?php echo esc_url( home_url( '/confidentialite/' ) ); ?>">Confidentialité</a>
        </span>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
