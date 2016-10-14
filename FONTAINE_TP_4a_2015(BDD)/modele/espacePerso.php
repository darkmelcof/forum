<?php
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
	 
	function recupInfos($log){
		include('../configuration.php');

		// Connexion
		try {
			$bdd = new PDO('mysql:host='.$serveur.';dbname='.$database, $login , $password);
		} catch (Exception $e) {
			die ('Erreur'.$e->getMessage());
		}

		// Requete
		$req = $bdd->prepare("SELECT * FROM `utilisateurs` WHERE login=?");
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

	function modifierInfos($log, $param, $valeur){
		include('../configuration.php');

		// Connexion
		try {
			$bdd = new PDO('mysql:host='.$serveur.';dbname='.$database, $login , $password);
		} catch (Exception $e) {
			die ('Erreur'.$e->getMessage());
		}

		// Requete
		$req = $bdd->prepare("UPDATE `forum`.`utilisateurs` SET ".$param."=? WHERE login=?");
		$req->execute(array(htmlentities($valeur), htmlentities($log)));
	}

?>