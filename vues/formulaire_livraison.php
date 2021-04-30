		<form method="post" action="../controleurs/gestion_livraison.php">
			<p> Numéro de commande : <input type="number" name="numCo">
			<p> 
				<label> Type de livraison :</label> 			
				<SELECT name="typeLiv" size="1">
					<option name="Point Relais">Point relais </option>
					<option name="Express">Express</option>
					<option name="Domicile">Domicile</option> 
				</SELECT>
			</p> 

			<p> 
				<label> Fréquence de livraison :</label> 			
				<SELECT name="freqLiv" size="1">
					<option name="Hebdomadaire">Hebdomadaire </option>
					<option name="Ponctuelle">Ponctuelle</option>
				</SELECT>
			</p> 

			<input type="submit" name="bouton" value="Valider le mode de livraison" action="../controleurs/gestion_livraison.php" />

		</form>