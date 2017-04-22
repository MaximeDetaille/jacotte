<?php

	$bdd = new PDO('mysql:host=localhost;dbname=jacotte;charset=utf8', 'root', 'root');

	if($_GET["method"]=="menu"){
		if ($_FILES['menuImage']['error'] > 0) $erreur = "Erreur lors du transfert";
		$extensions_valides = array('jpg','jpeg','gif','png');
		$extension_upload = strtolower(substr(strrchr($_FILES['menuImage']['name'],'.'),0));
		if (in_array($extension_upload,$extensions_valides));
		$name = md5($_FILES['menuImage']['name']).$extension_upload;
		move_uploaded_file($_FILES['menuImage']['tmp_name'],"C:\wamp\www\jacotte\img\menu\\".$name);

		$menu='
		INSERT INTO 
		menu(nom,description,prix,allergenes,type,image,idEntree,idPlat,idDessert,idFromage,idBoisson) 
		VALUES(
			"'.$_POST['menuName'].'",
		    "'.$_POST['menuDesc'].'",
		    "'.$_POST['menuPrix'].'",
		    "'.$_POST['menuAllergenes'].'",
			"'.$_POST['menuType'].'",
			"'.$name.'",
			"'.$_POST['menuEntree'].'",
			"'.$_POST['menuPlat'].'",
			"'.$_POST['menuDessert'].'",
			"'.$_POST['menuFromage'].'",
			"'.$_POST['menuBoisson'].'"
			)
		';
	    if($bdd->exec($menu)){
			echo "Votre menu à bien été ajouté";
			$delai=3;
			$url="http://".$_SERVER['HTTP_HOST']."/jacotte";
			header("Refresh: $delai;url=$url");
	    }else{
	    	echo "Un problème est survenue";
	    }
	}

	if($_GET["method"]=="produit"){
		if ($_FILES['productImage']['error'] > 0) $erreur = "Erreur lors du transfert";
		$extensions_valides = array('jpg','jpeg','gif','png');
		$extension_upload = strtolower(substr(strrchr($_FILES['productImage']['name'],'.'),0));
		if (in_array($extension_upload,$extensions_valides));
		$name = md5($_FILES['productImage']['name']).$extension_upload;
		move_uploaded_file($_FILES['productImage']['tmp_name'],"C:\wamp\www\jacotte\img\produit\\".$name);

		$product='
		INSERT INTO 
		 '.$_POST["product"].' (nom,description,prix,allergenes,type,image,qte) 
		VALUES(
			"'.$_POST['productName'].'",
		    "'.$_POST['productDesc'].'",
		    "'.$_POST['productPrix'].'",
		    "'.$_POST['productAllergenes'].'",
			"'.$_POST['productType'].'",
			"'.$name.'",
			"'.$_POST['productQuantite'].'"
			)
		';
	    if($bdd->exec($product)){
			echo "Votre produit à bien été ajouté";
			$delai=3;
			$url="http://".$_SERVER['HTTP_HOST']."/jacotte";
			header("Refresh: $delai;url=$url");
	    }else{
	    	echo "Un problème est survenue";
	    }
	}
   
?>