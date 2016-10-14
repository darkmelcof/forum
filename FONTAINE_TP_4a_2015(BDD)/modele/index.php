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

	function compareMDP($mdp1, $mdp2){
		if ($mdp1 == $mdp2) {
			return true;
		}
		else{
			return false;
		}
	}

	function creerSujets($titre, $auteur, $message){

		include('../configuration.php');

		// Connexion
		try {
			$bdd = new PDO('mysql:host='.$serveur.';dbname='.$database, $login , $password);
		} catch (Exception $e) {
			die ('Erreur'.$e->getMessage());
		}

		// Requete
		$req = $bdd->prepare('INSERT INTO `forum`.`listesujets` (`titre`,`auteur`) VALUES (?, ?)');
		$req->execute(array(htmlspecialchars($titre), htmlspecialchars($auteur)));

		$req = $bdd->prepare("INSERT INTO `forum`.`sujets` (`titre`, `login`, `message`, `date`) VALUES (?, ?, ?, NOW())");
		$req->execute(array(htmlspecialchars($titre), htmlspecialchars($auteur), htmlspecialchars($message)));

	}

	function recupDerniersPost(){

		include('../configuration.php');

		// Connexion
		try {
			$bdd = new PDO('mysql:host='.$serveur.';dbname='.$database, $login , $password);
		} catch (Exception $e) {
			die ('Erreur'.$e->getMessage());
		}

		// Requete
		$req = $bdd->prepare("SELECT `titre`,`login`,`message`,`date` FROM sujets WHERE `date` IN (SELECT MAX(date) FROM `sujets`GROUP BY `titre`)");
		$req->execute();

		// Donnees
		$sujets = $req->fetchAll();

		return $sujets;


	}

 ?>
