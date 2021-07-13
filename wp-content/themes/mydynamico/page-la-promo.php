<?php 
/*
Template Name: Page Promo
*/
?>

<?php get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
-->mydynamico/page-la-promo.php 
<?php 
	echo '<br>the_ID: ';
	the_ID();
	echo '<br>post_class: ';
	post_class();
?>

	<?php dynamico_post_image_page(); ?>

	<header class="page-header entry-header">
		<?php the_title( '<h1 class="page-title entry-title">', '</h1>' ); ?>
	</header>

	<div class="entry-content">
	<?php 
		// le contenu defini dans wordpress
		the_content();
		// $query = new Wp_Query(array('author'));
		// if($query->have_posts()) {
		// 	echo '<ul>';
		// 	while($query->have_posts() ) {
		// 		$query->the_post();
		// 		// get the author ID
		// 		echo '<li>meta(ID): ' . get_the_author_meta('ID') . '</li>';
		// 		echo '<li>meta(description): ' . get_the_author_meta('description') . '</li>';
		// 		echo '<li>meta(user_description): ' . get_the_author_meta('user_description') . '</li>';
		// 		echo '<li>meta(user_email): ' . get_the_author_meta('user_email') . '</li>';
		// 		echo '<li>author: ' . get_the_author() . '</li>';
		// 		echo '<br>';
		// 	}
		// 	echo '</ul>';
		// } else {
		// 	//no posts found
		// }
		// /* Restore original Post Data */
		// wp_reset_postdata();

		//test vers table perso
		$mydb = new wpdb('admin', 'admin', 'wp2_bdd', 'localhost');
		$apprenants = $mydb->get_results("SELECT * FROM wp2_apprenants");

		foreach($apprenants as $apprenant) : 
			echo '<ul>';

				//$apprenant est un un objet stdClass. ces index sont les noms des colonnes 
				// print_r($apprenant);
				$id_author = $apprenant->id_author;
				$users = $mydb->get_results("SELECT display_name, user_login FROM wp2_users WHERE id=$id_author");
				// print_r($users);
				$login;
				foreach ($users as $user_obj) {
					echo '<li>' . $user_obj->display_name . '</li>';
					$login = $user_obj->user_login;
				}

				$img_src = '../img/' . $apprenant->photo;
				echo '<li><img src="' . $img_src .'"></li>';
				echo '<li>' . $apprenant->about . '</li>';

				//je passe l'id dans l'url
				// echo '<li><a href="../wp-content/themes/mydynamico/apprenant.php?id=' . $id_author . '">Voir plus</a></li>';
				// echo '<li><a href="../apprenant.php?id=' . $id_author . '">Voir plus</a></li>';
				echo '<li><a href="../apprenant/' . $login . '/">Voir plus</a></li>';
				
			echo '</ul>';

		endforeach;
		?>

	</div><!-- .entry-content -->

	<?php do_action( 'dynamico_after_pages' ); ?>

</article>

<?php get_footer(); ?>


