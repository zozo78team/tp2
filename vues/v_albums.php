            <h2>Liste des albums</h2>
            <a class="btn" href='index.php?uc=Albums&action=ajouter'>Ajouter un album</a>
			<section>
			<table><tr><th>Numéro</th><th>Titre</th><th>Année</th><th>Genre</th><th>Actions</th></tr>
			<?php
				foreach($lesAlbums as $Album) //parcours du tableau d'objets récupérés
				{
				$id=$Album->getId();
				$titre=$Album ->getNom();
				$annee=$Album ->getAnnee();
				$genre=$Album ->getGenre();
			?>
				<tr>
					<td width=5%><?php echo $id?></td><td width=40%><?php echo $titre?></td><td><?php echo $annee?></td><td><?php echo $genre?></td><!--affichage dans des liens-->
					<td class='action' width=15%>
					    <a href='index.php?uc=Albums&action=ListeMor&numart=<?php echo $id ?>' class="imageRechercher" title='Voir la liste de morceau de cette album '></a>
						<a href='index.php?uc=Albums&action=modifier&numalb=<?php echo $id ?>' class="imageModifier" title="modifier l'album"></a>
						<a href='index.php?uc=Albums&action=supprimer&numalb=<?php echo $id?>' class="imageSupprimer" title="supprimer l'album" ></a>
					</td>
				</tr>
			<?php
				}
			?>
			</table>
			</section>
		</div>
	</div>
	<br class="clearfix" />
</div>
