<?php
/*----------------OBLIGATION D'ADMINISTRER----------------*/
function adminPage(){
	require("");
}

function formulaire(){
	require ("");
}
function forminscr(){
	require ("");
}
function sessionOut(){
	require('');
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

function adminConnexion($AdminPseudo,$AdminPwd){
	$adminlog= new membersManager();
	$infoAdmin= $adminlog->AdminCheckInfo($AdminPseudo,$AdminPwd);
	require("./view/pages/adminPage.php");
}
/*--------------------------------MESSAGE CONNECTER----------------------------------------*/
function msgPWD($message){
	$message;

	require('./view/pages/connexion.php');
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