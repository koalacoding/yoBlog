<?php
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

	$error = 0;

	if (isset($_POST['password'], $_POST['password_confirmation'])) {
		if ($_POST['password'] != $_POST['password_confirmation']) {
			header("refresh:3;url=register.php");
			echo 'Passwords don\'t match, redirection in 3 seconds.';
			$error = TRUE;
		}
	}

	if (isset($_POST['username'], $_POST['password'],
	$_POST['password_confirmation'], $_POST['email']) AND $error != 1) {
		$request = $bdd->prepare
		('INSERT INTO users(username, password, email, registration_date)
		VALUES(:username, :password, :email, NOW())');

		$request->execute(array(
		'username'=>$_POST['username'], 'password'=>$_POST['password'],
		'email'=>$_POST['email']));

		$request->closeCursor();
	}
?>
