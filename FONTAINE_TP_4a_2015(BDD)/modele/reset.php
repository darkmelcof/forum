<?php
	function recupMails($log){
		include('../configuration.php');

		// Connexion
		try {
			$bdd = new PDO('mysql:host='.$serveur.';dbname='.$database, $login , $password);
		} catch (Exception $e) {
			die ('Erreur'.$e->getMessage());
		}

		// Requete
		$req = $bdd->prepare("SELECT `mail`, `mail2` FROM `utilisateurs` WHERE login=?");
		$req->execute(array(htmlspecialchars($log)));

		$resultat = $req->fetchAll();

		return $resultat;
	}

	function ecrireMDP($user, $mdp){
		include('../configuration.php');

		// Connexion
		try {
			$bdd = new PDO('mysql:host='.$serveur.';dbname='.$database, $login , $password);
		} catch (Exception $e) {
			die ('Erreur'.$e->getMessage());
		}

		// Requete
		$req = $bdd->prepare("UPDATE `forum`.`utilisateurs` SET mdp=? WHERE login=?");
		$req->execute(array(htmlentities($mdp), htmlentities($user)));
	}

	// Genere un mot de passe aleatoire
	function mdpAleatoire(){
		$longueur = 8;
		// initialiser la variable $mdp
		$mdp = "";
	 
		// Définir tout les caractères possibles dans le mot de passe, 
		// Il est possible de rajouter des voyelles ou bien des caractères spéciaux
		$possible = "12346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
	 
		// obtenir le nombre de caractères dans la chaîne précédente
		// cette valeur sera utilisé plus tard
		$longueurMax = strlen($possible);
	 
		if ($longueur > $longueurMax) {
			$longueur = $longueurMax;
		}
	 
		// initialiser le compteur
		$i = 0;
	 
		// ajouter un caractère aléatoire à $mdp jusqu'à ce que $longueur soit atteint
		while ($i < $longueur) {
			// prendre un caractère aléatoire
			$caractere = substr($possible, mt_rand(0, $longueurMax-1), 1);
	 
			// vérifier si le caractère est déjà utilisé dans $mdp
			if (!strstr($mdp, $caractere)) {
				// Si non, ajouter le caractère à $mdp et augmenter le compteur
				$mdp .= $caractere;
				$i++;
			}
		}
	 
		// retourner le résultat final
		return $mdp;
	}

	// Notification MDP
	function mailMDP($adresse, $motDePasse){
		$sujet = 'Modification profil';
		$from = 'admin';
		$message = 'Votre mot de passe a ete reinitialise : '.$motDePasse;
		//En tete
		$entete = 'From: '.$from. "\r\n";
		$entete .= 'Reply-To: '.$from. "\r\n";
		$entete .= 'X-Mailer: PHP/' . phpversion();

		mail($adresse, $sujet, $message, $entete);
	}

	// Modifie mdp BDD et envoie notification
	function resetMDP($login, $adresse){

		//Genere un mdp
		$nouveauMDP = mdpAleatoire();

		// Recuperation adresse BDD
		$res = recupMails($login);

		// Si login et adresse correspondent
		if (($adresse == $res[0]['mail']) || ($adresse == $res[0]['mail2'])) {
			ecrireMDP($login, sha1($nouveauMDP));
			
			// Envoie nouveau mdp
			error_reporting(0); // Enleve warnings pour adresse fake
			mailMDP($adresse, $nouveauMDP);
			error_reporting(1);
		
		}

		
	}


	function is_match($login, $adresse){
		$res = recupMails($login);
		if (!empty($res)) {
			if(($adresse == $res[0]['mail']) || ($adresse == $res[0]['mail2'])){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}	
	}
?>