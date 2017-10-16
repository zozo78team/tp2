<?php //Le contr�leur secondaire g�re plusieurs cas ou actions
$action = $_REQUEST['action'];
switch($action)
{
	case 'all': 	 $lesArtistes=Artist::getAll(); // r�cup�re les liste de tous les artistes
					 include("vues/v_artistes.php"); // on appelle la vue artiste pour les afficher
					 break;

	case 'modifier' : // on appelle la m�me vue dans le cas d'un ajout ou d'une modification
					// la distinction se fera sur le param�tre de l'id de l'artiste (si c'est un ajout il n'y
					// a pas d'id puisqu'il est auto incr�ment� et qu'il n'est donc pas connu avant l'ajout !
					include("vues/v_formArtiste.php");
					break;
    case 'rechercheArt':
                    include("vues/v_formRecherche.php");
                    break;

	case 'ajouter' :
					include("vues/v_formArtiste.php");
					break;

	case 'VerifForm' :
					if(!empty($_POST['idArtiste'])) // s'il s'agit d'une modification
					{
						Artist::modifierArtiste($_POST['idArtiste'],$_POST['nomArtiste']);
						header("refresh: 0;url=index.php?uc=Artistes&action=all");
					}
					else // s'il s'agit d'un ajout
					{
						Artist::ajouterArtiste($_POST['nomArtiste']);
						header("refresh: 0;url=index.php?uc=Artistes&action=all");
					}
					break;

	case 'supprimer' :
					Artist::supprimerArtist($_REQUEST['numart']);
					header("refresh: 0;url=index.php?uc=Artistes&action=all");
					break;

	case 'artiste': //on vient de choisir un artiste on est repass� par index
            {
                //on fait appel � la m�thode getAlbums d'Artist avec le num�ro d'artiste
                //on inclut la vue v_albArt qui affiche les albums
                $Artiste=Artist::findById($_REQUEST['numart']); // recherche l'artiste
                $leArtiste=$Artiste->findById();
                include("vues/v_artistePourAlbums.php");//puis on affiche la vue qui utilise les donn�es
                break;
            }
    case 'recherche':
        {
            //on va effectuer la recherche d'un artiste avec des �l�ments de celui-ci
            if (!empty($_POST['nomart']))
            {
                $lesArtistes=Artist::rechercherArtiste($_REQUEST['nomart']);
                include("vues/v_searchArt.php");
            }else{
                echo "Vous n'avez pas s�l�ctionner de nom";
            }
            break;
        }
	default: echo "rien";
}
?>
