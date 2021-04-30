<?php 
require_once("parties_html/header.php");
?>

<div class="container">
    <div class="well well-lg"> 


        <
            <?php 
                $numPanier = 1;
                $result = mysqli_query($coBDD, "SELECT * from panier WHERE numPanier = $numPanier");

                foreach($result as $c)
                {
                    echo "<h1 class='text-center'>" .$c['nomPanier']." </h1> ";
                }

                $result2 = mysqli_query($coBDD, "SELECT * from produit WHERE numPanier = $numPanier");
            ?>

            <div class="row">

                <?php foreach($result2 as $c) : ?>

                    <div class="col-sm-8 ">
                        <div class="card-columns-fluid">


                                <div class="card-body">

                                <h2 class="h2titre"> <?= $c['nomProduit'] ?></h2>
                                <img class="card-img-top" src="source/<?= $c['image'] ?>" alt="...">

                                <div class="badge">
                                <span class='badge badge-primary'>Num du produit : <?= $c['numProduit'] ?></span> 
                                <span class='badge badge-primary'>Quantité : 1 </span> 
                                <span class='badge badge-primary'>Prix : <?= $c['prixProduit'] ?> </span> 
                            </div>
                            </div>


                        </div>
                    </div>

                <?php endforeach; ?>

            </div>

                <?php 
                if(isset($_SESSION['email']))
                    echo "<p  class='spaceb'><button type='button' class='boutonr'> <a class='taillea' href='vue_commande.php'>Commander ce panier </a></button></p>";

            ?>



        </div>
    </div>

    <?php 
require_once("parties_html/footer.php");
?>
</body>
</html>