							<h1 class="text-center"> Actualisation du stock </h1> 
					<form method="post" action="../controleurs/ajout_stock.php">
						
						<p>
						<label for="nom">Nom du produit : </label>
						<input type="text" name="nom_produit" placeholder="Nom du produit"/>
						</p>
						
						<p>
						<label for="nom">Ajout au stock : </label>
						<input type="number" name="ajout_stock" placeholder="Quantité supplémentaire"/>
						</p>
						
					<input type="submit" name="bouton" value="Actualiser le stock" action="../controleurs/ajout_stock.php"/>
					</form>
							<h1 class="text-center"> Ajout d'un produit </h1> 

		<form method="post" action="../controleurs/ajout_produit.php">
						
						<p>
						<label for="nom">Nom du produit : </label>
						<input type="text" name="nom_produit" placeholder="Nom du produit"/>
						</p>
						
						<p>
						<label for="nom">Stock actuel : </label>
						<input type="number" name="stock" placeholder="Stock"/>
						</p>
						
						<p>
						<label for="nom">Prix unitaire : </label>
						<input type="text" name="prix" placeholder="Prix"/>
						</p>
						
						<p>
						<label for="nom">Fruit ou Legume : </label>
						<input type="text" name="type" placeholder="Type"/>
						</p>
						
						<p>
						<label for="nom">Famille : </label>
						<input type="text" name="famille" placeholder="Ex: Fruit rouge"/>
						</p>
						
						<p>
						<label for="nom">Nom de l'image : </label>
						<input type="text" name="nom_image" placeholder="Ex: fraise.jpg"/>
						</p>
						<p> Veuillez par la suite enregistrer la photo de dimension 286*180 dans le dossier "source" afin qu'elle apparaisse dans le catalogue. </p>
						
					<input type="submit" name="bouton" value="Ajouter un nouveau produit" action="../controleurs/ajout_produit.php"/>
					</form>	

