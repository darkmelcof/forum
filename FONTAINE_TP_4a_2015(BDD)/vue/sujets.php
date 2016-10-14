<html>
<head>
	<meta http-quiv="content-type" content="text/html; charset=utf-8"/>
	<!-- <META HTTP-EQUIV="Refresh" CONTENT="310"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.5-dist/css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="../css/mobile.css" media="screen and (max-width: 768px)" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen and (min-width: 769px)"/> 
		
	<title><?php echo $titre; ?></title>
</head>
<body>
	<?php include("../entete.php"); ?>


	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-xs-12 col-sm-12 col-md-8">
		
		<h2>Bienvenue sur le topic <?php echo $titre; ?></h2>
	
	<!-- Message a Modifier -->
	<?php if (isset($_SESSION['admin']) && isset($_POST['edition']) && isset($_POST['id']) && isset($_GET['sujet'])): ?>

		<form class="form-horizontal" method="post" action="../controleur/sujets.php?sujet=<?php echo $nomSujet; ?>">
			<div class="form-group">
	 			<input type="hidden" name="idMessageEdite" value="<?php echo $messageAEditer[0][0]; ?>">
				<label for="inputEdition">Edition  de : <?php echo $messageAEditer[0]['login'] ?></label>
				<div class="row">
						<div class="col-xs-1"></div>
						<div class="col-xs-10">
							<textarea name="message" class="form-control" id="inputEdition" rows="5" cols="40"><?php echo $messageAEditer[0][3]; ?></textarea>
						</div>
						<div class="col-xs-1"></div>
				</div>
			</div>

				<input type="submit" class="btn btn-warning btn-md" name="messageAEditer" value="Modifier">	
		</form>

	<?php endif ?>

	<!-- Affichage -->
	<?php for ($i=0; $i < count($topic) ; $i++) { ?>
			
		<div class='panel panel-default'>

			<div class='panel-heading'>

				<h3 class='panel-title'>Auteur :  <?php echo $topic[$i][0]; ?></h3>
				<?php if (!is_null($topic[$i][4])): ?>
					<img id="imgSujet" src="<?php echo $topic[$i][4]; ?>" width="150" height="150" alt="Profile">
				<?php endif ?>

				<!-- option admin -->
				<?php if (isset($_SESSION['admin'])): ?>
					<span class="options">
						<form method="post" action="../controleur/sujets.php?sujet=<?php echo $nomSujet; ?>">
							<input type="hidden" name="id" value="<?php echo $topic[$i][3]; ?>">
							<input type="submit" name="edition" value="Editer">	
							<input type="submit" name="suppression" value="Supprimer">
						</form>
					</span>
				<?php endif ?>

			</div>

			<?php if (isset($_SESSION['admin']) && isset($_POST['edition']) && isset($_POST['id']) && $_POST['id']==$topic[$i][3] ): ?>
					<div class="modif">
			<?php endif ?>

			<div class='panel-body'>

				</br><p><?php echo $topic[$i][1]; ?></p>

				<?php if (!empty($topic[$i][5])): ?>
					<p><?php echo $topic[$i][5]; ?></p>
				<?php endif ?>
				

			</div>

			<?php if (isset($_SESSION['admin']) && isset($_POST['edition']) && isset($_POST['id']) && $_POST['id']==$topic[$i][3] ): ?>
				</div>
			<?php endif ?>

			<div class='panel-footer'>
				<p>Le : <?php echo $topic[$i][2]; ?></p>
			</div>

		</div>		

	<?php } ?>	
	
	<!-- Nouveau message -->
	<?php if (isset($_SESSION['name']) && !isset($_POST['edition'])): ?>
		<form class="form-horizontal" method="post" action="../controleur/sujets.php?sujet=<?php echo $nomSujet; ?>">
			<div class="form-group">
				<label for="inputMessage">Message : </label>
				<div class="row">
						<div class="col-xs-1"></div>
						<div class="col-xs-10">
						<textarea name="message" class="form-control" id="inputMessage" rows="5" cols="40" placeholder="Nouveau message..."></textarea>
						</div>
						<div class="col-xs-1"></div>
				</div>
			</div>
			<input type="submit" class="btn btn-warning btn-md" name="nouveauMessage" value="Valider">	
		</form>
	<?php endif ?>

	<a href="index.php">Retour</a>
	</div>
	<div class="col-md-2"></div>
</div>

</body>
</html>