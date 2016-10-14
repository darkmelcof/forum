<html>
<head>
	<meta http-quiv="content-type" content="text/html; charset=utf-8"/>
	<!-- <META HTTP-EQUIV="Refresh" CONTENT="310"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.5-dist/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../css/mobile.css" media="screen and (max-width: 768px)" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen and (min-width: 769px)"/> 
	
	<title>Bienvenue sur le forum lambda</title>
</head>
<body>

	<!-- En-tete utilisateur -->
	<?php include('../entete.php'); ?>


	<div class="row">
		<div class="col-sm-2 col-md-2"></div>
		<div class="col-xs-12 col-sm-8 col-md-8">

			<h1>Bienvenue sur le forum</h1>

			<!-- option admin -->
			<?php if (isset($_SESSION['admin']) && !isset($_POST['nouveauTopic'])): ?>
				<span>
					<form method="post" action="../controleur/index.php">
						<input type="submit" class="btn btn-warning btn-md" name="nouveauTopic" value="Nouveau">	
					</form>
				</span>
			<?php endif ?>

			<!-- Nouveau message -->
			<?php if (isset($_SESSION['name']) && isset($_POST['nouveauTopic'])): ?>
				<h3>Nouveau topic</h3>
				<form class="form-horizontal" method="post" action="../controleur/index.php">
					<div class="form-group">
						<label for="inputTitre">Titre</label>
						<div class="row">
								<div class="col-xs-1"></div>
								<div class="col-xs-10">
									<input type="text" class="form-control" name="titre" placeholder="Titre"/>
								</div>
								<div class="col-xs-1"></div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputMessage">Message</label>
						<div class="row">
								<div class="col-xs-1"></div>
								<div class="col-xs-10">
								<textarea name="message" class="form-control" id="inputMessage" rows="5" cols="40" placeholder="Nouveau message..."></textarea>
								</div>
								<div class="col-xs-1"></div>
						</div>
					</div>
					<input type="submit" class="btn btn-warning btn-md" name="creationTopic" value="Valider">	
				</form>
				<a href="index.php">Retour</a>
			<?php endif ?>

			<!-- Affiche la liste des sujets -->
			<?php if (!isset($_POST['nouveauTopic'])): ?>
				<div class='panel panel-default'>
					
					<?php foreach ($preview as $key => $value) { ?>
						<div class='panel-heading'>
							<a href="sujets.php?sujet=<?php echo urlencode($value['titre']); ?>"><?php echo $value['titre']; ?></a></br>
						</div>
						<div class='panel-body'>
							<p><?php echo $value['message']; ?></p>
							<span><p>Dernier message le <?php echo $value['date']; ?> par <?php echo $value['login']; ?></p></span>
						</div>
					<?php } ?>
			<?php endif ?>
			
			</div>
		</div> 
		<div class="col-sm-2 col-md-2"></div>
	</div>


</body>
</html>