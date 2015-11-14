<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/session/session.php';
require_once '../view/view.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/yoBlog/common/antiFlood/controller/controller.php';

if (isset($_SESSION['username'])) { // If the user is connected.
  showView();
}
