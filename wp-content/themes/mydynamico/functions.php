<?php
/**
** activation theme
**/
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

/*
    la fonction pour enregistrer un nouveau type de post
*/
function apprenant_register_post_types() {
    $labels = array(
        'name' => 'Apprenant',
        'all_items' => 'Tous les apprenants',  // affiché dans le sous menu
        'singular_name' => 'Apprenant',
        'add_new_item' => 'Ajouter un apprenant',
        'edit_item' => 'Modifier l\'apprenant',
        'menu_name' => 'Apprenant'
    );

	$args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields'),
        'menu_position' => 5, 
        'menu_icon' => 'dashicons-businessman',
        // Pour aller chercher un PNG dans votre thème, utilisez la fonction get_template_directory_uri(), et enfin vous pouvez embarquer un SVG en le passant dans la fonction base64_encode() qui permet de transformer le code de l’image qui sera interprété directement en CSS (eh oui, CSS a pleins de possibilités souvent méconnues).
	);

	register_post_type( 'apprenant', $args );
}
add_action( 'init', 'apprenant_register_post_types' ); // Le hook init lance la fonction