<html>
<head>
	<title>Reset mot de passe</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.5-dist/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../css/mobile.css" media="screen and (max-width: 768px)" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen and (min-width: 769px)"/> 
</head>
<body>

	<?php include("../entete.php"); ?>

	<div class="row">
		<!-- espace gauche -->
		<div class="col-sm-2 col-md-2"></div>
		<div class="col-sm-8 col-md-8">

		<?php if (!isset($mdpReinitialise)): ?>
			<h2>Réinitialisez votre mot de passe</h2>

			<form class="form-horizontal" method="post" action="../controleur/reset.php">
				<div class="form-group">
					<label for="inputText">Login : </label>
					<div class="row">
							<div class="col-xs-1"></div>
							<div class="col-xs-10">
								<input type="text" class="form-control" id="inputText" name="login" placeholder="Login" />
							</div>
						<div class="col-xs-1"></div>
					</div>
				</div>

				<div class="form-group">
					<label for="inputText2">Email : </label>
					<div class="row">
							<div class="col-xs-1"></div>
							<div class="col-xs-10">
								<input type="text" class="form-control" id="inputText2" name="mail" placeholder="Email" />
							</div>
						<div class="col-xs-1"></div>
					</div>
				</div>

				<input type="submit" class="btn btn-warning btn-md" name="reset" value="Valider">	
			</form>
			<a href="connexion.php">Retour</a>	
		<?php endif ?>
		<?php if (isset($mdpReinitialise) && $mdpReinitialise): ?>
			<p>Mot de passe réinitialisé</p>
			<a href="connexion.php">Retour</a>
		<?php endif ?>
		<?php if (isset($mdpReinitialise) && !$mdpReinitialise): ?>
			<p>Profil non existant ou mail non valide</p>
			<a href="reset.php">Retour</a>
		<?php endif ?>
		</div>
		<!-- espace droit -->
		<div class="col-sm-2 col-md-2"></div>
	</div>

</body>
</html>

