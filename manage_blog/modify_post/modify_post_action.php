<?php
	include('../to_include.php');
	// We allow the user to post a new post only if he is connected.
	if (isset($_SESSION['username'])) {
		if (isset($_POST['title'], $_POST['post'], $_POST['id'])) {
			// We try to connect to the SQL database.
			try
			{
				$bdd = new PDO('mysql:host=localhost;
								dbname=blog;charset=utf8', 'root', '');
			}
			// In case of error.
			catch(Exception $e)
			{
			        die('Error : '.$e->getMessage());
			}

			// Preventing $_POST['id'] from SQL injection use.
			$id = intval($_POST['id']);

			$request = $bdd->query("SELECT author FROM posts WHERE id='$id'");

			$data = $request->fetch();

			if ($data['author'] == $_SESSION['username']) {
				$request = $bdd->prepare("UPDATE posts SET title=:title, post=:post WHERE id=:id");

				$title = $_POST['title'];
				$post = $_POST['post'];

				$request->execute(array('title'=>$title, 'post'=>$post, 'id'=>$id));

				echo 'Update successful. Redirection in 2 seconds...';
				header("refresh:2;url=index.php");
			}

			else { // If the author of the entry ID is not the user which is connected to the current session, we restrict the access.
				echo 'Wrong article ID. Redirection in 2 seconds...';
				header("refresh:2;url=index.php");
			}
		}
	}

	// If the user isn't connected, we redirect him to the startpage.
	else {
		echo 'You must be connected to post a new blog entry.
		 Redirection in 2 seconds...';
		header("refresh:2;url=../login.php");
	}


?>