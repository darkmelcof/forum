<div class="row entete">
<?php
	if(!isset($_SESSION)) { session_start(); } 
	header('Content-Type: text/html; charset=utf-8');

	if (!isset($_SESSION['name'])){
		echo "Bonjour visiteur / ";
		echo '<a href="connexion.php">Connexion</a> / ';
		echo '<a href="inscription.php">Inscription</a><br/>';
	}
	else{
		echo 'Bonjour '.$_SESSION['name'].' / ' ;
		if (basename($_SERVER['PHP_SELF']) == "espacePerso.php") {
			echo '<a href="index.php">Forum</a> / ';
		}
		else{
			echo '<a href="espacePerso.php">Mon espace Perso</a> / ';
		}
		if (isset($_SESSION['admin'])){
			if (basename($_SERVER['PHP_SELF']) == "espaceAdministrateur.php") {
			echo '<a href="index.php">Forum</a> / ';
			}else{
				echo '<a href="espaceAdministrateur.php">Page Admin</a> / ';
			}
		}
		
		
		echo '<a href="deconnection.php">Se déconnecter</a><br/>';
	}
?>
</div>