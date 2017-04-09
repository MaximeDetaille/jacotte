<?php

session_start();
if(!isset($_SESSION["cart"])){
$res = json_decode(stripslashes($_POST['data']), true);
$_SESSION["cart"] = $res;
$_SESSION["couille"]=1;

var_dump($_SESSION);
}

?>