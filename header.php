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
            <span class="site-brand__mark">EQ</span>
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
    </div>
</header>
<main id="content" class="site-main">
