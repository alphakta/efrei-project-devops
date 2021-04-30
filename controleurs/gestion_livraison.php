<?php
include("../modeles/membre.php");
include("../modeles/bd.php");
session_start();
    $numCommande = $_POST['numCo'];
    $typeLiv = $_POST["typeLiv"];
    $freqLiv = $_POST["freqLiv"];

echo $numCommande;
echo $typeLiv;
echo $freqLiv;

    $sql = "INSERT INTO livraison (numCommande, dateLivraison, typeLivraison, frequence) VALUES ($numCommande, CURDATE() +3,'$typeLiv','$freqLiv')";

    $result = mysqli_query($coBDD,$sql);

    if (!$result) {
    die('Requête invalide : ' . mysqli_error($result));
        $_SESSION['count'] = 1;
         $_SESSION['count2'] = 1;

    }
    else
        $_SESSION['count'] = 0;
            $_SESSION['count2'] = 0;

    header('Location: ../vues/espace_commande.php');



?>