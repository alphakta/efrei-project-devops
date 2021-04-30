<?php
	session_start();
	session_destroy();

	header('Location: /PTS3/vues/index_site.php');

?>