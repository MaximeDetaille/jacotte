<?php 
		session_start();
		try{
			$menu = [];
			$bdd = new PDO('mysql:host=localhost;dbname=jacotte;charset=utf8', 'root', '');
			$query="SELECT * FROM menu";
			$resultats=$bdd->query($query);
			$resultats->setFetchMode(PDO::FETCH_OBJ);
			while($resultat = $resultats->fetch()){
				array_push($menu,$resultat);
			}
			$resultats->closeCursor();
			
			$entree = [];
			$query="SELECT * FROM entree";
			$resultats=$bdd->query($query);
			$resultats->setFetchMode(PDO::FETCH_OBJ);
			while($resultat = $resultats->fetch()){
				array_push($entree,$resultat);
			}
			$resultats->closeCursor();

			$plat = [];
			$query="SELECT * FROM plat";
			$resultats=$bdd->query($query);
			$resultats->setFetchMode(PDO::FETCH_OBJ);
			while($resultat = $resultats->fetch()){
				array_push($plat,$resultat);
			}
			$resultats->closeCursor();

			$dessert = [];
			$query="SELECT * FROM dessert";
			$resultats=$bdd->query($query);
			$resultats->setFetchMode(PDO::FETCH_OBJ);
			while($resultat = $resultats->fetch()){
				array_push($dessert,$resultat);
			}
			$resultats->closeCursor();

			$fromage = [];
			$query="SELECT * FROM fromage";
			$resultats=$bdd->query($query);
			$resultats->setFetchMode(PDO::FETCH_OBJ);
			while($resultat = $resultats->fetch()){
				array_push($fromage,$resultat);
			}
			$resultats->closeCursor();

			$boisson = [];
			$query="SELECT * FROM boisson";
			$resultats=$bdd->query($query);
			$resultats->setFetchMode(PDO::FETCH_OBJ);
			while($resultat = $resultats->fetch()){
				array_push($boisson,$resultat);
			}
			$resultats->closeCursor();

			var_dump($menu);
			echo "<br>";
			echo "<br>";
			var_dump($entree);
			echo "<br>";
			echo "<br>";
			var_dump($plat);
			echo "<br>";
			echo "<br>";
			var_dump($dessert);
			echo "<br>";
			echo "<br>";
			var_dump($boisson);
			echo "<br>";
			echo "<br>";
			var_dump($fromage);
		}

		catch (Exception $e){
			die('Erreur : ' . $e->getMessage());
		}
	?>