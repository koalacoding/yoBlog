<?php
class LoginHandler {

/*--------------------------------------------------------
----------------------------------------------------------
--------------HASH AND SALT STRING TO SHA256--------------
----------------------------------------------------------
--------------------------------------------------------*/

private function hashAndSaltString($string) {
  return hash('sha256', 'er4t94e4r5' . $string);
}

/*--------------------------------------------------------
----------------------------------------------------------
--------------CHECK IF PASSWORD MATCHES USER--------------
----------------------------------------------------------
--------------------------------------------------------*/

function checkIfPasswordMatchesUser($username, $password) {
  require($_SERVER['DOCUMENT_ROOT'] . '/php_blog/sql/sql_connexion.php');

  // Getting the username's password.
  $request = $bdd->prepare("SELECT password FROM users WHERE username=?");
  $request->execute(array($username));
  $fetch = $request->fetch();
  $request->closeCursor();

  $hashed_password = $this->hashAndSaltString($password);

  if ($fetch['password'] == $hashed_password) { // If the passwords match.
    return TRUE;
  }

  return FALSE;
}

}
