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

		// Using mysql_real_escape_string here to match the registration format.
		$password = mysql_real_escape_string($_POST['password']);
		// Adding salt to the password.
		$password = 'er4t94e4r5' . $password;
		// Hashing the password in SHA-256.
		$password = hash('sha256', $password);

		// Preventing SQL injection.
		$username = mysql_real_escape_string($_POST['username']);
		$request = $bdd->query("SELECT * FROM users WHERE username='$username'");

		$fetch = $request->fetch();

		if ($password == $fetch['password']) {
			session_start();
			$_SESSION['id'] = $fetch['id'];
			$_SESSION['username'] = mysql_real_escape_string($_POST['username']);

			echo 'You are now connected. Redirection in 2 seconds.';
			header("refresh:2;url=index.php");
		}

		else {
			echo 'Wrong credentials. Redirection in 2 seconds.';
			header("refresh:2;url=login.php");
		}
	}
?>