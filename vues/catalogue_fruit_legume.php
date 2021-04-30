<?php 
require_once("parties_html/header.php");
?>

<div class="container">
    <div class="well well-lg"> 
        <h1 class="text-center"> Catalogue de Fruits </h1> 

        <?php
        $result = mysqli_query($coBDD, 'SELECT * from produit WHERE stockProduit >= 1');


        if(isset($_SESSION['email']))
        {

            echo "<div class= spaceb> <p class='text-center'><button type='button' class='boutonr'> <a class='taillea' href='vue_commande.php'>Passer une commande</a></button></p> </div>";
                // Commande groupé non fonctionnel
            echo "<div class= spaceb> <p class='text-center'><button type='button' class='boutonr'><a class='taillea' href='vue_commande_groupe.php'>Passer une commande groupée</a></button></p> </div> ";


        }

        ?>

        <div class="row">

            <?php foreach($result as $c) : ?>

                <div class="col-sm-4 ">
                    <div class="card-columns-fluid">

                            <div class="card-body">
                                <h2 class="h2titre"> <?= $c['nomProduit'] ?></h2>
                                <img class="card-img-top" src="source/<?= $c['image'] ?>" alt="...">


                                <div class='badge'>
                                <span class='badge badge-primary'>Num du produit : <?= $c['numProduit'] ?></span> 
                                <span class='badge badge-primary'>Stock : <?= $c['stockProduit'] ?></span> 
                                <span class='badge badge-primary'>Prix : <?= $c['prixProduit'] ?> € l'unité</span> 
                            </div>

                            </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>



    </div>
    </div>

<?php 
require_once("parties_html/footer.php");
?>
</body>
</html>