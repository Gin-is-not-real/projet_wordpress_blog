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
    Pour l'affichage de nos CTP, wp cherchera ces templates dans l'ordre:
        -> single-{slug du ctp}.php  -> single.php -> un temp par default (index.php)
*/
function apprenant_register_post_types() {
    $labels = array(
        'name' => 'Apprenant',
        'all_items' => 'Tous les apprenants',  // affiché dans le sous menu
        'singular_name' => 'Apprenant',
        'add_new_item' => 'Ajouter un apprenant',
        'edit_item' => 'Modifier l\'apprenant',
        'menu_name' => 'Apprenants'
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

    $labels = array(
        'name' => 'Projet',
        'all_items' => 'Tous les projets',
        'singular name' => 'Projet',
        'add_new_item' => 'Modifier le projet',
        'menu_name' => 'Projets'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields'),
        'menu_position' => 6, 
        'menu_icon' => 'dashicons-welcome-widgets-menus',
    );
	register_post_type( 'projets', $args );
}
add_action( 'init', 'apprenant_register_post_types' ); // Le hook init lance la fonction


////////////////////////////////////////////////////////////////////////////
//AJOUTER TAXONOMIES
add_action( 'init', 'wpm_add_taxonomies', 0 );
//On crée une taxonomie personnalisée pour projets: Technos

function wpm_add_taxonomies() {
	// Taxonomie Technos
	// On déclare ici les différentes dénominations de notre taxonomie qui seront affichées et utilisées dans l'administration de WordPress
	$labels_technos = array(
		'name'              			=> _x( 'Technos', 'taxonomy general name'),
		'singular_name'     			=> _x( 'Techno', 'taxonomy singular name'),
		'search_items'      			=> __( 'Chercher une techno'),
		'all_items'        				=> __( 'Toutes les technos'),
		'edit_item'         			=> __( 'Editer la techno'),
		'update_item'       			=> __( 'Mettre à jour la techno'),
		'add_new_item'     				=> __( 'Ajouter une nouvelle techno'),
		'new_item_name'     			=> __( 'Valeur de la nouvelle techno'),
		'separate_items_with_commas'	=> __( 'Séparer les technos avec une virgule'),
		'menu_name'         => __( 'Technos'),
	);
	$args_technos = array(
	// Si 'hierarchical' est défini à false, notre taxonomie se comportera comme une étiquette standard
		'hierarchical'      => false,
		'labels'            => $labels_technos,
		'show_ui'           => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'technos' ),
	);
	register_taxonomy( 'technos', 'projets', $args_technos );

	
	// $labels_cat_serie = array(
	// 	'name'                       => _x( 'Catégories de série', 'taxonomy general name'),
	// 	'singular_name'              => _x( 'Catégories de série', 'taxonomy singular name'),
	// 	'search_items'               => __( 'Rechercher une catégorie'),
	// 	'popular_items'              => __( 'Catégories populaires'),
	// 	'all_items'                  => __( 'Toutes les catégories'),
	// 	'edit_item'                  => __( 'Editer une catégorie'),
	// 	'update_item'                => __( 'Mettre à jour une catégorie'),
	// 	'add_new_item'               => __( 'Ajouter une nouvelle catégorie'),
	// 	'new_item_name'              => __( 'Nom de la nouvelle catégorie'),
	// 	'add_or_remove_items'        => __( 'Ajouter ou supprimer une catégorie'),
	// 	'choose_from_most_used'      => __( 'Choisir parmi les catégories les plus utilisées'),
	// 	'not_found'                  => __( 'Pas de catégories trouvées'),
	// 	'menu_name'                  => __( 'Catégories de série'),
	// );
}


/*** ajouter la fonction pour dupliquer les posts sans plugin ***/
/* fonctionne malgrés les erreurs relevées par inteliphens	*/

function dupliquer_sans_plugin(){
    global $wpdb;
    if (! ( isset( $_GET['post']) || isset( $_POST['post']) || ( isset($_REQUEST['action']) && 'dupliquer_sans_plugin' == $_REQUEST['action'] ) ) ) {
        wp_die("Aucun post à dupliquer n'a été fourni...");
        check_admin_referer( 'duplicate-post_' . $post->ID ); // correction du 9 février 2017
    }
 
        // RECUPERE LES INFOS A DUPLIQUER
        $post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
        $post = get_post( $post_id );
        $current_user = wp_get_current_user();
        $new_post_author = $post->post_author; // correction du 9 février 2017

    if (isset( $post ) && $post != null) {
 
        // REGLAGES DU NOUVEAU BROUILLON
        $args = array(
        'comment_status' => $post->comment_status,
        'ping_status' => $post->ping_status,
        'post_author' => $new_post_author,
        'post_content' => $post->post_content,
        'post_excerpt' => $post->post_excerpt,
        'post_name' => $post->post_name,
        'post_parent' => $post->post_parent,
        'post_password' => $post->post_password,
        'post_status' => 'draft',
        'post_title' => $post->post_title,
        'post_type' => $post->post_type,
        'to_ping' => $post->to_ping,
        'menu_order' => $post->menu_order
        );
 
        $new_post_id = wp_insert_post( $args );
 
        $taxonomies = get_object_taxonomies($post->post_type);
        foreach ($taxonomies as $taxonomy) {
        $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
        wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
    }
        $post_meta_infos = get_post_meta( $post_id ); // correction du 9 février 2017
 
        wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
        exit;
        } else {
        wp_die("Une erreur s'est produite, impossible de trouver le post original : " . $post_id);
        }
    }
add_action( 'admin_action_dupliquer_sans_plugin', 'dupliquer_sans_plugin' );


function dupliquer_le_post( $actions, $post ) {
    if (current_user_can('edit_posts', $post->ID)) { // correction du 9 février 2017
         $url = wp_nonce_url( admin_url( 'admin.php?action=dupliquer_sans_plugin&amp;post=' . $post->ID ), 'duplicate-post_' . $post->ID ); // correction du 9 février 2017
         $actions['duplicate'] = '<a href="' . esc_url( $url ) . '" title="Dupliquer ce post" rel="permalink">Dupliquer</a>'; // correction du 9 février 2017
    }
    return $actions;
}
add_filter( 'post_row_actions', 'dupliquer_le_post', 10, 2 );
