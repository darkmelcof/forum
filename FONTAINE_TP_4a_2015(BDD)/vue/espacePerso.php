<html>
<head>
	<meta http-quiv="content-type" content="text/html; charset=utf-8"/>
	<!-- <META HTTP-EQUIV="Refresh" CONTENT="310"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.5-dist/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../css/mobile.css" media="screen and (max-width: 768px)" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen and (min-width: 769px)"/> 
	
	<title>Espace personnel</title>
</head>
<body>
	<?php include("../entete.php"); ?>
	<h1>Bienvenue dans votre espace perso</h1>
	<h3>Vos informations</h3>

	<div class="row">
		<!-- espace gauche -->
		<div class="col-sm-2 col-md-2"></div>
		<div class="col-sm-8 col-md-8">

		<form class="form-horizontal"  method="post" action="../controleur/espacePerso.php" enctype="multipart/form-data">
			<div class="form-group">
				<label for="inputImage">Photo</label><br/>

				<div class="row">
					<div class="col-xs-1"></div>
					<div class="col-xs-10">
						<?php if (!$PhotoDeProfil): ?>
							<img src="../default.jpg" width="150" height="150" alt="Profile"><br/>
						<?php else: ?>
							<img src="../utilisateurs/<?php echo $_SESSION['name']; ?>/picture.jpg" width="150" height="150" alt="Profile"><br/>
						<?php endif ?>
						<input type="file" name="image"><br/>
						<input type="submit" class="btn btn-warning btn-md" name="envoiePhoto" value="Envoyer"><br/>
						<?php if (isset($erreur)) { echo $erreur; } ?>
					</div>
					<div class="col-xs-1"></div>
				</div>
			</div>			
		</form>

		<form class="form-horizontal" method="post" action="../controleur/espacePerso.php">
			
			<div class="form-group">
				<label for="inputText">Nom : <?php echo $nom; ?></label><br/>

				<div class="row">
					<div class="col-xs-1"></div>
					<div class="col-xs-10">
						<input type="text"  class="form-control" id="inputText" name="nom" /><br/>
					</div>
					<div class="col-xs-1"></div>
				</div>
			</div>

			<div class="form-group">
				<label for="inputText2">Prenom : <?php echo $prenom; ?></label><br/>
				<div class="row">
						<div class="col-xs-1"></div>
						<div class="col-xs-10">
							<input type="text" class="form-control" id="inputText2" name="prenom" /><br/>
						</div>
						<div class="col-xs-1"></div>
					</div>
			</div>

			<div class="form-group">
				<label for="inputText3">Age : <?php echo $age; ?> ans</label><br/>
				<div class="row">
						<div class="col-xs-1"></div>
						<div class="col-xs-10">
							<input type="text" class="form-control" id="inputText3" name="age" /><br/>
						</div>
						<div class="col-xs-1"></div>
					</div>
			</div>

			<div class="form-group">
				<label for="inputText4">Mail : <?php echo $mail; ?></label><br/>
				<div class="row">
						<div class="col-xs-1"></div>
						<div class="col-xs-10">
							<input type="text" class="form-control" id="inputText4" name="mail" /><br/>
						</div>
						<div class="col-xs-1"></div>
				</div>
			</div>

			<div class="form-group">
				<label for="inputText5">Mail de secours : <?php echo $mail2; ?></label><br/>
				<div class="row">
						<div class="col-xs-1"></div>
						<div class="col-xs-10">
						<input type="text" class="form-control" id="inputText5" name="mail2" /><br/>
						</div>
						<div class="col-xs-1"></div>
				</div>
			</div>

			<div class="form-group">
				<label for="inputPassword">Nouveau mot de passe</label><br/>
				<div class="row">
						<div class="col-xs-1"></div>
						<div class="col-xs-10">
						<input type="password" class="form-control" id="inputPassword" name="mdp" /><br/>
						</div>
						<div class="col-xs-1"></div>
				</div>
			</div>

			<div class="form-group">
				<label for="inputTextArea">signature :</label><br/>
				<div class="row">
						<div class="col-xs-1"></div>
						<div class="col-xs-10">
						<textarea name="signature" class="form-control" id="inputPassword" rows="5" cols="40"><?php echo $signature; ?></textarea><br/>
						</div>
						<div class="col-xs-1"></div>
				</div>
			</div>

			<input type="submit" class="btn btn-warning btn-md" name="corriger" value="Modifier">
		</form>
		<!-- espace droit -->
		<div class="col-sm-2 col-md-2"></div>
		</div>
	</div>
</body>
</html>