<?php
  /*----------------------------------------
  ------------------------------------------
  -----------------PASSWORD-----------------
  ------------------------------------------
  ----------------------------------------*/


  /*------------------------------
  -----------HASH PASSWORD--------
  ------------------------------*/

  function hash_password($password) { // Using SHA-256.
    return hash('sha256', 'er4t94e4r5' . $password); // Returning password + salt hashed in SHA-256.
  }


  /*------------------------------
  ----------CHECK PASSWORD--------
  ------------------------------*/

  // Check if the password matches the username's password.
  function check_password($bdd, $username, $password) {
    // Getting the username's password.
    $request = $bdd->prepare("SELECT password FROM users WHERE username=?");
    $request->execute(array($username));
    $fetch = $request->fetch();
    $request->closeCursor();

    if ($fetch['password'] == $password) { // If the passwords match.
      return TRUE;
    }

    return FALSE;
  }
