<?php
session_start();

if (!(isset($_GET['action']) ) ) {
	require("controller/Front.php");
		headBand();
		getAllChaps();	
}


/*--------------------------------Identification souscrire----------------------------------*/
	if($_GET['action']=='connexion'){
	 	require ("controller/Back.php");
	 		headBand();
	 		formulaire();
	}//Fin de $_GET['action']=='connexion'	
	
	if($_GET['action']=='inscription'){
		require("controller/Back.php"); 
			headBand();
			forminscr();
	}//Fin de $_GET['action']=='inscription'
	
	if ($_GET['action']=='subscribeMember') {//
		$nom = htmlspecialchars($_POST['nom']);//nom
		$prenom = htmlspecialchars($_POST['prenom']);//prenom
		$pseudo = htmlspecialchars($_POST['pseudo']);//PSEUDO
		$mdp=$_POST['mdp'];//MOT DE PASSE
		$mdp1=$_POST['mdp1'];//CONFIRMATION MOT DE PASSE
		$mail = $_POST['mail'];//ADRESSE MAIL

		if(isset($nom)&&isset($prenom)&&isset($pseudo)&&isset($mdp)&&isset($mdp1)&&isset($mail)){
			if ($mdp==$mdp1) {
				if ( preg_match ("#^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail']) ) {
					if ( isset($pseudo)&&($mdp==true)&&($mail== true) ) {
						$pseudoPresent=0;
							require ("controller/Back.php");
							headBand();
							subscribe($pseudo,$mdp,$mail,$pseudoPresent);
						$infoIssues="Pseudo déjà utilisé ! Veuillez en choisir un autre.";
							infoIssues($infoIssues);
					}
				}else{
				$message="Une erreur dans votre adresse mail s'est produite. Vérifiez vos informations";
				require ("controller/Back.php");
				headBand();
				msgMail($message);
				}
			}else{
				$message="Les 2 mots de passe ne correspondent pas";
				require ("controller/Back.php");
				headBand();
				msgPWD($message);
				
			}
		}//FIN DE isset($nom)&&isset($prenom)&&isset($pseudo)&&isset($mdp)&&isset($mdp1)&&isset($mail
			
	}
	
	if ($_GET['action']=='logger'){
		$checkPseudo = htmlspecialchars($_POST['checkPseudo']);
		$checkmdp = $_POST['checkmdp'];

		if ( isset($checkPseudo)&& isset($checkmdp) ){
			$noNickName="Aucun pseudo reconnu";
			$NoMatch="Pseudo ou mot de passe incorrect";
				require ("controller/Back.php");	
				headBand();
				checkInfo($checkPseudo,$checkmdp);
				noNickName($noNickName);
				NoMatch($NoMatch);
		}

	}//FIN DE L ENRISGETREMENT
