<?php
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#content">Aller au contenu</a>
<header class="site-header">
    <div class="site-header__inner">
        <a class="site-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php bloginfo( 'name' ); ?>">
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
        <button class="nav-toggle" type="button" aria-controls="primary-menu" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <nav class="site-nav" aria-label="Menu principal">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'site-nav__menu',
                    'fallback_cb'    => 'epicerie_default_menu',
                )
            );
            ?>
        </nav>
        <div class="header-actions" aria-label="Actions rapides">
            <a class="header-icon" href="<?php echo esc_url( home_url( '/?s=' ) ); ?>" aria-label="Recherche">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <circle cx="11" cy="11" r="6"></circle>
                    <path d="m16 16 4 4"></path>
                </svg>
            </a>
            <a class="header-icon header-icon--cart" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" aria-label="Panier">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M6 6h15l-2 8H8L6 6Z"></path>
                    <path d="M6 6 5 3H2"></path>
                    <circle cx="9" cy="20" r="1.5"></circle>
                    <circle cx="18" cy="20" r="1.5"></circle>
                </svg>
                <span>0</span>
            </a>
        </div>
    </div>
</header>
<main id="content" class="site-main">
