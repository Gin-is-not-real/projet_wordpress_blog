<?php
/**
 * The template for displaying single posts with the featured image above the title
 *
 * @version 1.0
 * @package Dynamico
 */
?>
<!-- *template-parts\post\content-above-title.php* -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<header class="post-header entry-header">

		<?php the_title( '<h1 class="post-title entry-title">', '</h1>' ); ?>

		<?php mydynamico_entry_meta(); ?>

	</header><!-- .entry-header -->
	<?php dynamico_post_image_single(); ?>

	<?php get_template_part( 'template-parts/entry/entry', 'single' ); ?>

	<?php do_action( 'dynamico_after_posts' ); ?>
	<?php do_action( 'dynamico_author_bio' ); ?>

	<?php dynamico_entry_tags(); ?>
	<?php dynamico_entry_categories(); ?>

</article>
