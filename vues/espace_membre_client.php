<?php 
require_once("parties_html/header.php");
?>

	<div class="container">
		<div class="well well-lg"> 
			<h1 class="text-center"> Bienvenue dans votre espace membre,    
				<?php 
				echo "  ".$_SESSION['prenom'];
				?>
			</h1> 

		</div>
	</div>
<?php 
require_once("parties_html/footer.php");
?>
</body>
</html>