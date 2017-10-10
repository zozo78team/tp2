<?php
$action = $_REQUEST['action']; //récupération de l'action
//echo "action:".$action;
switch($action)
{
	case 'all': //pour afficher tous les albums
		{
			$lesGenres=Genre::getAllGenre(); //on fait appel  à la méthode d"accès aux données de la classe Album
			include("/vues/v_genre.php");//puis on affiche la vue qui utilise les données
			break;
		}

	default:echo "rien";
	}
?>
