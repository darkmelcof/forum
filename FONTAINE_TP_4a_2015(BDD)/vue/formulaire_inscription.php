<h1>Bienvenue dans l'espace inscription </h1>

<div class="row">
	<!-- espace gauche -->
	<div class="col-sm-2 col-md-2"></div>
	<div class="col-sm-8 col-md-8">
	<form class="form-horizontal" method="post" action="../controleur/inscription.php">

		<div class="form-group">
			<label for="inputText">Login</label>
			<div class="row">
				<div class="col-xs-1"></div>
				<div class="col-xs-10">
					<input type="text" class="form-control" name="login" placeholder="Login"/>
				</div>
				<div class="col-xs-1"></div>
			</div>
		</div>

		<div class="form-group">
			<label for="inputPassword1">Mot de Passe</label>
			<div class="row">
					<div class="col-xs-1"></div>
					<div class="col-xs-10">
						<input type="password" class="form-control" name="motDePasse" placeholder="Mot de passe"/>
					</div>
				<div class="col-xs-1"></div>
			</div>
		</div>

		<div class="form-group">
			<label for="inputPassword2">Vérification du Mot de Passe</label>
			<div class="row">
				<div class="col-xs-1"></div>
				<div class="col-xs-10">
					<input type="password" class="form-control" name="motDePasseV" placeholder="Mot de passe"/>
				</div>
				<div class="col-xs-1"></div>
			</div>
		</div>

		<div class="form-group">
			<label for="inputEmail">Email</label>
			<div class="row">
				<div class="col-xs-1"></div>
				<div class="col-xs-10">
					<input type="email" class="form-control" name="mail" placeholder="Email"/>
				</div>
				<div class="col-xs-1"></div>
			</div>
		</div>

		<input type="submit" class="btn btn-warning btn-md" name="preinscription" value="Valider">
	</form>

	<a href="index.php">Retour</a>
	</div>
	<!-- espace droit -->
	<div class="col-sm-2 col-md-2"></div>
</div>