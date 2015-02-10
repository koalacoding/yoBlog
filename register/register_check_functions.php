<?php

/*----------------------------------------
------------------------------------------
-----------------USERNAME-----------------
------------------------------------------
----------------------------------------*/


function is_username_valid($username) {
	/* Check if the username is between 2 and 17 characters, and only contains letters,
		numbers, underscores or indent. */
	if (!preg_match("#^[a-zA-Z0-9-_]{2,17}$#", $username)) {
		return FALSE;
	}

	return TRUE;
}

function check_if_username_already_taken($username) {
	include('../sql_connexion.php'); // We connect to the SQL database.

	$request = $bdd->prepare("SELECT username FROM users WHERE username=?");
	$request->execute(array($username));

	if ($request->rowCount() > 0) { // If the username is already used in the database.
		return TRUE;
	}

	return FALSE;
}

/*----------------------------------------
------------------------------------------
-----------------PASSWORD-----------------
------------------------------------------
----------------------------------------*/


function is_password_valid($password) {
	/* Check if the password is between 2 and 30 characters, and only contains letters,
		numbers, underscores or indent. */
	if (!preg_match("#^[a-zA-Z0-9-_]{2,30}$#", $password)) {
		return FALSE;
	}

	return TRUE;
}

function check_if_passwords_match($password1, $password2) { // Check if passwords match.
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


function is_email_valid($email) {
	if (!preg_match("#^[a-zA-Z0-9-_]{1,17}@[a-zA-Z0-9-_]{1,17}.[a-zA-Z-]{1,7}$#", $email)) {
		return FALSE;
	}

	return TRUE;
}

/*----------------------------------------
------------------------------------------
------------INSERT ACCOUNT IN DB----------
------------------------------------------
----------------------------------------*/


function insert_account_in_db($username, $password, $email) {
	include('../sql_connexion.php'); // We connect to the SQL database.
	$password = 'er4t94e4r5' . $password; // Adding salt to the password.
	$password = hash('sha256', $password); // Hashing the password to sha256;

	$request = $bdd->prepare
		('INSERT INTO users(username, password, email, registration_date)
		VALUES(?, ?, ?, NOW())');

	$request->execute(array($username, $password, $email));
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
		return 2;
	}

	if (check_if_username_already_taken($username)) {
		return 3;
	}

	if (!is_password_valid($password)) {
		return 4;
	}

	if (!check_if_passwords_match($password, $password2)) {
		return 5;
	}

	if (!is_email_valid($email)) {
		return 6;
	}

	insert_account_in_db($username, $password, $email);

	return 1;
}