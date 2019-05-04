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