<?php include("../modele/connexion.php"); ?>

<?php 
	if(!isset($_SESSION)) {
		session_start(); 
	}
	header('Content-Type: text/html; charset=utf-8');
?>

<?php 
	
	if ((!empty($_POST['login'])) && (!empty($_POST['motDePasse']))) {
		$res = recupInfo($_POST['login']);

		if (!empty($res)) {
			// Compte valide - Connexion
			if ($res[0]['valide'] == 1) {
				
				if(compareMDP(sha1($_POST['motDePasse']), $res[0]['mdp'])){
					$mdpCorrecte = true;
					$_SESSION['name'] = $_POST['login'];
					// administrateurs
					if ($res[0]['admin'] == 1) {
						$_SESSION['admin'] = "Oui";
					}

					// Enregistrement des cookies
					setcookie("login", $_POST['login'], time()+365*24*3600, null, null, false, true);
					if (isset($_POST['connexionAuto']) && $_POST['connexionAuto'] == 'Oui') {
						setcookie("mdp", sha1($_POST['motDePasse']), time()+365*24*3600, null, null, false, true);
					}
					
					// Timeout
					$_SESSION['lastAction'] = time();
					
				}
				else{
					$mdpCorrecte = false;
				}
			}
			else{
				$compteInactif = true;
			}
		}else{
			$mdpCorrecte = false;
		}
	}

	include('../vue/connexion.php');
	
?>