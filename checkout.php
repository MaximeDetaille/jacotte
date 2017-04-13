<?php 
include('fonctions.php');
session_start();

$array = $_SESSION['cart'];
$json = __json_encode($array);
?>
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
	<?php include('navbar.php'); ?>
	<div class="container menu">
		<div class="row">
			<div class="col-lg-8">
				<h1 class="titleCheckout">Récapitulatif de votre commande</h1>
				<div>
				<a id="hiddenCart" style="display:none"><?php echo $json ?></a>
				<div v-for="item in cart" class="row">
					<div>
						<div class="col-lg-2 col-md-1 col-sm-1 col-xs-2">
							<img class="imgCart" :src="'img/menu/'+item.image"/>
						</div>
						<div class="col-lg-4 col-md-2 col-sm-3 col-xs-5">
							<p class="titreMenu">{{item.nom}}</p>
							<p class="prixMenu">{{item.prix}}€</p>
						</div>
						<div class="col-lg-4 col-md-2 col-sm-2 col-xs-3">
							<div class="cartQte">
								<img @click="decrementQteCheckout(item.id)" class="chevron" src="img/chevronGauche.svg">
								<div class="qteInput">
									{{item.qte}}
								</div>
								<img @click="incrementQte(item.id)" class="chevron" src="img/chevronDroit.svg">
							</div>
						</div>
						<div class="col-lg-2 col-md-1 col-sm-1 col-xs-2">
							<div class="cartDel" @click="delItemCheckout(item.id)">
								<img class="imgCross" src="img/cross.svg">
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
			<div class="col-lg-3">
				<h1 class="titleCheckout">Votre commande</h1>
				<p>Total : {{prixTotal}}</p>
				<p>Livraison : Gratuite</p>
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

	<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="https://cdn.jsdelivr.net/vue.resource/1.2.1/vue-resource.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.2.6/vue.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
	<script type="text/javascript">
		console.log("Coucou");
		setTimeout(function(){
			vm.calcPrixTotal();
		},100);
	</script>
</body>

</html>