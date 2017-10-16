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
    public static function ajouterAlbum($nom,$annee,$genre,$artist)
    {
		$sql="insert into artist values('', :nom, :annee, :genre, :artist)" ;
        $resultat=MonPdo::getInstance()->prepare($sql);
        $resultat->bindParam(':nom', $nom);
        $resultat->bindParam(':annee', $annee);
        $resultat->bindParam(':genre', $genre);
        $resultat->bindParam(':artiste', $artiste);
        $resultat->execute();
		// ajouter la gestion des exceptions
    }
    public static function supprimerAlbum($id)
    {
        // a compléter
    }
    public static function findById($id)
    {
        // a compléter
    }

}
