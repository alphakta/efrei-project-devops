<?php 
	$nomProduit = $_POST['nom_produit'];
	$ajoutStock = $_POST['ajout_stock'];

	include("../modeles/bd.php"); 
	
	
	
	mysqli_query($coBDD, "UPDATE produit SET stockProduit=stockProduit+'$ajoutStock' WHERE nomProduit = '$nomProduit'");
	
		header('Location: ../vues/espace_membre_admin.php');
?>