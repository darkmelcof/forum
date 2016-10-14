<?php include("../modele/sujets.php"); ?>

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
	// Recuperation Variables
	$nomSujet = urldecode($_GET['sujet']);

	// Editer message - ADMIN
	if (isset($_SESSION['admin']) && isset($_POST['edition']) && isset($_POST['id'])) {
		$messageAEditer = recupMessage($_POST['id']);
		//print_r($messageAEditer);
	}

	// Supprimer message
	if (isset($_SESSION['admin']) && isset($_POST['suppression']) && isset($_POST['id'])) {
		supprimerMessage($_POST['id']);
		//print_r($messageAEditer);
	}

	// Edition d'un administrateur avant chargement des messages
	if (isset($_SESSION['admin']) && isset($_POST['messageAEditer']) && isset($_POST['idMessageEdite'])) {
		modifierMessage($_POST['idMessageEdite'], $_POST['message']);
	}
	// Nouveau message avant chargement message
	if (isset($_SESSION['name']) && isset($_POST['nouveauMessage'])) {
		ecrireMessage($nomSujet, $_SESSION['name'], $_POST['message']);
	}
	
	$sujet = afficherSujet($nomSujet);
	$titre = $sujet[0]['titre'];
		

	// Liste des messages
	$topic = array();

	// Complete la liste de message
	for ($i=0; $i < count($sujet); $i++) { 
		$message = $sujet[$i]['message'];
		$date = $sujet[$i]['date'];
		$auteur = $sujet[$i]['login'];
		$id_message = $sujet[$i]['id_message'];
		$photo = $sujet[$i]['photo'];
		$signature = $sujet[$i]['signature'];
		array_push($topic,array($auteur,$message,$date,$id_message,$photo, $signature));	
	}


	
	
?>

<?php include("../vue/sujets.php"); ?>