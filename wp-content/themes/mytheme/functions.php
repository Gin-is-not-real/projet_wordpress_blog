<?php 
// namespace App;
// declarer un namespace pour eviter les collisions. on as rajouté App/ dans le second arg du hook:
//add_action('after_setup_theme', 'App/mytheme_supports');

function mytheme_supports() {
    add_theme_support('title-tag');
}

function mytheme_register_assets() {
    wp_enqueue_style('mytheme', '/wp-content/themes/mytheme/style.css');

    // wp_enqueue_script('mytheme', '/wp-content/themes/mytheme/script.js', [], false, true);
    //celui ci seras chargé dans le footer
}

function mytheme_wp_title() {
    $exp = explode('|', wp_get_document_title());
    return '<h1>' . $exp[0] . '</h1><p>' . $exp[1] . '</p>';

}
function mytheme_wp_subtitle() {
    $exp = explode('|', wp_get_document_title());
    return $exp[1];
}

function mytheme_title_separator() {
    return '|';
}

function mytheme_document_title_parts($title) {
    // var_dump($title); die(); 
    //return array(2) { ["title"]=> string(10) "Blog Promo" ["tagline"]=> string(27) "Un site utilisant WordPress" } 

    //on peut retourner la tagline et on return le tableau title
    // unset($title['tagline']);
    return $title;
}

// hook
add_action('after_setup_theme', 'mytheme_supports');
add_action('wp_enqueue_scripts', 'mytheme_register_assets');
add_filter('wp_title', 'mytheme_wp_title');
add_filter('document_title_separator', 'mytheme_title_separator');
add_filter('document_title_parts', 'mytheme_document_title_parts');

