<?php
class Login {
  /*--------------------------------------
  ----------HASH AND SALT STRING----------
  --------------------------------------*/

  private function hashAndSaltString($string) {
    return hash('sha256', 'er4t94e4r5' . $string);
  }

  /*------------------------------------------------
  ----------CHECK IF PASSWORD MATCHES USER----------
  ------------------------------------------------*/

  function checkIfPasswordMatchesUser($username, $password) {
    require($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/sql/connexion.php');

    $username = htmlentities($username, ENT_QUOTES);
    
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
