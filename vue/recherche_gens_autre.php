<?php
require "header.php";
?>
<link rel="stylesheet" href="css/acc_co.css">
<div class="account">

	<form method="post" action="resultat_recherche.php">
		<label>Genre : </label>
		<select name="genre" id="genre">
			<option value="autre">Autre</option>
			<option value="homme">Homme</option>
			<option value="femme">Femme</option>
		</select>

		<label>Age : </label>
		<select name="age" id="age">
			<option value="18-25">18-25</option>
			<option value="25-35">25-35</option>
			<option value="35-45">35-45</option>
			<option value="45+">45+</option>
		</select> 

		<p>Choisisser une ou plusieurs ville :</p>
		<div>
			<input type="checkbox" id="paris" name="ville[]" value="Paris"
			checked>
			<label for="paris">Paris</label>
		</div>

		<div>
			<input type="checkbox" id="marseille" name="ville[]" value="Marseille">
			<label for="marseille">Marseille</label>
		</div>

		<div>
			<input type="checkbox" id="lyon" name="ville[]" value="Lyon">
			<label for="lyon">Lyons</label>
		</div>

		<input type="submit" class="btn_connexion" value="Rechercher" id="recherche">

	</form>
</div>