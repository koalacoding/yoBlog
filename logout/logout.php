<?php
require($_SERVER['DOCUMENT_ROOT'] . '/php_blog/include/session.php');

if (isset($_SESSION['username'])) { // If the user is connected.
  require_once($_SERVER['DOCUMENT_ROOT'] . '/php_blog/User/User.php');

  $user = new User;
  $user->logout();
  echo 'disconnected';
}
