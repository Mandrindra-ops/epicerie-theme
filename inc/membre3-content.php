<?php
add_action( 'admin_init', 'epicerie_membre3_seed_content' );

function epicerie_membre3_seed_content() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    $version = '2026-08-28-7';

    if ( get_option( 'epicerie_membre3_seed_version' ) === $version ) {
        return;
    }

    update_option( 'blogname', 'Épicerie du Quartier' );
    update_option( 'blogdescription', 'Les bonnes choses du quotidien' );
    update_option( 'default_comment_status', 'open' );
    update_option( 'comment_moderation', '1' );
    update_option( 'date_format', 'j F Y' );
    update_option( 'time_format', 'H:i' );
    update_option( 'timezone_string', 'Indian/Antananarivo' );
    update_option( 'permalink_structure', '/%postname%/' );

    epicerie_membre3_disable_default_content();

    $category_news = epicerie_membre3_get_term_id( 'Actualités', 'category', 'actualites' );
    $category_tips = epicerie_membre3_get_term_id( 'Conseils', 'category', 'conseils' );

    $tags = array(
        'local'       => epicerie_membre3_get_term_id( 'Local', 'post_tag', 'local' ),
        'saison'      => epicerie_membre3_get_term_id( 'Produits de saison', 'post_tag', 'produits-de-saison' ),
        'producteurs' => epicerie_membre3_get_term_id( 'Producteurs', 'post_tag', 'producteurs' ),
        'fruits'      => epicerie_membre3_get_term_id( 'Fruits et légumes', 'post_tag', 'fruits-et-legumes' ),
        'quartier'    => epicerie_membre3_get_term_id( 'Vie du quartier', 'post_tag', 'vie-du-quartier' ),
    );

    $image_local   = epicerie_membre3_media_id( 'magasin_image.jpeg', 'Devanture de l’épicerie de quartier', 'Épicerie du Quartier' );
    $image_fruits  = epicerie_membre3_media_id( 'fruitetlegum.jpeg', 'Fruits et légumes frais rangés en cagettes', 'Fruits et légumes de saison' );
    $image_magasin = epicerie_membre3_media_id( 'imageAccueil.jpeg', 'Rayons simples avec des produits du quotidien', 'Rayons de l’épicerie' );

    $post_1 = epicerie_membre3_upsert_post(
        'post',
        'pourquoi-acheter-local',
        'Pourquoi acheter local ?',
        epicerie_membre3_article_local(),
        'Acheter local permet de trouver des produits plus frais, de soutenir les petits fournisseurs et de garder une vraie vie de quartier.',
        array(
            '_yoast_wpseo_title'    => 'Pourquoi acheter local ? - Épicerie du Quartier',
            '_yoast_wpseo_metadesc' => 'Pourquoi acheter local ? Fraîcheur, confiance, soutien aux fournisseurs et habitudes plus responsables au quotidien.',
            '_yoast_wpseo_focuskw'  => 'acheter local',
        ),
        array( $category_news, $category_tips ),
        array( $tags['local'], $tags['producteurs'], $tags['quartier'] ),
        $image_local
    );

    $post_2 = epicerie_membre3_upsert_post(
        'post',
        'comment-choisir-fruits-legumes',
        'Comment choisir ses fruits et légumes ?',
        epicerie_membre3_article_fruits(),
        'Saison, couleur, odeur, texture et conservation : les bons réflexes pour choisir des fruits et légumes avec confiance.',
        array(
            '_yoast_wpseo_title'    => 'Comment choisir ses fruits et légumes frais ?',
            '_yoast_wpseo_metadesc' => 'Conseils pratiques pour reconnaître des fruits et légumes frais, mûrs, adaptés à la saison et faciles à conserver.',
            '_yoast_wpseo_focuskw'  => 'choisir fruits et légumes',
        ),
        array( $category_tips ),
        array( $tags['fruits'], $tags['saison'], $tags['local'] ),
        $image_fruits
    );

    $post_3 = epicerie_membre3_upsert_post(
        'post',
        'journee-epicerie-du-quartier',
        'Une journée chez Épicerie du Quartier',
        epicerie_membre3_article_journee(),
        'Réception des produits, rangement, conseils aux clients et préparation du lendemain : les coulisses d’une épicerie locale.',
        array(
            '_yoast_wpseo_title'    => 'Une journée chez Épicerie du Quartier',
            '_yoast_wpseo_metadesc' => 'Découvrez les coulisses d’une journée dans une épicerie de quartier : arrivages, rangement, accueil et service.',
            '_yoast_wpseo_focuskw'  => 'épicerie de quartier',
        ),
        array( $category_news ),
        array( $tags['quartier'], $tags['local'], $tags['saison'] ),
        $image_magasin
    );

    $contact_form_id = epicerie_membre3_contact_form_id();

    $front_page = epicerie_membre3_upsert_post(
        'page',
        'accueil',
        'Accueil',
        '<p>Épicerie du Quartier accompagne les habitants avec des produits utiles, frais et faciles à trouver.</p>',
        'Produits frais, courses du quotidien et conseils pratiques à Antananarivo.',
        array(
            '_yoast_wpseo_title'    => 'Épicerie du Quartier - Produits frais à Antananarivo',
            '_yoast_wpseo_metadesc' => 'Épicerie locale à Antananarivo : produits frais, courses du quotidien, conseils pratiques et contact direct.',
            '_yoast_wpseo_focuskw'  => 'épicerie locale',
        )
    );

    $blog_page = epicerie_membre3_upsert_post(
        'page',
        'blog',
        'Blog',
        epicerie_membre3_blog_page_content(),
        'Conseils pratiques, achat local et coulisses de l’Épicerie du Quartier.',
        array(
            '_yoast_wpseo_title'    => 'Blog - Conseils et actualités de l’épicerie',
            '_yoast_wpseo_metadesc' => 'Retrouvez les articles de l’Épicerie du Quartier : achat local, choix des fruits et légumes, coulisses du magasin.',
            '_yoast_wpseo_focuskw'  => 'blog épicerie',
        )
    );

    $contact_page = epicerie_membre3_upsert_post(
        'page',
        'contact',
        'Contact',
        epicerie_membre3_contact_page_content( $contact_form_id ),
        'Adresse, téléphone, WhatsApp, horaires et formulaire pour joindre l’Épicerie du Quartier.',
        array(
            '_yoast_wpseo_title'    => 'Contact - Épicerie du Quartier à Antananarivo',
            '_yoast_wpseo_metadesc' => 'Contactez l’Épicerie du Quartier à Antananarivo : téléphone, WhatsApp, formulaire, horaires et adresse.',
            '_yoast_wpseo_focuskw'  => 'contact épicerie',
        )
    );

    $reviews_page = epicerie_membre3_upsert_post(
        'page',
        'avis-et-e-reputation',
        'Avis et e-réputation',
        epicerie_membre3_reviews_page_content(),
        'Avis clients, présence sur les réseaux sociaux et méthode simple pour suivre l’e-réputation du magasin.',
        array(
            '_yoast_wpseo_title'    => 'Avis clients et e-réputation - Épicerie du Quartier',
            '_yoast_wpseo_metadesc' => 'Avis clients, fiche Google Business Profile simulée, réseaux sociaux et modèles de réponse pour l’e-réputation.',
            '_yoast_wpseo_focuskw'  => 'avis épicerie',
        )
    );

    epicerie_membre3_upsert_post(
        'page',
        'mentions-legales',
        'Mentions légales',
        epicerie_membre3_legal_page_content(),
        'Informations légales de l’Épicerie du Quartier.',
        array(
            '_yoast_wpseo_title'    => 'Mentions légales - Épicerie du Quartier',
            '_yoast_wpseo_metadesc' => 'Informations légales, responsable du site et coordonnées de l’Épicerie du Quartier.',
            '_yoast_wpseo_focuskw'  => 'mentions légales épicerie',
        )
    );

    epicerie_membre3_upsert_post(
        'page',
        'confidentialite',
        'Confidentialité',
        epicerie_membre3_privacy_page_content(),
        'Utilisation simple des données envoyées via le formulaire de contact.',
        array(
            '_yoast_wpseo_title'    => 'Confidentialité - Épicerie du Quartier',
            '_yoast_wpseo_metadesc' => 'Politique de confidentialité simple pour les messages envoyés à l’Épicerie du Quartier.',
            '_yoast_wpseo_focuskw'  => 'confidentialité épicerie',
        )
    );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page );
    update_option( 'page_for_posts', $blog_page );

    epicerie_membre3_update_menu(
        array(
            'Accueil'             => 0,
            'Blog'                => $blog_page,
            'Contact'             => $contact_page,
            'Avis et réputation'  => $reviews_page,
        )
    );

    update_option( 'epicerie_membre3_seed_version', $version );
    flush_rewrite_rules();
}

function epicerie_membre3_get_term_id( $name, $taxonomy, $slug ) {
    $term = get_term_by( 'slug', $slug, $taxonomy );

    if ( $term ) {
        return (int) $term->term_id;
    }

    $created = wp_insert_term(
        $name,
        $taxonomy,
        array(
            'slug' => $slug,
        )
    );

    if ( is_wp_error( $created ) ) {
        $term = get_term_by( 'name', $name, $taxonomy );
        return $term ? (int) $term->term_id : 0;
    }

    return (int) $created['term_id'];
}

function epicerie_membre3_disable_default_content() {
    $sample_page = get_page_by_path( 'page-d-exemple', OBJECT, 'page' );

    if ( $sample_page && 'trash' !== $sample_page->post_status ) {
        wp_update_post(
            array(
                'ID'          => $sample_page->ID,
                'post_status' => 'draft',
            )
        );
    }

    $hello_post = get_page_by_path( 'bonjour-tout-le-monde', OBJECT, 'post' );

    if ( $hello_post && 'trash' !== $hello_post->post_status ) {
        wp_update_post(
            array(
                'ID'          => $hello_post->ID,
                'post_status' => 'draft',
            )
        );
    }
}

function epicerie_membre3_upsert_post( $post_type, $slug, $title, $content, $excerpt, $meta = array(), $categories = array(), $tags = array(), $thumbnail_id = 0 ) {
    $existing = get_page_by_path( $slug, OBJECT, $post_type );
    $author   = get_current_user_id() ? get_current_user_id() : 1;
    $data     = array(
        'post_author'    => $author,
        'post_content'   => $content,
        'post_excerpt'   => $excerpt,
        'post_name'      => $slug,
        'post_status'    => 'publish',
        'post_title'     => $title,
        'post_type'      => $post_type,
        'comment_status' => 'post' === $post_type ? 'open' : 'closed',
        'ping_status'    => 'closed',
    );

    if ( $existing ) {
        $data['ID'] = $existing->ID;
        $post_id    = wp_update_post( wp_slash( $data ), true );
    } else {
        $post_id = wp_insert_post( wp_slash( $data ), true );
    }

    if ( is_wp_error( $post_id ) ) {
        return 0;
    }

    foreach ( $meta as $key => $value ) {
        update_post_meta( $post_id, $key, $value );
    }

    if ( 'post' === $post_type ) {
        wp_set_post_terms( $post_id, array_filter( array_map( 'intval', $categories ) ), 'category' );
        wp_set_post_terms( $post_id, array_filter( array_map( 'intval', $tags ) ), 'post_tag' );
    }

    if ( $thumbnail_id ) {
        set_post_thumbnail( $post_id, $thumbnail_id );
    }

    return (int) $post_id;
}

function epicerie_membre3_media_id( $file, $alt, $title ) {
    $existing = get_posts(
        array(
            'fields'         => 'ids',
            'meta_key'       => '_epicerie_membre3_source_file',
            'meta_value'     => $file,
            'post_type'      => 'attachment',
            'posts_per_page' => 1,
        )
    );

    if ( ! empty( $existing ) ) {
        return (int) $existing[0];
    }

    $source = get_stylesheet_directory() . '/images/' . $file;

    if ( ! file_exists( $source ) ) {
        return 0;
    }

    $uploaded = wp_upload_bits( $file, null, file_get_contents( $source ) );

    if ( ! empty( $uploaded['error'] ) ) {
        return 0;
    }

    $filetype      = wp_check_filetype( $uploaded['file'] );
    $attachment_id = wp_insert_attachment(
        array(
            'guid'           => $uploaded['url'],
            'post_mime_type' => $filetype['type'],
            'post_title'     => $title,
            'post_content'   => '',
            'post_status'    => 'inherit',
        ),
        $uploaded['file']
    );

    if ( is_wp_error( $attachment_id ) ) {
        return 0;
    }

    require_once ABSPATH . 'wp-admin/includes/image.php';

    $metadata = wp_generate_attachment_metadata( $attachment_id, $uploaded['file'] );
    wp_update_attachment_metadata( $attachment_id, $metadata );
    update_post_meta( $attachment_id, '_wp_attachment_image_alt', $alt );
    update_post_meta( $attachment_id, '_epicerie_membre3_source_file', $file );

    return (int) $attachment_id;
}

function epicerie_membre3_contact_form_id() {
    $form = <<<FORM
<label>Votre nom
    [text* your-name autocomplete:name]
</label>

<label>Votre e-mail
    [email* your-email autocomplete:email]
</label>

<label>Votre téléphone
    [tel your-phone]
</label>

<label>Votre message
    [textarea* your-message]
</label>

[submit "Envoyer"]
FORM;

    $form_id = epicerie_membre3_upsert_post(
        'wpcf7_contact_form',
        'formulaire-de-contact',
        'Formulaire de contact',
        $form,
        '',
        array()
    );

    if ( $form_id ) {
        update_post_meta( $form_id, '_form', $form );
        update_post_meta(
            $form_id,
            '_mail',
            array(
                'active'     => true,
                'subject'    => 'Nouveau message depuis le site',
                'sender'     => '[your-name] <[your-email]>',
                'recipient'  => get_option( 'admin_email' ),
                'body'       => "Nom : [your-name]\nE-mail : [your-email]\nTéléphone : [your-phone]\n\nMessage :\n[your-message]",
                'additional_headers' => 'Reply-To: [your-email]',
                'attachments' => '',
                'use_html'    => false,
                'exclude_blank' => false,
            )
        );
        update_post_meta( $form_id, '_messages', array() );
        update_post_meta( $form_id, '_additional_settings', '' );
        update_post_meta( $form_id, '_locale', 'fr_FR' );
    }

    return $form_id;
}

function epicerie_membre3_blog_page_content() {
    return <<<HTML
<section class="epicerie-section epicerie-blog-intro">
    <h2>Nos articles</h2>
    <p>Le blog rassemble des conseils utiles pour mieux choisir ses produits, comprendre l’intérêt de l’achat local et découvrir les petites habitudes de l’épicerie.</p>
</section>

<section class="epicerie-grid epicerie-blog-links">
    <article>
        <h2>Pourquoi acheter local ?</h2>
        <p>Un article pour comprendre ce que gagnent les clients, les fournisseurs et le quartier quand les achats restent proches.</p>
        <a href="/epicerie/pourquoi-acheter-local/">Lire l’article</a>
    </article>
    <article>
        <h2>Comment choisir ses fruits et légumes ?</h2>
        <p>Un guide pratique pour reconnaître les bons produits grâce à la saison, la couleur, l’odeur, la texture et la conservation.</p>
        <a href="/epicerie/comment-choisir-fruits-legumes/">Lire l’article</a>
    </article>
    <article>
        <h2>Une journée chez Épicerie du Quartier</h2>
        <p>Un récit simple des coulisses, depuis l’arrivée des produits le matin jusqu’au rangement de fin de journée.</p>
        <a href="/epicerie/journee-epicerie-du-quartier/">Lire l’article</a>
    </article>
</section>
HTML;
}

function epicerie_membre3_contact_page_content( $form_id ) {
    $shortcode = $form_id ? '[contact-form-7 id="' . (int) $form_id . '" title="Formulaire de contact"]' : '';

    return <<<HTML
<section class="epicerie-section epicerie-contact">
    <h2>Nous joindre facilement</h2>
    <p>Pour connaître les arrivages, réserver un produit ou poser une question, vous pouvez passer au magasin, appeler ou envoyer un message.</p>
    <div class="epicerie-grid">
        <div>
            <h2>Coordonnées</h2>
            <p><strong>Adresse :</strong> Lot II M 45, Antananarivo 101, Madagascar</p>
            <p><strong>Téléphone :</strong> +261 34 12 345 67</p>
            <p><strong>Horaires :</strong> lundi au samedi, 7h30 à 19h00</p>
            <p><strong>Réseaux :</strong> <a href="https://www.facebook.com/epicerieduquartier">Facebook</a>, <a href="https://www.instagram.com/epicerieduquartier">Instagram</a>, <a href="https://wa.me/261341234567">WhatsApp</a></p>
        </div>
        <div class="epicerie-form">
            <h2>Formulaire</h2>
            {$shortcode}
        </div>
    </div>
    <div class="epicerie-map">
        <div>
            <h2>Carte</h2>
            <p>Le magasin se situe à Antananarivo 101. La carte permet de repérer le secteur avant de venir sur place.</p>
        </div>
        <iframe title="Carte Google Maps de l’Épicerie du Quartier" src="https://www.google.com/maps?q=Antananarivo%20101%20Madagascar&amp;output=embed" loading="lazy"></iframe>
    </div>
</section>
HTML;
}

function epicerie_membre3_reviews_page_content() {
    return <<<HTML
<section class="epicerie-section epicerie-reviews">
    <h2>Gestion des avis</h2>
    <p>Les avis clients permettent de suivre la qualité du service, de répondre avec respect et de montrer que l’épicerie reste attentive aux remarques du quartier.</p>

    <h2>Simulation Google Business Profile</h2>
    <ul>
        <li>Nom : Épicerie du Quartier</li>
        <li>Catégorie : Épicerie</li>
        <li>Adresse : Lot II M 45, Antananarivo 101</li>
        <li>Téléphone : +261 34 12 345 67</li>
        <li>Horaires : lundi au samedi, 7h30 à 19h00</li>
        <li>Description : Épicerie de proximité avec produits frais, boissons, produits de base, fruits et légumes de saison.</li>
    </ul>

    <h2>Réseaux sociaux</h2>
    <p>Facebook annonce les arrivages, les horaires spéciaux et les informations pratiques. Instagram montre les produits frais, les rayons et les coulisses. WhatsApp reste le canal le plus direct pour les petites commandes et les questions rapides.</p>

    <h2>Modèles de réponse aux avis</h2>
    <h3>Avis positif</h3>
    <p>Merci beaucoup pour votre avis. Nous sommes heureux que l’accueil et les produits vous aient plu. Votre retour nous encourage à garder une épicerie propre, pratique et agréable pour le quartier.</p>

    <h3>Avis mitigé</h3>
    <p>Merci pour votre remarque. Nous sommes désolés si votre passage n’a pas été entièrement satisfaisant. Nous allons vérifier le point signalé et faire le nécessaire pour mieux vous accueillir la prochaine fois.</p>

    <h3>Avis négatif</h3>
    <p>Bonjour, merci d’avoir pris le temps de nous écrire. Nous sommes désolés pour cette mauvaise expérience. Vous pouvez nous contacter directement au magasin ou par WhatsApp afin que nous comprenions la situation et trouvions une solution correcte.</p>

    <h2>Procédure de veille</h2>
    <p>Chaque semaine, le nom de l’épicerie est vérifié sur Google, Facebook et Instagram. Les messages WhatsApp sont consultés chaque jour. Les avis importants sont notés dans un tableau avec la date, le problème, la réponse donnée et l’action à faire.</p>
</section>
HTML;
}

function epicerie_membre3_legal_page_content() {
    return <<<HTML
<section class="epicerie-section">
    <h2>Responsable du site</h2>
    <p>Ce site présente l’activité fictive de l’Épicerie du Quartier dans le cadre d’un projet WordPress réalisé pour l’examen TN2.</p>
    <p><strong>Nom du site :</strong> Épicerie du Quartier</p>
    <p><strong>Adresse :</strong> Antananarivo 101, Madagascar</p>
    <p><strong>Contact :</strong> contact@epicerieduquartier.mg</p>

    <h2>Contenus</h2>
    <p>Les textes, pages et articles servent à présenter une épicerie locale, ses conseils pratiques, son formulaire de contact et sa gestion des avis clients.</p>
</section>
HTML;
}

function epicerie_membre3_privacy_page_content() {
    return <<<HTML
<section class="epicerie-section">
    <h2>Données envoyées par le formulaire</h2>
    <p>Les informations envoyées via la page Contact servent uniquement à répondre aux demandes des visiteurs : nom, adresse e-mail, téléphone et message.</p>

    <h2>Utilisation</h2>
    <p>Les données ne sont pas vendues et ne sont pas utilisées pour envoyer des messages publicitaires automatiques. Elles permettent seulement de traiter une question, une réservation ou une demande liée au magasin.</p>

    <h2>Demande de suppression</h2>
    <p>Un visiteur peut demander la suppression de son message en contactant l’épicerie à l’adresse contact@epicerieduquartier.mg.</p>
</section>
HTML;
}

function epicerie_membre3_article_local() {
    return <<<HTML
<h1>Pourquoi acheter local ?</h1>
<h2>Un achat utile pour le quartier</h2>
<p>Acheter local, ce n’est pas seulement une phrase qu’on répète parce qu’elle sonne bien. Pour une épicerie de quartier, c’est surtout une façon simple de garder un lien entre les clients, les commerçants et les personnes qui produisent ou livrent les marchandises. Quand un client choisit une petite épicerie près de chez lui, il ne fait pas juste une course rapide. Il participe aussi à la vie du quartier. L’argent circule plus près, les habitudes se créent, et le commerçant connaît mieux les vrais besoins des familles autour de lui.</p>
<h2>Des produits plus faciles à connaître</h2>
<p>Le premier avantage se voit souvent dans la fraîcheur. Un produit local a généralement moins voyagé. Il passe moins de temps dans les cartons, les camions ou les réserves. Pour les fruits, les légumes, les œufs ou certains produits artisanaux, cela peut vraiment changer le goût. Une tomate cueillie au bon moment n’a pas la même texture qu’une tomate qui a dû attendre longtemps avant d’arriver en rayon. Même quand le prix est un peu plus élevé, le client gagne souvent en qualité, parce que le produit est plus proche de son état naturel.</p>
<p>Il y a aussi la question de la confiance. Dans un grand magasin, on peut acheter vite, mais on ne sait pas toujours d’où viennent les produits ni qui les a choisis. Dans une épicerie de quartier, le client peut poser une question directement. Il peut demander si les bananes sont mûres, si les légumes tiennent encore deux jours, ou quel riz convient mieux pour un repas familial. Cette discussion peut paraître petite, mais elle rend l’achat plus humain. On se trompe moins, on gaspille moins et on apprend peu à peu à mieux choisir.</p>
<h2>Une relation simple avec les commerçants</h2>
<p>Acheter local aide aussi les petits producteurs et les fournisseurs proches. Quand l’épicerie travaille avec eux, elle peut adapter ses achats selon la saison et selon la demande réelle. Cela évite d’avoir trop de stock qui finit abîmé. Cela donne aussi une chance aux produits moins connus, par exemple une confiture faite dans la région, des légumes cultivés pas très loin ou des snacks préparés par une petite activité familiale. Le client découvre autre chose que les produits qu’il voit partout.</p>
<p>Pour le quartier, l’effet est concret. Une épicerie vivante rend la rue plus utile et plus fréquentée. Les personnes âgées peuvent acheter sans aller loin. Les parents peuvent faire une course rapide avant de rentrer. Les étudiants peuvent trouver de quoi manger sans perdre trop de temps. Cette proximité simplifie la journée. Elle crée aussi une petite sécurité, parce qu’il y a toujours un endroit ouvert où demander une information, acheter une bouteille d’eau ou trouver un produit de base.</p>
<p>Le local ne veut pas dire que tout doit venir de la même rue. Certains produits ne sont pas fabriqués dans la ville ou même dans le pays. Mais l’idée est de choisir local quand c’est possible et logique. Pour le reste, l’épicerie peut garder des produits utiles du quotidien. Le plus important est d’expliquer les choix. Quand un produit local est disponible, on le met en avant. Quand il ne l’est pas, on propose une alternative simple et honnête. Le client comprend mieux et il revient plus facilement.</p>
<p>Il ne faut pas oublier l’environnement. Moins de distance peut vouloir dire moins de transport, moins d’emballage inutile et moins de perte. Ce n’est pas magique, mais c’est déjà un geste. Si chacun achète une partie de ses courses localement, cela peut réduire les déchets et encourager des habitudes plus raisonnables. On peut aussi apporter son sac, choisir seulement la quantité nécessaire et demander conseil pour conserver les produits plus longtemps.</p>
<p>Finalement, acheter local donne une valeur différente aux courses. On ne vient pas seulement prendre un paquet et partir. On connaît le visage de la personne qui vend, on reconnaît les produits de saison, on voit les nouveautés et on peut dire ce qu’on aimerait trouver la prochaine fois. Pour Épicerie du Quartier, c’est cette relation qui compte. Un commerce de proximité reste fort quand les clients sentent qu’ils sont écoutés. C’est pour cela qu’acheter local reste une bonne habitude, simple, utile et accessible.</p>
<p>Pour continuer la lecture, vous pouvez aussi consulter notre article sur le choix des fruits et légumes ou passer par la page contact pour demander les arrivages de la semaine.</p>
HTML;
}

function epicerie_membre3_article_fruits() {
    return <<<HTML
<h1>Comment choisir ses fruits et légumes ?</h1>
<h2>Commencer par la saison</h2>
<p>Choisir ses fruits et légumes peut sembler facile, mais on se trompe vite quand on est pressé. On prend parfois le plus gros fruit, la tomate la plus rouge ou le légume le plus brillant, puis on découvre à la maison que le goût n’est pas là. À l’épicerie, le choix se fait avec plusieurs petits repères. Il faut regarder, toucher doucement, sentir quand c’est possible et surtout tenir compte de ce qu’on veut préparer. Un produit parfait pour aujourd’hui n’est pas toujours le même qu’un produit à garder trois jours.</p>
<p>Le premier conseil est de respecter la saison. Les fruits et légumes de saison ont souvent plus de goût, parce qu’ils arrivent au bon moment. Ils sont aussi parfois moins chers, car ils sont plus disponibles. Quand les mangues, les tomates, les brèdes, les carottes ou les courgettes sont en pleine saison, on remarque vite la différence. La couleur est plus naturelle, la texture est meilleure et le produit demande moins d’effort pour être bon dans l’assiette. Demander au commerçant ce qui est de saison reste donc une bonne habitude.</p>
<h2>Observer sans abîmer</h2>
<p>La couleur donne des indices, mais elle ne dit pas tout. Un fruit très coloré peut être joli sans être mûr. Un légume un peu irrégulier peut être très bon. Pour les tomates, par exemple, il faut chercher une peau lisse, une couleur régulière et une chair ferme sans être dure. Pour les bananes, tout dépend de l’usage. Si on veut les manger tout de suite, quelques petites taches peuvent être normales. Si on veut les garder, il vaut mieux prendre un régime encore un peu ferme. Pour les légumes feuilles, on regarde surtout la fraîcheur des feuilles et l’absence de parties trop molles.</p>
<p>Le toucher doit rester délicat. On ne presse pas tous les fruits comme si on voulait les tester de force. Cela les abîme pour les autres clients. On peut tenir le produit dans la main et sentir s’il est trop mou, trop léger ou au contraire bien ferme. Une orange lourde pour sa taille contient souvent plus de jus. Une pomme trop molle a peut-être déjà perdu son croquant. Une courgette fraîche est ferme, avec une peau nette. Ces détails deviennent faciles avec l’habitude.</p>
<h2>Choisir selon le repas prévu</h2>
<p>L’odeur est aussi utile. Certains fruits mûrs dégagent un parfum agréable, surtout près de la tige. Si l’odeur est trop forte ou un peu fermentée, le fruit est peut-être déjà trop avancé. Pour les légumes, l’odeur doit rester fraîche. Une mauvaise odeur annonce souvent un début de pourriture, même si l’extérieur paraît encore correct. À l’épicerie, on peut demander si un fruit est prêt pour aujourd’hui ou s’il vaut mieux attendre demain. C’est plus simple que de deviner seul.</p>
<p>Il faut aussi choisir selon la recette. Pour une salade, on cherche des produits croquants, frais et jolis à couper. Pour une sauce, une tomate un peu très mûre peut être parfaite. Pour une soupe, certains légumes moins réguliers conviennent très bien. Pour un dessert, il faut souvent un fruit plus mûr et plus parfumé. Cette manière de choisir évite le gaspillage. On n’achète pas seulement le plus beau produit, on achète le bon produit pour le bon usage.</p>
<p>Le stockage compte presque autant que le choix. Certains fruits continuent de mûrir à la maison. D’autres s’abîment vite s’ils restent au soleil ou dans un sac fermé. Il vaut mieux séparer les produits fragiles, éviter d’écraser les tomates, laver les feuilles seulement avant de les utiliser et garder les pommes de terre dans un endroit sec et sombre. Beaucoup de pertes viennent d’une mauvaise conservation, pas seulement d’un mauvais achat.</p>
<p>Enfin, il ne faut pas avoir honte de poser des questions. Une épicerie de quartier existe aussi pour conseiller. On peut demander quels fruits sont doux, quels légumes viennent d’arriver, lesquels se gardent bien ou lesquels sont meilleurs cuits. Avec le temps, le client connaît mieux les produits et achète avec plus de confiance. Pour Épicerie du Quartier, le bon choix n’est pas forcément le plus cher. C’est celui qui correspond au repas, au budget et au moment où le produit sera mangé.</p>
<p>Si vous voulez prolonger ce sujet, l’article sur l’achat local explique pourquoi les produits de proximité peuvent être plus frais et plus faciles à connaître.</p>
HTML;
}

function epicerie_membre3_article_journee() {
    return <<<HTML
<h1>Une journée chez Épicerie du Quartier</h1>
<h2>Préparer le magasin avant l’ouverture</h2>
<p>Une journée dans une épicerie de quartier commence souvent avant l’arrivée des premiers clients. Quand la rue est encore calme, il faut déjà ouvrir, vérifier les rayons, nettoyer l’entrée et regarder ce qui manque. Ce moment du matin donne le ton de toute la journée. Si les produits sont bien rangés, si les prix sont visibles et si les fruits abîmés sont retirés, les clients entrent plus facilement. Ils sentent que le magasin est suivi et qu’ils peuvent acheter sans trop hésiter.</p>
<p>La première tâche importante est la réception des produits. Les cartons arrivent parfois tôt, parfois avec un peu de retard. Il faut contrôler rapidement les quantités, regarder l’état des fruits et légumes, séparer ce qui doit aller en rayon et ce qui doit rester en réserve. Quand un produit est fragile, comme les tomates ou les feuilles vertes, il faut le manipuler doucement. Un petit choc peut suffire à l’abîmer. Cette étape n’est pas spectaculaire, mais elle change beaucoup la qualité visible dans le magasin.</p>
<h2>Garder des rayons clairs</h2>
<p>Ensuite vient le rangement. Les produits du quotidien doivent être faciles à trouver : riz, huile, sucre, savon, biscuits, boissons, conserves et produits frais. Un client pressé ne veut pas chercher longtemps. Il faut donc garder une logique simple. Les produits souvent achetés ensemble restent proches quand c’est possible. Les nouveautés sont placées dans un endroit visible. Les prix doivent être lisibles, car beaucoup de clients comparent avant de choisir. Même dans une petite épicerie, l’organisation compte.</p>
<p>Au fil de la matinée, les clients arrivent avec des besoins différents. Certaines personnes viennent pour acheter le pain, d’autres pour compléter le repas du midi, d’autres seulement pour demander si un produit est disponible. Le rôle du commerçant est de répondre sans compliquer les choses. Il faut dire clairement si un article est en rupture, proposer une alternative si elle existe et éviter de pousser le client vers un achat inutile. Cette honnêteté paraît simple, mais elle construit la confiance.</p>
<h2>Écouter les habitudes des clients</h2>
<p>Vers midi, le rythme change. Les achats deviennent plus rapides. On cherche une boisson fraîche, un ingrédient oublié ou quelque chose à grignoter. Il faut garder le comptoir dégagé et continuer à vérifier les rayons, parce que les petits désordres arrivent vite. Un paquet mal placé, un carton vide ou une étiquette tombée donnent une impression de négligence. Dans un commerce de proximité, le client voit tout. Il revient plus facilement quand le lieu reste propre et pratique.</p>
<p>L’après-midi sert souvent à préparer la suite. On note les produits qui partent vite, ceux qui restent trop longtemps et les demandes qui reviennent. Si plusieurs clients demandent la même marque ou le même légume, cela donne une idée pour la prochaine commande. L’épicerie n’est pas seulement un lieu de vente. C’est aussi un endroit où l’on écoute les habitudes du quartier. Les familles, les étudiants et les travailleurs n’achètent pas toujours les mêmes choses, donc il faut ajuster petit à petit.</p>
<p>Les réseaux sociaux peuvent aussi être utilisés pendant une pause. Une photo simple des fruits du jour, une annonce d’horaires ou un message sur WhatsApp peuvent aider les clients. Il n’y a pas besoin de publier tout le temps. Le plus important est de rester utile : dire ce qui est disponible, répondre aux messages et éviter les publications qui ne servent à rien. Pour une petite épicerie, une communication claire vaut mieux qu’une page remplie mais jamais mise à jour.</p>
<p>En fin de journée, on fait le point. Les produits frais sont vérifiés, les rayons sont remis en ordre et les articles fragiles sont protégés. On regarde aussi les remarques des clients. Si quelqu’un s’est plaint d’un prix mal indiqué ou d’un produit manquant, il faut corriger rapidement. La journée se termine rarement de façon parfaite, mais chaque correction améliore le lendemain. C’est comme cela qu’une épicerie de quartier garde sa place : avec des gestes simples, répétés tous les jours.</p>
<p>Chez Épicerie du Quartier, les coulisses ne sont pas luxueuses. Elles sont faites de rangement, de discussions, de vérification et de petits services. C’est justement ce qui rend le commerce proche des clients. On sait qui vient souvent, on remarque ce qui manque et on essaie de faire mieux avec les moyens disponibles. Pour voir les informations pratiques, vous pouvez visiter la page contact ou consulter les avis clients.</p>
HTML;
}

function epicerie_membre3_update_menu( $items ) {
    $menu_name = 'Menu principal';
    $menu      = wp_get_nav_menu_object( $menu_name );

    if ( ! $menu ) {
        $menu_id = wp_create_nav_menu( $menu_name );
    } else {
        $menu_id = $menu->term_id;
    }

    if ( is_wp_error( $menu_id ) ) {
        return;
    }

    $existing_items = wp_get_nav_menu_items( $menu_id );
    $existing_ids   = array();

    if ( $existing_items ) {
        foreach ( $existing_items as $item ) {
            $existing_ids[] = (int) $item->object_id;
        }
    }

    foreach ( $items as $label => $post_id ) {
        if ( 'Accueil' === $label ) {
            $has_home = false;

            if ( $existing_items ) {
                foreach ( $existing_items as $item ) {
                    if ( 'custom' === $item->type && untrailingslashit( $item->url ) === untrailingslashit( home_url( '/' ) ) ) {
                        $has_home = true;
                        break;
                    }
                }
            }

            if ( ! $has_home ) {
                wp_update_nav_menu_item(
                    $menu_id,
                    0,
                    array(
                        'menu-item-title'  => $label,
                        'menu-item-url'    => home_url( '/' ),
                        'menu-item-type'   => 'custom',
                        'menu-item-status' => 'publish',
                    )
                );
            }

            continue;
        }

        if ( ! $post_id || in_array( (int) $post_id, $existing_ids, true ) ) {
            continue;
        }

        wp_update_nav_menu_item(
            $menu_id,
            0,
            array(
                'menu-item-title'     => $label,
                'menu-item-object'    => 'page',
                'menu-item-object-id' => $post_id,
                'menu-item-type'      => 'post_type',
                'menu-item-status'    => 'publish',
            )
        );
    }

    $ordered_items = wp_get_nav_menu_items( $menu_id );
    $position      = 1;

    foreach ( $items as $label => $post_id ) {
        if ( ! $ordered_items ) {
            break;
        }

        foreach ( $ordered_items as $item ) {
            $is_home = 'Accueil' === $label && 'custom' === $item->type && untrailingslashit( $item->url ) === untrailingslashit( home_url( '/' ) );
            $is_page = 'Accueil' !== $label && (int) $item->object_id === (int) $post_id;

            if ( $is_home || $is_page ) {
                wp_update_post(
                    array(
                        'ID'         => $item->ID,
                        'menu_order' => $position,
                    )
                );
                $position++;
                break;
            }
        }
    }

    $locations = get_theme_mod( 'nav_menu_locations', array() );

    if ( empty( $locations['primary'] ) ) {
        $locations['primary'] = $menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
    }
}
