<?php 
require_once("../vues/parties_html/header.php");
?>


  <div class="container">
    <div class="well well-lg"> 
      <h1 class="text-center"> Commande groupée </h1> 
<h2> Liste de clients à proximité :</h2>

      <form method="post" action="../controleurs/ajout_groupe.php">
        <p> Saisir le nom de votre groupe  <input id="text" name="ville"> </p>
        <input type="submit" name="bouton" value="Confirmer" action="ajout_groupe.php" />
      </form>
      

      <p> Cocher les personnes à ajouter à votre groupe  </p>
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
include("../modeles/membre.php");
include("../modeles/bd.php");
session_start();

$ville = $_POST['ville'];



$req= "SELECT C.numClient, prenomClient,nomClient, nomQuartier, nomQuartier FROM CLIENT C, QUARTIER Q, COMMANDE CO WHERE c.numQuartier = q.numQuartier AND q.nomQuartier = '$ville' AND CO.numClient = C.numClient";

$ps = mysqli_query($coBDD,$req);

foreach($ps as $d)
{
    $numClient = $d['numClient'];
          echo "<form method='post' action='ajout_groupe.php''>";
          echo "<tr>";
          echo "<td>".$d['numClient']."</td>";
          echo "<td>".$d['nomClient']."</td>";
          echo "<td>".$d['prenomClient']."</td>";
          echo "<td>".$d['nomClient']."</td>";
          echo "<td>"."<input type='submit' name='bouton' value='Confirmer' action='ajout_groupe.php'/>"."</td>";
          echo "</form>";
    }

?>

      </tbody>
    </table>


