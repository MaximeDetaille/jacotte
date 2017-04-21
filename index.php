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

			var_dump($menu);
			echo "<br>";
			echo "<br>";
			var_dump($entree);
			echo "<br>";
			echo "<br>";
			var_dump($plat);
			echo "<br>";
			echo "<br>";
			var_dump($dessert);
			echo "<br>";
			echo "<br>";
			var_dump($boisson);
			echo "<br>";
			echo "<br>";
			var_dump($fromage);
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
		<div class="row">
			<h1 class="text-center titleHowWorks">De nouveaux menu chaque semaine</h1>
			<p v-if="seconds > 0" class="text-center textPicto">Il vous reste {{heures}}h {{ minutes}}m {{secondes}}s pour commander</p>
			<p v-else class="text-center textPicto">Commandez pour demain</p>
			<div class="menuClassique col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="menuClassiqueDisplay">
					<div class="divButtonMenu">
						<p class="button">Choisir mon menu</p>
					</div>
				</div>
			</div>
			<div class="menuPerso col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="menuPersoDisplay">
					<div class="divButtonMenuPerso">
						<p class="button">Personnaliser mon menu</p>
					</div>
				</div>
			</div>
			<div class="menu menuClassiqueHidden col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
			{{cart}}<br/>
			{{last}}
				<div class="container">
					<div class="owl-carousel owl-theme">
						<?php for($i=0;$i<sizeof($menu);$i++){ 
							if(isset($entree) && isset($plat) && isset($dessert) && isset($fromage) && isset($boisson) && $menu[$i]->perso != 1 &&($entree[$i]->qte > 0)){

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
									<div v-on:click="addToCart('.$i.',`'.$menu[$i]->id.'`,`'.$menu[$i]->nom.'`,'.$menu[$i]->prix.',`'.$menu[$i]->image.'`,`'.$menu[$i]->idEntree.'`,`'.$menu[$i]->idPlat.'`,`'.$menu[$i]->idDessert.'`,`'.$menu[$i]->idFromage.'`,`'.$menu[$i]->idBoisson.'`)" class="divButton">
										<a class="buttonMenu">Dégustez le menu</a>
									</div>
								</div>
							</div>';
							}
						}
						?>
						<div class="owl-controls">
						</div>
					</div>
				</div>
			</div>
			<div class="menu menuPersoHidden col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
				<div class="container">
					<div class="row">
						<div id="entrees" class="col-lg-2">
							<div class="buttonChoix buttonChoixActive">
								<p>Entrees</p>
							</div>
						</div>
						<div id="plats" class="col-lg-2">
							<div class="buttonChoix">
								<p>Plats</p>
							</div>
						</div>
						<div id="desserts" class="col-lg-2">
							<div class="buttonChoix">
								<p>Desserts</p>
							</div>
						</div>
						<div id="fromages" class="col-lg-2">
							<div class="buttonChoix">
								<p>Fromages</p>
							</div>
						</div>
						<div id="boissons" class="col-lg-2">
							<div class="buttonChoix">
								<p>Boisson</p>
							</div>
						</div>
						<div class="col-lg-2">
							Total : 
						</div>
					</div>
				</div>
				{{cart}}
				<div id="showEntrees" class="showFood text-center">
					{{tmpEntree}}
					<div class="container">
						<div class="owl-carousel owl-theme">
							<?php for($i=0;$i<sizeof($entree);$i++){
								if($entree[$i]->qte > 0) { 
									echo '
								<div class="item">
									<img class="imgCarousel" src="img/menu/'.$entree[$i]->image.'">
									<div class="description">
										<p class="type">'.$entree[$i]->type.'</p>
										<p class="titreMenu">'.$entree[$i]->nom.'</p>
										<p class="prix">'.$entree[$i]->prix.'€</p>
									</div>
									<div class="descriptionHover">
										<p class="titreMenu">'.$entree[$i]->nom.'</p>
										<p class="descriptionMenu">'.$entree[$i]->description.'</p>
										<p class="allergenes">Allergènes : '.$entree[$i]->allergenes.'</p>
										<div v-on:click="addToMenuEntree('.$i.',`'.$entree[$i]->id.'`,`'.$entree[$i]->nom.'`,'.$entree[$i]->prix.',`'.$entree[$i]->image.'`,`'.$entree[$i]->qte.'`)" class="divButton">
											<a class="buttonMenu">Dégustez le menu</a>
										</div>
									</div>
								</div>';
								}
							}
							?>
							<div class="owl-controls">
							</div>
						</div>
						<div>
							<p>Nom de votre menu : <input v-model="nomMenu" type="text" name="nomMenu"></p>
						</div>
						<div @click="addMenuToCart()" class="divButtonAddMenu">
							<p class="buttonMenu">Ajouter mon menu au panier</p>
						</div>
					</div>
				</div>
				<div id="showPlats" class="showFood text-center">
					{{tmpPlat}}
					<div class="container">
						<div class="owl-carousel owl-theme">
							<?php for($i=0;$i<sizeof($plat);$i++){
								if($plat[$i]->qte > 0) { 
									echo '
								<div class="item">
									<img class="imgCarousel" src="img/menu/'.$plat[$i]->image.'">
									<div class="description">
										<p class="type">'.$plat[$i]->type.'</p>
										<p class="titreMenu">'.$plat[$i]->nom.'</p>
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
								}
							}
							?>
							<div class="owl-controls">
							</div>
						</div>
						<div @click="addMenuToCart()" class="divButtonAddMenu">
							<p class="buttonMenu">Ajouter mon menu au panier</p>
						</div>
					</div>
				</div>
				<div id="showDesserts" class="showFood text-center">
					{{tmpDessert}}
					<div class="container">
						<div class="owl-carousel owl-theme">
							<?php for($i=0;$i<sizeof($dessert);$i++){
								if($dessert[$i]->qte > 0) { 
									echo '
								<div class="item">
									<img class="imgCarousel" src="img/menu/'.$dessert[$i]->image.'">
									<div class="description">
										<p class="type">'.$dessert[$i]->type.'</p>
										<p class="titreMenu">'.$dessert[$i]->nom.'</p>
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
								}
							}
							?>
							<div class="owl-controls">
							</div>
						</div>
						<div @click="addMenuToCart()" class="divButtonAddMenu">
							<p class="buttonMenu">Ajouter mon menu au panier</p>
						</div>
					</div>
				</div>
				<div id="showFromages" class="showFood text-center">
					{{tmpFromage}}
					<div class="container">
						<div class="owl-carousel owl-theme">
							<?php for($i=0;$i<sizeof($fromage);$i++){
								if($fromage[$i]->qte > 0) { 
									echo '
								<div class="item">
									<img class="imgCarousel" src="img/menu/'.$fromage[$i]->image.'">
									<div class="description">
										<p class="type">'.$fromage[$i]->type.'</p>
										<p class="titreMenu">'.$fromage[$i]->nom.'</p>
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
								}
							}
							?>
							<div class="owl-controls">
							</div>
						</div>
						<div @click="addMenuToCart()" class="divButtonAddMenu">
							<p class="buttonMenu">Ajouter mon menu au panier</p>
						</div>
					</div>
				</div>
				<div id="showBoissons" class="showFood text-center">
					{{tmpBoisson}}
					<div class="container">
						<div class="owl-carousel owl-theme">
							<?php for($i=0;$i<sizeof($boisson);$i++){
								if($boisson[$i]->qte > 0) { 
									echo '
								<div class="item">
									<img class="imgCarousel" src="img/menu/'.$boisson[$i]->image.'">
									<div class="description">
										<p class="type">'.$boisson[$i]->type.'</p>
										<p class="titreMenu">'.$boisson[$i]->nom.'</p>
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
								}
							}
							?>
							<div class="owl-controls">
							</div>
						</div>
						<div @click="addMenuToCart()" class="divButtonAddMenu">
							<p class="buttonMenu">Ajouter mon menu au panier</p>
						</div>
					</div>
				</div>
				{{cart}}
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
									<img v-if="item.qte < item.qteStock" class="chevron" @click="incrementQte(item.id)" src="img/chevronDroit.svg">
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
								<a @click="checkout('checkout.php')" class="buttonMenu">Commander</a>
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
									<img v-if="item.qte < item.qteStock" @click="incrementQte(item.id)" class="chevron" src="img/chevronDroit.svg">
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

		});
	</script>
</body>
</html>
