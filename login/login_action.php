<?php
	include_once('../include/session.php');

	include_once('login_action_functions.php');

	if (isset($_POST['username'], $_POST['password'])) {
		include_once('../sql/sql_connexion.php');

		// If the POSTed hashed password matches the given username's password.
		if (check_password($bdd, $_POST['username'], hash_password($_POST['password'])) == TRUE) {
			$_SESSION['username'] = $_POST['username'];

			echo 'You are now connected. Redirection in 2 seconds...';
			header("refresh:2;url=../index.php");
		}

		else {
			echo 'Wrong credentials. Redirection in 2 seconds...';
			header("refresh:2;url=login.php");
		}
	}

	else { // If $_POST['username'] or $_POST['password'] are not set.
		echo 'Error. Redirection in 2 seconds...';
		header("refresh:2;url=../index.php");
	}
