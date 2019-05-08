<?php


function  headBand(){
	require ("./view/header.php");
}

/*------------------CHAPITRE-----------------------*/
function getAllChaps(){
	$callChapters= new ChaptersManager();
	$listChapters=$callChapters-> listChap();
	require("./view/chapitres.php");
}

function getOneChap(){
	$callChapters= new ChaptersManager();
	$pickOneChap=$callChapters->oneChap();

	$getallComms= new CommentsManager();
	$commByChap=$getallComms->getComments();

	require("./view/chapitre.php");
}
/*------------------FIN SECTION CHAPITRE-----------------------*/