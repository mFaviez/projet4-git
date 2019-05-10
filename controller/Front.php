<?php
require_once("./model/chaptersManager.php");
require_once("./model/commentsManager.php");

function  headBand(){
	require ("./view/portions/header.php");
}
/*------------------CHAPITRE-----------------------*/
function getAllChaps(){
	$callChapters= new ChaptersManager();
	$listChapters=$callChapters-> listChap();
	require("./view/pages/chapitres.php");
}

function getOneChap(){
	$callChapters= new ChaptersManager();
	$pickOneChap=$callChapters->oneChap();

	$getallComms= new CommentsManager();
	$commByChap=$getallComms->getComments();

	require("./view/pages/chapitre.php");
}
/*------------------FIN SECTION CHAPITRE-----------------------*/

/*------------------COMMENTAIRE-----------------------*/
function addComments($idPseudo,$textComment,$idChap){
	$addComm= new CommentsManager();
	$newComment=$addComm->addComment($idPseudo,$textComment,$idChap);

	$getallComms= new CommentsManager();
	$commByChap=$getallComms->getComments();
	require('./view/pages/chapitre.php');
}