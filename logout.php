<?php
	session_start();
	// Destroying the current session.
	$_SESSION = array();
	session_destroy();

	echo 'Logging out... Redirection in 2 seconds.';
	header("refresh:2;url=index.php");
?>