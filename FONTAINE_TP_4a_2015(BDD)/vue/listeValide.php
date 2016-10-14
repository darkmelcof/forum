<h2>Liste des utilisateurs</h2>
<form class="form-horizontal" method="post" action="#lieu">
	<div class="form-group">
		<div class="row">
			<div class="col-xs-1"></div>
			<div class="col-xs-4">

				<select class="form-control" name="user" size="1">
				<?php foreach ($valide as $key => $value) {
					echo "<option value=".$value.">".$value."</option>";
				} ?>
				</select>
			</div>
			<div class="col-xs-4">
				<select class="form-control" name="action">
					<option value="supprimer">supprimer</option>
					<option value="modifier" selected>modifier</option>
				</select>
			</div>
			<div class="col-xs-1">
				<input type="submit" class="btn btn-warning btn-md" name="MAJUtilisateurs" value="Envoyer">
			</div>
			<div class="col-xs-1"></div>
		</div>
	</div>
</form>
