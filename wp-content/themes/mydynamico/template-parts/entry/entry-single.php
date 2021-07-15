<?php
/**
 * The template for displaying the full content of a single post
 *
 * @version 1.0
 * @package Dynamico
 */
?>

<div class="entry-content">
	*template-parts\entry\entry-single.php*
	<hr>
	<?php 
		//affiche la metadonnée 'about' (la valeur du champ perso dans l'editeur wp)
		echo '<h3>A propos</h3>';
		echo get_post_meta(get_the_ID(), 'about', true) .'<br>';
		echo '<hr>';
		
		//recupere le slug pour avoir le nom de l'apprenant
		// echo basename(get_permalink());

		//je recupere l'apprenant_id du CTP apprenant
		$user_id = get_post_meta(get_the_ID(), 'apprenant_id', true);
		mydynamico_display_projects($user_id);

		//liens vers next/prev
		wp_link_pages();
	?>


</div><!-- .entry-content -->