<?php
/**
 * The template for displaying post excerpts
 *
 * @version 1.0
 * @package Dynamico
 */
?>

<div class="entry-content entry-excerpt">
	*template_parts/blog/entry/entry-excerpt.php*
	<?php get_post_meta(get_the_ID(), 'github', true); ?>
	<?php the_excerpt(); ?>
	<br>
	<?php dynamico_more_link(); ?>

</div><!-- .entry-content -->
