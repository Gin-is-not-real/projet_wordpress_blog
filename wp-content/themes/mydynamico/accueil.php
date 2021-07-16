<?php
/**
 * Template Name: Page Accueil

 * @version 1.0
 * @package Dynamico
 */

get_header();
?>

*accueil.php*

<?php
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/page/content', 'page' );

	get_template_part('slider-avis');

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile;

get_footer();
