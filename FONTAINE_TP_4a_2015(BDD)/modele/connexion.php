<?php 
	function recupInfo($log){
		include('../configuration.php');

		// Connexion
		try {
			$bdd = new PDO('mysql:host='.$serveur.';dbname='.$database, $login , $password);
		} catch (Exception $e) {
			die ('Erreur'.$e->getMessage());
		}

		// Requete
		$req = $bdd->prepare("SELECT `mdp`, `valide`, `admin` FROM `utilisateurs` WHERE login=?");
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

	function isValide($login){
		include('../configuration.php');

		// Connexion
		try {
			$bdd = new PDO('mysql:host='.$serveur.';dbname='.$database, $login , $password);
		} catch (Exception $e) {
			die ('Erreur'.$e->getMessage());
		}
	}

 ?>