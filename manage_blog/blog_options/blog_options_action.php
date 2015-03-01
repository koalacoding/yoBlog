<?php
	include_once('../../to_include.php');
	include_once('blog_options_functions.php');

	// We allow the user to modify his blog's options only if he is connected.
	if (isset($_SESSION['username'])) {
		if (isset($_POST['short_about']) && isset($_POST['about']) && isset($_POST['contact'])) {
			include_once ('../../sql_connexion.php');

			// If the user has already posted his blog's options, we update it.
			if (user_has_already_posted_options($bdd, $_SESSION['username'])) {
				update_blog_options($bdd, $_POST['short_about'], $_POST['about'],
									$_POST['contact'], $_SESSION['username']);
			}

			// If the user has not posted his blog options yet, we insert it to the database.
			else {
				insert_blog_options($bdd, $_SESSION['username'], $_POST['short_about'],
									$_POST['about'], $_POST['contact']);
			}


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