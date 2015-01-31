<?php
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
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
		}
		// In case of error.
		catch(Exception $e)
		{
		        die('Error : '.$e->getMessage());
		}

		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		// Adding salt to the password.
		$password = 'er4t94e4r5' . $password;
		// Hashing the password to sha256;
		$password = hash('sha256', $password);
		$email = mysql_real_escape_string($_POST['email']);

		$request = $bdd->prepare
			('INSERT INTO users(username, password, email, registration_date)
			VALUES(:username, :password, :email, NOW())');

		$request->execute(array(
			'username'=>$username, 
			'password'=>$password,
			'email'=>$email));

		echo '<center>Account successfully added.
		 Redirection in 3 seconds.</center>';
		// We redirect the user to index.php after 3 seconds.
		header("refresh:3;url=index.php");
	}

	/* If a field is empty, an error message is shown
	and the user is redirect to register.php. */
	else {
		echo 'Please fill every field.';
		header("refresh:3;url=register.php");
	}
?>
