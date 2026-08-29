<?php
function epicerie_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'epicerie-child-style', get_stylesheet_uri(), array( 'parent-style' ), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'epicerie_theme_enqueue_styles' );

function epicerie_render_products_section() {
    $products = array(
        array(
            'name' => 'Vanille de Sambava',
            'badge' => 'Qualité Export',
            'price' => '25 000 Ar / 100g',
            'description' => 'Cultivée à Sambava, cette vanille parfumée garde l\'authenticité des terroirs malgaches, riche, généreuse, et reconnue.',
        ),
        array(
            'name' => 'Miel sauvage de Vatovavy',
            'badge' => 'Artisanal',
            'price' => '15 000 Ar / pot',
            'description' => 'Produit localement, ce miel sauvage évoque la flore de Vatovavy, avec douceur profonde et authentique.',
        ),
        array(
            'name' => 'Riz Makalioka de Alaotra',
            'badge' => 'Produit Local',
            'price' => '3 200 Ar / kg',
            'description' => 'Cultivé dans les rizières d\'Alaotra, ce riz aux grains offre saveur, texture et terroir malgache.',
        ),
    );

    $output = '<section class="epicerie-products-section"><div class="epicerie-products-inner"><div class="epicerie-products-header"><p class="epicerie-products-kicker">Produits de saison</p><h2>Nos produits de terroir</h2></div><div class="epicerie-products-grid">';

    foreach ( $products as $product ) {
        $output .= '<article class="epicerie-product-card">';
        $output .= '<span class="epicerie-product-badge">' . esc_html( $product['badge'] ) . '</span>';
        $output .= '<h3>' . esc_html( $product['name'] ) . '</h3>';
        $output .= '<p class="epicerie-product-description">' . esc_html( $product['description'] ) . '</p>';
        $output .= '<div class="epicerie-product-footer"><span class="epicerie-product-price">' . esc_html( $product['price'] ) . '</span><a href="#" class="epicerie-product-button">Commander</a></div>';
        $output .= '</article>';
    }

    $output .= '</div></div></section>';
    return $output;
}
add_shortcode( 'epicerie_produits', 'epicerie_render_products_section' );
