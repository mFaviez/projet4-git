<?php
require_once("manager.php");

class ChaptersManager extends Manager
{
	public function chapterCall(){//Chapitre sur la première page.
		$bdd=$this->dbConnect();
		$chapters= $bdd->query('SELECT id,titre,textchap,date_format(date_edition,"%d.%m.%y")as date_fr FROM chapitres ORDER BY date_edition  DESC LIMIT 0,3');	
		return $chapters;
	}

	public function oneChap(){//Cette fonction sélectionnera un chapitre.
		$bdd=$this->dbConnect();
		$selectOne=$bdd->prepare('SELECT id,titre,textchap FROM chapitres WHERE id=:idPage ');
		 $selectOne->execute(array(
			'idPage'=>$_GET['id']
		 	 ));
		return $selectOne;
	
	}
	public function listChap(){	//Cette fonction appellera tout le chapitre, et seulement les 250 premiers caractères.
		$bdd=$this->dbConnect();
		$allchap= $bdd->query('SELECT id,titre,SUBSTR(textchap, 1, 250)as textchap,date_format(date_edition,"%d.%m.%y")as date_fr FROM chapitres  ');//Selection of the first 100 characters 
		return $allchap;
	}

	public function showAllChap(){
		$bdd=$this->dbConnect();
		$allchapters= $bdd->query('SELECT id,titre FROM chapitres ORDER BY DESC date_edition ');
		return $allchapters;
	}
	public function postChapter($titleChap,$textChap){//Cette fonction va ajouter un nouveau chapitre
		$bdd=$this->dbConnect();
		$newChap=$bdd->prepare('INSERT INTO chapitres ( id_pseudoAuteur,titre,textchap, date_edition) VALUES(:id_pseudoAuteur,:titre,:textchap, NOW() )' );
		$newChap->execute(array(
			'id_pseudoAuteur'=>$_SESSION['id'],
			'titre'=>$titleChap,
			'textchap'=>$textChap
			
		));
		$newChap=$bdd->query('SELECT chapitres.id_pseudoAuteur, membres.pseudo FROM chapitres LEFT JOIN membres ON chapitres.id_pseudoAuteur=membres.id');
		header("Location:index.php?action=admin");
	}

	public function reditChapter($idEdit,$titleEdit,$textEdit){//Cette fonction va changer un chapitre
		$bdd=$this->dbConnect();
		$editChap=$bdd->prepare('UPDATE chapitres SET titre=:titre, textchap=:textchap WHERE id=:id');
		$editChap->execute(array(
			'titre'=>$titleEdit,
			'textchap'=>$textEdit,
			'id'=>$idEdit
		));
		return $editChap;
	}
	public function eraseChapter($idChapter){//Cette fonction sera supprimée
		$bdd=$this->dbConnect();
		$dltAChap=$bdd->prepare('DELETE FROM chapitres WHERE id=?');
		$eraseComms=$dltAChap->execute(array($idChapter));
		header("Location:./index.php?action=admin");
	}
}