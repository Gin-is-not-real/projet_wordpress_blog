<?php
/*
	
*/
if(isset($_GET['id'])) {
	echo $_GET['id'];
	$id = $_GET['id'];
	$mydb = new wpdb('admin', 'admin', 'wp2_bdd', 'localhost');
	$user = $mydb->get_results("SELECT * FROM wp2_apprenants WHERE id_apprenant=$id");
	
}


