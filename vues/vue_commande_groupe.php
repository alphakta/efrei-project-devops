<?php 
require_once("parties_html/header.php");
?>


  <div class="container">
    <div class="well well-lg"> 
      <h1 class="text-center"> Création du groupe </h1> 

      <form method="post" action="../controleurs/ajout_groupe.php">
        <p> Saisir le nom de votre groupe :  <input id="text" name="ville"> </p>
        <p> Saisir l'adresse du groupe :  <input id="text" name="adresse"> </p>
        <input type="submit" name="bouton" value="Confirmer" action="ajout_groupe.php" />
      </form>

      <h1 class="text-center"> Commande groupée </h1> 
        <h2 class="text-center"> Clients à proximité</h2>

<table>
      <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Numéro du client</th>
          <th scope="col">Nom Client</th>
          <th scope="col">Prenom Client</th>
          <th scope="col">Ville</th>
          <th scope="col">Confirmation</th>


        </tr>
      </thead>
      <tbody>
<?php

$numClient = $_SESSION['id'];

$req2 = mysqli_query($coBDD, "SELECT * FROM quartier q, client c WHERE c.numQuartier = q.numQuartier AND c.numClient = $numClient");
$row1 = $req2 -> fetch_assoc();
$get_ville = $row1["nomQuartier"];
$ville = $get_ville;

$req= "SELECT C.numClient, prenomClient,nomClient, nomQuartier, nomQuartier FROM CLIENT C, QUARTIER Q, COMMANDE CO WHERE c.numQuartier = q.numQuartier AND q.nomQuartier = '$get_ville' AND CO.numClient = C.numClient AND C.numClient != $numClient";

$ps = mysqli_query($coBDD,$req);

foreach($ps as $d)
{
    $numClient = $d['numClient'];
          echo "<form method='post' action='../controleurs/ajout_client_groupe.php''>";
          echo "<tr>";
          echo "<td>".$d['numClient']."</td>";
          echo "<td>".$d['nomClient']."</td>";
          echo "<td>".$d['prenomClient']."</td>";
          echo "<td>".$d['nomQuartier']."</td>";
          echo "<input  name='numClient' type='hidden' value='$numClient'>";
          echo "<td>"."<input type='submit' name='bouton' value='Confirmer' action='../controleurs/ajout_client_groupe.php'/>"."</td>";
          echo "</form>";

    }

?>
<form>
            <button id='btnCommandeGroupe' type='button' class='btn btn-primary'><a href='catalogue_fruit_legume_groupe.php'> Passer à la commande </a></button>
          </form>

    </div>
  </div>
</body>
</html>
