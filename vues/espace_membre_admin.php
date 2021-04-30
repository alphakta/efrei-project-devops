<?php 
require_once("parties_html/header.php");
?>

	<div class="container">
		<div class="well well-lg"> 
			<h1 class="text-center"> Bienvenue 
				<?php 
				echo $_SESSION['prenom'];
				?>
				, Voici votre espace membre administrateur
			</h1> 
			<?php
				require_once("formulaire_stock.php");
			?>

			<h1 class="text-center"> Liste de toutes les commandes</h1>
		<table class="table table-bordered">

			<thead>
				<tr>
					<th scope="col">Numéro de commande</th>
					<th scope="col">Date livraison</th>
					<th scope="col">Statut</th>
				</tr>
			</thead>
			<tbody>
				<?php
						$reqComAttente = mysqli_query($coBDD, "SELECT L.numCommande,dateLivraison,statut FROM commande C, livraison L WHERE C.numCommande = L.numCommande ");
						foreach($reqComAttente as $c)
						{
							$numC = $c['numCommande'];
							echo "<tr>";
							echo "<td>".$c['numCommande']."</td>";
							echo "<td>".$c['dateLivraison']."</td>";
							echo "<td>".$c['statut']."</td>";
							echo "</tr>";
						}
				?>
					</tbody>
					</table>

			<h1 class="text-center"> Liste des commandes d'un client en attente </h1>
		<table class="table table-bordered">

			<thead>
				<tr>
					<th scope="col">Numéro de commande</th>
					<th scope="col">Nom du client</th>
					<th scope="col">Prenom du client</th>
					<th scope="col">Date livraison</th>
					<th scope="col">Statut</th>
					<th scope="col">Validation</th>
				</tr>
			</thead>
			<tbody>
				<?php
						$reqComAttente = mysqli_query($coBDD, "SELECT L.numCommande,nomClient,prenomClient,dateLivraison,statut FROM commande C, livraison L, client CL WHERE C.numCommande = L.numCommande AND C.numClient = CL.numClient AND C.statut = 'attente'");
						foreach($reqComAttente as $c)
						{
							$numC = $c['numCommande'];
							echo "<tr>";
							echo "<td>".$c['numCommande']."</td>";
							echo "<td>".$c['nomClient']."</td>";
							echo "<td>".$c['prenomClient']."</td>";
							echo "<td>".$c['dateLivraison']."</td>";
							echo "<td>".$c['statut']."</td>";
							echo "<td>"."<button type='button' class='btn btn-success'><a href='../controleurs/valider_commande.php?numC=$numC'>Valider</a></button>"."</td>";
							echo "</tr>";
						}
				?>
					</tbody>
					</table>

								<h1 class="text-center"> Liste des commandes d'un groupe en attente </h1>
		<table class="table table-bordered">

			<thead>
				<tr>
					<th scope="col">Numéro de commande</th>
					<th scope="col">Nom du groupe</th>
					<th scope="col">Date livraison</th>
					<th scope="col">Statut</th>
					<th scope="col">Validation</th>
				</tr>
			</thead>
			<tbody>
				<?php
						$reqComAttente = mysqli_query($coBDD, "SELECT L.numCommande,nomGroupe,dateLivraison,statut FROM commande C, livraison L, groupe G WHERE C.numCommande = L.numCommande AND C.numGroupe = G.numGroupe AND C.statut = 'attente'");
						foreach($reqComAttente as $c)
						{
							$numC = $c['numCommande'];
							echo "<tr>";
							echo "<td>".$c['numCommande']."</td>";
							echo "<td>".$c['nomGroupe']."</td>";
							echo "<td>".$c['dateLivraison']."</td>";
							echo "<td>".$c['statut']."</td>";
							echo "<td>"."<button type='button' class='btn btn-success'><a href='../controleurs/valider_commande.php?numC=$numC'>Valider</a></button>"."</td>";
							echo "</tr>";
						}
				?>
					</tbody>
					</table>


		</div>
	</div>
<?php 
require_once("parties_html/footer.php");
?>
</body>
</html>

