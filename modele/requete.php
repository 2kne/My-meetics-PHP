<?php
Class Requetes
{
	public $bdd;
	public function __construct($bdd_co) {
		$this->bdd = $bdd_co;
	}
	
	public function mail($mail)
	{
		$req = $this->bdd->prepare("SELECT id_perso from fiche_perso WHERE email = :email");
		$req->bindParam(':email', $_POST['mail'], PDO::PARAM_STR);
		$req->execute();
		$user = $req->fetch();
		return $user;
	}

	public function register_db_info($post_info)
	{
		
		$req = $this->bdd->prepare("INSERT INTO fiche_perso SET nom = :nom, prenom = :prenom, sexe = :sexe, email = :email, ville = :ville, date_naissance = :date_naissance");
		$req->bindParam(':nom', $post_info["nom"], PDO::PARAM_STR);
		$req->bindParam(':prenom', $post_info["prenom"], PDO::PARAM_STR);
		$req->bindParam(':sexe', $post_info["sexe"], PDO::PARAM_STR);
		$req->bindParam(':email', $post_info["mail"], PDO::PARAM_STR);
		$req->bindParam(':ville', $post_info["ville"], PDO::PARAM_STR);
		$req->bindParam(':date_naissance', $post_info["date_naissance"], PDO::PARAM_STR);
		$req->execute();
	}

	public function register_data_secure($post_info)
	{
		$req = $this->bdd->prepare("INSERT INTO fiche_membre SET mot_de_passe = :pass, date_inscription = CURDATE(), email = :email");
		$req->bindParam(':pass', $post_info["pass"], PDO::PARAM_STR);
		$req->bindParam(':email', $post_info["mail"], PDO::PARAM_STR);
		$req->execute();
	}

	public function verify_data_log($post_info)
	{
		$req = $this->bdd->prepare("SELECT * FROM fiche_membre WHERE email = :email");
		$req->bindParam(':email', $post_info['mail_co'], PDO::PARAM_STR);
		$req->execute();
		$user = $req->fetch();
		if(!empty($user))
		{
			$pass = password_verify($post_info['pass_co'], $user['mot_de_passe']);
			return $pass;
		}
		else
		{
			$pass = false;
		}
	}

	public function data_user($post_info)
	{
		$req = $this->bdd->prepare("SELECT * FROM fiche_perso WHERE email = :email");
		$req->bindParam(':email', $post_info['mail_co'], PDO::PARAM_STR);
		$req->execute();
		$data = $req->fetch();
		return $data;
	}

	public function data_user_ins($post_info)
	{
		$req = $this->bdd->prepare("SELECT * FROM fiche_perso WHERE email = :email");
		$req->bindParam(':email', $post_info['mail'], PDO::PARAM_STR);
		$req->execute();
		$data = $req->fetch();
		return $data;
	}

	public function mail_set($id, $mail)
	{
		$req = $this->bdd->prepare("UPDATE fiche_perso SET email = :email WHERE id_perso = :id_perso");
		$req->bindParam(':email', $mail, PDO::PARAM_STR);
		$req->bindParam(':id_perso', $id, PDO::PARAM_INT);
		$req->execute();

		$req = $this->bdd->prepare("UPDATE fiche_membre SET email = :email WHERE id_perso = :id_perso");
		$req->bindParam(':email', $mail, PDO::PARAM_STR);
		$req->bindParam(':id_perso', $id, PDO::PARAM_INT);
		$req->execute();
	}

	public function pass_set($pass, $id)
	{
		$pass = password_hash($pass, PASSWORD_DEFAULT);
		$req = $this->bdd->prepare("UPDATE fiche_membre SET mot_de_passe = :pass WHERE id_perso = :id_perso");
		$req->bindParam(':pass', $pass, PDO::PARAM_STR);
		$req->bindParam(':id_perso', $id, PDO::PARAM_INT);
		$req->execute();
	}

	public function search_1ville($genre, $date_inf, $date_sup, $ville, $mail)
	{
		$req = $this->bdd->prepare("SELECT * FROM fiche_perso WHERE sexe = :sexe AND date_naissance >= :date_sup AND date_naissance <= :date_inf AND ville = :ville AND email != :email");
		$req->bindParam(':sexe', $genre, PDO::PARAM_STR);
		$req->bindParam(':date_sup', $date_sup, PDO::PARAM_STR);
		$req->bindParam(':date_inf', $date_inf, PDO::PARAM_STR);
		$req->bindParam(':ville', $ville, PDO::PARAM_STR);
		$req->bindParam(':email', $mail, PDO::PARAM_STR);
		$req->execute();
		return $req;
	}

	public function search_2ville($genre, $date_inf, $date_sup, $ville1, $ville2, $mail)
	{
		$req = $this->bdd->prepare("SELECT * FROM fiche_perso WHERE sexe = :sexe AND date_naissance >= :date_sup AND date_naissance <= :date_inf AND email != :email AND ville = :ville1 OR ville = :ville2");
		$req->bindParam(':sexe', $genre, PDO::PARAM_STR);
		$req->bindParam(':date_sup', $date_sup, PDO::PARAM_STR);
		$req->bindParam(':date_inf', $date_inf, PDO::PARAM_STR);
		$req->bindParam(':email', $mail, PDO::PARAM_STR);
		$req->bindParam(':ville1', $ville1, PDO::PARAM_STR);
		$req->bindParam(':ville2', $ville2, PDO::PARAM_STR);
		$req->execute();
		return $req;
	}

	public function search_3ville($genre, $date_inf, $date_sup, $mail)
	{
		$req = $this->bdd->prepare("SELECT * FROM fiche_perso WHERE sexe = :sexe AND date_naissance >= :date_sup AND date_naissance <= :date_inf AND email != :email");
		$req->bindParam(':sexe', $genre, PDO::PARAM_STR);
		$req->bindParam(':date_sup', $date_sup, PDO::PARAM_STR);
		$req->bindParam(':date_inf', $date_inf, PDO::PARAM_STR);
		$req->bindParam(':email', $mail, PDO::PARAM_STR);
		$req->execute();
		return $req;
	}

	public function test_flag($mail)
	{
		$req = $this->bdd->prepare("SELECT account FROM fiche_membre WHERE email = :email");
		$req->bindParam(':email', $mail, PDO::PARAM_STR);
		$req->execute();
		$flag1 = $req->fetch();
		$flag = $flag1['account'];
		return $flag;
	}

	public function flag_off($id)
	{
		$req = $this->bdd->prepare("UPDATE fiche_membre SET account = 'OFF' WHERE id_perso = :id");
		$req->bindParam(':id', $id, PDO::PARAM_INT);
		$req->execute();
	}

}

?>