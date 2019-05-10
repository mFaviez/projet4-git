<?php
/*----------------OBLIGATION D'ADMINISTRER----------------*/
require_once("./model/adminManager.php");
require_once("./model/chaptersManager.php");
require_once("./model/commentsManager.php");

function adminPage(){
	require("./view/pages/connexionAdmin.php");
}

function formulaire(){
	require ("./view/pages/connexion.php");
}
function forminscr(){
	require ("./view/pages/inscription.php");
}
function sessionOut(){
	require('./index.php');
}

/*--------------------------------CONNEXION----------------------------------------*/
function checkInfo($checkPseudo,$checkmdp){
	$checkUser= new membersManager();
	$userLogin= $checkUser->checkInfo($checkPseudo,$checkmdp);
	//A redirection will be done on the Adminpage.php
}

function subscribe($pseudo,$mdp,$mail,$pseudoPresent){
	$newMember= new membersManager();
	$subMember= $newMember->getNewUser($pseudo,$mdp,$mail,$pseudoPresent);
	//A redirection will be done on the Adminpage.php
}

function verifyPseudo($pseudo) {
	$member = new membersManager();
	$result = $member->checkPseudo($pseudo);
	return $result;
}

function adminConnexion($AdminPseudo,$AdminPwd){
	$adminlog= new membersManager();
	$infoAdmin= $adminlog->AdminCheckInfo($AdminPseudo,$AdminPwd);
	require("./view/pages/adminPage.php");
}

function connexion($pseudo, $mdp, $mdp1, $mail) {
	if(isset($pseudo)&&isset($mdp)&&isset($mdp1)&&isset($mail)){
		if ($mdp==$mdp1) {
			if ( preg_match ("#^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail']) ) {
				if ( isset($pseudo)&&($mdp==true)&&($mail== true) ) {
					if(verifyPseudo($pseudo) == true) {
						$message ="Pseudo déjà utilisé ! Veuillez en choisir un autre.";
					return $message;
					}else {
						$pseudoPresent=0;
						subscribe($pseudo,$mdp,$mail,$pseudoPresent);
						$message = "Inscription réussi !";
						return $message;
					}
				}
			}else{
			$message="Une erreur dans votre adresse mail s'est produite. Vérifiez vos informations";
			return $message;
			}
		}else{
			$message="Les 2 mots de passe ne correspondent pas";
			return $message;	
		}
	}//FIN DE isset($pseudo)&&isset($mdp)&&isset($mdp1)&&isset($mail
}
/*--------------------------------MESSAGE CONNECTER----------------------------------------*/
function msgPWD($message){
	$message;

//	require('./view/pages/connexion.php');
	// require('./view/pages/inscription.php');
	
}
function msgMail($message){
	$message;

	require('./view/pages/connexion.php');
	
}

function infoIssues($infoIssues){
	$infoIssues;
	require('./view/pages/connexion.php');
	
}
function noNickName($noNickName){

	$noNickName;
	require('./view/pages/connexion.php');
	
}
function NoMatch($NoMatch){
	$NoMatch;

	require('./view/pages/connexion.php');
	
}
/*--------------------------------FIN SECTION MESSAGE CONNECTER ET CONNEXION----------------*/


function updateWarningComm($warningComm,$idChap){
	$signalement= new CommentsManager();
	$warningComment=$signalement->signalComm($warningComm,$idChap);
	require('./view/pages/chapitre.php');
}
/*--------------------------------ADMIN----------------------------------------*/
function lastUpdate(){
	$callChapters= new ChaptersManager();
	$listChapters=$callChapters-> listChap();

	$repotedComm= new CommentsManager();
	$reportedComments= $repotedComm->getReportingComments();

	require("./view/pages/adminPage.php");
}
/*--------------------------------CHAPITRE----------------------------------------*/
function postChap($titleChap,$textChap){
	$postNewChap=new chaptersManager();
	$newChapter= $postNewChap->postChapter($titleChap,$textChap);
	//A redirection will be done on the Adminpage.php
}

function editChapter(){
	$callChapters= new ChaptersManager();
	$pickOneChap=$callChapters->oneChap();

	require("./view/pages/editChapter.php");
}

function reEditChap($idEdit,$titleEdit,$textEdit){
	$editChapter= new ChaptersManager();
	$reEditChapter=$editChapter->reditChapter($idEdit,$titleEdit,$textEdit);
	//A redirection will be done on the Adminpage.php
}

function deletedChapAndComments($idChapter){
	$deletedChapter= new ChaptersManager();
	$dltOneChapter= $deletedChapter->eraseChapter($idChapter);

	$deletedAllComments= new CommentsManager();
	$dltAllCommments= $deletedAllComments-> deleteAllComments($idChapter);
	//A redirection will be done on the Adminpage.php
}
/*--------------------------------FIN SECTION CHAPITRE--------------------------------------*/

/*--------------------------------COMMENTAIRE----------------------------------------*/
function deletedComment($id_comm){
	$eraseComment= new CommentsManager();
	$erase=$eraseComment->deleteComment($id_comm);
	//A redirection will be done on the commentsManager.php
}

function validationComment($id_comm){
	$checkingComm= new CommentsManager();
	$commentOk= $checkingComm-> commentValidation($id_comm);
	//A redirection will be done on the commentsManager.php
}
/*--------------------------------FIN SECTION COMMENTAIRE-----------------------------------*/
