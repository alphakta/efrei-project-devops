<?php 
	include("../modeles/bd.php"); 
	include("../modeles/membre.php"); 
	session_start();


	$numCommande =  $_POST['numCommande'];	
	$numProduit = $_POST['numProduit'];
	$q = $_POST['quantiteModif'];

	echo $numCommande;
	echo $numProduit;
	echo $q;

	mysqli_query($coBDD, "UPDATE ligne_commande SET quantite = $q WHERE numCommande = $numCommande AND numProduit = $numProduit");


   header('Location: ../vues/espace_commande.php');





	?>