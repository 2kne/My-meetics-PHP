<?php
require_once "../../../modele/bdd.php";
require "../../../modele/requete.php";
		$test = new Requetes($bdd);
$tab_errors_co = [];
if (empty($_POST['pass']))
{
	array_push($tab_errors_co, "Veuillez entrez un mot de passe" . "<br/>");
	array_push($tab_errors_co, $_POST['pass']);
}

if (!empty($tab_errors_co))
{
	$tab_errors_co = implode(" ", $tab_errors_co);
	echo "Failed\n " . $tab_errors_co;
}
else
{
	$test->pass_set($_POST['pass'], $_POST['se2']);
	echo "Succes";
}