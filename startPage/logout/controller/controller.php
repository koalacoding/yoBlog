<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/include/session.php');
require_once '../model/Logout.php';

if (isset($_SESSION['username'])) { // If the user is connected.
  $logout = new Logout;
  $logout->logoutAction();
  echo 'disconnected';
}
