<html>
<head>
	<meta http-quiv="content-type" content="text/html; charset=utf-8"/>
	<!-- <META HTTP-EQUIV="Refresh" CONTENT="310"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.5-dist/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../css/mobile.css" media="screen and (max-width: 768px)" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen and (min-width: 769px)"/> 
	 
	<title>Inscription</title>
</head>
<body>

	<?php 
		if (isset($enregistre)) {
			echo "Votre compte va être examiné par les administrateurs<br/>";
			echo "Nous espérons vous compter parmis nous très prochainement<br/>";
			echo '<a href="index.php">Retour au forum</a><br/>';
		}else{ 
			include('formulaire_inscription.php');
		}
	?>

	
</body>
</html>