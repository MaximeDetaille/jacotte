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
<!-- 	<link rel="stylesheet" type="text/css" href="css/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css"> -->
	
	<link rel="stylesheet" type="text/css" href="css/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="css/slick.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php 
	include('bdd.php');
	include('navbar.php');
	?>

	<div class="jumbotron text-center jumb">
		<div class="container">
			<h1 class="titleJumb">Régalez vous,<br/> commandez de bons petits plats.</h1>
			<a href="#menu" class="buttonJumb smoothScroll">Je découvre les plats</a>
		</div>
	</div>

	<div id="work" class="howWork">
		<div class="container">
			<h2 class="text-center titleHowWorks">Comment ça marche ?</h2>
			<div class="row text-center">
				<div class="col-lg-4 divPicto">
					<img class="picto" src="img/couvert.svg" alt="Choisissez vos plats préférés">
					<h3>Vos plats préférés</h3>
					<p class="textPicto">Choisissez vos plats ou menu préférés et commandez en ligne ou par téléphone.</p>
				</div>
				<div class="col-lg-4 divPicto">
					<img class="picto" src="img/camion.svg" alt="La cuisine de Jacotte vous livre à domicile">
					<h3>Livraison chez vous</h3>
					<p class="textPicto">Nous livrons directement à votre porte.</p>
				</div>
				<div class="col-lg-4 divPicto">
					<img class="picto" src="img/food.svg" alt="Profitez de votre repas">
					<h3>Mangez et appréciez</h3>
					<p class="textPicto">Pas de cuisine et pas de nettoyage. Profitez de votre repas.</p>
				</div>
			</div>
		</div>
	</div>

	<div id="menu" class="menu">
		<div class="row noMarginMobile">
			<h2 class="text-center">Créer votre menu avec les petits plats de Jacotte</h2>
			<p v-if="seconds > 0" class="text-center textPicto">Il vous reste {{heures}}h {{ minutes}}m {{secondes}}s pour commander</p>
			<p v-else class="text-center textPicto">Commandez pour demain</p>
			<div class="nomMenu col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<div class="nomMenuChild">
					<h2 class="text-center">La commande de : (entrer votre prénom)</h2>
					<div class="text-center">
					<br>
						<input placeholder="Jacotte" type="text" v-model="nomMenu" name="nomMenu" class="inputMenu">
					</div>
					<div class="buttonOkParent col-lg-offset-5 col-md-offset-5 col-sm-offset-5 col-lg-2 col-md-2 col-sm-2 col-xs-12" @click="addMenuToCart()">
						<p class="text-center buttonOk">Continuer</p>
					</div>

				</div>
			</div>
			<div id="nomMenu" class="menu menuPersoHidden col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
				<div class="container">
					<div class="row">
						<div id="entrees" class="col-lg-2 col-xs-6">
							<div class="buttonChoix buttonChoixActive">
								<p>Entrees</p>
							</div>
						</div>
						<div id="plats" class="col-lg-2 col-xs-6">
							<div class="buttonChoix">
								<p>Plats</p>
							</div>
						</div>
						<div id="desserts" class="col-lg-2 col-xs-6">
							<div class="buttonChoix">
								<p>Desserts</p>
							</div>
						</div>
						<div id="fromages" class="col-lg-2 col-xs-6">
							<div class="buttonChoix">
								<p>Fromages</p>
							</div>
						</div>
						<div id="boissons" class="col-lg-2 col-xs-6">
							<div class="buttonChoix">
								<p>Boisson</p>
							</div>
						</div>
						<div class="col-lg-2 col-xs-6">
							Total : {{prixMenu}}€
						</div>
					</div>
				</div>
				<div id="showEntrees" class="showFood text-center">
					<div class="container">
						<div class="center slider">
	   						<?php for($i=0;$i<sizeof($entree);$i++){
								if($entree[$i]->qte > 0) { 
									echo '
								<div class="item">
									<div class="showDesc">
										!
									</div>
									<div v-on:click="addToMenuEntree('.$i.',`'.$entree[$i]->id.'`,`'.$entree[$i]->nom.'`,'.$entree[$i]->prix.',`'.$entree[$i]->image.'`,`'.$entree[$i]->qte.'`)"  class="hitbox" data-id="'.$entree[$i]->id.'" data-type="entree"></div>
									<div id="entree-'.$entree[$i]->id.'" class="showInCart"><span class="tick">✓</span></div>
									<img class="imgCarousel img-responsive" src="img/produit/'.$entree[$i]->image.'">
									<div class="description">
										<p class="type text-left">'.$entree[$i]->type.'</p>
										<p class="titreMenu text-left">'.$entree[$i]->nom.'</p>
										<p class="prix">'.$entree[$i]->prix.'€</p>
									</div>
									<div class="descriptionHover">
										<p class="titreMenu">'.$entree[$i]->nom.'</p>
										<p class="descriptionMenu">'.$entree[$i]->description.'</p>
										<p class="allergenes">Allergènes : '.$entree[$i]->allergenes.'</p>
									</div>
								</div>';
								}else{
									if($entree[$i]->qte == 0){
									echo '
									<div class="item itemDown">
									<div class="showDesc">
										!
									</div>
									<img class="imgCarousel imgVictime img-responsive" src="img/produit/'.$entree[$i]->image.'">
									<div class="description">
										<p class="type text-left">'.$entree[$i]->type.'</p>
										<p class="titreMenu text-left">'.$entree[$i]->nom.'</p>
										<p class="prix">'.$entree[$i]->prix.'€</p>
									</div>
									<div class="descriptionVictime" style="display:block;">
										Recette victime de son succès !
									</div>
									<div class="descriptionHover">
										<p class="titreMenu">'.$entree[$i]->nom.'</p>
										<p class="descriptionMenu">'.$entree[$i]->description.'</p>
										<p class="allergenes">Allergènes : '.$entree[$i]->allergenes.'</p>
									</div>
									</div>';
									}
								}
							}
							?>
						</div>
					</div>
				</div>
				<div id="showPlats" class="showFood text-center">
					<div class="container">
						<div class="center slider">
	   						<?php for($i=0;$i<sizeof($plat);$i++){
								if($plat[$i]->qte > 0) { 
									echo '
								<div class="item">
									<div class="showDesc">
										!
									</div>
									<div v-on:click="addToMenuPlat('.$i.',`'.$plat[$i]->id.'`,`'.$plat[$i]->nom.'`,'.$plat[$i]->prix.',`'.$plat[$i]->image.'`,`'.$plat[$i]->qte.'`)"  class="hitbox" data-type="plat"></div>
									<div id="plat-'.$plat[$i]->id.'" class="showInCart"><span class="tick">✓</span></div>
									<img class="imgCarousel img-responsive" src="img/produit/'.$plat[$i]->image.'">
									<div class="description">
										<p class="type text-left">'.$plat[$i]->type.'</p>
										<p class="titreMenu text-left">'.$plat[$i]->nom.'</p>
										<p class="prix">'.$plat[$i]->prix.'€</p>
									</div>
									<div class="descriptionHover">
										<p class="titreMenu">'.$plat[$i]->nom.'</p>
										<p class="descriptionMenu">'.$plat[$i]->description.'</p>
										<p class="allergenes">Allergènes : '.$plat[$i]->allergenes.'</p>
										<div v-on:click="addToMenuPlat('.$i.',`'.$plat[$i]->id.'`,`'.$plat[$i]->nom.'`,'.$plat[$i]->prix.',`'.$plat[$i]->image.'`,`'.$plat[$i]->qte.'`)" class="divButton">
											<a class="buttonMenu">Dégustez le menu</a>
										</div>
									</div>
								</div>';
								}else{
									if($plat[$i]->qte == 0){
									echo '
									<div class="item itemDown">
									<div class="showDesc">
										!
									</div>
									<img class="imgCarousel imgVictime img-responsive" src="img/produit/'.$plat[$i]->image.'">
									<div class="description">
										<p class="type text-left">'.$plat[$i]->type.'</p>
										<p class="titreMenu text-left">'.$plat[$i]->nom.'</p>
										<p class="prix">'.$plat[$i]->prix.'€</p>
									</div>
									<div class="descriptionVictime" style="display:block;">
										Recette victime de son succès !
									</div>
									<div class="descriptionHover">
										<p class="titreMenu">'.$plat[$i]->nom.'</p>
										<p class="descriptionMenu">'.$plat[$i]->description.'</p>
										<p class="allergenes">Allergènes : '.$plat[$i]->allergenes.'</p>
									</div>
									</div>';
									}
								}
							}
							?>
						</div>
					</div>
				</div>
				<div id="showDesserts" class="showFood text-center">
					<div class="container">
						<div class="center slider">
						<?php for($i=0;$i<sizeof($dessert);$i++){
								if($dessert[$i]->qte > 0) { 
									echo '
								<div class="item">
									<div class="showDesc">
										!
									</div>
									<div id="dessert-'.$dessert[$i]->id.'" class="showInCart"><span class="tick">✓</span></div>
									<div v-on:click="addToMenuDessert('.$i.',`'.$dessert[$i]->id.'`,`'.$dessert[$i]->nom.'`,'.$dessert[$i]->prix.',`'.$dessert[$i]->image.'`,`'.$dessert[$i]->qte.'`)"  class="hitbox" data-type="dessert"></div>
									<img class="imgCarousel img-responsive" src="img/produit/'.$dessert[$i]->image.'">
									<div class="description">
										<p class="type text-left">'.$dessert[$i]->type.'</p>
										<p class="titreMenu text-left">'.$dessert[$i]->nom.'</p>
										<p class="prix">'.$dessert[$i]->prix.'€</p>
									</div>
									<div class="descriptionHover">
										<p class="titreMenu">'.$dessert[$i]->nom.'</p>
										<p class="descriptionMenu">'.$dessert[$i]->description.'</p>
										<p class="allergenes">Allergènes : '.$dessert[$i]->allergenes.'</p>
										<div v-on:click="addToMenuDessert('.$i.',`'.$dessert[$i]->id.'`,`'.$dessert[$i]->nom.'`,'.$dessert[$i]->prix.',`'.$dessert[$i]->image.'`,`'.$dessert[$i]->qte.'`)" class="divButton">
											<a class="buttonMenu">Dégustez le menu</a>
										</div>
									</div>
								</div>';
								}else{
									if($dessert[$i]->qte == 0){
									echo '
									<div class="item itemDown">
									<div class="showDesc">
										!
									</div>
									<img class="imgCarousel imgVictime img-responsive" src="img/produit/'.$dessert[$i]->image.'">
									<div class="description">
										<p class="type text-left">'.$dessert[$i]->type.'</p>
										<p class="titreMenu text-left">'.$dessert[$i]->nom.'</p>
										<p class="prix">'.$dessert[$i]->prix.'€</p>
									</div>
									<div class="descriptionVictime" style="display:block;">
										Recette victime de son succès !
									</div>
									<div class="descriptionHover">
										<p class="titreMenu">'.$dessert[$i]->nom.'</p>
										<p class="descriptionMenu">'.$dessert[$i]->description.'</p>
										<p class="allergenes">Allergènes : '.$dessert[$i]->allergenes.'</p>
									</div>
									</div>';	
									}
								}
							}
							?>
						</div>
					</div>
				</div>
				<div id="showFromages" class="showFood text-center">
					<div class="container">
						<div class="center slider">
						<?php for($i=0;$i<sizeof($fromage);$i++){
								if($fromage[$i]->qte > 0) { 
									echo '
								<div class="item">
									<div class="showDesc">
										!
									</div>
									<div id="fromage-'.$fromage[$i]->id.'" class="showInCart"><span class="tick">✓</span></div>
									<div v-on:click="addToMenuFromage('.$i.',`'.$fromage[$i]->id.'`,`'.$fromage[$i]->nom.'`,'.$fromage[$i]->prix.',`'.$fromage[$i]->image.'`,`'.$fromage[$i]->qte.'`)"  class="hitbox" data-type="fromage"></div>
									<img class="imgCarousel img-responsive" src="img/produit/'.$fromage[$i]->image.'">
									<div class="description">
										<p class="type text-left">'.$fromage[$i]->type.'</p>
										<p class="titreMenu text-left">'.$fromage[$i]->nom.'</p>
										<p class="prix">'.$fromage[$i]->prix.'€</p>
									</div>
									<div class="descriptionHover">
										<p class="titreMenu">'.$fromage[$i]->nom.'</p>
										<p class="descriptionMenu">'.$fromage[$i]->description.'</p>
										<p class="allergenes">Allergènes : '.$fromage[$i]->allergenes.'</p>
										<div v-on:click="addToMenuFromage('.$i.',`'.$fromage[$i]->id.'`,`'.$fromage[$i]->nom.'`,'.$fromage[$i]->prix.',`'.$fromage[$i]->image.'`,`'.$fromage[$i]->qte.'`)" class="divButton">
											<a class="buttonMenu">Dégustez le menu</a>
										</div>
									</div>
								</div>';
								}else{
									if($fromage[$i]->qte == 0){
									echo '
									<div class="item itemDown">
									<div class="showDesc">
										!
									</div>
									<img class="imgCarousel imgVictime img-responsive" src="img/produit/'.$fromage[$i]->image.'">
									<div class="description">
										<p class="type text-left">'.$fromage[$i]->type.'</p>
										<p class="titreMenu text-left">'.$fromage[$i]->nom.'</p>
										<p class="prix">'.$fromage[$i]->prix.'€</p>
									</div>
									<div class="descriptionVictime" style="display:block;">
										Recette victime de son succès !
									</div>
									<div class="descriptionHover">
										<p class="titreMenu">'.$fromage[$i]->nom.'</p>
										<p class="descriptionMenu">'.$fromage[$i]->description.'</p>
										<p class="allergenes">Allergènes : '.$fromage[$i]->allergenes.'</p>
									</div>
									</div>';
									}
								}
							}
							?>
						</div>
					</div>
				</div>
				<div id="showBoissons" class="showFood text-center">
					<div class="container">
						<div class="center slider">
						<?php for($i=0;$i<sizeof($boisson);$i++){
								if($boisson[$i]->qte > 0) { 
									echo '
								<div class="item">
									<div class="showDesc">
										!
									</div>
									<div id="boisson-'.$boisson[$i]->id.'" class="showInCart"><span class="tick">✓</span></div>
									<div v-on:click="addToMenuBoisson('.$i.',`'.$boisson[$i]->id.'`,`'.$boisson[$i]->nom.'`,'.$boisson[$i]->prix.',`'.$boisson[$i]->image.'`,`'.$boisson[$i]->qte.'`)"  class="hitbox" data-type="boissons"></div>
									<img class="imgCarousel img-responsive" src="img/produit/'.$boisson[$i]->image.'">
									<div class="description">
										<p class="type text-left">'.$boisson[$i]->type.'</p>
										<p class="titreMenu text-left">'.$boisson[$i]->nom.'</p>
										<p class="prix">'.$boisson[$i]->prix.'€</p>
									</div>
									<div class="descriptionHover">
										<p class="titreMenu">'.$boisson[$i]->nom.'</p>
										<p class="descriptionMenu">'.$boisson[$i]->description.'</p>
										<p class="allergenes">Allergènes : '.$boisson[$i]->allergenes.'</p>
										<div v-on:click="addToMenuBoisson('.$i.',`'.$boisson[$i]->id.'`,`'.$boisson[$i]->nom.'`,'.$boisson[$i]->prix.',`'.$boisson[$i]->image.'`,`'.$boisson[$i]->qte.'`)" class="divButton">
											<a class="buttonMenu">Dégustez le menu</a>
										</div>
									</div>
								</div>';
								}else{
									if($boisson[$i]->qte == 0){
									echo '
									<div class="item itemDown">
									<div class="showDesc">
										!
									</div>
									<img class="imgCarousel imgVictime img-responsive" src="img/produit/'.$boisson[$i]->image.'">
									<div class="description">
										<p class="type text-left">'.$boisson[$i]->type.'</p>
										<p class="titreMenu text-left">'.$boisson[$i]->nom.'</p>
										<p class="prix">'.$boisson[$i]->prix.'€</p>
									</div>
									<div class="descriptionVictime" style="display:block;">
										Recette victime de son succès !
									</div>
									<div class="descriptionHover">
										<p class="titreMenu">'.$boisson[$i]->nom.'</p>
										<p class="descriptionMenu">'.$boisson[$i]->description.'</p>
										<p class="allergenes">Allergènes : '.$boisson[$i]->allergenes.'</p>
									</div>
									</div>';
									}
								}
							}
							?>
						</div>
					</div>
				</div>
				<div class="container">
					<img src="img/arrow.jpg">
				</div>
				<a href="#nomMenu">
					<div class="divButtonAddMenu">
						<p class="buttonMenu">J'ai terminé !</p>
					</div>
				</a>
				<br/>
			</div>
			<br>
			<div class="cart">
				<div class="container">
					<div class="row">
						<div v-for="item in last"> 
							<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
								<img alt="Commendez dès à présent sur La Cuisine de Jacotte.fr" class="imgCart" :src="'img/produit/'+item.image"/>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
								<p class="titreMenu">{{item.nom}}</p>
								<p class="prixMenu">{{item.prix}}€</p>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
								<div class="cartQte">
									<div class="qteInput">
										{{item.qte}}
									</div>
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
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
							<div v-if="prixTotal>30.00" @click="checkout('checkout.php')" class="divButtonCart">
								<a class="buttonMenu">Commander</a>
							</div>
							<div v-else>
								<a style="color:red;" class="buttonMenu">Il vous faut un minimum de 30€ pour commander</a>
							</div>
						</div>
						<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 hideMobile">
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
								<img class="imgCart" :src="'img/produit/'+item.image"/>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
								<p class="titreMenu">{{item.nom}}</p>
								<p class="prixMenu">{{item.prix}}€</p>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
								<div class="cartQte">
									<div class="qteInput">
										{{item.qte}}
									</div>
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
	</div>


	<div id="qualite" class="sliderQualite">
		<div class="imgSlider">
			<div class="container">
				<div class="row" style="height:100%;">
					<div class="text-left col-lg-offset-6 col-lg-6 textSlider">
						<h2>Des produits de qualité</h2>
						<p>Manger sainement au bureau c'est possible !<br><br>
De délicieuses recettes , des produits frais afin de satisfaire votre palais . Parce que manger une Cuisine équilibrée est bon pour la santé .<br><br>
C'est ce que la Cuisine de Jacotte vous propose :<br>
Des recettes saines et gourmandes avec un changement de menu toutes les semaines pour ne pas vous lasser . 
En partenariat avec les agriculteurs de la région , nous travaillons les produits de saison issus de l'agriculture biologique dès que cela est possible afin de préserver votre santé et notre environnement.<br><br>

Nous vous livrons au bureau du lundi au vendredi ( livraison gratuite à partir de 4 commandes )<br><br>

À très bientôt mes gourmands !!</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php include('footer.php'); ?>
	
	<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="https://cdn.jsdelivr.net/vue.resource/1.2.1/vue-resource.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.2.6/vue.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
	<script type="text/javascript" src="js/owl.carousel.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			$('.buttonOk').click(function(){

			})

			setTimeout(function(){
				$('#showPlats').hide();
				$('#showDesserts').hide();
				$('#showFromages').hide();
				$('#showBoissons').hide();
			},1500);
			console.log('ok');
		$(".center").slick({
			arrows:true,
	        dots: true,
	        infinite: false,
	        centerMode: false,
	        slidesToShow: 4,
	        slidesToScroll: 4,
	        mobileFirst:true,
	        responsive: [
			    {
			      breakpoint: 1024,
			      settings: {
			        slidesToShow: 2,
			        slidesToScroll: 2,
			        infinite: false,
			        dots: true
			      }
			    },
			    {
			      breakpoint: 700,
			      settings: {
			        slidesToShow: 1,
			        slidesToScroll: 1
			      }
			    },
			    {
			      breakpoint: 480,
			      settings: {
			        slidesToShow: 1,
			        slidesToScroll: 1
			      }
			    },
			    {
			      breakpoint: 0,
			      settings: {
			        slidesToShow: 1,
			        slidesToScroll: 1,
			        arrows:true,
			      }
			    }
			  ],
			  variableWidth: true
      	});


		$('.owl-carousel').owlCarousel({
	        nav:true,
		  	items:2,
		  	loop:false,
		  	margin:20,
		  	autoWidth:true,
		  	rewind:true,
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
	    })

		  	

		  	$('.showDesc').click(function(){
		  		if(!clicked){
		  			clicked=true
					$(this).parent().children('.descriptionHover').fadeIn(400);
		  		}
		  		else{
		  			clicked=false;
		  			$(this).parent().children('.descriptionHover').fadeOut(400);
		  		}
		  	})

		  	$('.divButtonMenu').click(function(){
		  		$('.menuPersoDisplay').fadeOut("slow");
		  		$('.menuClassiqueDisplay').fadeOut("slow",function(){
		  			$('.menuClassiqueHidden').fadeIn("slow");
		  		})
		  	});

		  	$('.divButtonMenuPerso').click(function(){
		  		$('.menuPersoDisplay').fadeOut("slow");
		  		$('.menuClassiqueDisplay').fadeOut("slow",function(){
		  			$('.menuPersoHidden').fadeIn("slow");
		  		})
		  	})

		  	var active ="entrees";

		  	$('.divButtonAddMenu').click(function(){
		  		updateSelectBefore(function(){
		  			active = "entrees";
		  			updateSelect();
		  		});
		  		$('.tick').each(function(index){
		  			$(this).parent().css('background-color','#000000');
		  			$(this).hide();
		  		})

		  	})

		  	updateSelectBefore(function(){
		  		active = "entrees";
		  		updateSelect();
		  	});

		  	$('#entrees').click(function(){
		  		updateSelectBefore(function(){
		  			active = "entrees";
		  			updateSelect();
		  		});
		  	});

		  	$('#plats').click(function(){
		  		updateSelectBefore(function(){
					active = "plats";
		  			updateSelect();
		  		});
		  		
		  	});

		  	$('#desserts').click(function(){
		  		updateSelectBefore(function(){
		  			active = "desserts";
		  			updateSelect();
		  		});
		  		
		  	});

		  	$('#fromages').click(function(){
		  		updateSelectBefore(function(){
		  			active = "fromages";
		  			updateSelect();
		  		});
		  	});

		  	$('#boissons').click(function(){
		  		updateSelectBefore(function(){
		  			active = "boissons";
		  			updateSelect();
		  		});
		  	});

		  	function updateSelectBefore(callback){
		  		var chaine = "#"+active;
		  		console.log($(chaine).children('.buttonChoix'))
		  		$(chaine).children('.buttonChoix').removeClass('buttonChoixActive');


		  		var activeTmp = "";
		  		for(var i =0 ;i<active.length;i++){
		  			if(i == 0){
		  				activeTmp += active[0].toUpperCase();
		  			}else{
		  				activeTmp += active[i];
		  			}
		  		}
		  		var chaine2 = '#show' + activeTmp;
		  		$(chaine2).fadeOut(100,function(){
		  			callback();
		  		});
		  	}

		  	function updateSelect(){
		  		var chaine = "#"+active;
		  		$(chaine).children('.buttonChoix').addClass('buttonChoixActive');
		  		var activeTmp = "";
		  		for(var i =0 ;i<active.length;i++){
		  			if(i == 0){
		  				activeTmp += active[0].toUpperCase();
		  			}else{
		  				activeTmp += active[i];
		  			}
		  		}
		  		var chaine2 = '#show' + activeTmp;
		  		$(chaine2).fadeIn("slow");
		  	}


		  	$('.buttonOkParent').click(function(){
		  		$('.nomMenu').fadeOut(function(){
		  			$('.menuPersoHidden').fadeIn();
		  		})
		  	});

		  	$('.divButtonAddMenu').click(function(){
		  		$('.menuPersoHidden').fadeOut(function(){
		  			$('.nomMenu').fadeIn();
		  		})
		  	});

		  	$('body').scrollspy({target: ".navbar", offset: 50});

			// Add smooth scrolling on all links inside the navbar
			$(".smoothScroll").on('click', function(event) {

			  // Make sure this.hash has a value before overriding default behavior
			  if (this.hash !== "") {

			    // Prevent default anchor click behavior
			    event.preventDefault();

			    // Store hash
			    var hash = this.hash;

			    // Using jQuery's animate() method to add smooth page scroll
			    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
			    $('html, body').animate({
			      scrollTop: $(hash).offset().top
			    }, 800, function(){

			    // Add hash (#) to URL when done scrolling (default click behavior)
			      window.location.hash = hash;
			    });

			  } // End if

			});

		});
	</script>
</body>
</html>
