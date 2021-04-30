<?php

    include("../modeles/membre.php");
    include("../modeles/bd.php");

    // Table CLIENT
	$email = $_POST["email"];
	$mdp = $_POST["mdp"];

    $unMembre = new Membre($coBDD, $email, $mdp);
    $unMembre->initialiser($email, $mdp);

   ?>

