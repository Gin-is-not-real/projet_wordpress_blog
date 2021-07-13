<?php
/**
 * The template for displaying the full content of a single post
 *
 * @version 1.0
 * @package Dynamico
 */
?>

<div class="entry-content">
	-->template-parts\entry\entry-single.php
	<br><hr>
	<?php 
		echo get_post_meta(get_the_ID(), 'about', true) .'<br>';
		wp_link_pages();
	?>


</div><!-- .entry-content -->
