<?php
$action = $_REQUEST['action']; //récupération de l'action
//echo "action:".$action;
switch($action)
{
	case 'all': //pour afficher tous les albums
		{
			$lesAlbums=Album::getAll(); //on fait appel  à la méthode d"accès aux données de la classe Album
			include("vues/v_albums.php");//puis on affiche la vue qui utilise les données
			break;
		}

    case 'rechercheAlb':
                    include("vues/v_formRechercheAlb.php");
                    break;
	case 'artiste': //on vient de choisir un artiste on est repassé par index
		{
            //on fait appel à la méthode getAlbums d'Artist avec le numéro d'artiste
            //on inclut la vue v_albArt qui affiche les albums
            $Artiste=Artist::findById($_REQUEST['numart']); // recherche l'artiste
            $lesAlbums=$Artiste->getAlbums();
            include("vues/v_albumsPourArtiste.php");//puis on affiche la vue qui utilise les données
            break;
		}
    case 'genre': //on vient de choisir un artiste on est repassé par index
		{
            //on fait appel à la méthode getAlbums d'Artist avec le numéro d'artiste
            //on inclut la vue v_albArt qui affiche les albums
            $Genre=Genre::trouverGenre($_REQUEST['numart']); // recherche l'artiste
            $lesAlbums=$Genre->getAlbums();
            include("vues/v_albumsPourGenre.php");//puis on affiche la vue qui utilise les données
            break;
		}
	case 'recherche':
        {
            //on va effectuer la recherche d'un artiste avec des éléments de celui-ci
            if (!empty($_POST['nomalb']))
            {
                $lesAlbums=Album::rechercherAlbum($_REQUEST['nomalb']);
                include("vues/v_searchAlb.php");
            }else{
                echo "Vous n'avez pas séléctionner de nom";
            }
            break;
        }
	case 'ajouter' :
				include("vues/v_formAlbum.php");
				break;
	case 'supprimer' :
				Album::supprimerAlbum($_REQUEST['numalb']);
				header("refresh: 0;url=index.php?uc=Albums&action=all");
				break;

	case 'modifier' : // on appelle la même vue dans le cas d'un ajout ou d'une modification
				// la distinction se fera sur le paramètre de l'id de l'artiste (si c'est un ajout il n'y
				// a pas d'id puisqu'il est auto incrémenté et qu'il n'est donc pas connu avant l'ajout !
				include("vues/v_formAlbum.php");
				break;
	case 'VerifForm' :
				var_dump($_POST);
				if(!empty($_POST['idAlbum'])) // s'il s'agit d'une modification
				{
					Album::modifierAlbum($_POST['idAlbum'],$_POST['nomAlbum']);
					header("refresh: 0;url=index.php?uc=Albums&action=all");
				}
				else // s'il s'agit d'un ajout
				{
					Album::ajouterAlbum($_POST['nomAlbum'],$_POST['anneeAlbum'],$_POST['genreAlbum'],$_POST['artisteAlbum']);
					header("refresh: 0;url=index.php?uc=Albums&action=all");
				}
				break;

	default:echo "rien";
	}
	?>
