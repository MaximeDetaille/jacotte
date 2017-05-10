<?php

if(session_start()){
	session_destroy();
	session_start();
}
if(!isset($_SESSION["cart"])){
	$res = json_decode(stripslashes($_POST['data']), true);
	$_SESSION["cart"] = $res;
	$_SESSION["prixTotal"] = $_GET["prix"];
}

?>