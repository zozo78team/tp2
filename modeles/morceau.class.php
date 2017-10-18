<?php
class Morceau extends Entity{

	/**
     * Retourner tous les artistes de la base
     * @return array<Artist> tableau d'instances de Artist
    */
    public static function getAll()
    {
        $sql="SELECT * FROM morceau " ;
        $resultat=MonPdo::getInstance()->query($sql);
        $lesMorceaux=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Morceau');
        return $lesMorceaux;
		throw new Exception("Problème dans l'execution de la requête.") ;
    }

	/**
     * ajoute un artiste dans la base
	 * @param string<nom> nom de l'artiste
     * @return array<Artist> tableau d'instances de Artist
    */
    public static function ajouterMorceau($nom)
    {
		$sql="insert into morceau values(null, :nom )" ;
        $resultat=MonPdo::getInstance()->prepare($sql);
        $resultat->bindParam(':nom', $nom);
        $resultat->execute();
		// ajouter la gestion des exceptions
    }

	//supprime un artiste dont on passe l'id en paramètre
    public static function supprimerMorceau($id)
    {
		// a completer
        $sql="delete from morceau where id= :id " ;
        $resultat=MonPdo::getInstance()->prepare($sql);
        $resultat->bindParam(':id', $id);
        $resultat->execute();
		// ajouter la gestion des exceptions
    }
	// trouve un artiste grace à son id passé en paramètre
	// renvoie un objet Artiste
    public static function trouverMorceau($id)
    {
        $sql="SELECT * FROM morceau where id= ?" ;
        $resultat=MonPdo::getInstance()->prepare($sql); // prépare la requête
        $resultat->execute(array($id)); // applique le paramètre
        $lesMorceaux=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Morceau"); // lit la ligne et renvoie un objet Artist
        return $lesMorceaux;
		// ajouter la gestion des exceptions
    }
	// modifie un objet Artiste
    public static function modifierMorceau($id,$nom)
    {
		// a completer
        $sql="update morceau set nom= ? where id= ?" ;
        $resultat=MonPdo::getInstance()->prepare($sql); // prépare la requête
        $resultat->execute(array($nom,$id)); // applique le paramètre
    }


}
