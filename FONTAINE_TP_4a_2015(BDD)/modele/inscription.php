<?php

	function inscrire($log, $mdp, $mail){
		include('../configuration.php');

		// Connexion
		try {
			$bdd = new PDO('mysql:host='.$serveur.';dbname='.$database, $login , $password);
		} catch (Exception $e) {
			die ('Erreur'.$e->getMessage());
		}
		// Requete
		$req = $bdd->prepare("INSERT INTO `forum`.`utilisateurs` (`mail`, `login`, `mdp`, `valide`) VALUES (?, ?, ?, ?)");
		$req->execute(array(htmlentities($mail), htmlentities($log), htmlentities($mdp), 0));
	}

	function recupUsers(){
		include('../configuration.php');

		// Connexion
		try {
			$bdd = new PDO('mysql:host='.$serveur.';dbname='.$database, $login , $password);
		} catch (Exception $e) {
			die ('Erreur'.$e->getMessage());
		}

		// Requete
		$req = $bdd->prepare("SELECT * FROM `sujets` WHERE titre=?");
		$req->execute(array(htmlentities($_GET['sujet'])));

		// Donnees
		$sujet = $req->fetchAll();

	}
	
	function isExist($log){
		include('../configuration.php');

		// Connexion
		try {
			$bdd = new PDO('mysql:host='.$serveur.';dbname='.$database, $login , $password);
		} catch (Exception $e) {
			die ('Erreur'.$e->getMessage());
		}

		// Requete
		$req = $bdd->prepare("SELECT `login` FROM `utilisateurs` WHERE login=?");
		$req->execute(array(htmlentities($log)));

		$res = $req->fetch(PDO::FETCH_BOTH);
		
		if (!empty($res)) {	
			return true;
		}
		else{
			return false;
		}
	}

 ?>
