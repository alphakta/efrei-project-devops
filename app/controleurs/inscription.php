<?php

    include("../modeles/membre.php");
    include("../modeles/bd.php");

    	// Table CLIENT
    	$prenom = $_POST["prenom"];
	    $nom = $_POST["nom"];
	    $email = $_POST["email"];
	    $mdp = $_POST["mdpasse"];
	    $adresse = $_POST["adresse"];
	    $tel = $_POST["tel"];
	    // Table QUARTIER
	    $cp = $_POST["cp"];
	    $ville = $_POST["ville"];
      $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);
      

// $coBDD vient de bd.php

if(!empty($prenom) && !empty($nom) && !empty($prenom) && !empty($email) && !empty($mdp)&& !empty($adresse) && !empty($tel) && !empty($cp) && !empty($ville)) {

    
    $unMembre = new Membre($coBDD, $prenom, $nom, $mdp, $email, $adresse, $tel, $cp, $ville);

    	$row1 = mysqli_query($coBDD, "SELECT * FROM quartier WHERE codeQuartier = '$cp' ");

        foreach($row1 as $row)
        {
           $numQuartier1 = $row['numQuartier'];
        }
        if (isset($numQuartier1))
    		mysqli_query($coBDD, "INSERT into client (prenomClient, nomClient, mdpClient, mailClient, adresseClient, telClient, numQuartier) VALUES ('$prenom','$nom','$mdpHash','$email','$adresse','$tel', '$numQuartier1')");
    	else
    	{
    		mysqli_query($coBDD, "INSERT into quartier (codeQuartier, nomQuartier) VALUES ('$cp','$ville')");
           $numQuartier = mysqli_insert_id($coBDD);
           mysqli_query($coBDD, "INSERT into client (prenomClient, nomClient, mdpClient, mailClient, adresseClient, telClient, numQuartier) VALUES ('$prenom','$nom','$mdpHash','$email','$adresse','$tel', '$numQuartier')");
    	}
    }
	echo "Connexion établie avec succès, vous allez être rediriger dans un instant!";

   header('Location: ./vues/formulaire_connexion.php');


   ?>

