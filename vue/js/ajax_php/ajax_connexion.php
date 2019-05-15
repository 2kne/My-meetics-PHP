<?php
require_once "../../../modele/bdd.php";
$tab_errors_co = [];
if (empty($_POST['mail_co']))
{
	array_push($tab_errors_co, "Veuillez entrez votre email" . "<br/>");
}

if (empty($_POST['pass_co']))
{
	array_push($tab_errors_co, "Veuillez entrez votre mot de passe" . "<br/>");
}

if (!empty($tab_errors_co))
{
	$tab_errors_co = implode(" ", $tab_errors_co);
	echo "Failed\n " . $tab_errors_co;
}
else
{
	require_once "../../../controller/inscription.php";
	$connexion = new Connexion($bdd);
	$pass = $connexion->log_verify($_POST);
	$flag = $connexion->flag_verify($_POST['mail_co']);
	if($pass == false)
	{
		array_push($tab_errors_co, "Votre email ou mot de passe est incorrect");
		$tab_errors_co = implode(" ", $tab_errors_co);
		echo "Failed\n " . $tab_errors_co;
	}
	elseif($flag == "OFF")
	{
		array_push($tab_errors_co, "Vous n'etes plus inscrit");
		$tab_errors_co = implode(" ", $tab_errors_co);
		echo "Failed\n " . $tab_errors_co;
	}
	else
	{
		echo "Succes";
		$connexion->session_log($_POST);
	}	
}

