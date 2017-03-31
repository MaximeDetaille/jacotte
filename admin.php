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
		<div class="container">
			<div class="choix row">
				<h1 class="text-center">Que souhaitez-vous faire ?</h1>
				<div class="btn-group">
					<h3 id="addMenu" class="btn btn-success">Ajouter un menu</h3>
				</div>
			</div>
		

			<div id="adminMenu">
				<h1>Ajouter un menu</h1>
				<form action="addMenu.php" method="post" enctype="multipart/form-data">
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
		</script>
	</body>
</html>