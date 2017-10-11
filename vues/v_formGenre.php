<div id="page">
	<div id="content">
		<div class="box">
		<?php
		// si la variable $_REQUEST['numart'] est vide c'est qu'il s'agit d'un nouvel artiste à créer
		if(!empty($_REQUEST['numart'])){ // si on demande une modification d'un artiste
			$leGenre=Genre::trouverGenre($_REQUEST['numart']); // trouve l'artiste et on renvoie un objet Artist
		}
		?>
			<h2>Fiche Genre</h2>
			<section>
				<form action='index.php?uc=Genres&action=VerifForm' method='post'>
				<input type='hidden' name="idGenre" value='<?php if(!empty($_REQUEST['numart'])){echo $leGenre->getId();}?>'>
				<label for ="nomGenre">Nom du genre</label> <input type="text" name="nomGenre" id="nomGenre"
				value="<?php if(!empty($_REQUEST['numart'])){echo $leGenre->getNom();} ?>">
				<input type="submit" value="<?php if(!empty($_REQUEST['numart'])){echo "Modifier l'artiste";}else{echo "Ajouter le genre";} ?>" />
				</form>
			</section>
		</div>
	</div>
	<br class="clearfix" />
</div>

