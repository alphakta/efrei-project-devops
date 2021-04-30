<?php
include("../modeles/membre.php");
include("../modeles/bd.php");
session_start();

    $nomPanier = $_POST["nomPanier"];
    $id = $_SESSION['id'];


    $ps = mysqli_query($coBDD,"SELECT * FROM commande WHERE numClient = $id");
    $count = mysqli_num_rows($ps);

    if ($count == 0 )
    {
    	mysqli_query($coBDD, "INSERT INTO commande (numClient,dateCommande,statut) VALUES ($id,CURDATE(),'attente')");
    	$dernierid = mysqli_insert_id($coBDD);

    	if (isset($dernierid))
            $reqProduitPanier = mysqli_query($coBDD,"SELECT * FROM produit, panier WHERE nomPanier = '$nomPanier' AND produit.numPanier = panier.numPanier");

            foreach ($reqProduitPanier as $c)
            {
                $numProduit = $c['numProduit']; 
                mysqli_query($coBDD, "INSERT INTO ligne_commande (numCommande,numProduit,quantite) VALUES ($dernierid,$numProduit,1)");
            }
    }
    else
    {
    	$ps = mysqli_query($coBDD, "SELECT * FROM commande WHERE numClient = $id");

		foreach($ps as $row)
		{
			$numCommande = $row['numCommande'];
		}
            $reqProduitPanier = mysqli_query($coBDD,"SELECT * FROM produit, panier WHERE nomPanier = '$nomPanier' AND produit.numPanier = panier.numPanier");

            foreach ($reqProduitPanier as $c)
            {
                $numProduit = $c['numProduit'];
                mysqli_query($coBDD, "INSERT INTO ligne_commande (numCommande,numProduit,quantite) VALUES ($numCommande,$numProduit,1)");
            }

    }
    

    echo "Le panier a été ajouté à votre commande avec succès"."<a href='../vues/vue_commande.php'>ici</a>";
    header('Location: ../vues/vue_commande.php');



?>