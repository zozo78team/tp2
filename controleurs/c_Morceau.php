<?php
$action = $_REQUEST['action']; //récupération de l'action
//echo "action:".$action;
switch($action)
{
	case 'all': //pour afficher tous les albums
		{
			$lesMorceaux=Morceau::getAll(); //on fait appel  à la méthode d"accès aux données de la classe Album
			include("vues/v_genre.php");//puis on affiche la vue qui utilise les données
			break;
		}
	case 'chercherMorceau':
		{
			$lesMorceaux=Morceau::trouverMorceau($_REQUEST['idmor']);
			break;
		}
	case 'Modifier' :
				include("vues/v_formMorceau.php");
				break;
	case 'VerifForm':
				Morceau::modifierMorceau($_POST['idMorceau'],$_POST['nomMorceau']);
				header("refresh: 0;url=index.php?uc=Albums&action=all");
				break;
	case 'Supprimer':
				Morceau::supprimerMorceau($_POST['idMorceau']);
				header("refresh: 0;url=index.php?uc=Albums&action=all");
				break;
	default:echo "rien";
	}
?>
