<?php

?>
<!DOCTYPE html>
<html lang=fr>

<head>
	<title>Be-Primeur</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css%22%3E">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="style/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
				<li class="active"><a href="catalogue_panier.php"><span class="glyphicon glyphicon-tree-conifer"></span> Nos paniers</a></li>
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
			<h1 class="text-center"> Bienvenue sur Be-Primeur ! </h1> 
			<p class= "text-center"> 
			Avec Be-Primeur, vos fruits et légumes cueillis le matin et livrés le lendemain !
			En matière de goût, le chemin le plus court est toujours le meilleur… </br>
			C’est pourquoi chez Be-Primeur, la proximité nous tient à coeur !<br>
			Proximité des fruits, légumes et produits frais que nous sélectionnons pour vous mais aussi proximité entre vous, consommateurs gourmands & exigeants, et nos producteurs locaux avec qui nous partageons les mêmes valeurs : transparence, qualité gustative et modes de production raisonnés et respectueux de l’environnement.<br>
			Notre pari ? Vous faire (re)commander avec Be-Primeur les yeux fermés ! 
			
		</p>
	</div>

</div>


<?php
require_once("parties_html/footer.php");
?>
</body>
</html>