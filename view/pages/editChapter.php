<h2>Modifier le chapitre</h2>
	<?php
		while($chapitre = $pickOneChap->fetch()){
	?>

	<form id="editChaptre" action="./index.php?action=reEdit&amp;id=<?php echo $chapitre['id']; ?>" method="post" class="text-left">

		<label>Titre :</label>
		<input type="text" name="title" id="title" value="<?php echo htmlspecialchars($chapitre['titre']);?>" required/>
					
		<textarea class="tinymce"  name="tinymce_Chap" id="champtextetinymce"><?= nl2br($chapitre['textchap'])?></textarea>
					
		<input type="submit" id="edit" value="Modifier" class="btn btn-success"/>
	</form>

		<?php
			}
			$pickOneChap->closeCursor();
		?>

	</section>
	</section>
	</div>	
	</div>	
</body>
</html>