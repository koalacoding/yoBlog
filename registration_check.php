<?php
	include('to_include.php');
	$error = 0;

	if (isset($_POST['password'], $_POST['password_confirmation'])) {
		/* If the passwords the user entered to register a new account 
		don't match, an error message is shown and the user is
		redirected to the register page. */
		if ($_POST['password'] != $_POST['password_confirmation']) {
			header("refresh:3;url=register.php");
			echo '<center>Passwords don\'t match.
			 Redirection in 3 seconds.</center>';
			/* If $error = 1, the next if instruction won't execute.
			(nothing will be inserted into the SQL table) */
			$error = 1;
		}
	}

	if (isset($_POST['username'], $_POST['password'],
	$_POST['password_confirmation'], $_POST['email']) AND $error != 1) {
		// We try to connect to the SQL database.
		try {
			$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
			$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		// In case of error.
		catch(Exception $e) {
		        die('Error : '.$e->getMessage());
		}

		$username = $_POST['username'];

		$request = $bdd->prepare("SELECT username FROM users WHERE username=:username");
		$request->execute(array('username'=>$username));

		if ($request->rowCount() > 0) { // If the username is already used in the database.
			echo '<center>This username is already taken. Redirection in 2 seconds...</center>';
			header("refresh:3;url=register.php");
		}

		else { // If the username is free, then we create the account.
			$password = $_POST['password'];
			// Adding salt to the password.
			$password = 'er4t94e4r5' . $password;
			// Hashing the password to sha256;
			$password = hash('sha256', $password);
			$email = $_POST['email'];

			$request = $bdd->prepare
				('INSERT INTO users(username, password, email, registration_date)
				VALUES(:username, :password, :email, NOW())');

			$request->execute(array(
				'username'=>$username, 
				'password'=>$password,
				'email'=>$email));

			echo '<center>Account successfully added.
			 Redirection in 2 seconds...</center>';
			// We redirect the user to index.php after 2 seconds.
			header("refresh:2;url=index.php");
		}
	}

	/* If a field is empty, an error message is shown
	and the user is redirect to register.php. */
	else {
		echo 'Please fill every field. Redirection in 2 seconds...';
		header("refresh:2;url=register.php");
	}
?>
