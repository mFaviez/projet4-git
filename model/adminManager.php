<?php
require_once("manager.php");

class membersManager extends Manager
{

	public function checkPseudo($pseudo) {
		$bdd=$this->dbConnect();
		$req = $bdd->prepare('SELECT * FROM membres WHERE pseudo = :pseudo');
		$req->execute(array(
			'pseudo' => $pseudo
		));

		$count = $req->rowCount();

		if($count >= 1) {
			return true;
		}else {
			return false;
		}

	}
	public function checkInfo($checkPseudo,$checkmdp){
		$bdd=$this->dbConnect();
		$req= $bdd->prepare('SELECT id,mdp FROM membres WHERE pseudo=:pseudo');
		$req->execute(array(
	   			    'pseudo' => $checkPseudo
	   			));
	
		$resultat = $req->fetch();
		$isPasswordCorrect = password_verify($checkmdp, $resultat['mdp']);

		if (!$resultat){
			
		}
		else{
	    	if ($isPasswordCorrect) {
	        	$_SESSION['id'] = $resultat['id'];
	       		$_SESSION['pseudo'] = $checkPseudo;
	        	echo 'Content de vous revoir '. $_SESSION['pseudo'];
	        		//header("Location:./index.php");
	   		}
	   		else{
	   			echo "Une erreur est survenu. Veuilliez ré-essayer.";
	    	}
		}
		return $isPasswordCorrect; 
	}

	public function getNewUser($pseudo,$mdp,$mail,$pseudoPresent){
		$bdd=$this->dbConnect();
		/*Cette partie vérifiera si le nouveau membre a déjà écrit un pseudo.*/
		$verif=$bdd->prepare('SELECT pseudo FROM membres WHERE pseudo=:pseudo LIMIT 0,1');
		$verif->execute(array(
	   			    'pseudo'=>$pseudo
	   			));
		$resultat=$verif->fetch();

		if($resultat['pseudo']==$pseudo){
				$pseudoPresent=1;
				return $pseudoPresent;
				
		}//FIN DE LA VERIFICATION DES MEMBRES
		else{//Si toutes les conditions sont vraies, OK POUR S ABONNER
				
				$pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

				$user = $bdd->prepare('INSERT INTO membres(pseudo,mail,mdp) VALUES(:pseudo,:mail,:mdp )');
		
				
				$info=$user->execute(array(
						'pseudo'=>$pseudo,
						'mail'=>$mail,
						'mdp'=>$pass_hache
					));

				$membreLogin= $bdd->prepare('SELECT id FROM membres WHERE pseudo=:pseudo ');
				$membreLogin->execute(array(
	   			    'pseudo'=>$pseudo
	   			));
	   			$SessionInfos=$membreLogin->fetch();
	   			
				$_SESSION["id"]=$SessionInfos["id"];
			 	$_SESSION["pseudo"]=$pseudo;

				//header("Location:./index.php");
		
			}
	}

	public function AdminCheckInfo($AdminPseudo,$AdminPwd){
		$bdd=$this->dbConnect();
		$idAdmin="115";
		$req= $bdd->prepare('SELECT * FROM membres WHERE id=:id AND pseudo=:pseudo');
		$req->execute(array(
					'id'=>$idAdmin,
	   			    'pseudo'=>$AdminPseudo
	   			));

		$resultat = $req->fetch();
		$isPasswordCorrect = password_verify($AdminPwd, $resultat['mdp']);
		
		if($isPasswordCorrect){
				if($resultat['id']=="115"){
					$_SESSION['id']=$resultat['id'];
					$_SESSION['pseudo'] = $AdminPseudo;
				}
				else{
					echo "Vous n'avez pas accès à cette partie du blog, redirection en cours";
					//header("Location: ./index.php");
				}
		}else{
			echo"Votre mot de passe ou votre pseudo est incorrecte";
		}
	}//FIN DE LA FUNCTION ADMINCHECKUNFO


}//FIN DE LA CLASS membersManager();