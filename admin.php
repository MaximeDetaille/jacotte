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
		<?php include('bdd.php'); ?>
		<script type="text/javascript">
			$.post("bdd.php",function(data, status){});
		</script>
		<div class="container">
			<div class="choix row">
				<h1 class="text-center">Que souhaitez-vous faire ?</h1>
				<div class="btn-group">
					<h3 id="addMenu" class="btn btn-success">Ajouter un menu</h3>
				</div>
				<div class="btn-group">
					<h3 id="addProduit" class="btn btn-success">Ajouter un produit</h3>
				</div>
			</div>
		

			<div id="adminMenu">
				<h1>Ajouter un menu</h1>
				<form action="backoffice.php?method=menu" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="email">Nom du menu</label>
						<input type="text" class="form-control" name="menuName">
					</div>
					<div class="form-group">
						<label for="email">Description du menu</label>
						<input type="text" class="form-control" name="menuDesc">
					</div>
					<div class="form-group">
						<label for="pwd">Prix du menu</label>
						<input type="text" class="form-control" name="menuPrix">
					</div>
					<div class="form-group">
						<label for="pwd">Allergenes (séparé par un virgule)</label>
						<input type="text" class="form-control" name="menuAllergenes">
					</div>
					<div class="form-group">
						<label for="pwd">Type de menu (Sportif, Gourmand etc)</label>
						<input type="text" class="form-control" name="menuType">
					</div>
					<div class="form-group">
						<label for="pwd">Image du menu</label>
						<input type="file" class="form-control" name="menuImage">
					</div>
					<div>
						<label for="menuEntree">Entrée du menu</label>
						<select name="menuEntree" id="menuEntree">
							<?php for($i=0;$i<sizeof($entree);$i++){
									if($entree[$i]->qte!=0)
										echo "<option value='".$entree[$i]->id."'>".$entree[$i]->nom."</option>";
								} 
							?>
						</select>
					</div>
					<div>
						<label for="menuPlat">Plat du menu</label>
						<select name="menuPlat" id="menuPlat">
							<?php for($i=0;$i<sizeof($plat);$i++){
									if($plat[$i]->qte!=0)
										echo "<option value='".$plat[$i]->id."'>".$plat[$i]->nom."</option>";
								} 
							?>
						</select>
					</div>
					<div>
						<label for="menuDessert">Dessert du menu</label>
						<select name="menuDessert" id="menuDessert">
							<?php for($i=0;$i<sizeof($dessert);$i++){
									if($dessert[$i]->qte!=0)
										echo "<option value='".$dessert[$i]->id."'>".$dessert[$i]->nom."</option>";
								} 
							?>
						</select>
					</div>
					<div>
						<label for="menuFromage">Fromage du menu</label>
						<select name="menuFromage" id="menuFromage">
							<?php for($i=0;$i<sizeof($fromage);$i++){
									if($fromage[$i]->qte!=0)
										echo "<option value='".$fromage[$i]->id."'>".$fromage[$i]->nom."</option>";
								} 
							?>
						</select>
					</div>
					<div>
						<label for="menuBoisson">Entrée du menu</label>
						<select name="menuBoisson" id="menuBoisson">
							<?php for($i=0;$i<sizeof($boisson);$i++){
									if($boisson[$i]->qte!=0)
										echo "<option value='".$boisson[$i]->id."'>".$boisson[$i]->nom."</option>";
								} 
							?>
						</select>
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>

		<div id="adminProduit">
			<div class="container">
				<h1>Ajouter un Produit</h1>
				<form action="backoffice.php?method=produit" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="newProduct">Quel type de produit voulez-vous rajouter</label>
						<select name="product">
							<option value="entree">Entrée</option>
							<option value="plat">Plat</option>
							<option value="dessert">Dessert</option>
							<option value="fromage">Fromage</option>
							<option value="boisson">Boisson</option>
						</select>
					</div>
					<div class="form-group">
						<label for="productName">Nom du produit</label>
						<input type="text" class="form-control" name="productName">
					</div>
					<div class="form-group">
						<label for="productDesc">Description du produit</label>
						<input type="text" class="form-control" name="productDesc">
					</div>
					<div class="form-group">
						<label for="productPrix">Prix du produit</label>
						<input type="text" class="form-control" name="productPrix">
					</div>
					<div class="form-group">
						<label for="productAllergenes">Allergenes (séparé par un virgule)</label>
						<input type="text" class="form-control" name="productAllergenes">
					</div>
					<div class="form-group">
						<label for="productType">Type de produit (Sportif, Gourmand etc)</label>
						<input type="text" class="form-control" name="productType">
					</div>
					<div class="form-group">
						<label for="productImage">Image du menu</label>
						<input type="file" class="form-control" name="productImage">
					</div>
					<div class="form-group">
						<label for="productImage">Quantité du produit</label>
						<input type="text" class="form-control" name="productQuantite">
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>

		<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script src="https://cdn.jsdelivr.net/vue.resource/1.2.1/vue-resource.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.2.6/vue.js"></script>
		<script type="text/javascript" src="js/app.js"></script>
		<script type="text/javascript" src="js/owl.carousel.js"></script>
		<script type="text/javascript">
			$('#addMenu').click(function () {
				$('#adminMenu').toggle();
			})

			$('#addProduit').click(function () {
				$('#adminProduit').toggle();
			})
		</script>
	</body>
</html>