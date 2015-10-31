<?php
/*----------------------------------------
------------------------------------------
-----------------PASSWORD-----------------
------------------------------------------
----------------------------------------*/


/*------------------------------
-----------HASH PASSWORD--------
------------------------------*/

function hash_password($password) {
  // Returning password + salt, hashed in SHA-256.
  return hash('sha256', 'er4t94e4r5' . $password);
}

/*------------------------------
----------CHECK PASSWORD--------
------------------------------*/

// Check if the password matches the username's password.
function check_password($username, $password) {
  require($_SERVER['DOCUMENT_ROOT'] . '/php_blog/sql/sql_connexion.php');
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


/*------------------------------------
--------------------------------------
-----------------MAIN-----------------
--------------------------------------
------------------------------------*/

require($_SERVER['DOCUMENT_ROOT'] . '/php_blog/include/session.php');

if (isset($_POST['username'], $_POST['password'])) {
  if (check_password($_POST['username'], $_POST['password'])) {
    //$_SESSION['username'] = $_POST['username'];
    echo 'ok';
  }
}
