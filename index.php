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
	include('bdd.php');
	include('navbar.php');
	?>

	<div class="jumbotron text-center jumb">
		<div class="container">
			<h1 class="titleJumb">Régalez vous,<br/> commandez de bons petits plats.</h1>
			<a class="buttonJumb">Je découvre les plats</a>
		</div>
	</div>

	<div id="work" class="howWork">
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

	<div class="menu">
		<div class="menu"> 
			<div class="container">
				<h1 class="text-center titleHowWorks">De nouveaux menu chaque semaine</h1>
				<p v-if="seconds > 0" class="text-center textPicto">Il vous reste {{heures}}h {{ minutes}}m {{secondes}}s pour commander</p>
				<p v-else class="text-center textPicto">Commandez pour demain</p>
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
							<div v-on:click="addToCart('.$i.',`'.$menu[$i]->nom.'`,'.$menu[$i]->prix.',`'.$menu[$i]->image.'`)" class="divButton">
								<a class="buttonMenu">Dégustez le menu</a>
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
		</div>
		<br>
		<div class="cart">
			<div class="container">
				<div class="row">
					<div v-for="item in last"> 
						<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
							<img class="imgCart" :src="'img/menu/'+item.image"/>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
							<p class="titreMenu">{{item.nom}}</p>
							<p class="prixMenu">{{item.prix}}€</p>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
							<div class="cartQte">
								<img class="chevron" @click="decrementQte(item.id)" src="img/chevronGauche.svg">
								<div class="qteInput">
									{{item.qte}}
								</div>
								<img class="chevron" @click="incrementQte(item.id)" src="img/chevronDroit.svg">
							</div>
						</div>
						<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
							<div class="cartDel" @click="delItem(item.id)">
								<img class="imgCross" src="img/cross.svg">
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-2 col-xs-6">
						<p class="titreMenu">Total :</p>
						<p >{{prixTotal}}€</p>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
						<div class="divButtonCart">
							<a @click="checkout()" class="buttonMenu">Commander</a>
						</div>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
						<div class="cartUp">
							<img class="chevronUp" src="img/chevronUp.svg">
						</div>
					</div>
				</div>
				<div v-if="cart.length > 1" v-for="item in cart" class="row showCart">
					<div v-if="item.id==lastId">
					</div>
					<div v-else>
						<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
							<img class="imgCart" :src="'img/menu/'+item.image"/>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
							<p class="titreMenu">{{item.nom}}</p>
							<p class="prixMenu">{{item.prix}}€</p>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
							<div class="cartQte">
								<img @click="decrementQte(item.id)" class="chevron" src="img/chevronGauche.svg">
								<div class="qteInput">
									{{item.qte}}
								</div>
								<img @click="incrementQte(item.id)" class="chevron" src="img/chevronDroit.svg">
							</div>
						</div>
						<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
							<div class="cartDel" @click="delItem(item.id)">
								<img class="imgCross" src="img/cross.svg">
							</div>
						</div>
					</div>
				</div>
			</div> 
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
