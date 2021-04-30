	<?php

	?>
	<!DOCTYPE html>
	<html lang=fr>

	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="style/style.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<title> Connexion </title>
	</head>
	
	<body>
		<!-- Barre de navigation -->
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Be-Primeur</a>
				</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="index_site.php"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
				<li class="active"><a href="catalogue_fruit_legume.php"><span class="glyphicon glyphicon-list"></span> Nos produits</a></li>
				<li class="active"><a href="catalogue_panier.php"><span class="glyphicon glyphicon-list"></span> Nos paniers</a></li>
			</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="formulaire_inscription.php"><span class="glyphicon glyphicon-user"></span> Inscription</a></li>
					<li><a href="formulaire_connexion.php"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
				</ul>
			</div>
		</nav>
		<!--   ------ -->

		<div class="container">
			<div class="well well-lg"> 

				<h1 class="text-center" > Connectez-vous à votre compte </h1>
				<p> Vous n'avez pas de compte ? <a href="formulaire_inscription.php"required>Créez-en un ! </a></p>
				<form method="post" action="/PTS3/controleurs/connexion.php">


					<div class="mb-3">
						<label for="email" class="form-label"> E-mail </label>
						<input type="text" class="form-control" name="email"required>
					</div>

					<div class="mb-3">
						<label for="mdp" class="form-label"> Mot de passe </label>
						<input type="password" class="form-control" name="mdp" required>
					</div>


					<input type="submit"class="btn btn-primary" name="bouton" value="Connectez-vous" action="/PTS3/controleurs/connexion.php"/>
				</form>
			</div>
		</div>

<?php 
require_once("parties_html/footer.php");
?>

	</body>
	</html>