<?php include("../modele/index.php"); ?>

<?php
	if(!isset($_SESSION)) {
		session_start(); 
	}

	// Timeout
	if (isset($_SESSION['name'])) {
		if (time()-$_SESSION['lastAction'] > 5*60) {
			if (isset($_COOKIE['login']) && isset($_COOKIE['mdp'])) {
				// reconnexion - ne pas deconnecter si le login et mdp existe
				$res = mdp_hash($_COOKIE['login']);
				if (compareMDP($res[0]['mdp'],$_COOKIE['mdp'])) {
					$_SESSION['lastAction'] = time();
				}
			}else{
  				header("Location: deconnection.php");
			}
		}else{
			$_SESSION['lastAction'] = time(); // on relance
		}
	}

	header('Content-Type: text/html; charset=utf-8');
?>

<?php
	// Creer topic
	if (isset($_SESSION['name']) && isset($_POST['creationTopic']) && isset($_POST['titre']) && isset($_POST['message'])) {
		creerSujets($_POST['titre'], $_SESSION['name'], $_POST['message']);
	}
	// Charge topic
	$preview = recupDerniersPost();
	
?>

<?php include("../vue/index.php"); ?>