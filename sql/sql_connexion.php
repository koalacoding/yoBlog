<?php
	try { // We try to connect to the SQL database.
		$bdd = new PDO('mysql:host=localhost; dbname=yoBlog; charset=utf8', 'root', '');
		$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	catch(Exception $e) { // In case of error.
	    die('Error : ' . $e->getMessage());
	}
