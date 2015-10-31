<?php
/*----------------------------------------
------------------------------------------
-----------------USERNAME-----------------
------------------------------------------
----------------------------------------*/


/*------------------------------
-------IS USERNAME VALID ?------
------------------------------*/

function is_username_valid($username) {
	/* Check if the username is between 2 and 17 characters, and only contains letters,
		numbers, underscores or dashes. */
	if (preg_match("#^[a-zA-Z0-9-_]{2,17}$#", $username)) {
		return TRUE;
	}

	return FALSE;
}

/*-------------------------------
---IS USERNAME ALREADY TAKEN ?---
-------------------------------*/

function check_if_username_already_taken($username) {
	require($_SERVER['DOCUMENT_ROOT'] . '/php_blog/sql/sql_connexion.php'); // We connect to the SQL database.

	$request = $bdd->prepare("SELECT username FROM users WHERE username=?");
	$request->execute(array($username));

	if ($request->rowCount() > 0) { // If the username is already used in the database.
		$request->closeCursor();
		return TRUE;
	}

	$request->closeCursor();
	return FALSE;
}


/*----------------------------------------
------------------------------------------
-----------------PASSWORD-----------------
------------------------------------------
----------------------------------------*/


	/*------------------------------
	-------IS PASSWORD VALID ?------
	------------------------------*/

	function is_password_valid($password) {
		/* Check if the password is between 2 and 30 characters, and only contains letters,
			numbers, underscores or dashes. */
		if (preg_match("#^[a-zA-Z0-9-_]{2,30}$#", $password)) {
			return TRUE;
		}

		return FALSE;
	}

	/*------------------------------
	-------DO PASSWORDS MATCH ?-----
	------------------------------*/

	// Check if password and password confirmation are the same.
	function check_if_passwords_match($password1, $password2) {
		if ($password1 == $password2) {
			return TRUE;
		}

		return FALSE;
	}


/*----------------------------------------
------------------------------------------
------------INSERT ACCOUNT IN DB----------
------------------------------------------
----------------------------------------*/

function insert_account_in_db($username, $password) {
	require($_SERVER['DOCUMENT_ROOT'] . '/php_blog/sql/sql_connexion.php'); // We connect to the SQL database.

	$password = hash('sha256', 'er4t94e4r5' . $password); // Hashing password + salt to SHA-256;

	$request = $bdd->prepare ('INSERT INTO users(username, password, registration_date)
															VALUES(?, ?, NOW())');
	$request->execute(array($username, $password));
	$request->closeCursor();
}

/*------------------------------------
--------------------------------------
-----------------MAIN-----------------
--------------------------------------
------------------------------------*/

require($_SERVER['DOCUMENT_ROOT'] . '/php_blog/include/session.php');

if (isset($_POST['username'], $_POST['password'], $_POST['password_confirmation'])) {
  if (is_username_valid($_POST['username'])) {
    if (!check_if_username_already_taken($_POST['username'])) {
			if (is_password_valid($_POST['password'])) {
				if (check_if_passwords_match($_POST['password'], $_POST['password_confirmation'])) {
					insert_account_in_db($_POST['username'], $_POST['password']);
					echo 'ok';
				}

				else {
					echo 'Passwords don\'t match';
				}
			}

			else {
				echo 'Invalid password';
			}
		}

		else {
			echo 'Username already taken';
		}
  }

	else {
		echo 'Invalid username';
	}
}

else {
	echo 'Error';
}
