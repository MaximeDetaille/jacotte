<?php

	$nom = $_POST['nom'];
	$mail = $_POST['mail'];
	$tel = $_POST['tel'];
	$objet = $_POST['objet'];
	$message = $_POST['message'];
	$text = "";

	$messageMail = '<html>
	<body style="background: #f2f2f2;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;">
		<div style="max-width: 560px;padding: 20px;background: #ffffff;border-radius: 5px;margin:40px auto;font-family: Open Sans,Helvetica,Arial;font-size: 15px;color: #666;"><div style="max-width: 560px;padding: 20px;background: #ffffff;border-radius: 5px;margin:40px auto;font-family: Open Sans,Helvetica,Arial;font-size: 15px;color: #666;">
			<div style="color: #444444;font-weight: normal;">
				<div style="text-align: center;font-weight:600;font-size:26px;padding: 10px 0;border-bottom: solid 3px #eeeeee;"><a href="https://lacuisinedejacotte.fr/"><img src="https://www.lacuisinedejacotte.fr/img/logo.jpg"></a></div>
				<div style="clear:both"></div>
			</div>
			
			<div style="padding: 0 30px 30px 30px;border-bottom: 3px solid #eeeeee;">
				<div style="padding:20px 0;font-size: 24px;text-align: center;line-height: 40px;">
					Demande de contact : '.$objet.'
				</div>
				<div style="padding:0px 0;font-size: 16px;text-align: left;line-height: 20px;">
					'.$nom.'
				</div>
				<div style="padding:0px 0;font-size: 16px;text-align: left;line-height: 20px;">
					'.$mail.'
				</div>
				<div style="padding:0px 0;font-size: 16px;text-align: left;line-height: 20px;">
					'.$tel.'
				</div>
				<div style="padding:0px 0;font-size: 16px;text-align: left;line-height: 70px;">
					'.$message.'
				</div>
			</div>
		</body>
	</html>';

	$headers = 'From: '.$mail . "\r\n";	
	$headers .= "X-Mailer: PHP ".phpversion()."\n";
	$headers .= "X-Priority: 1 \n";
	$headers .= "Mime-Version: 1.0\n";
	$headers .= "Content-Transfer-Encoding: 8bit\n";
	$headers .= "Content-type: text/html; charset= utf-8\n";
	$headers .= "Date:" . date("D, d M Y h:s:i") . " +0200\n";	
	$to      = 'lacuisinedejacotte@outlook.fr';
	$subject = 'Demande de contact';

	if(mail($to, $subject, $messageMail, $headers)){
		$text = '<p>Votre message a bien été envoyer, vous allez être rediriger</p>';
	}else{
		$text = '<p>Un problème est survenu, veuillez me contacter à l\'adresse suivante : lacuisinedejacotte@outlook.fr</p>';
	}
?>

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
			<?php 
				echo $text;
				header("refresh:3;url=index.php");
			?>
		</div>
		<?php include('footer.php'); ?>
	</body>
</html>