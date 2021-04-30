<?php 
require_once("parties_html/header.php");
?>
<div class="container">
	<div class="well well-lg"> 
		<h1 class="text-center"> Voici vos commandes individuelles,
			<?php 
			echo $_SESSION['prenom'];

			if(!isset($_SESSION['count']))
				$_SESSION['count'] = 1;

			?>
			:
		</h1> 

		<table class="table table-bordered">
			<thead>
				<tr>
					<th scope="col">Numéro de commande</th>
					<th scope="col">Nom du produit/panier</th>
					<th scope="col">Quantité</th>
					<th scope="col">Prix TTC</th>
					<th scope="col">Suppression</th>
					<th scope="col">Modification</th>


				</tr>
			</thead>
			<tbody>

				<?php 
				$id = $_SESSION['id'];

				$requete1 = "SELECT LC.numCommande, P.numProduit,P.nomProduit,LC.quantite,C.statut, ROUND(SUM(LC.quantite * P.prixProduit)*1.20, 2) AS prixTTC FROM LIGNE_COMMANDE LC, PRODUIT P, COMMANDE C WHERE LC.numProduit = P.numProduit AND C.numCommande = LC.numCommande AND C.numClient = $id GROUP BY LC.numCommande, P.nomProduit";
				$produitCommander = mysqli_query($coBDD,$requete1);
				$reqPrixTTC = "SELECT ROUND(SUM(LC.quantite * P.prixProduit)*1.20, 2) AS prixTTCCommande FROM LIGNE_COMMANDE LC, PRODUIT P, COMMANDE C WHERE LC.numProduit = P.numProduit AND C.numCommande = LC.numCommande AND C.numClient = $id";


				foreach($produitCommander as $row)
				{
					echo "<tr>";
					$numcom = $row['numCommande'];
					$numpro = $row['numProduit'];
					$statutCommande = $row['statut'];
					echo "<td>".$row['numCommande']."</td>";
					echo "<td>".$row['nomProduit']."</td>";
					echo "<td>".$row['quantite']."</td>";
					echo "<td>".$row['prixTTC']."€"."</td>";

					if(isset($statutCommande))
					{
						if($statutCommande != "valider")
						{
							echo "<td><button type='button' class='btn btn-danger'><a href='../controleurs/supprimer_produit.php?numP=$numpro&numC=$numcom'>Supprimer le produit </a></button></td>";
							echo "<td>
							<form method='post' action='../controleurs/modification_produit.php'>
							<input type='number' value='1' name='quantiteModif'>"." "."<input  name='numCommande' type='hidden' value='$numcom'>".
							"<input name='numProduit' type='hidden' value='$numpro'>".
							"<input type='submit' name='bouton' value='Modifier' action='../controleurs/modification_produit.php' style='height:40px; width:100px'/>"."</form></td>";
						}
						else
						{
							echo "<td><button type='button' class='btn btn-secondary'>Supprimer le produit </button></td>";
							echo "<td><button type='button' class='btn btn-secondary'>Modifier le produit </button></td>";
						}

					}
					echo "</tr>";
				}


				///////////////////////////////////////////////////////////////////////////////



				?>
				<tr>
					<?php 
					$reqPrixTTC = "SELECT C.statut, ROUND(SUM(LC.quantite * P.prixProduit)*1.20, 2) AS prixTTCCommande FROM LIGNE_COMMANDE LC, PRODUIT P, COMMANDE C WHERE LC.numProduit = P.numProduit AND C.numCommande = LC.numCommande AND C.numClient = $id";
					$prixTotal = mysqli_query($coBDD,$reqPrixTTC);

					foreach($prixTotal as $row)
					{
						echo "<td colspan='3'> Prix total </td>";
						echo "<td >".$row['prixTTCCommande']."€"."</td>";
						$statutCommande = $row['statut'];
						echo "<tr><td colspan='4'> Statut de la commande : ".$statutCommande."</td></tr>";
					}


					// vérifie si une livraison est déjà établie pour le numero de commande et client
					$reqDateLivraison = mysqli_query($coBDD,"SELECT * FROM Commande C, Livraison L WHERE C.numClient = $id AND C.numCommande = L.numCommande");
					$row = $reqDateLivraison -> fetch_assoc();
					if (isset($row))
						$_SESSION['count'] = 0;
					else
						$_SESSION['count'] = 1;
					// alors on met le count à 0, pour ne pas afficher le formulaire de livraison mais afficher le détail de livraison
					?>
				</tr>
			</tbody>
		</table>

		<?php
		if(isset($statutCommande))
		{
			if($statutCommande != "valider")
			{
				//echo "<button type='button' class='btn btn-primary'>  Modifier la commande </button>";
				echo "<button type='button' class='btn btn-danger'><a href='../controleurs/supprimer_commande.php?numC=$numcom'>Supprimer la commande</a></button>";
			}
		}

		?>

		<p> --------------------------------------------------------------------------------------------------- </p>
		<?php

		//var_dump($_SESSION);
		if(isset($statutCommande) )
		{
			if($statutCommande != "valider" && $_SESSION['count'] != 0)
			{
				require_once("formulaire_livraison.php");
			}
			else
			{
				$reqDateLivraison = mysqli_query($coBDD,"SELECT L.numCommande, dateLivraison, typeLivraison, frequence FROM Commande C, Livraison L WHERE C.numClient = $id AND C.numCommande = L.numCommande");
				$row = $reqDateLivraison -> fetch_assoc();
				if (isset($row))
				{
					echo "<h2 class='text-center'> Détail livraison </h2>";
					echo "<p>Numero de commande : ".$row['numCommande']."</p>";
					echo "<p>Date Livraison : ".$row['dateLivraison']."</p>";
					echo "<p>Type de livraison : ".$row['typeLivraison']."</p>";
					echo "<p>Fréquence que vous avez choisi : ".$row['frequence']."</p>";

				}
			}
		}

		?>

	</div>
</div>

<div class="container">
	<div class="well well-lg"> 
		<h1 class="text-center"> Voici vos commandes groupées,
			<?php 
			echo $_SESSION['prenom'];

			if(!isset($_SESSION['count']))
				$_SESSION['count'] = 1;


			?>
			:
		</h1> 

		<table class="table table-bordered">
			<thead>
				<tr>
					<th scope="col">Numéro de commande</th>
					<th scope="col">Nom du produit/panier</th>
					<th scope="col">Quantité</th>
					<th scope="col">Prix TTC</th>
					<th scope="col">Suppression</th>
					<th scope="col">Modification</th>


				</tr>
			</thead>
			<tbody>

				<?php 
				$req = mysqli_query($coBDD, "SELECT numGroupe from ligne_groupe WHERE numClient = $id ORDER BY numGroupe DESC LIMIT 1");
				$row1 = $req -> fetch_assoc();
				if(isset($row1['numGroupe']))
					$get_numGroupe = $row1['numGroupe'];

				if(isset($get_numGroupe))
				{
					$requete1 = "SELECT LC.numCommande, P.numProduit,P.nomProduit,LC.quantite,C.statut, ROUND(SUM(LC.quantite * P.prixProduit)*1.20, 2) AS prixTTC FROM LIGNE_COMMANDE LC, PRODUIT P, COMMANDE C WHERE LC.numProduit = P.numProduit AND C.numCommande = LC.numCommande AND C.numGroupe = $get_numGroupe GROUP BY LC.numCommande, P.nomProduit";
					$produitCommander = mysqli_query($coBDD,$requete1);
					$reqPrixTTC = "SELECT ROUND(SUM(LC.quantite * P.prixProduit)*1.20, 2) AS prixTTCCommande FROM LIGNE_COMMANDE LC, PRODUIT P, COMMANDE C WHERE LC.numProduit = P.numProduit AND C.numCommande = LC.numCommande AND C.numGroupe = $get_numGroupe";


					foreach($produitCommander as $row)
					{
						echo "<tr>";
						$numcom = $row['numCommande'];
						$numpro = $row['numProduit'];
						$statutCommande = $row['statut'];
						echo "<td>".$row['numCommande']."</td>";
						echo "<td>".$row['nomProduit']."</td>";
						echo "<td>".$row['quantite']."</td>";
						echo "<td>".$row['prixTTC']."€"."</td>";

						if(isset($statutCommande))
						{
							if($statutCommande != "valider")
							{
								echo "<td><button type='button' class='btn btn-danger'><a href='../controleurs/supprimer_produit.php?numP=$numpro&numC=$numcom'>Supprimer le produit </a></button></td>";
								echo "<td>
								<form method='post' action='../controleurs/modification_produit.php'>
								<input type='number' value='1' name='quantiteModif'>"." "."<input  name='numCommande' type='hidden' value='$numcom'>".
								"<input name='numProduit' type='hidden' value='$numpro'>".
								"<input type='submit' name='bouton' value='Modifier' action='../controleurs/modification_produit.php' style='height:40px; width:100px'/>"."</form></td>";
							}
							else
							{
								echo "<td><button type='button' class='btn btn-secondary'>Supprimer le produit </button></td>";
								echo "<td><button type='button' class='btn btn-secondary'>Modifier le produit </button></td>";
							}

						}
						echo "</tr>";
					}
				}



				///////////////////////////////////////////////////////////////////////////////



				?>
				<tr>
					<?php 
					if (isset($get_numGroupe)){
						$reqPrixTTC = "SELECT C.statut, ROUND(SUM(LC.quantite * P.prixProduit)*1.20, 2) AS prixTTCCommande FROM LIGNE_COMMANDE LC, PRODUIT P, COMMANDE C WHERE LC.numProduit = P.numProduit AND C.numCommande = LC.numCommande AND C.numGroupe = $get_numGroupe";
						$prixTotal = mysqli_query($coBDD,$reqPrixTTC);

						foreach($prixTotal as $row)
						{
							echo "<td colspan='3'> Prix total </td>";
							echo "<td >".$row['prixTTCCommande']."€"."</td>";
							$statutCommande = $row['statut'];
							echo "<tr><td colspan='4'> Statut de la commande : ".$statutCommande."</td></tr>";
						}


					// vérifie si une livraison est déjà établie pour le numero de commande et client
						$reqDateLivraison = mysqli_query($coBDD,"SELECT * FROM Commande C, Livraison L WHERE C.numGroupe = $get_numGroupe AND C.numCommande = L.numCommande");
						$row = $reqDateLivraison -> fetch_assoc();
						if (isset($row))
							$_SESSION['count2'] = 0;
						else
							$_SESSION['count2'] = 1;
					// alors on met le count à 0, pour ne pas afficher le formulaire de livraison mais afficher le détail de livraison
					}

					?>
				</tr>
			</tbody>
		</table>

		<?php
		if(isset($statutCommande))
		{
			if($statutCommande != "valider")
			{
				//echo "<button type='button' class='btn btn-primary'>  Modifier la commande </button>";
				echo "<button type='button' class='btn btn-danger'><a href='../controleurs/supprimer_commande.php?numC=$numcom'>Supprimer la commande</a></button>";
			}
		}

		?>

		<p> --------------------------------------------------------------------------------------------------- </p>
		<?php

		//var_dump($_SESSION);

		if (isset($_SESSION['cout2']))
		{
			if( isset($statutCommande) )
			{
				if($statutCommande != "valider" && $_SESSION['count2'] != 0)
				{
					require_once("formulaire_livraison.php");
				}
				else
				{
					$reqDateLivraison = mysqli_query($coBDD,"SELECT L.numCommande, dateLivraison, typeLivraison, frequence FROM Commande C, Livraison L WHERE C.numGroupe = $get_numGroupe AND C.numCommande = L.numCommande");
					$row = $reqDateLivraison -> fetch_assoc();
					if (isset($row))
					{
						echo "<h2 class='text-center'> Détail livraison </h2>";
						echo "<p>Numero de commande : ".$row['numCommande']."</p>";
						echo "<p>Date Livraison : ".$row['dateLivraison']."</p>";
						echo "<p>Type de livraison : ".$row['typeLivraison']."</p>";
						echo "<p>Fréquence que vous avez choisi : ".$row['frequence']."</p>";

					}
				}
			}
		}


		?>

		</div>
		</div>


		<?php 
		require_once("parties_html/footer.php");
		?>
		</body>
		</html>