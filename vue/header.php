<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>My Meetic</title>
	<link rel="stylesheet" href="css/acc_log.css">
	<link rel="icon" type="image/png" href="image/logo_fond.png" />
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/log.js"></script>
	<?php session_start();
	if(empty($_SESSION))
	{
		header("Location:accueil.php");
	}
	require_once"../controller/inscription.php"?>
</head>
<body>
	<header>
		<nav>
			<img src="css/image/logo_fond.png">
			<ul>
				<li ><a href="profil_accueil.php">Accueil</a></li>
				<div id="deroulant">
					<li id="cli_der">Recherche</li>
					<ul class="slid">
						<li><a href="recherche_gens_femme.php">Femme</a></li>
						<li><a href="recherche_gens.php">Homme</a></li>
						<li><a href="recherche_gens_autre.php">Autre</a></li>
					</ul>
				</div>
				<li >Messagerie</li>
				<li><a href="profil.php">Gerer</a></li>
				<li><a href="accueil.php">Deconnexion</a></li>
			</ul>
		</nav>

		<div class="profil">
			<img id="profil_pic" src="profil/1.jpg">
			<div class="profil_bot">
				<canvas id="canvas" width="50" height="50"></canvas>
				<script>	function fillCircle()
				{
					var canvas = document.getElementById("canvas");
					var context = canvas.getContext("2d");
					context.beginPath();
					context.fillStyle="#74FF3C"
					context.arc(25, 25, 8, 0, 2 * Math.PI);
					context.fill();
				}
				fillCircle();
			</script>
			<?php require_once "../modele/bdd.php";
			$profil = new I_m_log($bdd);
			$profil->name($_SESSION);?>
		</div>
	</div>


</header>