<?php 
include('fonctions.php');
include('bdd.php');
session_start();
$array = $_SESSION['cart'];
$json = __json_encode($array);
$cart = [];
$entree = [];
$plat = [];
$dessert = [];
$fromage = [];
$boisson = [];

for($i=0;$i<sizeof($array);$i++){
	if(isset($array[$i]["idEntree"])){
		$query="SELECT * FROM entree where id = ".$array[$i]["idEntree"];
		$resultats=$bdd->query($query);
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		while($resultat = $resultats->fetch()){
			array_push($entree,$resultat);
		}
		$resultats->closeCursor();
	}

	if(isset($array[$i]["idPlat"])){
		$query="SELECT * FROM plat where id = ".$array[$i]["idPlat"];
		$resultats=$bdd->query($query);
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		while($resultat = $resultats->fetch()){
			array_push($plat,$resultat);
		}
		$resultats->closeCursor();
	}

	if(isset($array[$i]["idDessert"])){
		$query="SELECT * FROM dessert where id = ".$array[$i]["idDessert"];
		$resultats=$bdd->query($query);
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		while($resultat = $resultats->fetch()){
			array_push($dessert,$resultat);
		}
		$resultats->closeCursor();
	}

	if(isset($array[$i]["idFromage"])){
		$query="SELECT * FROM fromage where id = ".$array[$i]["idFromage"];
		$resultats=$bdd->query($query);
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		while($resultat = $resultats->fetch()){
			array_push($fromage,$resultat);
		}
		$resultats->closeCursor();
	}

	if(isset($array[$i]["idBoisson"])){
		$query="SELECT * FROM boisson where id = ".$array[$i]["idBoisson"];
		$resultats=$bdd->query($query);
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		while($resultat = $resultats->fetch()){
			array_push($boisson,$resultat);
		}
		$resultats->closeCursor();
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>La cuisine de Jacotte</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
</head>
<body>
	<?php include('navbar.php'); ?>
	<div class="container menu">
		<div class="row">
			<div class="col-lg-8">
				<h1 class="titleCheckout">Récapitulatif de votre commande</h1>
				<div>
					<a id="hiddenCart" style="display:none"><?php echo $json ?></a>
					<div v-for="(item,index) in cart" class="row">
						<div>
							<div class="col-lg-2 col-md-1 col-sm-1 col-xs-2">
								<img class="imgCart" :src="'img/produit/'+item.image"/>
							</div>
							<div class="col-lg-4 col-md-2 col-sm-3 col-xs-5 mobileCenter">
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
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
								<div>
									<button type="button" class="btn btn-info btn-lg buttonModal" data-toggle="modal" :data-target="'#myModal-'+index">Voir</button>
								</div>
							</div>
							<div class="col-lg-2 col-md-1 col-sm-1 col-xs-2">
								<div class="cartDel" @click="delItemCheckout(item.id)">
									<img class="imgCross" src="img/cross.svg">
								</div>
							</div>
						</div>
					</div>

					<!-- Modal -->
					<?php for($i=0;$i<sizeof($array);$i++){ ?>
					<div id="myModal-<?php echo $i; ?>" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Produits </h4>
								</div>
								<div class="modal-body">
									<div id="showProduit-<?php echo $i; ?>" class="row">
										<?php if(isset($entree[$i])){ ?>
										<div class="col-lg-2">
											<img class="imgCart" src="img/produit/<?php echo $entree[$i]->image; ?>"/>
											<p><?php echo $entree[$i]->nom; ?></p>
										</div>
										<?php } ?>
										<?php if(isset($plat[$i])){ ?>
										<div class="col-lg-2">
											<img class="imgCart" src="img/produit/<?php echo $plat[$i]->image; ?>"/>
											<p><?php echo $plat[$i]->nom; ?></p>
										</div>
										<?php } ?>
										<?php if(isset($dessert[$i])){ ?>
										<div class="col-lg-2">
											<img class="imgCart" src="img/produit/<?php echo $dessert[$i]->image; ?>"/>
											<p><?php echo $dessert[$i]->nom; ?></p>
										</div>
										<?php } ?>
										<?php if(isset($fromage[$i])){ ?>
										<div class="col-lg-2">
											<img class="imgCart" src="img/produit/<?php echo $fromage[$i]->image; ?>"/>
											<p><?php echo $fromage[$i]->nom; ?></p>
										</div>
										<?php } ?>
										<?php if(isset($boisson[$i])){ ?>
										<div class="col-lg-2">
											<img class="imgCart" src="img/produit/<?php echo $boisson[$i]->image; ?>"/>
											<p><?php echo $boisson[$i]->nom; ?></p>
										</div>
										<?php } ?>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-lg-3">
				<h1 class="titleCheckout">Votre commande</h1>
				<p>Total : {{prixTotal}}€</p>
				<p>Livraison : <b>Gratuite</b>
				<div @click="checkout('checkout2.php')" v-if="prixTotal > 0" class="divButtonCart">
					<a class="buttonMenu">Valider ma commande</a>
				</div>
				<br/>
				<div @click="checkout('index.php')" class="divButtonCart">
					<a class="buttonMenu">Continuer mes achats</a>
				</div>
				<br/>
				<p>Informations : </p>
				<p>Le paiement de votre commande s'effectue lors de la livraison. Paiement en espèce ou carte de crédit.</p>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="https://cdn.jsdelivr.net/vue.resource/1.2.1/vue-resource.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.2.6/vue.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
	<script type="text/javascript">
		console.log("Coucou");
		setTimeout(function(){
			vm.calcPrixTotal();
		},100);

		$('navbar-toggle collapsed').click(function(){
			$('.menu').css('margin-top','185px');
		});
	</script>
</body>

</html>