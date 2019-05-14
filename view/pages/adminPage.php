<!-- COMMENTAIRES A VERIFIER -->
<h2>Commentaires à vérifier</h2>
	<?php
		while ($listReportedComm= $reportedComments-> fetch() ) {
	?>
	<div class="text-left blocadmin">
		<p><span class="font-weight-bold">Écrit par :</span> <?php echo htmlspecialchars($listReportedComm['pseudo']);?>
		<span class="font-weight-bold"> - Le : </span><?php echo htmlspecialchars($listReportedComm['date_poste_fr']);?>
		<br><span class="font-weight-bold">Message :</span> <?= nl2br($listReportedComm['contenu']);?></p>

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

	<form id="getNewChapter" action="./index.php?action=postChap" method="post" class="text-left">
					
		<label>Titre :</label>
		<input type="text" name="title" id="title" value="" required/>
					
		<br><textarea class="tinymce" name="tinymce_Chap" id="champtextetinymce"></textarea>
					
		<input type="submit" id="send" value="Publier" class="btn btn-success" />
	</form>

<!-- LISTE DES CHAPITRES DÉJA EN LIGNE -->
<h2>Chapitres déjà publiés</h2>
	<?php
		while ($list=$listChapters->fetch() ) {
	?>
	<div class="text-left">
		<p class="admintitleTicket nomarginbottom">
			<?php echo htmlspecialchars($list['titre']) ?>
		</p>

		<p>
			<a class="btn btn-secondary" href="./index.php?action=editChap&amp;id=<?php echo $list['id']; ?>">Modifier</a>
			<a class="btn btn-danger" href="./index.php?action=eraseChap&amp;id=<?php echo $list['id']; ?>"> Effacer</a>
		</p>
	</div>
		<?php
			}
			$listChapters->closeCursor();
		?>





	
	</section>
	</section>
	</div>	
	</div>	
</body>
</html>