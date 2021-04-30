<?php 
include("../modeles/membre.php");
include("../modeles/bd.php");
session_start();
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
	<!-- Barre de navigation espace-membre client-->
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
				<?php
				if(isset($_SESSION['email'])) // vérifie si il y a une session ouverte
				// Si il y a une session ouverte, faire ce qu'il y a ci-dessous qui vérifie que l'email de la session
				// Si c'est celui de l'amdministrateur, alors on affiche "l'onglet" administrateur
				// Sinon rien
				{
					$email = $_SESSION['email'];
					$admin1 = "admin@gmail.com";	
					if($email == $admin1)
						$test = true;
					else
						$test = false;

					
					if ($test == true)
						echo "<li><a href='espace_membre_admin.php'> Administration <span class='glyphicon glyphicon-wrench'></span></a></li>";
				}
				?>

				<?php
					if(isset($_SESSION['email'])) 
					{
						echo "<li><a href='espace_commande.php'> <span class='glyphicon glyphicon-shopping-cart'></span> Mes commandes</a></li>";
						echo "<li><a href='/PTS3/controleurs/deconnexion.php'><span class='glyphicon glyphicon-off'></span> Deconnexion</a></li>";
					}
					else
					{
						echo "<li><a href='formulaire_inscription.php'><span class='glyphicon glyphicon-user'></span> Inscription</a></li>";
						echo "<li><a href='formulaire_connexion.php'><span class='glyphicon glyphicon-log-in'></span> Connexion</a></li>";
					}

				?>

			</ul>
		</div>
	</nav>
	<!-- Barre de navigation espace-membre client-->