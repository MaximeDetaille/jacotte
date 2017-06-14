<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<!-- SEO -->
		<title>La cuisine de Jacotte</title>
		<meta name="description" content="Chaque semaine, des plateaux repas gourmand livré à domicile ou en entreprise dans la métropole lilloise."/>
		<link rel="canonical" href="www.lacuisinedejacotte.fr" />
		<meta property="og:locale" content="fr_FR" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="La cuisine de Jacotte" />
		<meta property="og:description" content="Chaque semaine, des plateaux repas gourmand livré à domicile ou en entreprise dans la métropole lilloise." />
		<meta property="og:url" content="www.lacuisinedejacotte.fr" />
		<meta property="og:site_name" content="La cuisine de Jacotte" />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:description" content="Chaque semaine, des plateaux repas gourmand livré à domicile ou en entreprise dans la métropole lilloise." />
		<meta name="twitter:title" content="La cuisine de Jacotte" />
		<!-- SEO -->
		<link rel="icon" href="cb_static/img/ico/favicon.svg" type="image/gif" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		
		<link rel="stylesheet" type="text/css" href="css/slick-theme.css">
		<link rel="stylesheet" type="text/css" href="css/slick.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<nav class="navbar navbar-default navbar-perso">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<div class="navbar-brand navbar-brand"><a href="http://www.lacuisinedejacotte.fr/"><img src="img/logo.jpg"></a></div>
				</div>
				<div class="collapse navbar-collapse navbar-margin" id="myNavbar">
					<ul class="nav navbar-nav navbar-right">
						<li class="itemNav"><a class="smoothScroll" href="index.php#menu"></span>Personnalisé mon menu</a></li>
						<li class="itemNav"><a class="smoothScroll" href="index.php#qualite"></span>Produit de qualité</a></li>
						<!-- <li class="itemNav"><a href="#"></span>Blog</a></li> -->
						<li class="itemNav"><a href="contact.php"></span>Contact</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="contact container">
			<h1 class="text-center">Contact</h1>
			<div class="formContact">
				<form action="contactFinal.php" method="post">
					<div class="form-group">
						<label class="text-left" for="nom">Nom, prénom :</label>
						<input type="text" class="form-control" name="nom" id="nom">
					</div>
					<div class="form-group">
						<label class="text-left" for="email">Votre adresse mail :</label>
						<input type="email" class="form-control" name="mail" id="email">
					</div>
					<div class="form-group">
						<label class="text-left" for="tel">Numéro de téléphone :</label>
						<input type="tel" class="form-control" name="tel" id="tel">
					</div>
					<div class="form-group">
						<label class="text-left" for="objet">Objet :</label>
						<input type="text" class="form-control" name="objet" id="objet">
					</div>
					<div class="form-group">
						<label class="text-left" for="message">Message :</label>
						<textarea class="form-control" rows="4" name="message" id="message"></textarea>
					</div>
					<button type="submit" class="btn btn-default">Envoyer</button>
				</form>
			</div>
		</div>
		<?php include('footer.php'); ?>
	</body>
</html>