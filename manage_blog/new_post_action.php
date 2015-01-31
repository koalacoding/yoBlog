<?php
	session_start();
	// We allow the user to post a new post only if he is connected.
	if (isset($_SESSION['username'])) {
		if (isset($_POST['title'], $_POST['post'])) {
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

			$request = $bdd->prepare("INSERT INTO
				posts(author, title, post, post_date)
				VALUES(:author, :title, :post, NOW())");

			$request->execute(array('author'=>$_SESSION['username'],
				'title'=>$_POST['title'],
				'post'=>$_POST['post']));

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