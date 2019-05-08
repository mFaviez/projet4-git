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

	public function showAllChap(){
		$bdd=$this->dbConnect();
		$allchapters= $bdd->query('SELECT id,titre FROM chapitres ORDER BY DESC date_edition ');
		return $allchapters;
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
		//header("Location:./index.php?action=admin");
	}
}