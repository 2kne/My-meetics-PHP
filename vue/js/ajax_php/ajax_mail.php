<?php
require_once "../../../modele/bdd.php";
require "../../../modele/requete.php";
		$test = new Requetes($bdd);
$tab_errors_co = [];
if (empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
{
	array_push($tab_errors_co, "Veuillez entrez un email valide" . "<br/>");
}

if (!empty($tab_errors_co))
{
	$tab_errors_co = implode(" ", $tab_errors_co);
	echo "Failed\n " . $tab_errors_co;
}
else
{
	if ($test->mail($_POST['mail']))
	{
		array_push($tab_errors_co, "Votre adresse mail est deja utilise" . "<br/>");
	}
}

if (!empty($tab_errors_co))
{
	$tab_errors_co = implode(" ", $tab_errors_co);
	echo "Failed\n " . $tab_errors_co;
}
else
{
	$test->mail_set($_POST['se1'], $_POST['mail']);
	echo "Succes";
}