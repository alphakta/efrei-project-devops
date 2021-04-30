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

	    echo $prenom;
	    echo $nom;
	    echo $email;
	    echo $adresse;
	    echo $tel;
	    echo $cp;
	    echo $ville;

// $coBDD vient de bd.php

    
    $unMembre = new Membre($coBDD, $prenom, $nom, $mdp, $email, $adresse, $tel, $cp, $ville);

    	$row1 = mysqli_query($coBDD, "SELECT * FROM quartier WHERE codeQuartier = '$cp' ");

        foreach($row1 as $row)
        {
           $numQuartier1 = $row['numQuartier'];
        }
        if (isset($numQuartier1))
    		mysqli_query($coBDD, "INSERT into client (prenomClient, nomClient, mdpClient, mailClient, adresseClient, telClient, numQuartier) VALUES ('$prenom','$nom','$mdp','$email','$adresse','$tel', '$numQuartier1')");
    	else
    	{
    		mysqli_query($coBDD, "INSERT into quartier (codeQuartier, nomQuartier) VALUES ('$cp','$ville')");
           $numQuartier = mysqli_insert_id($coBDD);
           mysqli_query($coBDD, "INSERT into client (prenomClient, nomClient, mdpClient, mailClient, adresseClient, telClient, numQuartier) VALUES ('$prenom','$nom','$mdp','$email','$adresse','$tel', '$numQuartier')");
    	}


    echo "Connexion établie avec succès, vous allez être rediriger dans un instant!";
   header('Location: /PTS3/vues/formulaire_connexion.php');


   ?>

