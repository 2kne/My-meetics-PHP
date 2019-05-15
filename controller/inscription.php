<?php

require_once( __DIR__."/../modele/requete.php");

Class Inscription extends Requetes
{
	public function Register_db($tab_info)
	{
		$tab_info['pass'] = password_hash($tab_info['pass'], PASSWORD_DEFAULT);
		$tab_info['pass_conf'] = password_hash($tab_info['pass_conf'], PASSWORD_DEFAULT);
		$this->register_db_info($tab_info);
		$this->register_data_secure($tab_info);
	}

	public function session_ins($tab_info)
	{
		$data = $this->data_user_ins($tab_info);
		session_start();
		$_SESSION['user'] = $data;
	}
}

Class Connexion extends Requetes
{
	public function log_verify($tab_info)
	{
		$pass = $this->verify_data_log($tab_info);
		return $pass;
		
	}

	public function session_log($tab_info)
	{
		$data = $this->data_user($tab_info);
		session_start();
		$_SESSION['user'] = $data;
	}

	public function flag_verify($mail)
	{
		$flag = $this->test_flag($mail);
		return $flag;
	}
}

Class I_m_log extends Requetes
{
	public function name($actual_user_data)
	{
		echo "<p>" . $actual_user_data['user']['prenom'] . " " . $actual_user_data['user']['nom'] . "</p>";
	}
}

Class Recherche extends Requetes
{
	public function search($genre, $age, $ville, $mail)
	{
		switch (count($ville))
		{
			case "1":
				$tab = $this->search_1ville($genre, $this->age_moins($age), $this->age_plus($age), $ville[0], $mail);
				break;

			case "2":
				$tab = $this->search_2ville($genre, $this->age_moins($age), $this->age_plus($age), $ville[0], $ville[1], $mail);
				break;
			
			default:
				$tab = $this->search_3ville($genre, $this->age_moins($age), $this->age_plus($age), $mail);
				break;
		}

		$this->afficher_resultat($tab);
	}

	public function age_moins($age)
	{
		date_default_timezone_set("Europe/Paris");
		$date = date("Y-m-d", strtotime("-18 year"));
		switch ($age)
		{
			case "18-25":
				return $date1 = date("Y-m-d", strtotime("-18 year"));
				break;

			case "25-35":
				return $date1 = date("Y-m-d", strtotime("-25 year"));
				break;

			case "35-45":
				return $date1 = date("Y-m-d", strtotime("-35 year"));
				break;

			case "45+":
				return $date1 = date("Y-m-d", strtotime("-45 year"));
				break;
		}
	}

	public function age_plus($age)
	{
		date_default_timezone_set("Europe/Paris");
		switch ($age)
		{
			case "18-25":
				return $date2 = date("Y-m-d", strtotime("-25 year"));
				break;

			case "25-35":
				return $date2 = date("Y-m-d", strtotime("-35 year"));
				break;

			case "35-45":
				return $date2 = date("Y-m-d", strtotime("-45 year"));
				break;

			case "45+":
				return $date2 = date("Y-m-d", strtotime("-100 year"));
				break;
		}
	}

	public function afficher_resultat($ressource)
	{
		echo "<div class='result'><ul>";
		$nb = 1;
		while($tab = $ressource->fetch())
		{
			echo "<li class='" . $nb . "'><p>Prenom : " . $tab['prenom'] . "</p>
			<p>Nom : " . $tab['nom'] . "</p>
			<p>Age : " . $tab['date_naissance'] . "</p>
			<p>Ville : " . $tab['ville'] . "</p>
			<p>Sexe : " . $tab['sexe'] . "</p></li>";
			$nb++;
		}
		echo "</ul></div>";
	}
}