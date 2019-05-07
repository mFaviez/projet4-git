<h2>Inscription</h2>
	<section id="formConnectionRegistration">

					<form method="post" action="./index.php?action=subscribeMember">
						<p>
						<label name="nom">Saisissez votre nom :</label>
						<br>
						<input type="text" name="nom" id="nom" required>
						</p>
						
						<p>
						<label name="prenom">Saisissez votre prénom :</label>
						<br>
						<input type="text" name="prenom" id="prenom" required>
						</p>			
						
						<p>
						<label name="pseudo">Saisissez votre pseudo :</label>
						<br>
						<input type="text" name="pseudo" id="pseudo" required>
						</p>	
							
						<p>
						<label name="mail">Saisissez votre adresse E-mail :</label>
						<br>
						<input type="email" name="mail" id="mail" required/>
						<span id="mailcheck"></span>
						</p>							

						<p>							
						<label name="mdp">Saisissez votre mot de passe :</label>
						<br>
						<input type="password" name="mdp" id="motDpasse" required />
						<span id="longueurMDP"></span>
						</p>							
							
						<p>
						<label name="mdp1">Confirmez votre mot de passe :</label>
						<br>
						<input type="password" name="mdp1" id="mdp1" required />
						<span id="statutMDP"></span>
						</p>
						
						
						<input type="submit" id="valide" value="Inscription" class="btn btn-success" />
						<a href="header.php" class="btn btn-danger">Annuler</a>
					</form>
		
				<?php
					if (isset($pseudoPresent)) {
						echo "<p> Pseudo déjà utilisé, veuillez en séléctionner un autre.</p>";
					}
					if (isset($message)) {
						echo "<p class='warning_Info'>" .$message ."</p>";
					}
					if(isset($infoIssues)){
						echo "<p class='warning_Info'>" .$infoIssues."</p>";
					}
					?>
		</section>
</section>
	</section>
	</div>	
	</div>	
</body>
</html>