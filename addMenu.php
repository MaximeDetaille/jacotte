<?php

	$bdd = new PDO('mysql:host=localhost;dbname=jacotte;charset=utf8', 'root', '');

	if ($_FILES['menuImage']['error'] > 0) $erreur = "Erreur lors du transfert";
	$extensions_valides = array('jpg','jpeg','gif','png');
	$extension_upload = strtolower(substr(strrchr($_FILES['menuImage']['name'],'.'),0));
	if (in_array($extension_upload,$extensions_valides));
	echo $extension_upload;
	echo "<br><br>";
	$name = md5($_FILES['menuImage']['name']).$extension_upload;
	move_uploaded_file($_FILES['menuImage']['tmp_name'],"C:\wamp\www\jacotte\img\menu\\".$name);

	$menu="
	INSERT INTO 
	menu(nom,description,prix,allergenes,type,image) 
	VALUES(
		'".$_POST['menuName']."',
	    '".$_POST['menuDesc']."',
	    '".$_POST['menuPrix']."',
	    '".$_POST['menuAllergenes']."',
		'".$_POST['menuType']."',
		'".$name."')
	";

	echo ($menu);
    $bdd->exec($menu);


	var_dump($_POST);
?>