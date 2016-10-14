<?php 

	function notification($adresse){
		$sujet = 'Modification profil';
		$from = 'admin';
		$message = 'Votre compte a ete modifie par un administrateur';
		//En tete
		$entete = 'From: '.$from. "\r\n";
		$entete .= 'Reply-To: '.$from. "\r\n";
		$entete .= 'X-Mailer: PHP/' . phpversion();

		mail($adresse, $sujet, $message, $entete);
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

	function recupUtilisateurs(){
		include('../configuration.php');

		// Connexion
		try {
			$bdd = new PDO('mysql:host='.$serveur.';dbname='.$database, $login , $password);
		} catch (Exception $e) {
			die ('Erreur'.$e->getMessage());
		}

		// Requete
		$req = $bdd->prepare("SELECT `login`, `valide`, `admin` FROM `utilisateurs`");
		$req->execute();

		$resultat = $req->fetchAll();

		return $resultat;
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
	
	function validerCompte($log){
		include('../configuration.php');

		// Connexion
		try {
			$bdd = new PDO('mysql:host='.$serveur.';dbname='.$database, $login , $password);
		} catch (Exception $e) {
			die ('Erreur'.$e->getMessage());
		}

		// Requete
		$req = $bdd->prepare("UPDATE `forum`.`utilisateurs` SET valide=1 WHERE login=?");
		$req->execute(array(htmlentities($log)));
	}

	function supprimerCompte($log){
		include('../configuration.php');

		// Connexion
		try {
			$bdd = new PDO('mysql:host='.$serveur.';dbname='.$database, $login , $password);
		} catch (Exception $e) {
			die ('Erreur'.$e->getMessage());
		}

		// Requete
		$req = $bdd->prepare("DELETE FROM `forum`.`utilisateurs` WHERE login=?");
		$req->execute(array(htmlentities($log)));
	}

	function isRoot($mdp){
		include('../configuration.php');

		// Connexion
		try {
			$bdd = new PDO('mysql:host='.$serveur.';dbname='.$database, $login , $password);
		} catch (Exception $e) {
			die ('Erreur'.$e->getMessage());
		}

		// Requete
		$req = $bdd->prepare("SELECT `mdp` FROM `utilisateurs` WHERE login='superadmin'");
		$req->execute();

		$resultat = $req->fetchAll();

		if(compareMDP($mdp, $resultat[0]['mdp'])){
			return true;
		}else{
			return false;
		}
	}

	function recupAdministrateurs($log){
		include('../configuration.php');

		// Connexion
		try {
			$bdd = new PDO('mysql:host='.$serveur.';dbname='.$database, $login , $password);
		} catch (Exception $e) {
			die ('Erreur'.$e->getMessage());
		}

		// Requete
		$req = $bdd->prepare("SELECT `login` FROM `utilisateurs` WHERE admin=1 && login!='superadmin' && login!=?");
		$req->execute(array(htmlspecialchars($log)));

		$resultat = $req->fetchAll();

		return $resultat;
	}

?>