
<!DOCTYPE html>
<html lang=fr>

<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="style/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<title> Inscription </title>
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

			<form method="post" action="/PTS3/controleurs/inscription.php">
				<h1 class="text-center" > Créez votre compte </h1>
				<p> Vous avez déjà un compte ? <a href="formulaire_connexion.php">Connectez-vous ! </a></p>

				<div class="mb-3">
					<label for="prenom" class="form-label">Prenom </label>
					<input type="text" class="form-control" name="prenom" placeholder="Pierre"required>
				</div>

				<div class="mb-3">
					<label for="nom" class="form-label">Nom </label>
					<input type="text" class="form-control" name="nom" placeholder="Giraud"required>
				</div>

				<div class="mb-3">
					<label for="email" class="form-label">E-mail</label>
					<input type="email" class="form-control" name="email" placeholder="name@example.com"required>
				</div>

				<div class="mb-3">
					<label for="mdpasse" class="form-label">Mot de passe</label>
					<input type="password" class="form-control" name="mdpasse"required>
				</div>

				<div class="mb-3">
					<label for="adresse" class="form-label">Adresse</label>
					<input type="text" class="form-control" name="adresse" placeholder="4 Rue Henri Janin"required>
				</div>

				<div class="mb-3">
					<label for="tel" class="form-label">Numéro de téléphone</label>
					<input type="tel" class="form-control" name="tel" placeholder="0606060606"required>
				</div>

				<div class="mb-3">
					<label for="cp" class="form-label">Code Postal</label>
					<input type="text" class="form-control" name="cp" placeholder="75000"required>
				</div>	

				<div class="mb-3">
					<label for="Ville" class="form-label">Ville</label>
					<input type="text" class="form-control" name="ville" placeholder="Paris"required>
				</div>	

				<div class="form-group">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="cgu" required>
						<label class="form-check-label" for="cgu">Je suis majeur(e) et déclare accepter sans réserve <a href=#> les conditions générales de ventes </a></label>
					</div>
				</div>

				<input type="submit"class="btn btn-primary" name="bouton" value="Enregistrer" action="/PTS3/controleurs/inscription.php"/>
			</form>
		</div>
	</div>
<?php 
require_once("parties_html/footer.php");
?>
</body>
</html>
