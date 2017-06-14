<?php 

if(!isset($_GET['method'])){
	die("Problème");
}

if($_GET['method']=="createMenu"){
    $res = json_decode(stripslashes($_POST["data"]), true);
    $_POST = $res;
	$bdd = new PDO('mysql:host=localhost;dbname=jacotte;charset=utf8', 'root', 'root');
    if(!isset($_POST["idPlat"])){ $_POST["idPlat"] = 0;}
    if(!isset($_POST["idEntree"])){ $_POST["idEntree"] = 0;}
    if(!isset($_POST["idDessert"])){ $_POST["idDessert"] = 0;}
    if(!isset($_POST["idFromage"])){ $_POST["idFromage"] = 0;}
    if(!isset($_POST["idBoisson"])){ $_POST["idBoisson"] = 0;}
    $query="INSERT INTO menu values (
    DEFAULT,
    '".$_POST["nom"]."',
    '',
    '".$_POST["prix"]."',
    '',
    '',
    '".$_POST["image"]."',
    '".$_POST["idEntree"]."',
    '".$_POST["idPlat"]."',
    '".$_POST["idDessert"]."',
    '".$_POST["idFromage"]."',
    '".$_POST["idBoisson"]."',
    '".$_POST["perso"]."'
    )";
    $bdd->query($query);

    $query = "SELECT id FROM menu WHERE id = LAST_INSERT_ID()";
    $id = $bdd->query($query);
    $id = $id->fetch();

    echo $id[0];
}

if($_GET['method']=="supprMenu"){
    $bdd = new PDO('mysql:host=localhost;dbname=jacotte;charset=utf8', 'root', 'root');
    $query = "DELETE FROM ".$_GET["type"]."
              WHERE id = ".$_GET["id"].";";
    $bdd->query($query);

    echo $query;
}

if($_GET['method']=="modifMenu"){
    $bdd = new PDO('mysql:host=localhost;dbname=jacotte;charset=utf8', 'root', 'root');
    $query = "UPDATE ".$_GET["typeProduit"].
             " SET nom = '".$_GET["nom"].
             "', type = '".$_GET["type"].
             "', description = '".$_GET["description"].
             "', prix = ".$_GET["prix"].
             ", qte = ".$_GET["quantite"].
             ", allergenes = '".$_GET["allergenes"].
             "' WHERE id = ".$_GET["id"].";";
    $bdd->query($query);

}

if($_GET['method']=="contact"){
    $bdd = new PDO('mysql:host=localhost;dbname=jacotte;charset=utf8', 'root', 'root');
}

?>