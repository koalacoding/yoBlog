<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/yoBlog/include/session.php');
require_once('../view/view.php');

if (isset($_SESSION['username'])) { // If the user is connected.
  showView();
}
