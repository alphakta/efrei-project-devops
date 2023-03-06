<?php
	session_start();
	session_destroy();

	header('Location: ./../vues/index_site.php');

?>