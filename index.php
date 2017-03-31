<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>La cuisine de Jacotte</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php 
		try{
			$menu = [];
			$bdd = new PDO('mysql:host=localhost;dbname=jacotte;charset=utf8', 'root', '');
			$query="SELECT * FROM menu";
			$resultats=$bdd->query($query);
			$resultats->setFetchMode(PDO::FETCH_OBJ);
			while($resultat = $resultats->fetch()){
				array_push($menu,$resultat);
			}
			$resultats->closeCursor();
		}

		catch (Exception $e){
			die('Erreur : ' . $e->getMessage());
		}
	?>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="navbar-brand navbar-brand-centered">La cuisine de Jacotte</div>
			</div>

			
			<div class="collapse navbar-collapse" id="navbar-brand-centered">
				<ul class="nav navbar-nav">
					<!-- <li><a href="#">Gauche</a></li> -->
				</ul>
				<ul class="nav navbar-nav navbar-right">   
					<!-- <li><a href="#">Droite</a></li> -->    
				</ul>
			</div>
		</div>
	</nav>

	<div class="jumbotron text-center jumb">
		<div class="container">
			<h1 class="titleJumb">Régalez vous,<br/> commandez de bons petits plats.</h1>
			<a class="buttonJumb">Je découvre les plats</a>
		</div>
	</div>

	<div class="howWork">
		<div class="container">
			<h1 class="text-center titleHowWorks">Comment ça marche ?</h1>
			<div class="row text-center">
				<div class="col-lg-4 divPicto">
					<img class="picto" src="img/couvert.svg">
					<h3>Vos plats préférés</h3>
					<p class="textPicto">Choisissez vos plats ou menu préférés et commandez en ligne ou par téléphone.</p>
				</div>
				<div class="col-lg-4 divPicto">
					<img class="picto" src="img/camion.svg">
					<h3>Livraison chez vous</h3>
					<p class="textPicto">Nous livrons directement à votre porte.</p>
				</div>
				<div class="col-lg-4 divPicto">
					<img class="picto" src="img/food.svg">
					<h3>Mangez et appréciez</h3>
					<p class="textPicto">Pas de cuisine et pas de nettoyage. Profitez de votre repas.</p>
				</div>
			</div>
		</div>
	</div>

	<div id="menu" class="menu">
		<div class="container">
			<h1 class="text-center titleHowWorks">De nouveaux menu chaque semaine</h1>
			<p class="text-center textPicto">Il vous reste 1h58 pour commander</p>
			<div class="owl-carousel owl-theme">
				<?php for($i=0;$i<sizeof($menu);$i++){
					echo '
					<div class="item">
					<img class="imgCarousel" src="img/menu/'.$menu[$i]->image.'">
					<div class="description">
						<p class="type">'.$menu[$i]->type.'</p>
						<p class="titreMenu">'.$menu[$i]->nom.'</p>
						<p class="prix">'.$menu[$i]->prix.'€</p>
					</div>
					<div class="descriptionHover">
						<p class="titreMenu">'.$menu[$i]->nom.'</p>
						<p class="descriptionMenu">'.$menu[$i]->description.'</p>
						<p class="allergenes">Allergènes : '.$menu[$i]->allergenes.'</p>
						<div class="divButton">
							<a v-on:click="addToCart('.$i.',`'.$menu[$i]->nom.'`,'.$menu[$i]->prix.')" class="buttonMenu">Dégustez le menu</a>
						</div>
					</div>
				</div>
				';
				}
				?>
				<div class="owl-controls">
				</div>
			</div>
		</div>
		<div>
			<ul>
				<li>{{ cart }}</li>
			</ul>
		</div>
	</div>

	
	
	<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="https://cdn.jsdelivr.net/vue.resource/1.2.1/vue-resource.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.2.6/vue.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
	<script type="text/javascript" src="js/owl.carousel.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		  $('.owl-carousel').owlCarousel({
		  	nav:true,
		  	items:2,
		  	loop:false,
		  	margin:20,
		  	autoWidth:true,
		  	responsive:{
		  		400:{
		  			items:2
		  		},
		  		768:{
		  			items:2
		  		},
		  		992:{
		  			items:3
		  		},
		  		1200:{
		  			items:4
		  		}
		  	}
		  });

		  	$('.item').hover(function(){
		  		$(this).children('.descriptionHover').fadeIn(400);
		  	}, function(){
		  		$(this).children('.descriptionHover').fadeOut(1,function(){
		  			$(this).parent().children('.description').fadeIn(200);
		  		});
		  	});
		});
	</script>
</body>
</html>