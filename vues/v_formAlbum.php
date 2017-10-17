<div id="page">
	<div id="content">
		<div class="box">
		<?php
		// si la variable $_REQUEST['numart'] est vide c'est qu'il s'agit d'un nouvel artiste à créer
		if(!empty($_REQUEST['numalb'])){ // si on demande une modification d'un artiste
			$lesAlbums=Album::trouverAlbum($_REQUEST['numalb']); // trouve l'artiste et on renvoie un objet Artist

		?>
			<h2>Fiche Album</h2>
			<section>
				<form action='index.php?uc=Albums&action=VerifForm' method='post'>
				<input type='hidden' name="idAlbum" id="idAlbum" value='<?php echo $_REQUEST['numalb']; ?>'>
				<label for ="nomGenre">Nom du genre</label>
				<input type="text" name="nomAlbum" id="nomAlbum" value="<?php if(!empty($_REQUEST['numalb'])){echo $lesAlbums->getNom();} ?>">
				<input type="submit" value="<?php if(!empty($_REQUEST['numalb'])){echo "Modifier l'album";}else{echo "Ajouter l'album";} ?>" />
				</form>
			</section>
			<?php } else { ?>
			<h2>Fiche Album</h2>
			<section>
				<form action='index.php?uc=Albums&action=VerifForm' method='post'>
				<label for ="nomAlbum">Nom de l'album</label> <input type="text" name="nomAlbum" id="nomAlbum" value="">
				<label for ="anneAlbum">Année de l'album</label> <input type="number" name="anneeAlbum" id="anneeAlbum" value="">
				<label for ="genreAlbum">Genre de l'album</label> <input type="number" name="genreAlbum" id="genreAlbum" value="">
				<label for ="artisteAlbum">Artiste de l'album</label> <input type="number" name="artisteAlbum" id="artisteAlbum" value="">
				<input type="submit" value="Ajouter l'album" />
				</form>
			</section>
			<?php } ?>
		</div>
	</div>
	<br class="clearfix" />
</div>

