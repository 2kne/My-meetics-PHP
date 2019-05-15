<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>My Meetic</title>
	<link rel="stylesheet" href="css/acc.css">
	<link rel="icon" type="image/png" href="image/logo_fond.png" />
	<script src="js/jquery-3.3.1.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<?php
	session_start(); 
	session_destroy()?>
</head>
<body>
	<div class="fond">
		<header>
			<nav>
				<img src="css/image/logo_fond.png">
				<ul>
					<li id="acc_nav">Accueil</li>
					<li id="ins_nav">Inscritption</li>
					<li id="co_nav">Connexion</li>
					<li><a href="">Temoignage</a></li>
					<li><a href="">Contact</a></li>
				</ul>
			</nav>
		</header>
		<div id="inscription">
			<form method="post" action="#">
				<div class="row">
					<label for="prenom">Prenom :</label>
					<input type="text" name="prenom" id="prenom" />
				</div>

				<div class="row">
					<label for="nom">Nom :</label>
					<input type="text" name="nom" id="nom" />
				</div>

				<div class="row">
					<label for="date_naissance">Date de naissance :</label>
					<input type="date" name="date_naissance" id="date_naissance" />
				</div>

				<div class="row">
					<label for="sexe">Sexe :</label>
					<div id="col">	
						<label for="femme">Femme</label> <input type="radio" name="sexe" value="femme" id="femme" checked/>
	   					<label for="homme">Homme</label> <input type="radio" name="sexe" value="homme" id="homme" />
	   					<label for="autre">Autre</label> <input type="radio" name="sexe" value="autre" id="autre" />
					</div>
	   			</div>

	   			<div class="row">
	   				<label for="ville">Ville :</label>
	   				<select name="ville" id="ville">
	   					<option value="Paris">Paris</option>
	   					<option value="Marseille">Marseille</option>
	   					<option value="Lyon">Lyon</option>
	   				</select>
	   			</div>

	   			<div class="row">
					<label for="mail">Email :</label>
					<input type="email" name="mail" id="mail" />
				</div>

				<div class="row">
					<label for="pass">Mot de passe :</label>
					<input type="password" name="pass" id="pass">
				</div>

				<div class="row">
					<label for="pass_conf">Confirmation :</label>
					<input type="password" name="pass_conf" id="pass_conf">
				</div>
				<input type="submit" class="btn_inscription" value="S'inscrire" id="submit">
			</form>
		</div>
		<div id="accueil">
			<div class="citation">
				<q>On a beau ne pas s'aimer, on se rencontre quelquefois dans la même pensée</q>
			</div>
			<div class="mid_btn">
				<button id="bt_ins" class="btn_log_1">S'inscrire</button>
				<button id="bt_co" class="btn_log_2">Se connecter</button>
			</div>
		</div>
		<div id="connexion">
			<form method="post" action="#">
				<div class="row">
				<label for="mail_co">Email :</label>
				<input type="mail" name="mail_co" id="mail_co">
			</div>
				<div class="row">
				<label for="pass_co">Mot de passe :</label>
				<input type="password" name="pass_co" id="pass_co">
			</div>
			<input type="submit" class="btn_connexion" value="Se connecter" id="log">
			</form>
		</div>
		<div id="errors"></div>
	</div>
	<script src="js/ac.js"></script>
	<script src="js/ajax_php/ajax_inscription.js"></script>
	<script src="js/ajax_php/ajax_connexion.js"></script>
</body>
</html>