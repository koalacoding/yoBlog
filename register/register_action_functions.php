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

	/*------------------------------
	--IS USERNAME ALREADY TAKEN ?---
	------------------------------*/

	function check_if_username_already_taken($username) {
		include_once('../sql/sql_connexion.php'); // We connect to the SQL database.

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
	------------------EMAIL-------------------
	------------------------------------------
	----------------------------------------*/


	/*------------------------------
	---------IS EMAIL VALID ?-------
	------------------------------*/

	function is_email_valid($email) {
		if (preg_match("#^[a-zA-Z0-9-_]{1,17}@[a-zA-Z0-9-_]{1,17}.[a-zA-Z]{1,7}$#", $email)) {
			return TRUE;
		}

		return FALSE;
	}


	/*----------------------------------------
	------------------------------------------
	------------INSERT ACCOUNT IN DB----------
	------------------------------------------
	----------------------------------------*/


	function insert_account_in_db($username, $password, $email) {
		include('../sql/sql_connexion.php'); // We connect to the SQL database.

		$password = hash('sha256', 'er4t94e4r5' . $password); // Hashing password + salt to SHA-256;

		$request = $bdd->prepare ('INSERT INTO users(username, password, email, registration_date)
																VALUES(?, ?, ?, NOW())');
		$request->execute(array($username, $password, $email));
		$request->closeCursor();
	}


	/*----------------------------------------
	------------------------------------------
	-----------COMPLETE REGISTRATION----------
	------------------------------------------
	----------------------------------------*/


	/* Function to do all the necessary tasks to check the fields the user gave,
		and if they are correct, to register the account into the database. */
	function register_account($username, $password, $password2, $email) {
		if (!is_username_valid($username)) {
			return 'Invalid username.';
		}

		if (check_if_username_already_taken($username)) {
			return 'Username already taken.';
		}

		if (!is_password_valid($password)) {
			return 'Invalid password.';
		}

		if (!check_if_passwords_match($password, $password2)) {
			return "Passwords don't match.";
		}

		if (!is_email_valid($email)) {
			return 'Invalid email.';
		}

		// If no error is raised, we insert the account into the DB.
		insert_account_in_db($username, $password, $email);
		return 1;
	}
