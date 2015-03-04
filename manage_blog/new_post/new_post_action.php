<?php
	include('../../to_include.php');
	// We allow the user to post a new post only if he is connected.
	if (isset($_SESSION['username'])) {
		if (isset($_POST['category'], $_POST['title'], $_POST['post_content'])) {
			include_once ('../../sql_connexion.php');
			include_once ('new_post_action_functions.php');

			/* Check if the month and year category of the post date
			is already in the "archives_months" table. */
			$request = $bdd->prepare("SELECT COUNT(*) FROM archives_months WHERE month=?
										AND year=?");
			$request->execute(array(date("m"), date("Y")));

			// If there is no category with this month and year, we add it to the table.
			if ($request->fetchColumn() == 0) {
				$request->closeCursor();

				$request = $bdd->prepare("INSERT INTO archives_months(month, year) VALUES (?, ?)");
				$request->execute(array(date("m"), date("Y")));
				$request->closeCursor();
			}

			add_new_post($bdd, $_SESSION['username'], $_POST['category'], $_POST['title'],
										$_POST['post_content']);

			echo 'New blog entry successfully posted. Redirection in 2 seconds...';
			header("refresh:2;url=../manage_blog.php");
		}
	}

	// If the user isn't connected, we redirect him to the startpage.
	else {
		echo 'You must be connected to post a new blog entry.
		 Redirection in 2 seconds...';
		header("refresh:2;url=../manage_blog.php");
	}


?>
