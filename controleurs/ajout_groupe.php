<?php 
	include("../modeles/bd.php"); 
	include("../modeles/membre.php"); 
	session_start();
	$nomGroupe = $_POST['ville'];
	$_SESSION['ville'] = $nomGroupe;
	$adresseGroupe = $_POST['adresse'];
	$numClient = $_SESSION['id'];


	$req1 = mysqli_query($coBDD, "SELECT nomGroupe FROM groupe WHERE nomGroupe = '$nomGroupe'");

	$row1 = $req1 -> fetch_assoc();
	if(isset($row1["nomGroupe"]))
		$get_nomGroupe = $row1["nomGroupe"];

	if (!isset($get_nomGroupe))
	{
		mysqli_query($coBDD, "insert into groupe (nomGroupe, adresseGroupe) VALUES ('$nomGroupe','$adresseGroupe')");
		$idGroupe = mysqli_insert_id($coBDD);
		mysqli_query($coBDD, "insert into ligne_groupe (numGroupe,numClient) VALUES ($idGroupe,$numClient)");
	}
	else
		echo "eaeaz";

	header('Location: ../vues/vue_commande_groupe.php');



	?>