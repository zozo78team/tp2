            <h2>Liste des genres</h2>
			<section>
				<a class="btn" href='index.php?uc=Genres&action=ajouter'>Ajouter un genre</a>
			<table><tr><th>Numéro</th><th>Titre</th><th>Actions</th></tr>
			<?php
				foreach($lesGenres as $Genre) //parcours du tableau d'objets récupérés
				{
				$id=$Genre->getId();
				$titre=$Genre ->getNom();
			?>
				<tr>
					<td width=5%><?php echo $id?></td><td width=80%><?php echo $titre?></td><!--affichage dans des liens-->
					<td class='action' width=15%>
                        <a href='index.php?uc=Albums&action=genre&numart=<?php echo $id ?>' class="imageRechercher" title='Voir la liste des albums'></a>
                        <?php
                        //If (!empty( $_SESSION['connexion']))  si quelqu'un est connecté
                        //{ ?>
                            <a href='index.php?uc=Genres&action=modifier&numart=<?php echo $id ?>' class="imageModifier" title="modifier le genre"></a>
                            <a href='index.php?uc=Genres&action=supprimer&numart=<?php echo $id ?>' class="imageSupprimer" title="supprimer le genre"></a>

                        <?php // } ?>
					</td>
				</tr>
			<?php
				}
			?>
			</table>
			</section>

	<br class="clearfix" />



