	<h2>Inscription</h2>
	<section id="formConnectionRegistration">

					<form method="post" action="index.php?action=inscription">
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
						
						
						<input type="submit" id="valide" value="Inscription" class="btn btn-success" name="inscription"/>
						<a href="index.php" class="btn btn-danger">Annuler</a>
					</form>

	</section>


	</div>	
	</div>	
</body>
</html>