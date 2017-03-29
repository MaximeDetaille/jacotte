<?php 

try
  {
  	$menu = [];
    $bdd = new PDO('mysql:host=localhost;dbname=jacotte;charset=utf8', 'root', '');
    $query="SELECT * FROM menu";
    $resultats=$bdd->query($query);
	$resultats->setFetchMode(PDO::FETCH_OBJ);
	while($resultat = $resultats->fetch())
	{
	    array_push($menu,$resultat);
	}
	$resultats->closeCursor();

    }

  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }

  var_dump($menu);
?>