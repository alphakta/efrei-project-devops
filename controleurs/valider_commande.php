<?php
include("../modeles/membre.php");
include("../modeles/bd.php");
session_start();

if (isset($_GET['numC'])) 
{
  $numC = (int)$_GET['numC'];
}
$valider = "valider";
   // On actualise le statut de la commande --> valider
   mysqli_query($coBDD, "UPDATE commande SET statut = '$valider' WHERE numCommande = $numC");
   // On actualise le stock dans la table produit
   
   $reqUpdateQuantite = mysqli_query($coBDD, "SELECT numProduit, quantite from ligne_commande where numCommande = $numC");
   if(isset($reqUpdateQuantite))
   {
   	   	foreach($reqUpdateQuantite as $c)
			{
				$quantite = $c['quantite'];
				$numProduit = $c['numProduit'];
				mysqli_query($coBDD, "UPDATE produit SET stockProduit=stockProduit-'$quantite' WHERE numProduit ='$numProduit'");
				
			}
   }


    header('Location: ../vues/espace_membre_admin.php');


?>