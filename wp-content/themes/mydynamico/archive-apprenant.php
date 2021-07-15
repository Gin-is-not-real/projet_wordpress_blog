<?php
/**
 * Template Name: Archive apprenants
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @version 1.0
 * @package Dynamico
 */

get_header();

if ( have_posts() ) :
	?>
*wp-content\themes\mydynamico\archive-apprenant.php*

	<header class="page-header entry-header my-page-header">
		<h1 class="page-title entry-title">La Promo</h1>
	</header><!-- .entry-header -->

	<div id="post-wrapper" class="post-wrapper my-post-wrapper">

	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/blog/content', esc_html( dynamico_get_option( 'blog_layout' ) ) );

	endwhile;
	?>

	</div>

	<?php
	dynamico_pagination();

else :

	get_template_part( 'template-parts/page/content', 'none' );

endif;

get_footer();
