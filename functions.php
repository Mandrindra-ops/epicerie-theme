<?php
function epicerie_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'epicerie-style', get_stylesheet_uri(), array( 'parent-style' ), '1.1' );
}
add_action( 'wp_enqueue_scripts', 'epicerie_theme_enqueue_styles' );

function epicerie_theme_setup() {
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    register_nav_menus(
        array(
            'primary' => 'Menu principal',
            'footer'  => 'Menu de pied de page',
        )
    );
}
add_action( 'after_setup_theme', 'epicerie_theme_setup' );

require_once get_stylesheet_directory() . '/inc/membre3-content.php';
