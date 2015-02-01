<?php
	// We try to connect to the SQL database.
	try {
		$bdd = new PDO('mysql:host=localhost; dbname=blog; charset=utf8', 'root', '');
		$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	// In case of error.
	catch(Exception $e) {
	    die('Error : '.$e->getMessage());
	}
?>