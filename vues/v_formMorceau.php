<div id="page">
	<div id="content">
		<div class="box">
		<?php
		// si la variable $_REQUEST['numart'] est vide c'est qu'il s'agit d'un nouvel artiste à créer
			$leMorceau=Morceau::trouverMorceau($_REQUEST['nummor']);
			var_dump($leMorceau);
		?>
			<h2>Fiche Morceau</h2>
			<section>
				<form action='index.php?uc=Morceau&action=VerifForm' method='post'>
				<input type='hidden' name="idMorceau" id="idMorceau" value='<?php echo $leMorceau->getId();?>'>
				<label for ="nomMorceau">Nom du morceau</label> <input type="text" name="nomMorceau" id="nomMorceau"
				value="<?php echo $leMorceau->getNom(); ?>">
				<input type="submit" value="Modifier le morceau" />
				</form>
			</section>
		</div>
	</div>
	<br class="clearfix" />
</div>

