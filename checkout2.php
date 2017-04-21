<?php 
include('fonctions.php');
session_start();
var_dump($_SESSION);
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
			<div class="col-lg-offset-1 col-lg-6">
				<h1 class="titleCheckout">Votre point de livraison</h1>
				<div>
				<a id="hiddenCart" style="display:none"><?php echo $json ?></a>
				</div>
				<form id="mainForm" method="POST" action="confirmationCommande.php">
					<p class="titleInput">Ville<span class="rouge">*</span></p>
					<ul class="ville">
						<li>
						    <input type="radio" id="roubaix" name="ville" value="roubaix" checked="checked" />
						    <label for="roubaix">Roubaix</label>
						</li>
						<li>
						    <input type="radio" id="tourcoing" value="tourcoing" name="ville" />
						    <label for="tourcoing">Tourcoing</label>
						</li>
						<li>
						    <input type="radio" id="bondues" value="bondues" name="ville" value="" />
						    <label for="bondues">Bondues</label>
						</li>
						<li>
						    <input type="radio" id="wasquehal" value="wasquehal" name="ville" value="wasquehal" />
						    <label for="wasquehal">Wasquehal</label>
						</li>
					</ul>
					<p class="titleInput">Adresse<span class="rouge">*</span></p>
					<input class="inputAdresse" type="text" name="adresse" placeholder="Exemple : 1 rue Charles de Gaulle">
					<p class="erreurAdresse"></p>
					<div class="col-lg-6 sansMargin">
						<p class="titleInput">Nom<span class="rouge">*</span></p>
						<input class="inputNom" type="text" name="nom" placeholder="Votre nom">
					</div>
					<div class="col-lg-6 sansMargin">
						<p class="titleInput">Prénom</p>
						<input class="inputPrenom" type="text" name="prenom" placeholder="Votre prénom">
					</div>
					<p class="erreurNom"></p>
					<div class="col-lg-6 sansMargin">
						<p class="titleInput">N° de téléphone<span class="rouge">*</span></p>
						<input class="inputTel" type="tel" name="tel" placeholder="06.20.20.20.20">
					</div>
					<div class="col-lg-6 sansMargin">
						<p class="titleInput">Email<span class="rouge">*</span></p>
						<input class="inputMail" type="email" name="mail" placeholder="miam.miam@gmail.com">
					</div>
					<p class="erreurTel"></p>
					<p class="erreurMail"></p>
					<div class="col-lg-12 sansMargin">
						<p class="verifCheckbox"><input type="checkbox" name="newsletter"> J'autorise que l'on m'envoie le menu de la semaine par mail</p>
					</div>
					<div class="col-lg-12 sansMargin">
						<p class="verifCheckbox"><span class="rouge">* </span>Champs obligatoire</p>
					</div>
				</form>
			</div>
			<div class="col-lg-offset-1 col-lg-3">
				<h1 class="titleCheckout">Votre commande</h1>
				<p>Total : {{prixTotal}}</p>
				<p>Livraison : Gratuite</p>
				<div id="finDeCommande" >
					<div v-if="prixTotal > 0" class="divButtonCart">
						<a class="buttonMenu">Valider ma commande</a>
					</div>
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
		$('#finDeCommande').click(function(){
			$('.erreurAdresse').empty();
			$('.erreurNom').empty();
			$('.erreurTel').empty();
			$('.erreurMail').empty();
			if($("[name='adresse']")[0].value == "") $('.erreurAdresse').html('<p class="rouge" >Votre adresse n\'est pas renseignée</p>');
			if($("[name='nom']")[0].value == "") $('.erreurNom').html('<p class="rouge" >Votre nom n\'est pas renseigné</p>');
			if($("[name='tel']")[0].value == "") $('.erreurTel').html('<p class="rouge" >Votre n° de téléphone n\'est pas renseigné</p>');
			if($("[name='mail']")[0].value == "") $('.erreurMail').html('<p class="rouge" >Votre adresse mail n\'est pas renseigné</p>')
			else{
				$('#mainForm').submit();
			}
		});
		console.log("Coucou");
		setTimeout(function(){
			vm.calcPrixTotal();
		},100);
	</script>
</body>

</html>