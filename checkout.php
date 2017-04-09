<?php 

session_start();

function __json_encode( $data ) {            
    if( is_array($data) || is_object($data) ) { 
        $islist = is_array($data) && ( empty($data) || array_keys($data) === range(0,count($data)-1) ); 
        
        if( $islist ) { 
            $json = '[' . implode(',', array_map('__json_encode', $data) ) . ']'; 
        } else { 
            $items = Array(); 
            foreach( $data as $key => $value ) { 
                $items[] = __json_encode("$key") . ':' . __json_encode($value); 
            } 
            $json = '{' . implode(',', $items) . '}'; 
        } 
    } elseif( is_string($data) ) { 
        # Escape non-printable or Non-ASCII characters. 
        # I also put the \\ character first, as suggested in comments on the 'addclashes' page.
        $string = '"' . addcslashes($data, "\\\"\n\r\t/" . chr(8) . chr(12)) . '"'; 
        $json    = ''; 
        $len    = strlen($string); 
        # Convert UTF-8 to Hexadecimal Codepoints. 
        for( $i = 0; $i < $len; $i++ ) { 
            
            $char = $string[$i]; 
            $c1 = ord($char); 
            
            # Single byte; 
            if( $c1 <128 ) { 
                $json .= ($c1 > 31) ? $char : sprintf("\\u%04x", $c1); 
                continue; 
            } 
            
            # Double byte 
            $c2 = ord($string[++$i]); 
            if ( ($c1 & 32) === 0 ) { 
                $json .= sprintf("\\u%04x", ($c1 - 192) * 64 + $c2 - 128); 
                continue; 
            } 
            
            # Triple 
            $c3 = ord($string[++$i]); 
            if( ($c1 & 16) === 0 ) { 
                $json .= sprintf("\\u%04x", (($c1 - 224) <<12) + (($c2 - 128) << 6) + ($c3 - 128)); 
                continue; 
            } 
                
            # Quadruple 
            $c4 = ord($string[++$i]); 
            if( ($c1 & 8 ) === 0 ) { 
                $u = (($c1 & 15) << 2) + (($c2>>4) & 3) - 1; 
            
                $w1 = (54<<10) + ($u<<6) + (($c2 & 15) << 2) + (($c3>>4) & 3); 
                $w2 = (55<<10) + (($c3 & 15)<<6) + ($c4-128); 
                $json .= sprintf("\\u%04x\\u%04x", $w1, $w2); 
            } 
        } 
    } else { 
        # int, floats, bools, null 
        $json = strtolower(var_export( $data, true )); 
    } 
    return $json; 
} 

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
				<div v-if="cart.length > 1" v-for="item in cart" class="row">
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
								<img @click="decrementQte(item.id)" class="chevron" src="img/chevronGauche.svg">
								<div class="qteInput">
									{{item.qte}}
								</div>
								<img @click="incrementQte(item.id)" class="chevron" src="img/chevronDroit.svg">
							</div>
						</div>
						<div class="col-lg-2 col-md-1 col-sm-1 col-xs-2">
							<div class="cartDel" @click="delItem(item.id)">
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
				<div class="divButtonCart">
					<a class="buttonMenu">Valider ma commande</a>
				</div>
				<br/>
				<div class="divButtonCart">
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
</body>

</html>