<?php 
	include("../modeles/bd.php"); 
	include("../modeles/membre.php"); 
	session_start();



	$numCommande = (int) $_GET['numC'];	
	$numProduit = (int) $_GET['numP'];


	mysqli_query($coBDD, "DELETE FROM ligne_commande WHERE numCommande = '$numCommande' AND numProduit = '$numProduit'");


    header('Location: ../vues/espace_commande.php');





	?>