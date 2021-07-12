<?php
/**
 * The template for displaying single-projets posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @version 1.1
 * @package Dynamico
 */

get_header();
?>
-->wp-content\themes\mydynamico\single-projets.php
<?php
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/post/content', esc_html( dynamico_get_option( 'post_layout' ) ) );

	the_terms($post->ID, 'technos', 'Technos: ');

	dynamico_post_navigation();

	dynamico_related_posts();

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile;

get_footer();
