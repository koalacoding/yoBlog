<?php
	if (isset($_POST['username'], $_POST['password'])) {
		// We try to connect to the SQL database.
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
		}
		// In case of error.
		catch(Exception $e)
		{
		        die('Error : '.$e->getMessage());
		}

		// Preventing SQL injection.
		$username = mysql_real_escape_string($_POST['username']);
		$request = $bdd->query("SELECT * FROM users WHERE username='$username'");

		$fetch = $request->fetch();

		if ($_POST['password'] == $fetch['password']) {
			echo 'You are now connected. Redirection in 2 seconds.';
			header("refresh:2;url=index.php");
		}

		else {
			echo 'Wrong credentials. Redirection in 2 seconds.';
			header("refresh:2;url=index.php");
		}
	}
?>