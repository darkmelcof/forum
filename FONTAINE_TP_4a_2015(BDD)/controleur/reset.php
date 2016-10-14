<?php include("../modele/reset.php"); ?>

<?php 
	if(!isset($_SESSION)) {
		session_start(); 
	}

	header('Content-Type: text/html; charset=utf-8');
?>

<?php 

	// Mot de passe reinitialisé
	if ((isset($_POST['reset'])) &&
	 (!empty($_POST['login'])) &&
	 (!empty($_POST['mail']))){

		 if (is_match($_POST['login'], $_POST['mail'])) {

		 	$mdpReinitialise = true;	 		
			
			resetMDP($_POST['login'], $_POST['mail']);
			
	 	}else{
	 		$mdpReinitialise = false;
		}
	}
	
	include('../vue/reset.php');
		

?>