	

			<div id="listTicket">

        		<h2>Chapitres du roman :</h2>

				<article class="chapitre"> 

						<?php 
							// Boucle d'affichage des chapitres
							while ($list=$listChapters->fetch() ) {
						?>
						<div class="ticket list-group col-lg-12">	

							<a class="list-group-item list-group-item-action" href="">
								
							<!-- Titre du chapitre -->	
								<p class="titleTicket float-left"><i class="fas fa-book-open"></i> <?php echo htmlspecialchars($list['titre']) ?></p>
							<!-- Date -->
								<p class="float-right">Ajouté le <?php echo htmlspecialchars($list['date_fr']);?></p>
							</a>
						</div>
						<?php
							}
							$listChapters->closeCursor();
						?>
				</article>


			</div>
		</section>

	</section>
	</section>
	</div>	
	</div>	
</body>
</html>