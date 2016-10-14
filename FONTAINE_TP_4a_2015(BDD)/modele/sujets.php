<?php 

	function recupMessage($id){
		include('../configuration.php');

		// Connexion
		try {
			$bdd = new PDO('mysql:host='.$serveur.';dbname='.$database, $login , $password);
		} catch (Exception $e) {
			die ('Erreur'.$e->getMessage());
		}

		// Requete
		$req = $bdd->prepare("SELECT * FROM `sujets` WHERE id_message=?");
		$req->execute(array(htmlspecialchars($id)));

		$resultat = $req->fetchAll();

		return $resultat;

	}

	function mdp_hash($log){
		include('../configuration.php');

		// Connexion
		try {
			$bdd = new PDO('mysql:host='.$serveur.';dbname='.$database, $login , $password);
		} catch (Exception $e) {
			die ('Erreur'.$e->getMessage());
		}

		// Requete
		$req = $bdd->prepare("SELECT `mdp` FROM `utilisateurs` WHERE login=?");
		$req->execute(array(htmlspecialchars($log)));

		$resultat = $req->fetchAll();

		return $resultat;
	}
	
	function compareMDP($mdp1, $mdp2){
		if ($mdp1 == $mdp2) {
			return true;
		}
		else{
			return false;
		}
	}

	function afficherSujet($topic){
		include('../configuration.php');

		// Connexion
		try {
			$bdd = new PDO('mysql:host='.$serveur.';dbname='.$database, $login , $password);
		} catch (Exception $e) {
			die ('Erreur'.$e->getMessage());
		}

		// Requete
		$req = $bdd->prepare("SELECT * FROM `sujets` JOIN utilisateurs ON sujets.login = utilisateurs.login WHERE titre=?");
		$req->execute(array(htmlspecialchars($topic)));

		// Donnees
		$sujet = $req->fetchAll();

		return $sujet;
	}

	function modifierMessage($id, $message){
		include('../configuration.php');

		// Connexion
		try {
			$bdd = new PDO('mysql:host='.$serveur.';dbname='.$database, $login , $password);
		} catch (Exception $e) {
			die ('Erreur'.$e->getMessage());
		}

		// Requete
		$req = $bdd->prepare("UPDATE `forum`.`sujets` SET message=? WHERE id_message=?");
		$req->execute(array(htmlentities($message), htmlentities($id)));
	}

	function ecrireMessage($titre, $auteur, $message){
		include('../configuration.php');

		// Connexion
		try {
			$bdd = new PDO('mysql:host='.$serveur.';dbname='.$database, $login , $password);
		} catch (Exception $e) {
			die ('Erreur'.$e->getMessage());
		}
		// Requete
		$req = $bdd->prepare("INSERT INTO `forum`.`sujets` (`titre`, `login`, `message`, `date`) VALUES (?, ?, ?, NOW())");
		$req->execute(array(htmlspecialchars($titre), htmlentities($auteur), htmlentities($message)));
	}

	function supprimerMessage($id){
		include('../configuration.php');

		// Connexion
		try {
			$bdd = new PDO('mysql:host='.$serveur.';dbname='.$database, $login , $password);
		} catch (Exception $e) {
			die ('Erreur'.$e->getMessage());
		}

		// Requete
		$req = $bdd->prepare("UPDATE `forum`.`sujets` SET message='<b>Ce message a été supprimé par un administrateur</b>' WHERE id_message=?");
		$req->execute(array(htmlentities($id)));

	}
?>