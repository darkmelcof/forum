<?php include("../modele/espacePerso.php"); ?>

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
	
	$dirname = "../utilisateurs/".$_SESSION['name']."/";

	// Modification photo de profil
	if (isset($_POST['envoiePhoto']) && !empty($_POST['envoiePhoto']) && !empty($_FILES['image']['tmp_name'])) {
		list($width, $height, $type, $attr) = getimagesize($_FILES['image']['tmp_name']);
		if ($width >= 150 || $height >= 150 ) {
			$erreur = "Dimension de l'image trop importante. Recommendations 150x150 ou inférieure<br/>";
		}
		if (filesize($_FILES['image']['tmp_name']) >= 2000000) {
			$erreur = "Image trop volumineuse choisissez une image <2Mo<br/>"; 
		}
		if ((filesize($_FILES['image']['tmp_name']) < 2000000) && ($width < 150) && ($height < 150 )) {
			// Verification de l'existant
			if (file_exists($dirname.'picture.jpg')){
				// Deplace le fichier dans le repertoire et affiche cette image
				move_uploaded_file($_FILES['image']['tmp_name'], "../utilisateurs/".$_SESSION['name']."/picture.jpg");
				modifierInfos($_SESSION['name'], "photo", $dirname."picture.jpg");
			}else{
				mkdir($dirname);
				// Deplace le fichier dans le repertoire et affiche cette image
				move_uploaded_file($_FILES['image']['tmp_name'], "../utilisateurs/".$_SESSION['name']."/picture.jpg");
				modifierInfos($_SESSION['name'], "photo", $dirname."picture.jpg");
			}
			
		}
	}

	// Affichage photo de profil
	if (file_exists($dirname.'picture.jpg')){
		$PhotoDeProfil = true;
	}else{
		$PhotoDeProfil = false;
	}

	// Modification
	if (isset($_POST['corriger'])) {
		// Recuperation des valeurs a modifie
		foreach ($_POST as $post => $value) {
			if (!empty($value)) {
				$$post = $value;
				if ($post != 'mdp') {
					modifierInfos($_SESSION['name'], $post, $value);
				}
				else{
					modifierInfos($_SESSION['name'], $post, sha1($value));	
				}
			}		
		}
	}

	// Affichage
	if (isset($_SESSION['name'])) {
		$res = recupInfos($_SESSION['name']);
		
		$nom = $res[0]['nom'];
		$prenom = $res[0]['prenom'];
		$age = $res[0]['age'];
		$mail = $res[0]['mail'];
		$mail2 = $res[0]['mail2'];
		$signature = $res[0]['signature'];
		
		include('../vue/espacePerso.php');
	}else{
		echo "Vous n'êtes pas connecté";
	}
?>
