<?php
	include('../to_include.php');
	// We allow the user to post a new post only if he is connected.
	if (isset($_SESSION['username'])) {
		if (isset($_POST['title'], $_POST['post'])) {
			include_once ('../sql_connexion.php');

			// Inserting the new post into the database.
			$request = $bdd->prepare("INSERT INTO posts(author, title, post, post_date,
														time_since_unix_epoch)
										VALUES(?, ?, ?, NOW(), ?)");
			$request->execute(array($_SESSION['username'], $_POST['title'], $_POST['post'], time()));

			echo 'New blog entry successfully posted. Redirection in 2 seconds...';
			header("refresh:2;url=index.php");
		}
	}

	// If the user isn't connected, we redirect him to the startpage.
	else {
		echo 'You must be connected to post a new blog entry.
		 Redirection in 2 seconds...';
		header("refresh:2;url=../login.php");
	}


?>