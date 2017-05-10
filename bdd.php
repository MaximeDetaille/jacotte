<?php 
		session_start();
		try{
			$menu = [];
			$bdd = new PDO('mysql:host=localhost;dbname=jacotte;charset=utf8', 'root', 'root');
			$query="SELECT * FROM menu";
			$resultats=$bdd->query($query);
			$resultats->setFetchMode(PDO::FETCH_OBJ);
			while($resultat = $resultats->fetch()){
				array_push($menu,$resultat);
			}
			$resultats->closeCursor();
			
			$entree = [];
			$query="SELECT * FROM entree ORDER BY qte DESC";
			$resultats=$bdd->query($query);
			$resultats->setFetchMode(PDO::FETCH_OBJ);
			while($resultat = $resultats->fetch()){
				array_push($entree,$resultat);
			}
			$resultats->closeCursor();

			$plat = [];
			$query="SELECT * FROM plat ORDER BY qte DESC";
			$resultats=$bdd->query($query);
			$resultats->setFetchMode(PDO::FETCH_OBJ);
			while($resultat = $resultats->fetch()){
				array_push($plat,$resultat);
			}
			$resultats->closeCursor();

			$dessert = [];
			$query="SELECT * FROM dessert ORDER BY qte DESC";
			$resultats=$bdd->query($query);
			$resultats->setFetchMode(PDO::FETCH_OBJ);
			while($resultat = $resultats->fetch()){
				array_push($dessert,$resultat);
			}
			$resultats->closeCursor();

			$fromage = [];
			$query="SELECT * FROM fromage ORDER BY qte DESC";
			$resultats=$bdd->query($query);
			$resultats->setFetchMode(PDO::FETCH_OBJ);
			while($resultat = $resultats->fetch()){
				array_push($fromage,$resultat);
			}
			$resultats->closeCursor();

			$boisson = [];
			$query="SELECT * FROM boisson ORDER BY qte DESC";
			$resultats=$bdd->query($query);
			$resultats->setFetchMode(PDO::FETCH_OBJ);
			while($resultat = $resultats->fetch()){
				array_push($boisson,$resultat);
			}
			$resultats->closeCursor();

		}

		catch (Exception $e){
			die('Erreur : ' . $e->getMessage());
		}
	?>