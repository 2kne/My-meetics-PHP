<?php
require_once "../../../modele/bdd.php";
require "../../../modele/requete.php";
$test = new Requetes($bdd);
$test->flag_off($_POST['se3']);
echo "Succes";

