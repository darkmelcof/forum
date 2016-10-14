<?php include("../modele/inscription.php"); ?>

<?php 
	if(!isset($_SESSION)) {
		session_start(); 
	}
	header('Content-Type: text/html; charset=utf-8');
?>

<?php

	// Verification si champs complétés
	if ( (!empty($_POST['login'])) || (!empty($_POST['motDePasse'])) || (!empty($_POST['motDePasseV'])) || (!empty($_POST['mail']))) {
		if (empty($_POST['login'])) {
			echo "Vous n'avez pas entré de login<br/>";
		}
		if (empty($_POST['motDePasse'])) {
			echo "Vous n'avez pas entré de mot de passe<br/>";
		}
		if (empty($_POST['motDePasseV'])) {
			echo "Vous n'avez pas entré de mot de passe de vérification<br/>";
		}
		if (empty($_POST['mail'])) {
			echo "Vous n'avez pas entré votre mail<br/>";
		}
		if ($_POST['motDePasse'] != $_POST['motDePasseV']) {
			echo "Vos mots de passe entrés ne correspondent pas<br/>";
		}
		if (isExist($_POST['login'])) {
			echo "Le login est déjà existant<br/>";
		}
	}
	// Enregistrement
	if ((!empty($_POST['login'])) && (!empty($_POST['motDePasse'])) &&
	  (!empty($_POST['motDePasseV'])) && (!empty($_POST['mail'])) &&
	    ($_POST['motDePasse'] == $_POST['motDePasseV']) && (!isExist($_POST['login']))) {

		$enregistre = true;
		inscrire($_POST['login'], sha1($_POST['motDePasse']), $_POST['mail']);
	}
	
	include("../vue/inscription.php");

?>

<?php
	// if ( (!isset($_POST['login'])) && (!isset($_POST['motDePasse'])) && (!isset($_POST['motDePasseV'])) && (!isset($_POST['mail']))) {
	// 	include("../vue/inscription.php");
	// }
	// else{
	// 	echo "Aucun champ remplie !<br/>";
	// 	echo "<a href=inscription.php>Retour</a>";
	// }
?>