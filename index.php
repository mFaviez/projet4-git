<?php
session_start();

require_once("controller/Front.php");
require_once("controller/Back.php");

if (!(isset($_GET['action']) ) ) {
		headBand();
		getAllChaps();	
}

if (isset($_GET['action'])){

	if($_GET['action']=='logOut'){//log ou session
		session_destroy();
		header("Location:index.php");
	}

/*--------------------------------Identification souscrire----------------------------------*/
	if($_GET['action']=='connexion'){
	 		headBand();
	 		formulaire();
	}//Fin de $_GET['action']=='connexion'	
	
	if($_GET['action']=='inscription'){
			headBand();
			if(isset($_POST['inscription'])) {
				$pseudo = htmlspecialchars($_POST['pseudo']);//PSEUDO
				$mdp=$_POST['mdp'];//MOT DE PASSE
				$mdp1=$_POST['mdp1'];//CONFIRMATION MOT DE PASSE
				$mail = $_POST['mail'];//ADRESSE MAIL
				$message = connexion($pseudo, $mdp, $mdp1, $mail);
				echo $message;
			}
		forminscr();
	}//Fin de $_GET['action']=='inscription'
	
	if ($_GET['action']=='subscribeMember') {//
		
		
	}
	
	if ($_GET['action']=='logger'){
		$checkPseudo = htmlspecialchars($_POST['checkPseudo']);
		$checkmdp = $_POST['checkmdp'];

		if ( isset($checkPseudo)&& isset($checkmdp) ){
			$noNickName="Aucun pseudo reconnu";
			$NoMatch="Pseudo ou mot de passe incorrect";	
				headBand();
				checkInfo($checkPseudo,$checkmdp);
				noNickName($noNickName);
				header("location:index.php");
				//NoMatch($NoMatch);
		}

	}//FIN DE L ENRISGETREMENT

/*--------------------------------FIN DE LA SOUSCRIPTION------------------------------------*/

/*--------------------------------ADMIN CONNEXION----------------------------------------*/
	if($_GET['action']=='admin'){
		if (isset($_SESSION["pseudo"])) {
			if( ($_SESSION["id"])=="115"){
				headBand();
				lastUpdate();
			}/*End of id's check*/
		}
		
	}//end of 'admin'

	if($_GET['action']=='adminOnly'){
		if (!isset($AdminPseudo)&& !isset($AdminPwd)) {
			$AdminPseudo=htmlspecialchars($_POST['IdAdmin']);
			$AdminPwd=$_POST['PwdAdmin'];
				headBand();
				lastUpdate();
				adminConnexion($AdminPseudo,$AdminPwd);
		}else{
			headBand();
			lastUpdate();
			adminConnexion($AdminPseudo,$AdminPwd);
			
		}
	}//END 'adminOnly'
/*-------------------------------FIN DE ADMIN CONNEXION-------------------------------------*/
/*--------------------------------CHAPITRE----------------------------------------*/
 	if ($_GET['action']=='chapitres') {
		//require("controller/Front.php");
		headBand();
		getAllChaps();
	}

	if($_GET['action']=='selectionchapitre'){
		//require("controller/Front.php");
		headBand();
		getOneChap();
	} 	

	if ($_GET['action']=='postChap') {
		$titleChap=$_POST['title'];
		$textChap=$_POST['tinymce_Chap'];
			headBand();
			postChap($titleChap,$textChap);
			lastUpdate();
	}

	if ($_GET['action']=='editChap') {
		$chapEdit=$_GET['id'];
			headBand();
			editChapter();
	}

	if($_GET['action']=='reEdit'){
		$idEdit=$_GET['id'];
		$titleEdit=$_POST['title'];
		$textEdit=$_POST['tinymce_Chap'];
			headBand();reEditChap($idEdit,$titleEdit,$textEdit);
			lastUpdate();
			
		}
	if ($_GET['action']=='eraseChap') {
		$idChapter=$_GET['id'];
			deletedChapAndComments($idChapter);
	}
/*--------------------------------COMMENTAIRE----------------------------------------*/
	if($_GET['action']=='ValiderComment'){
		$idChap=$_GET['id'];
		$idPseudo=$_SESSION['id'];
		$textComment=$_POST['comment'];
		 	headBand();
			addComments($idPseudo,$textComment,$idChap);		
	}
	if ($_GET['action']=='signaler'){
		$idChap=$_GET['id_chap'];
		$warningComm=$_GET['id'];
			updateWarningComm($warningComm,$idChap);
	}


	if($_GET['action']=='deleteComm'){
		$id_comm=$_GET['id'];
			deletedComment($id_comm);
	}

	if($_GET['action']=='commentChecked'){
		$id_comm=$_GET['id'];
			validationComment($id_comm);
	}

}

?>