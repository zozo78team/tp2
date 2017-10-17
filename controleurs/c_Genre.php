<?php
$action = $_REQUEST['action']; //récupération de l'action
//echo "action:".$action;
switch($action)
{
	case 'all': //pour afficher tous les albums
		{
			$lesGenres=Genre::getAllGenre(); //on fait appel  à la méthode d"accès aux données de la classe Album
			include("vues/v_genre.php");//puis on affiche la vue qui utilise les données
			break;
		}

	case 'modifier' : // on appelle la même vue dans le cas d'un ajout ou d'une modification
					// la distinction se fera sur le paramètre de l'id de l'artiste (si c'est un ajout il n'y
					// a pas d'id puisqu'il est auto incrémenté et qu'il n'est donc pas connu avant l'ajout !
					include("vues/v_formGenre.php");
					break;

	case 'ajouter' :
					include("vues/v_formGenre.php");
					break;

	case 'VerifForm' :
					if(!empty($_POST['idGenre'])) // s'il s'agit d'une modification
					{
						Genre::modifierGenre($_POST['idGenre'],$_POST['nomGenre']);
						header("refresh: 0;url=index.php?uc=Genres&action=all");
					}
					else // s'il s'agit d'un ajout
					{
						Genre::ajouterGenre($_POST['nomGenre']);
						header("refresh: 0;url=index.php?uc=Genres&action=all");
					}
					break;

	case 'supprimer' :
					Genre::supprimerGenre($_REQUEST['numart']);
					header("refresh: 0;url=index.php?uc=Genres&action=all");
					break;
    case 'rechercheGenre':
                    include("vues/v_formRerchercheGenre.php");
                    break;
	case 'recherche':
        {
            //on va effectuer la recherche d'un artiste avec des éléments de celui-ci
            if (!empty($_POST['nomgenre']))
            {
                $lesGenres=Genre::rechercherGenre($_REQUEST['nomgenre']);
                include("vues/v_searchGenre.php");
            }else{
                echo "Vous n'avez pas séléctionner de nom";
            }
            break;
        }

	default:echo "rien";
	}
?>
