<h2 id="lieu">Modification de : <?php echo $_POST['user']; ?></h2>

<form class="form-horizontal" method="post" action="../controleur/espaceAdministrateur.php">
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
					<textarea name="signature" class="form-control" id="inputPassword" rows="5" cols="40" placeholder="<?php echo $signature; ?>"></textarea><br/>
					</div>
					<div class="col-xs-1"></div>
			</div>
		</div>
	<input type="submit" class="btn btn-warning btn-md" name="corriger" value="Modifier">
	<input type="hidden" name="user" value="<?php echo $_POST['user']; ?>" />
</form>