<?php
class UserManager{
	private $pdo;

	public function __construct($pdo){
		$this->pdo = $pdo;
	}

	public function connexion($nom, $mdp){
		$mdp = sha1(htmlspecialchars($mdp));
		$nom = htmlspecialchars($nom);

		$query = $this->pdo->query("SELECT * FROM user WHERE nom = :nom && mdp = :mdp")
		$query->execute(array('nom' => $nom, 'mdp' => $mdp));
		if($query->rowCount() == 1){
			echo "bonjour billy";
		}





	}



}
