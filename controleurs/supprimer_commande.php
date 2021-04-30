<?php
include("../modeles/membre.php");
include("../modeles/bd.php");
session_start();

if (isset($_GET['numC'])) 
{
  $numC = (int)$_GET['numC'];
}


    mysqli_query($coBDD, "DELETE FROM ligne_commande WHERE numCommande = $numC"); 
    mysqli_query($coBDD, "DELETE FROM commande WHERE numCommande = $numC");
    mysqli_query($coBDD, "DELETE FROM livraison WHERE numCommande = $numC"); 

    header('Location: ../vues/espace_commande.php');


?>