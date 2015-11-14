<?php
class Register {
  /*-------------------------------------
  ----------IS USERNAME VALID ?----------
  -------------------------------------*/

  function isUsernameValid($username) {
  	/* Check if the username is between 2 and 17 characters, and only contains letters,
  		numbers, underscores or dashes. */
  	if (preg_match("#^[a-zA-Z0-9-_]{2,17}$#", $username)) {
  		return TRUE;
  	}

  	return FALSE;
  }

  /*----------------------------------------------------
  ----------CHECK IF USERNAME IS ALREADY TAKEN----------
  ----------------------------------------------------*/

  function checkIfUsernameAlreadyTaken($username) {
  	require($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/sql/connexion.php'); // We connect to the SQL database.

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


  /*-------------------------------------
  ----------IS PASSWORD VALID ?----------
  -------------------------------------*/

	function isPasswordValid($password) {
		/* Check if the password is between 2 and 30 characters, and only contains letters,
			numbers, underscores or dashes. */
		if (preg_match("#^[a-zA-Z0-9-_]{2,30}$#", $password)) {
			return TRUE;
		}

		return FALSE;
	}

  /*------------------------------------------
  ----------CHECK IF PASSWORDS MATCH----------
  ------------------------------------------*/

	// Check if password and password confirmation are the same.
	function checkIfPasswordsMatch($password1, $password2) {
		if ($password1 == $password2) {
			return TRUE;
		}

		return FALSE;
	}


  /*--------------------------------------
  ----------INSERT ACCOUNT IN DB----------
  --------------------------------------*/

  function insertAccountInDb($username, $password) {
  	require($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/sql/connexion.php'); // We connect to the SQL database.

  	$password = hash('sha256', 'er4t94e4r5' . $password); // Hashing password + salt to SHA-256;

  	$request = $bdd->prepare ('INSERT INTO users(username, password, registration_date)
  															VALUES(?, ?, NOW())');
  	$request->execute(array($username, $password));
  	$request->closeCursor();
  }
}
