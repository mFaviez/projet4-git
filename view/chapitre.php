<section id="sectionTicket" class="text-left">
	<!-- Affichage du chapitre demandé -->
		<article id="displayTicket"> 
			<?php

				while($chapitre = $pickOneChap->fetch()){
			?>
			
			<!-- TITRE -->
			<h1 class="titleTicket"><?php echo htmlspecialchars($chapitre['titre']);?></h1>		
			<!-- CHAPITRE -->
			<p><?php echo($chapitre['textchap'])?></p>
			<?php
			}
				$pickOneChap->closeCursor();
			?>
		</article>
	
	
	
<!-- Affichage des commentaires -->
		<section id="displayComments">
	
			<h2 class="titrecomm">Commentaires :</h2>
				<?php		
				while($commentaires= $commByChap->fetch() ){
				?>
			
				<div id="listComments">
						<!-- INFOS COMMENTAIRE -->
						<p class="nomarginbottom underline">
						Posté par : <span class="font-weight-bold"><?php echo htmlspecialchars($commentaires['pseudo']);?></span>
						 - Le :  <?php echo htmlspecialchars($commentaires['date_poste_fr']);?>
						</p>
						<!-- COMMENTAIRE -->
						
						<p>
						<?php
							if ($commentaires['warning_comm'] ==1) {
								echo '<p class="text-success"> Vérification du contenu en cours</p>';
							}
							else {
								echo ($commentaires['contenu']);
								
							}
						?>
						</p>
						
						<!--SIGNALER -->
						<?php
							if (isset($_SESSION['pseudo'])){		
						?>
							
						<p><a class="d-block btn btn-secondary btn-signaler" href="./index.php?action=signaler&amp;id=<?php echo $commentaires['id_comm']; ?>&amp;id_chap=<?php echo $commentaires['id_chap']; ?>"> Signaler</a></p>
							
						<?php 
						} //end of pseudo session condition
						
						?>
					</div>
					<?php
						}
						$commByChap->closeCursor();
					?>
				

			</section>
<!-- Ajouter des commentaires -->			
		 <article id="registrationPostComment">
			 <h2 class="titrecomm">Laisser un commentaire :</h2>
				<?php
					if(isset($_SESSION['pseudo'])){		
				?>
				<form id="getNewComment" action="./index.php?action=ValiderComment&amp;id=<?php echo $_GET['id']; ?>" method="post">
					<label>Pseudo : <?php echo htmlspecialchars($_SESSION['pseudo']);?></label> 
					<br><textarea name="comment" id="comment"></textarea>
					<br><input type="submit" id="save" value="Envoyer" class="btn btn-success" />
				</form>	
		</article> 
					<?php
					} //end of pseudo session condition
					else {
						echo "<p class='restrictionMembre'>Vous devez être <a href='./index.php?action=connexion'>connecté </a> pour poster un commentaire.</p>";
						}
					?>



</section>		


	</section>
	</section>
	</div>	
	</div>	
</body>
</html>