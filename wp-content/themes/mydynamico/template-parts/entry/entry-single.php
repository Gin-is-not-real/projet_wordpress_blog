<?php
/**
 * The template for displaying the full content of a single post
 *
 * @version 1.0
 * @package Dynamico
 */
?>

<div class="entry-content">
	
	-->wp-content\themes\mydynamico\template-parts\entry\entry-single.php

	<!-- loop for query informations of the wp bdd -->
	<?php 
		// $query = new Wp_Query(array('author'));
		// if($query->have_posts()) {
		// 	echo '<ul>';
		// 	while($query->have_posts() ) {
		// 		$query->the_post();

		// 		// get the author ID
		// 		echo '<li>get_the_author_meta(): -> the author ID: ' . get_the_author_meta('ID') . '</li>';
		// 		echo '<li>get_the_author(): ' . get_the_author() . '</li>';
		// 		echo '<li>get_the_title(): ' . get_the_title() . '</li>';
		// 		// echo '<li>' . get_the_content() . '</li>';
		// 		echo '<br>';
		// 	}
		// 	echo '</ul>';
		// } else {
		// 	//no posts found
		// }
		// /* Restore original Post Data */
		// wp_reset_postdata();

		the_content();
		wp_link_pages();
	?>


</div><!-- .entry-content -->
