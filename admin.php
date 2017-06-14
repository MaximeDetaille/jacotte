<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>La cuisine de Jacotte</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/owl.theme.default.css">
		<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<?php include('bdd.php'); ?>
		<div class="container">
			<div class="choix row">
				<h1 class="text-center">Que souhaitez-vous faire ?</h1>
				<div class="btn-group">
					<h3 id="addProduit" class="btn btn-success">Ajouter un produit</h3>
				</div>
				<div class="btn-group">
					<h3 id="delProduit" class="btn btn-danger">Supprimer/Modifier un produit</h3>
				</div>
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
		<?php
		?>
		<div id="suppressionProduit">
			<div class="container">
				<h1>Supprimer un Produit</h1>
				<div class="container">
					<div class="choix row">
						<div class="btn-group">
							<h3 id="showEntree" class="btn btn-success">Entrée</h3>
						</div>
						<div class="btn-group">
							<h3 id="showPlat" class="btn btn-success">Plat</h3>
						</div>
						<div class="btn-group">
							<h3 id="showDessert" class="btn btn-success">Dessert</h3>
						</div>
						<div class="btn-group">
							<h3 id="showFromage" class="btn btn-success">Fromage</h3>
						</div>
						<div class="btn-group">
							<h3 id="showBoisson" class="btn btn-success">Boisson</h3>
						</div>
					</div>
				</div>
				<form action="backoffice.php?method=supprimer" method="post" enctype="multipart/form-data">
					<div class="showEntreeSupp table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Id</th>
									<th>Nom</th>
									<th></th>
									<th></th>
									<th></th>
									<th>Supprimer</th>
									<th>Modifier</th>
								</tr>
							</thead>
							<tbody>
								<?php
								for($i=0;$i<sizeof($entree);$i++){
									if($entree[$i]->id != 0){
									echo '<tr>
											<td>'.$entree[$i]->id.'</td>
											<td>'.$entree[$i]->nom.'</td>
											<td></td>
											<td></td>
											<td></td>
											<td><div class="btn-group">
													<p data-type="entree" id="'.$entree[$i]->id.'" class="suppr btn btn-danger">Supprimer</p>
												</div>
											</td>
											<td><div class="btn-group">
													<p class="modif btn btn-warning" data-id="'.$entree[$i]->id.'">Modifier</p>
												</div>
											</td>
										</tr>
										<tr id="entree-'.$entree[$i]->id.'" class="showModif">
											<td>
												<label>Nom</label>
												<input name="nom" class="smallInput" type="text" value="'.$entree[$i]->nom.'">
											</td>
											<td>
												<label>Type</label>
												<input name="type" class="smallInput" type="text" value="'.$entree[$i]->type.'">
											</td>
											<td>
												<label>Description</label>
												<input name="description" class="smallInput" type="text" value="'.$entree[$i]->description.'">
											</td>
											<td>
												<label>Prix</label>
												<input name="prix" class="smallInput" type="text" value="'.$entree[$i]->prix.'">
											</td>
											<td>
												<label>Quantité</label>
												<input name="qte" class="smallInput" type="text" value="'.$entree[$i]->qte.'">
											</td>
											<td>
												<label>Allergènes</label>
												<input name="allergenes" class="smallInput" type="text" value="'.$entree[$i]->allergenes.'">
											</td>
											<td>
												<div class="btn-group">
													<p data-type="entree" data-id="'.$entree[$i]->id.'" class="validModif modif btn btn-success">Valider</p>
												</div>
											</td>
										</tr>';
									}
								}
								?>
							</tbody>
						</table>
					</div>
					<div class="showPlatSupp">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Id</th>
									<th>Nom</th>
									<th></th>
									<th></th>
									<th></th>
									<th>Supprimer</th>
									<th>Modifier</th>
								</tr>
							</thead>
							<tbody>
								<?php
								for($i=0;$i<sizeof($plat);$i++){
									if($plat[$i]->id != 0){
									echo '<tr>
											<td>'.$plat[$i]->id.'</td>
											<td>'.$plat[$i]->nom.'</td>
											<td></td>
											<td></td>
											<td></td>
											<td><div class="btn-group">
													<p data-type="plat" id="'.$plat[$i]->id.'" class="suppr btn btn-danger">Supprimer</p>
												</div>
											</td>
											<td><div class="btn-group">
													<p class="modif btn btn-warning" data-id="'.$plat[$i]->id.'">Modifier</p>
												</div>
											</td>
										</tr>
										<tr id="plat-'.$plat[$i]->id.'" class="showModif">
											<td>
												<label>Nom</label>
												<input name="nom" class="smallInput" type="text" value="'.$plat[$i]->nom.'">
											</td>
											<td>
												<label>Type</label>
												<input name="type" class="smallInput" type="text" value="'.$plat[$i]->type.'">
											</td>
											<td>
												<label>Description</label>
												<input name="description" class="smallInput" type="text" value="'.$plat[$i]->description.'">
											</td>
											<td>
												<label>Prix</label>
												<input name="prix" class="smallInput" type="text" value="'.$plat[$i]->prix.'">
											</td>
											<td>
												<label>Quantité</label>
												<input name="qte" class="smallInput" type="text" value="'.$plat[$i]->qte.'">
											</td>
											<td>
												<label>Allergènes</label>
												<input name="allergenes" class="smallInput" type="text" value="'.$plat[$i]->allergenes.'">
											</td>
											<td>
												<div class="btn-group">
													<p data-type="plat" data-id="'.$plat[$i]->id.'" class="validModif modif btn btn-success">Valider</p>
												</div>
											</td>
										</tr>';
									}
								}
								?>
							</tbody>
						</table>
				</div>
				<div class="showDessertSupp">
					<table class="table table-striped">
							<thead>
								<tr>
									<th>Id</th>
									<th>Nom</th>
									<th></th>
									<th></th>
									<th></th>
									<th>Supprimer</th>
									<th>Modifier</th>
								</tr>
							</thead>
							<tbody>
								<?php
								for($i=0;$i<sizeof($dessert);$i++){
									if($dessert[$i]->id != 0){
									echo '<tr>
											<td>'.$dessert[$i]->id.'</td>
											<td>'.$dessert[$i]->nom.'</td>
											<td></td>
											<td></td>
											<td></td>
											<td><div class="btn-group">
													<p data-type="dessert" id="'.$dessert[$i]->id.'" class="suppr btn btn-danger">Supprimer</p>
												</div>
											</td>
											<td><div class="btn-group">
													<p class="modif btn btn-warning" data-id="'.$dessert[$i]->id.'">Modifier</p>
												</div>
											</td>
										</tr>
										<tr id="dessert-'.$dessert[$i]->id.'" class="showModif">
											<td>
												<label>Nom</label>
												<input name="nom" class="smallInput" type="text" value="'.$dessert[$i]->nom.'">
											</td>
											<td>
												<label>Type</label>
												<input name="type" class="smallInput" type="text" value="'.$dessert[$i]->type.'">
											</td>
											<td>
												<label>Description</label>
												<input name="description" class="smallInput" type="text" value="'.$dessert[$i]->description.'">
											</td>
											<td>
												<label>Prix</label>
												<input name="prix" class="smallInput" type="text" value="'.$dessert[$i]->prix.'">
											</td>
											<td>
												<label>Quantité</label>
												<input name="qte" class="smallInput" type="text" value="'.$dessert[$i]->qte.'">
											</td>
											<td>
												<label>Allergènes</label>
												<input name="allergenes" class="smallInput" type="text" value="'.$dessert[$i]->allergenes.'">
											</td>
											<td>
												<div class="btn-group">
													<p data-type="dessert" data-id="'.$dessert[$i]->id.'" class="validModif modif btn btn-success">Valider</p>
												</div>
											</td>
										</tr>';
									}
								}
								?>
							</tbody>
						</table>
					</div>
				<div class="showFromageSupp">
					<table class="table table-striped">
							<thead>
								<tr>
									<th>Id</th>
									<th>Nom</th>
									<th></th>
									<th></th>
									<th></th>
									<th>Supprimer</th>
									<th>Modifier</th>
								</tr>
							</thead>
							<tbody>
								<?php
								for($i=0;$i<sizeof($fromage);$i++){
									if($fromage[$i]->id != 0){
									echo '<tr>
											<td>'.$fromage[$i]->id.'</td>
											<td>'.$fromage[$i]->nom.'</td>
											<td></td>
											<td></td>
											<td></td>
											<td><div class="btn-group">
													<p data-type="fromage" id="'.$fromage[$i]->id.'" class="suppr btn btn-danger">Supprimer</p>
												</div>
											</td>
											<td><div class="btn-group">
													<p class="modif btn btn-warning" data-id="'.$fromage[$i]->id.'">Modifier</p>
												</div>
											</td>
										</tr>
										<tr id="fromage-'.$fromage[$i]->id.'" class="showModif">
											<td>
												<label>Nom</label>
												<input name="nom" class="smallInput" type="text" value="'.$fromage[$i]->nom.'">
											</td>
											<td>
												<label>Type</label>
												<input name="type" class="smallInput" type="text" value="'.$fromage[$i]->type.'">
											</td>
											<td>
												<label>Description</label>
												<input name="description" class="smallInput" type="text" value="'.$fromage[$i]->description.'">
											</td>
											<td>
												<label>Prix</label>
												<input name="prix" class="smallInput" type="text" value="'.$fromage[$i]->prix.'">
											</td>
											<td>
												<label>Quantité</label>
												<input name="qte" class="smallInput" type="text" value="'.$fromage[$i]->qte.'">
											</td>
											<td>
												<label>Allergènes</label>
												<input name="allergenes" class="smallInput" type="text" value="'.$fromage[$i]->allergenes.'">
											</td>
											<td>
												<div class="btn-group">
													<p data-type="fromage" data-id="'.$fromage[$i]->id.'" class="validModif modif btn btn-success">Valider</p>
												</div>
											</td>
										</tr>';
									}
								}
								?>
							</tbody>
						</table>
				</div>
				<div class="showBoissonSupp">
					<table class="table table-striped">
							<thead>
								<tr>
									<th>Id</th>
									<th>Nom</th>
									<th></th>
									<th></th>
									<th></th>
									<th>Supprimer</th>
									<th>Modifier</th>
								</tr>
							</thead>
							<tbody>
								<?php
								for($i=0;$i<sizeof($boisson);$i++){
									if($boisson[$i]->id != 0){
									echo '<tr>
											<td>'.$boisson[$i]->id.'</td>
											<td>'.$boisson[$i]->nom.'</td>
											<td></td>
											<td></td>
											<td></td>
											<td><div class="btn-group">
													<p data-type="boisson" id="'.$boisson[$i]->id.'" class="suppr btn btn-danger">Supprimer</p>
												</div>
											</td>
											<td><div class="btn-group">
													<p class="modif btn btn-warning" data-id="'.$boisson[$i]->id.'">Modifier</p>
												</div>
											</td>
										</tr>
										<tr id="boisson-'.$boisson[$i]->id.'" class="showModif">
											<td>
												<label>Nom</label>
												<input name="nom" class="smallInput" type="text" value="'.$boisson[$i]->nom.'">
											</td>
											<td>
												<label>Type</label>
												<input name="type" class="smallInput" type="text" value="'.$boisson[$i]->type.'">
											</td>
											<td>
												<label>Description</label>
												<input name="description" class="smallInput" type="text" value="'.$boisson[$i]->description.'">
											</td>
											<td>
												<label>Prix</label>
												<input name="prix" class="smallInput" type="text" value="'.$boisson[$i]->prix.'">
											</td>
											<td>
												<label>Quantité</label>
												<input name="qte" class="smallInput" type="text" value="'.$boisson[$i]->qte.'">
											</td>
											<td>
												<label>Allergènes</label>
												<input name="allergenes" class="smallInput" type="text" value="'.$boisson[$i]->allergenes.'">
											</td>
											<td>
												<div class="btn-group">
													<p data-type="boisson" data-id="'.$boisson[$i]->id.'" class="validModif modif btn btn-success">Valider</p>
												</div>
											</td>
										</tr>';
									}
								}
								?>
							</tbody>
						</table>
				</div>
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
		$('#delProduit').click(function(){
			$('#suppressionProduit').toggle();
		})
		$('#showEntree').click(function(){
			$('.showEntreeSupp').toggle();
		});
		$('#showPlat').click(function(){
			$('.showPlatSupp').toggle();
		});
		$('#showDessert').click(function(){
			$('.showDessertSupp').toggle();
		});
		$('#showFromage').click(function(){
			$('.showFromageSupp').toggle();
		});
		$('#showBoisson').click(function(){
			$('.showBoissonSupp').toggle();
		});

		$('.suppr').click(function(){
			that = $(this);
			id = this.id;
			type = $(this).data('type');
			url = "ajax.php?method=supprMenu&id="+id+"&type="+type;
			
			$.post(url,function(data, status){
		        if(status=="success"){
		        	that.parent().parent().parent().remove();
		        }
		    });
		})

		$('.modif').click(function(){
			var id = $(this).data('id');
			$('#entree-'+id).toggle();
			$('#plat-'+id).toggle();
			$('#dessert-'+id).toggle();
			$('#fromage-'+id).toggle();
			$('#boisson-'+id).toggle();
		})

		$('.validModif').click(function(){
			console.log("ok");
			id = $(this).data('id');
			type = $(this).data('type');
			td = $(this).parent().parent().parent().children('td').children('.smallInput');
			url = "ajax.php?method=modifMenu&id="+id+"&nom="+td[0].value+"&type="+td[1].value+"&description="+td[2].value+"&prix="+td[3].value+"&quantite="+td[4].value+"&allergenes="+td[5].value+"&typeProduit="+type;
			$.post(url,function(data, status){
		        if(status=="success"){
		        	console.log(data);
		        }
		    });
		})
	</script>
</body>
</html>