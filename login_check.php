<?php
	include('to_include.php');
	if (isset($_POST['username'], $_POST['password'])) {
		// We try to connect to the SQL database.
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
			$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		// In case of error.
		catch(Exception $e)
		{
		        die('Error : '.$e->getMessage());
		}

		$password = $_POST['password'];
		// Adding salt to the password.
		$password = 'er4t94e4r5' . $password;
		// Hashing the password in SHA-256.
		$password = hash('sha256', $password);

		$request = $bdd->prepare("SELECT password FROM users WHERE username=:username");
		$request->execute(array('username'=>$_POST['username']));

		$fetch = $request->fetch();

		if ($password == $fetch['password']) {
			$_SESSION['username'] = $_POST['username'];

			echo 'You are now connected. Redirection in 2 seconds...';
			header("refresh:2;url=index.php");
		}

		else {
			echo 'Wrong credentials. Redirection in 2 seconds...';
			header("refresh:2;url=login.php");
		}
	}

	else {
		echo 'Redirection in 2 seconds...';
		header("refresh:2;url=index.php");
	}
?>