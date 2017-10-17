<?php
class Album extends Entity{
    private $annee;
    private $genre;
    private $artiste;

    public function getAnnee()
    {
        return $this->annee;
    }
    public function setAnnee($value)
    {
        if(!is_numeric($value))
        { throw new Exception("l'année doit être un nombre.");
        }
        $this->annee=$value;
    }

    public function getArtiste()
    {
        return $this->artiste;
    }
    public function setArtiste($value)
    {
        $this->artiste=$value;
    }

    public function getGenre()
    {
        return $this->genre;
    }
    public function setGenre($value)
    {
        $this->genre=$value;
    }
    public function __toString()
    {
        return "informations sur l'album : <br>". parent::__toString();
    }

    public static function getAll()
    {
        $sql="SELECT * FROM album " ;
        $resultat=MonPdo::getInstance()->query($sql);
        $lesAlbums=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Album');
        return  $lesAlbums;
    }
    public static function rechercherAlbum($nom)
    {
        $nomparam = "%".$nom."%";
        $sql="select * from album where nom like ?";
        $resultat=MonPdo::getInstance()->prepare($sql);
        $resultat->execute(array($nomparam));
        $lesAlbums=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Album");
        return $lesAlbums;
    }
    public static function ajouterAlbum($nom,$annee,$genre,$artiste)
    {
		$sql="insert into album values(null, :nom, :annee, :genre, :alb_art)" ;
        $resultat=MonPdo::getInstance()->prepare($sql);
        $resultat->bindParam(':nom', $nom);
        $resultat->bindParam(':annee', $annee);
        $resultat->bindParam(':genre', $genre);
        $resultat->bindParam(':alb_art', $artiste);
        $resultat->execute();
		// ajouter la gestion des exceptions
    }
    public static function supprimerAlbum($id)
    {
        $sql="delete from album where id= :id " ;
        $resultat=MonPdo::getInstance()->prepare($sql);
        $resultat->bindParam(':id', $id);
        $resultat->execute();
    }
    public static function trouverAlbum($id)
    {
        $sql="SELECT nom FROM album where id= ?" ;
        $resultat=MonPdo::getInstance()->prepare($sql); // prépare la requête
        $resultat->execute(array($id)); // applique le paramètre
        $lesAlbums=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Album"); // lit la ligne et renvoie un objet Artist
        return $lesAlbums[0];
		// ajouter la gestion des exceptions
    }
	public static function modifierAlbum($id,$nom)
    {
		// a completer
        $sql="update album set nom= ? where id= ?" ;
        $resultat=MonPdo::getInstance()->prepare($sql); // prépare la requête
        $resultat->execute(array($nom,$id)); // applique le paramètre
    }

}
