<?php 
	include("../modeles/bd.php"); 
	include("../modeles/membre.php"); 
	session_start();
	$numClient = $_POST['numClient'];

	$numClientID = $_SESSION['id'];

	echo $numClient;
	echo $numClientID;

	$req = mysqli_query($coBDD, "SELECT numGroupe from ligne_groupe WHERE numClient = $numClientID ORDER BY numGroupe DESC LIMIT 1");
	$row1 = $req -> fetch_assoc();
	$get_numGroupe = $row1["numGroupe"];
		echo $get_numGroupe;


	mysqli_query($coBDD, "INSERT INTO ligne_groupe (numGroupe, numClient) VALUES ($get_numGroupe, $numClient)" );

	header('Location: ../vues/vue_commande_groupe.php');

	?>