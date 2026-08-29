<?php
function epicerie_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'epicerie-style', get_stylesheet_uri(), array( 'parent-style' ), '1.8' );
    wp_enqueue_script( 'epicerie-navigation', get_stylesheet_directory_uri() . '/assets/js/navigation.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'epicerie_theme_enqueue_styles' );

function epicerie_theme_setup() {
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo' );
    register_nav_menus(
        array(
            'primary' => 'Menu principal',
            'footer'  => 'Menu de pied de page',
        )
    );
}
add_action( 'after_setup_theme', 'epicerie_theme_setup' );

function epicerie_default_menu() {
    echo '<ul id="primary-menu" class="site-nav__menu">';
    echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">Accueil</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/a-propos/' ) ) . '">À propos</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/offre-produits/' ) ) . '">Produits</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/blog/' ) ) . '">Blog</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/contact/' ) ) . '">Contact</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/avis-et-e-reputation/' ) ) . '">Avis</a></li>';
    echo '</ul>';
}

function epicerie_author_display_name() {
    return '';
}

function epicerie_render_builder_content( $post_id ) {
    if ( class_exists( '\Elementor\Plugin' ) ) {
        echo \Elementor\Plugin::$instance->frontend->get_builder_content( $post_id, true ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        return;
    }

    the_content();
}

function epicerie_document_title_parts( $title ) {
    if ( is_search() ) {
        $query          = trim( get_search_query() );
        $title['title'] = $query ? 'Recherche : ' . $query : 'Recherche';
    }

    return $title;
}
add_filter( 'document_title_parts', 'epicerie_document_title_parts' );

function epicerie_search_title() {
    if ( is_search() ) {
        $query = trim( get_search_query() );
        return ( $query ? 'Recherche : ' . $query : 'Recherche' ) . ' - Épicerie du Quartier';
    }

    return null;
}

function epicerie_wpseo_title( $title ) {
    $search_title = epicerie_search_title();
    return $search_title ? $search_title : $title;
}
add_filter( 'wpseo_title', 'epicerie_wpseo_title' );

require_once get_stylesheet_directory() . '/inc/membre3-content.php';
