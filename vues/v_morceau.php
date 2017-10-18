			<h2>Liste des morceaux</h2>
			<section>
			<table><tr><th>Numéro</th><th>Titre</th><th>Place dans l'album</th><th>Actions</th></tr>
			<?php
				foreach($laPiste as $piste)
				{
					$lesMorceaux=Morceau::trouverMorceau($piste->getPMor());
					foreach($lesMorceaux as $morceau)
					{
						$nom = $morceau->getNom();
						$id = $morceau->getId();
						$place = $piste->getPMor();
						?>
						<tr>
							<td width=5%><?php echo $id?><td width=40%><?php echo $nom?></td><td><?php echo $place?></td>
							<td class='action' width=15%>
								<a href='index.php?uc=Morceau&action=Modifier&nummor=<?php echo $id?>' class="imageModifier" title="Modifier le morceau"></a>
								<a href='index.php?uc=Morceau&action=Supprimer&nummor=<?php echo $id?>' class="imageSupprimer" title="supprimer l'album" ></a>
							</td>
						</tr>
						<?php
					}
				}

			?>
			</table>
			</section>
		</div>
	</div>
	<br class="clearfix" />
</div>
