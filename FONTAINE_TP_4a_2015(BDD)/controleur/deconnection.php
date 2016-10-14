<?php include("../modele/deconnection.php"); ?>

<?php
	if(!isset($_SESSION)) {
		session_start();
	}
	header('Content-Type: text/html; charset=utf-8');
?>
<?php
	session_destroy();

	// Suppresion des cookies
	setcookie('mdp', NULL, -1);
	setcookie('login', NULL, -1);

	if (isset($_SESSION['lastAction'])) {
		if (time()-$_SESSION['lastAction'] > 5*60) {
			$message = 'Votre session a expiré !<br/><a href="connexion.php">Se connecter</a><br/><a href="index.php">Retour</a>';
		}else{
			$message = 'Vous vous êtes bien déconnecté, Aurevoir!<br/><a href="index.php">Retour</a>';
		}
	}
	else{
		$message =  '<a href="index.php">Retour</a>';
	}
	

	include('../vue/deconnection.php');

?>