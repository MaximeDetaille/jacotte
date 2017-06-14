<?php 

$bdd = new PDO('mysql:host=localhost;dbname=jacotte;charset=utf8', 'root', 'root');
$mail = "";
$commande = [];
$menu=[];
$query="SELECT * FROM commande WHERE dateLivraison='".date('d/m/Y')."'";
$resultats=$bdd->query($query);
$resultats->setFetchMode(PDO::FETCH_OBJ);
while($resultat = $resultats->fetch()){
	array_push($commande,$resultat);
}
$resultats->closeCursor();

for($i=0;$i<sizeof($commande);$i++){
	$query = $bdd->prepare("SELECT m.nom as nomMenu, e.nom as entree,p.nom as plat,d.nom as dessert,f.nom as fromage,b.nom as boisson FROM commande c,commandemenu cm,menu m,entree e,plat p,dessert d,fromage f,boisson b WHERE 
		e.id = m.idEntree AND
		p.id = m.idPlat AND
		d.id = m.idDessert AND
		f.id = m.idFromage AND
		b.id = m.idBoisson AND
		c.id = cm.idCommande AND
		cm.idMenu = m.id AND
		c.dateLivraison = '".date('d/m/Y')."'AND
		c.id =".$commande[$i]->id);
	var_dump($query);
	$query->execute();
	$menu[$i] = $query->fetchAll();
}

var_dump($commande);

$variable = "";

for($i=0;$i<sizeof($commande);$i++){
	$variable=$variable.'<div style="font-size: 16px;text-align:left;margin-top:20px;"><strong>Commande n°'.$i.'</strong><span style="display:block;">Pour '.$commande[$i]->nom.'</span><span style="display:block;">Adresse : '.$commande[$i]->adresse.', '.$commande[$i]->ville.'</span><span style="display:block;">Tel : '.$commande[$i]->tel.'</span><span style="display:block;">Total : '.$commande[$i]->prixTotal.'€</span></div>';
	for($y=0;$y<sizeof($menu[$i][$y]);$y++){
		$variable=$variable.'
			<div style="font-size:14px;text-align:left; display:block; margin-top:10px;margin-bottom:10px;font-size:16px;text-decoration:underline;"><span>Menu : '.$menu[$i][$y][0].'</span></div>
			<div style="font-size:14px;text-align:left; display:block;"><span>Entree : '.$menu[$i][$y][1].'</span></div>
			<div style="font-size:14px;text-align:left; display:block;"><span>Plat : '.$menu[$i][$y][2].'</span></div>
			<div style="font-size:14px;text-align:left; display:block;"><span>Dessert : '.$menu[$i][$y][3].'</span></div>
			<div style="font-size:14px;text-align:left; display:block;"><span>Fromage : '.$menu[$i][$y][4].'</span></div>
			<div style="font-size:14px;text-align:left; display:block;"><span>Boisson : '.$menu[$i][$y][5].'</span></div>';
	}
}

$mail = '<html>
<body style="background: #f2f2f2;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;">

<div style="max-width: 560px;padding: 20px;background: #ffffff;border-radius: 5px;margin:40px auto;font-family: Open Sans,Helvetica,Arial;font-size: 15px;color: #666;">

	<div style="color: #444444;font-weight: normal;">
		<div style="text-align: center;font-weight:600;font-size:26px;padding: 10px 0;border-bottom: solid 3px #eeeeee;"><a href="https://lacuisinedejacotte.fr/"><img src="http://lacuisinedejacotte.fr/img/logo.jpg"></a></div>
		
		<div style="clear:both"></div>
	</div>
	
	<div style="padding: 0 30px 30px 30px;border-bottom: 3px solid #eeeeee;">

		<div style="padding:20px 0;font-size: 24px;text-align: center;line-height: 40px;">R&eacute;capitulatif de commande du '.date('d/m/Y').'</div>
		'.$variable.'
		<hr/>
		<!-- FIN CMD -->

	</div>
	
	<div style="color: #999;padding: 20px 30px">
		<div style="">Merci !</div>
	</div>
</div>
</body>
</html>';

echo $mail;

$headers = 'From: website' . "\r\n";	
$headers .= "X-Mailer: PHP ".phpversion()."\n";
$headers .= "X-Priority: 1 \n";
$headers .= "Mime-Version: 1.0\n";
$headers .= "Content-Transfer-Encoding: 8bit\n";
$headers .= "Content-type: text/html; charset= utf-8\n";
$headers .= "Date:" . date("D, d M Y h:s:i") . " +0200\n";	
$to      = 'lacuisinedejacotte@outlook.fr';
$subject = 'Récapitulation commande du jour';
$message = $mail;

//mail($to, $subject, $message, $headers);

?>