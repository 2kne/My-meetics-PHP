<?php
require "header.php";
?>
<link rel="stylesheet" href="css/acc_co.css">
<script src="js/jquery-3.3.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="js/ajax_php/ajax_mail.js"></script>
<script src="js/ajax_php/ajax_pass.js"></script>
<script src="js/ajax_php/ajax_del.js"></script>
<div class="account">
	<p>Mon profil</p>
	<div id="inscription">
			<form method="post" action="#">
				<div class="row">
					<label for="prenom">Prenom :</label>
					<?php echo $_SESSION['user']['prenom']?>
				</div>

				<div class="row">
					<label for="nom">Nom :</label>
					<?php echo $_SESSION['user']['nom']?>
				</div>

				<div class="row">
					<label for="date_naissance">Date de naissance :</label>
					<?php echo $_SESSION['user']['date_naissance']?>
				</div>

				<div class="row">
					<label for="sexe">Sexe :</label>
					<?php echo $_SESSION['user']['sexe']?>
				</div>
			</form>

			<div id="inscription2">
			<form method="post" action="#">


				<div class="row">
					<label for="mail">Email :</label>
					<input type="email" name="mail" id="mail" />
				</div>
				<input type="hidden" id= "se1" name="se" <?php echo "value='" . $_SESSION['user']['id_perso'] . "'"?>readonly>

				<input type="submit" class="btn_inscription" value="Modifier" id="submit_mail">
			</form>
			<div id="inscription3">
			<form method="post" action="#">
				<div class="row">
					<label for="pass">Mot de passe :</label>
					<input type="password" name="pass" id="pass" />
				</div>
				<input type="hidden" id="se2" name="se2" <?php echo "value='" . $_SESSION['user']['id_perso'] . "'"?>readonly>
				<input type="submit" class="btn_inscription" value="Modifier" id="submit_pass">
			</form>

			<form method="post" action="accueil.php">
				<input type="hidden" id="se3" name="se3" <?php echo "value='" . $_SESSION['user']['id_perso'] . "'"?>readonly>
				<input type="submit" class="btn_inscription" value="Supprimer mon compte" id="submit_del">
			</form>
			<div id="errors"></div>
</div>