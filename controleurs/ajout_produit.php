<?php 
	$nomProduit = $_POST['nom_produit'];
	$stock = $_POST['stock'];
	$prix = $_POST['prix'];
	$type = $_POST['type'];
	$famille = $_POST['famille'];
	$nomImage = $_POST['nom_image'];
	
	/*
	echo $nomProduit;
	echo $stock;
	echo $prix;
	echo $type;
	echo $famille;
	echo $nomImage;
*/
	include("../modeles/bd.php"); 


	$req1 = mysqli_query($coBDD, "SELECT numType FROM type WHERE nomType = '$type'");
	$req2 = mysqli_query($coBDD, "SELECT numFamille FROM famille WHERE nomFamille = '$famille'");

	$row1 = $req1 -> fetch_assoc();
	$row2 = $req2 -> fetch_assoc();



	$get_numType = $row1["numType"];
	$get_numFamille = $row2["numFamille"];
	
	if (isset($get_numFamille))
		mysqli_query($coBDD, "insert into produit (nomProduit, stockProduit, prixProduit, numFamille, numType, image, numPanier) values ('$nomProduit', '$stock', '$prix', '$get_numFamille', '$get_numType', '$nomImage',0)");
	else 
	{
			mysqli_query($coBDD, "insert into famille (nomFamille) VALUES ('$famille')");
			$req2 = mysqli_query($coBDD, "SELECT numFamille FROM famille WHERE nomFamille = '$famille'");
			$row2 = $req2 -> fetch_assoc();
			$get_numFamille = $row2["numFamille"];
			mysqli_query($coBDD, "insert into produit (nomProduit, stockProduit, prixProduit, numFamille, numType, image, numPanier) values ('$nomProduit', '$stock', '$prix', '$get_numFamille', '$get_numType', '$nomImage',0)");
	}



	header('Location: ../vues/espace_membre_admin.php');
	?>