<h2>Connexion</h2>
	<section id="formConnectionRegistration">

			<!--<div class="formulaires">-->
			<form method="post" action="./index.php?action=logger">
				
				<p>
					<label name="checkPseudo">Votre pseudo :</label>
					<br>
					<input type="text" name="checkPseudo" id="pseudoMember" required>
				</p>	
				
				
				<p>	
					<label name="checkmdp">Votre mot de passe :</label>
					<br>
					<input type="password" name="checkmdp" id="motDpasseMember" required />
				</p>
				
				<div>
				<input type="submit" id="validation" value="Connexion" class="btn btn-success"/>
				<p class="margintop15">Pas encore de compte&nbsp;?
				<a href="inscription.php"> Inscrivez-vous ici&nbsp;!</a></p>	
				</div>
				
			</form>
				<?php
						if (isset($noNickName)) {
							echo "<p>".$noNickName."</p>";
						}
						if(isset($NoMatch)){
							echo "<p>".$NoMatch."</p>";
						}
						?>
	</section>

</section>
	</section>
	</div>	
	</div>	
</body>
</html>