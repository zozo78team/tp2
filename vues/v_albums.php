            <h2>Liste des albums</h2>
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
						<a href='index.php?uc=Genre&action=modifier&numart=<?php echo $id ?>' class="imageModifier" title="modifier le genre"></a>
                        <span class="imageSupprimer" onclick="javascript:supprGenre('<?php echo $id ;?>')" title="supprimer le genre" ></span> <!--on met un span pour pouvoir invoquer-->
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
