<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1, user-scalable=no">
	<title>Billet simple pour l'Alaska</title>
	<meta name="description" content="Découvrez le nouveau roman de Jean Forteroche, Billet simple pour Alaska">
	<link rel="stylesheet" href="../contenu/css/style.css">
	<link rel="stylesheet" href="../contenu/css/bootstrap-4.3.1-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
	
	<div class="container">
		<div class="row">
			<header class="col-lg-4" id="menu">
				
				<!-- LOGO + TITRE -->
				<p class="text-center" style="margin-top: 10px;"><img src="../contenu/images/logo.png"></p>
					<h1 class="font-weight-bold text-center text-uppercase row">Billet simple pour l'Alaska</h1>
	
				<!-- NAV -->
					<nav>
						<ul id="oneLevel">
	
						<!-- BOUTON ACCUEIL -->
							<li><a href="" title="Retourner à l'accueil"><i class="fa fa-home"></i> Accueil</a></li>
	
						<!-- BOUTON ADMINISTRATEUR -->
							<li><a href="adminPage.php" title="Retourner à l'accueil"><i class="fa fa-home"></i> Administrateur</a></li>
							
						<!-- BOUTON CONNEXION ET INSCRIPTION -->
							<?php
									if (!isset($_SESSION['pseudo'])){
								?> 
							<li>
								<a href="connexion.php"><i class="fas fa-user"></i> Connexion</a>
							</li>
							<li>
								<a href="inscription.php"><i class="fas fa-check"></i> Créer un compte</a>								
							</li>
							<?php
									}
								?>
						</ul>
					</nav>
				<!-- MENTIONS -->
						<p class="text-center"><img src="../contenu/images/admin.jpg"></p>
							<div class="description">
							<p>	Bonjour à tout, mon nouveau Blog pour vous faire découvrir mon nouveau roman <span>"Billet simple pour l'Alaska"</span>. Je vais publier ce nouveau roman par chapitre directement sur ce blog.<br>
							<span>Merci à tous et bonne lecture !</span></p>
							</div>
				
				<div class="mentions">
						<h3><a href="../contenu/pdf-mention-legale.pdf">Mentions légales</a></h3>
						</div>
						<p class="footer-copyright">©2019 Copyright: Projet 4 - Michaël Faviez </p>			
								
					</header>
			<!-- CONTENU -->
<section class="col-lg-6 offset-lg-1 text-center" id="contenu">
							
</body>					
</html>