<!-- COMMENTAIRES A VERIFIER -->
<h2>Commentaires à vérifier</h2>

<?php
		while ($listReportedComm= $reportedComments-> fetch() ) {
	?>
	<div class="text-left blocadmin">

		<p>
			<a class="btn btn-success" href="./index.php?action=commentChecked&amp;id=<?php echo $listReportedComm['id_comm']; ?>">Valider</a>
			<a class="btn btn-danger" href="./index.php?action=deleteComm&amp;id=<?php echo $listReportedComm['id_comm']; ?>">Supprimer</a>

		</p>
	</div>	
		<?php
			}
			$reportedComments-> closeCursor();
		?>

<!-- ÉCRIRE UN NOUVEAU CHAPITRE -->
<h2>Écrire un nouveau chapitre</h2>

<form id="" action="" method="post" class="text-left">
					
		<label>Titre :</label>
		<input type="text" name="title" id="title" value="" required/>
					
		<br><textarea></textarea>
					
		<input type="submit" id="send" value="Publier" class="btn btn-success" />
	</form>

<!-- LISTE DES CHAPITRES DÉJA EN LIGNE -->
<h2>Chapitres déjà publiés</h2>


</section>
	</section>
	</div>	
	</div>	
</body>
</html>