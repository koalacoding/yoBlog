<?php
require_once('LoginHandler.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/php_blog/User/User.php');

if (isset($_POST['username'], $_POST['password'])) {
  $loginHandler = new LoginHandler;

  if ($loginHandler->checkIfPasswordMatchesUser($_POST['username'], $_POST['password'])) {
    $user = new User;
    $user->login($_POST['username']);
    echo 'ok';
  }
}
