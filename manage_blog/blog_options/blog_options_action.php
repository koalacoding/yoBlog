<?php
	include_once('../../to_include.php');

	// We allow the user to write about his blog only if he is connected.
	if (isset($_SESSION['username'])) {
		if (isset($_POST['about'])) {
			include_once ('../../sql_connexion.php');

			$request = $bdd->prepare("INSERT INTO about_blog(username, about) VALUES(?, ?)");
			$request->execute(array($_SESSION['username'], $_POST['about']));
			$request->closeCursor();

			echo 'Options successfully modified. Redirection in 2 seconds...';
			header("refresh:2;url=../index.php");			
		}

		else { // If $_POST['about'] is not defined.
			echo 'Error. Redirection in 2 seconds...';
			header("refresh:2;url=blog_options.php");
		}
	}

	else { // If the user is not connected.
		echo 'You must be connected to access this page.
		 Redirection in 2 seconds...';
		header("refresh:2;url=../../login.php");
	}
?>