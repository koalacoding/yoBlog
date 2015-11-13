<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/include/session.php');
require_once('../model/Login.php');

if (!isset($_SESSION['username'])) { // If the user is not connected.
  if (isset($_POST['username'], $_POST['password'])) {
    $login = new Login;

    // If the password is correct for the user.
    if ($login->checkIfPasswordMatchesUser($_POST['username'], $_POST['password'])) {
      $_SESSION['username'] = $_POST['username'];
      echo 'ok';
    }
  }
}
