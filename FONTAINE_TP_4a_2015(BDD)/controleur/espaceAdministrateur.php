<?php include("../modele/espaceAdministrateur.php"); ?>

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
	
	// Traite les ajoute - modification - suppression
	foreach ($_POST as $post => $value) {
		switch ($post) {
			case 'action':
				if ($value == "ajouter") {
					validerCompte($_POST['user']);
				}
				elseif ($value == "supprimer") {
					supprimerCompte($_POST['user']);
				}
				elseif ($value == "modifier") {
					$res = recupInfos($_POST['user']);
					$nom = $res[0]['nom'];
					$prenom = $res[0]['prenom'];
					$age = $res[0]['age'];
					$mail = $res[0]['mail'];
					$mail2 = $res[0]['mail2'];
					$signature = $res[0]['signature'];
				}
				break;
			case 'modifier':
				$res = recupInfos($_POST['modifier']);
				$nom = $res[0]['nom'];
				$prenom = $res[0]['prenom'];
				$age = $res[0]['age'];
				$mail = $res[0]['mail'];
				$mail2 = $res[0]['mail2'];
				$signature = $res[0]['signature'];
				break;
			case 'ajouter':
				validerCompte($value);
				break;
			case 'supprimer':
				supprimerCompte($_POST['user']);
				break;
			case 'corriger':
				// Recuperation des valeurs a modifie
				foreach ($_POST as $key => $value) {
					if (!empty($value) && $key !='corriger') {
						$$key = $value;
						if ($key != 'mdp') {
							modifierInfos($_POST['user'], $key, $value);
						}
						else{
							modifierInfos($_POST['user'], $key, sha1($value));	
						}
					}		
				}
				// Envoie de mail
				error_reporting(0);// Enleve warnings pour adresse fake
				notification($_POST['mail']);
				error_reporting(1);
				break;
			case 'root':
				if(isRoot(sha1($_POST['root']))){
					$_SESSION['root']="Oui";
				}
				break;
			case 'stopRoot':
				unset($_SESSION['root']);
				break;
			default:
				# code...
				break;
		}
		if ($value == "x") {
			# code...
		}
		//echo $post;
		//echo $value;
	}

	// Gere l affichage
	if (isset($_SESSION['admin'])) {
	 	$liste = recupUtilisateurs();

	 	// Liste de personnes a ajouter
		$aValider = array();
		$valide = array();
		foreach ($liste as $key => $value) {
			if (($value[0] != $_SESSION['name']) && ($value[1] == 0)) {
				array_push($aValider, $value[0]);
			}else{
				// Valide utilisateurs
				if ($value[0] != $_SESSION['name'] && $value[2] != 1) {
					array_push($valide, $value[0]);
				}
			}
		}
		// Liste des administrateurs
		if (isset($_SESSION['root'])) {
			$admins = recupAdministrateurs($_SESSION['name']);
			//print_r($admins);
		}

		include('../vue/espaceAdministrateur.php');
	}
	else{
		echo "Veuillez vous connecter pour accéder à cette page<br/>";
		echo '<a href="index.php">Retour</a>';
	}
	

?>