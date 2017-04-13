<?php 
include('fonctions.php');
session_start();

$array = $_SESSION['cart'];
$json = __json_encode($array);

try
  {
  	$news = false;

  	if(isset($_POST["newsletter"])){
  		$news = true;
  	}
  	else{
  		$news = false;
  	}
  	
  	$date = "";
  	$date_actu = date('Hi');
	$date_fin= 1005;
	$date_debut= 0000;
	 
	if($date_debut <= $date_actu and $date_actu <= $date_fin)
	{
		$date = date("d/m/Y");
	}
	else
	{
		$date = new DateTime('+1 day');
		$date = $date->format('d/m/Y');
	}

    $bdd = new PDO('mysql:host=localhost;dbname=jacotte;charset=utf8', 'root', '');
    $query="INSERT INTO commande values (
    DEFAULT,
    '".$_POST["ville"]."',
    '".$_POST["adresse"]."',
    '".$_POST["nom"]."',
    '".$_POST["tel"]."',
    '".$_POST["mail"]."',
    '".$news."',
    '".$date."'
    )";
    $bdd->query($query);
    $query = "SELECT id FROM commande WHERE id = LAST_INSERT_ID()";
    $id = $bdd->query($query);
    $id = $id->fetch();

    for($i = 0;$i<sizeof($_SESSION["cart"]);$i++){
    	$query="INSERT INTO commandemenu values(
    DEFAULT,
    '".$_SESSION["cart"][$i]["idMenu"]."',
    '".$id[0]."',
    '".$_SESSION["cart"][$i]["qte"]."'
    )";
    $bdd->query($query);
    }
}
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }

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
			<div class="col-lg-offset-4 col-lg-4">
				<h1 class="titleCheckout">Merci pour votre confiance !</h1>
				<div>
				<a id="hiddenCart" style="display:none"><?php echo $json ?></a>
				</div>
				<p class="textEnd">Je prépare dès à présent votre commande, un e-mail de confirmation vient d'être envoyé à l'adresse : <b><?php echo $_POST["mail"]; ?></b></p>
				<p class="textEnd">Livraison prévue le <b>08/04</b> entre <b>12h00 et 13h20</b> à <?php echo $_POST["adresse"]; ?> pour 
				<?php if($_POST["prenom"]==""){
					echo $_POST["nom"];
					} else {
						echo $_POST["prenom"]." ".$_POST["nom"];
					} ?></b></p>
				<p class="textEnd">Total de votre commande : <b>{{prixTotal}}€</b></p>
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