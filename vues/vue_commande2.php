<?php 
require_once("parties_html/header.php");
$result = mysqli_query($coBDD, 'SELECT * from produit WHERE stockProduit >= 1');
?>

    <div class="container">
        <div class="well well-lg"> 
            <h1 class="text-center"> Ajouter un produit à ma commande </h1> 


            <form method="get" action="../controleurs/ajout_commande_produit_groupe.php">
                <!-- <p> Saisir le numéro de produit à ajouter à vos commandes : <input id="number" min="0"type="number" value="0" name="numP"> </p> -->

                <p> Saisir le numéro de produit à ajouter à vos commandes :
                    <select name="abc" >
    <?php foreach($result as $c) : ?>

    <option value='<?= $c['nomProduit'] ?>' > <?= $c['nomProduit'] ?> </option>
<?php endforeach; ?>
</p>
</select>
                <p> Saisir la quantité : <input id="number" type="number" min="1" value="1" name="q"> </p>

                <input type="submit" name="bouton" value="Ajouter à ma commande" action="../controleurs/ajout_commande_produit_groupe.php" />

            </form>

            <h1 class="text-center"> Ajouter un panier à ma commande </h1> 

            <form method="post" action="../controleurs/ajout_commande_panier_groupe.php">
                <p> Saisir le nom du panier : <input id="text"  name="nomPanier"> </p>
                <input type="submit" name="bouton" value="Ajouter à ma commande" action="../controleurs/ajout_commande_panier_groupe.php" />
            </form>





        </div>
    </div>
</body>
</html>