<html>
<head>
	<meta http-quiv="content-type" content="text/html; charset=utf-8"/>
	<!-- <META HTTP-EQUIV="Refresh" CONTENT="310"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.5-dist/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../css/mobile.css" media="screen and (max-width: 768px)" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen and (min-width: 769px)"/> 
		
	<title>Connexion</title>
</head>
<body>

	<?php include("../entete.php"); ?>
	
	<div class="row">
		<!-- espace gauche -->
		<div class="col-sm-2 col-md-2"></div>
		<div class="col-sm-8 col-md-8">

			<?php if (!isset($_SESSION['name']) && !isset($mdpCorrecte) && !isset($compteInactif)): ?>
				<h2>Connexion</h2>

				<form class="form-horizontal" method="post" action="../controleur/connexion.php">

					<div class="form-group">
						<label for="inputText">Login </label>
						<div class="row">
							<div class="col-xs-1"></div>
							<div class="col-xs-10">
								<input type="text" class="form-control" id="inputText" name="login" placeholder="Login"/>
							</div>
							<div class="col-xs-1"></div>
						</div>
					</div>

					<div class="form-group">
						<label for="inputPassword">Mot de Passe </label>
						<div class="row">
							<div class="col-xs-1"></div>
							<div class="col-xs-10">
								<input type="password" class="form-control" id="inputPassword" name="motDePasse" placeholder="Mot de passe" />
							</div>
							<div class="col-xs-1"></div>
						</div>
					</div>

					<div class="row" class="checkbox">
						<label>Connexion automatique :
							<input type="checkbox" name="connexionAuto" value="Oui">
						</label>
					</div>
					</br>
					<input type="submit" class="btn btn-warning btn-md" name="connexion" value="Valider">	
				</form>


				<a href="reset.php">Mot de passe oublié</a> / 
				<a href="index.php">Retour</a><br/>

			<?php endif ?>

			<?php if (isset($mdpCorrecte) && $mdpCorrecte) : ?>
				<p>Tu as réussi à te connecter</p>
				<a href="index.php">Retour au forum</a>
			<?php endif ?>

			<?php if (isset($mdpCorrecte) && !$mdpCorrecte) : ?>
				<p>Login ou mot de passe incorrect</p>
				<a href="connexion.php">Retour</a>
			<?php endif ?>

			<?php if (isset($compteInactif) && $compteInactif) : ?>
				<p>Ton compte n'a pas encore été activé par les administrateurs</p>
				<a href="index.php">Retour au forum</a>
			<?php endif ?>

		</div>
		<!-- espace droit -->
		<div class="col-sm-2 col-md-2"></div>
	</div>


</body>
</html>