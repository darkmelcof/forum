<html>
<head>
	<meta http-quiv="content-type" content="text/html; charset=utf-8"/>
	<!-- <META HTTP-EQUIV="Refresh" CONTENT="310"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.5-dist/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../css/mobile.css" media="screen and (max-width: 768px)" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen and (min-width: 769px)"/> 
		
	<title>Espace administrateur</title>
</head>
<body>

	<?php include("../entete.php"); ?>
	
	<div class="row">
		<!-- espace gauche -->
		<div class="col-sm-2 col-md-2"></div>
		<div class="col-sm-8 col-md-8">
		<h1>Bienvenue dans l'espace administrateur</h1>

		<?php include("listeAvalider.php"); ?>
		
		<?php include("listeValide.php"); ?>

		<?php if (!isset($_SESSION['root'])) {
			echo '<h2>Modifier les administrateurs</h2>

					<form class="form-horizontal" method="post" action="../controleur/espaceAdministrateur.php">
						<div class="row">
							<div class="col-xs-1"></div>
							<div class="col-xs-8">
								<input type="password" class="form-control" name="root" placeholder="mdp Root">
							</div>
							<div class=col-xs-2">
							<input type="submit" class="btn btn-warning btn-md" name="modeRoot" value="Entrer">
							</div>
						<div class="col-xs-1"></div>
						
					</form>';
			}else{
				include("listeAdmin.php");
				echo '<form class="form-horizontal" method="post" action="../controleur/espaceAdministrateur.php">
						<input type="submit" class="btn btn-warning btn-md" name="stopRoot" value="Quitter mode super Admin">
					</form>';
			}

		?>

		<?php
			if (isset($_POST['MAJUtilisateurs']) && $_POST['action'] != "supprimer"){
				include("formulaire_modification.php");
			}
		?>
		
		<!-- espace droit -->	
		</div>
	<div class="col-sm-2 col-md-2"></div>
</div>
	
	<!-- // Utilisateurs à valider
	echo "Liste d'utilisateurs";
	// Contrainte Photo - deplacement repertoire utilisateur - image par defaut
	// include("traitementEspaceAdministrateur.php"); -->

			
	
	
</body>
</html>