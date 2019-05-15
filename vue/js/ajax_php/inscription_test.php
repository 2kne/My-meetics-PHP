<?php
require "../../../modele/bdd.php";
$tab_errors = [];
if (empty($_POST))
{
	array_push($tab_errors, "Veuillez remplir tous les champs" . "<br/>");
	echo "Failed" . $tab_errors;
}
else
{	
	if (empty($_POST['nom']) || !preg_match('/^[a-zA-Z]+$/', $_POST['nom']))
	{
		array_push($tab_errors, "Votre nom n'est pas valide" . "<br/>");
	}

	if (empty($_POST['prenom']) || !preg_match('/^[a-zA-Z]+$/', $_POST['prenom']))
	{
		array_push($tab_errors, "Votre prenom n'est pas valide" . "<br/>");
	}

	if (!empty($_POST['date_naissance']))
	{
		$date_naissance = explode('-', $_POST['date_naissance']);
		$date_now = explode('/', date('Y/m/d'));

		if(($date_naissance[1] < $date_now[1]) || (($date_naissance[1] == $date_now[1]) && ($date_naissance[2] <= $date_now[2])))
		{
			$age = $date_now[0] - $date_naissance[0];
		}
		else
		{
			$age = $date_now[0] - $date_naissance[0] - 1;
		}

		if ($age < 18) 
		{

			array_push($tab_errors, "Vous etes trop jeune" . "<br/>");        
		}

	}

	if (empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
	{
		array_push($tab_errors, "Votre email n'est pas valide" . "<br/>");
	}
	else
	{
		require "../../../modele/requete.php";
		$test = new Requetes($bdd);

		if ($test->mail($_POST['mail']))
		{
			array_push($tab_errors, "Votre adresse mail est deja utilise" . "<br/>");
		}
	}

	if (empty($_POST["pass"]) || $_POST["pass"] != $_POST["pass_conf"])
	{
		array_push($tab_errors, "Veuillez entrer un mot de passe valide et le confirmer" . "<br/>");
	}
}

	if (!empty($tab_errors))
	{
		$tab_errors = implode(" ", $tab_errors);
		echo "Failed\n " . $tab_errors;
	}
	else
	{
		$tab_errors = implode(" ", $tab_errors);
		require_once "../../../controller/inscription.php";

		$register_execute = new Inscription($bdd);
		$register_execute->Register_db($_POST);
		$connexion = new Inscription($bdd);
		$connexion->session_ins($_POST);
		echo "Succes";
	}
?>